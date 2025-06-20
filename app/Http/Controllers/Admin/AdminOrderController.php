<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\Order;

class AdminOrderController extends Controller
{


public function index()
{
    $orders = Order::with('user')->latest()->get();
    return view('admin.orders.index', compact('orders'));
}

public function ship(Order $order)
{
    $order->update(['status' => 'shipped']);
    return redirect()->route('admin.orders.index')->with('success', 'Order marked as shipped.');
}
}
