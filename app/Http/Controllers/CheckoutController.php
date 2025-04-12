<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $cart = session('cart');

        if (!$cart || count($cart) === 0) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // ✅ Validate input
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        // 💰 Calculate total
        $total = collect($cart)->reduce(function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // 🛒 Create order
        $order = Order::create([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'phone'       => $data['phone'],
            'address'     => $data['address'],
            'cart'        => json_encode($cart),
            'total_price' => $total,
        ]);

        // 💐 Store order items
        foreach ($cart as $bouquetId => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'bouquet_id' => $bouquetId,
                'name'       => $item['name'],
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        // 🧹 Clear cart session
        session()->forget('cart');

        // 🎉 Success
        return redirect()->route('frontend.home')->with('success', 'Order placed successfully!');
    }

    public function show()
    {
        return view('frontend.checkout');
    }
}
