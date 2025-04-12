<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\KhaltiClient;
use Illuminate\Http\Request;

class KhaltiShopController extends Controller
{
    public function initiate(Request $request)
{

    $cart = session('cart');
    if (!$cart || count($cart) == 0) return back()->with('error', 'Cart is empty');

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    $data = [
        'return_url' => route('khalti.bouquet.verify'),
        'website_url' => config('khalti.website_url'),
        'amount' => $total * 100, // in paisa
        'purchase_order_id' => uniqid('ORDER_'),
        'purchase_order_name' => 'Bouquet Purchase',
        'customer_info' => [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]
    ];

    $khalti = new KhaltiClient();
    $response = json_decode($khalti->initiatePayment($data));
    


    if (isset($response->pidx)) {
        session(['pending_order' => [
            'pidx' => $response->pidx,
            'order_id' => $data['purchase_order_id'],
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
            'cart' => $cart,
        ]]);

        return redirect($response->payment_url);
    }

    return back()->with('error', 'Failed to initiate payment with Khalti.');
}


    public function verify(Request $request)
    {
        $pidx = $request->query('pidx');

        $khalti = new KhaltiClient();
        $response = $khalti->verifyPayment($pidx);

        if ($response['status'] === 'Completed') {
            // Save Order
            $data = session('pending_order');

            $order = Order::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'total_price' => $data['total'],
                'payment_status' => 'paid',
            ]);

            foreach ($data['cart'] as $item) {
                $order->items()->create([
                    'product_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);
            }

            session()->forget('cart');
            session()->forget('pending_order');

            return redirect()->route('checkout.success');
        }

        return redirect()->route('checkout')->with('error', 'Payment verification failed.');
    }
}
