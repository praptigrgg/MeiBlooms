<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
{
    $orders = Order::with('items.bouquet')->latest()->get();
    return view('admin.orders.index', compact('orders'));
}
public function show(Order $order)
{
    $order->load('items.bouquet'); 
    return view('admin.orders.show', compact('order'));
}
}
