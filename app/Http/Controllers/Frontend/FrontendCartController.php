<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use Illuminate\Http\Request;

class FrontendCartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.pages.cart', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $bouquet = Bouquet::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $bouquet->name,
                "price" => $bouquet->price,
                "quantity" => 1,
                "image" => $bouquet->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Bouquet added to cart!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared.');
    }
}
