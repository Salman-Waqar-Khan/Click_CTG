<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

     public function ship(Order $order)
    {
        // Only ship if the order is not already shipped
        if ($order->status === 'shipped') {
            return redirect()->back()->with('message', 'Order already marked as shipped.');
        }

        $order->status = 'shipped';
        $order->save();

        return redirect()->back()->with('success', 'Order marked as shipped successfully.');
    }
    public function show(Order $order)
    {
        $order->load('user', 'orderItems.product'); // eager load relations
        return view('admin.orders.show', compact('order'));
    }
}
