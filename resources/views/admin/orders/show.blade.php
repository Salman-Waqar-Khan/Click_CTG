@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Order Details: #{{ $order->id }}</h2>

    <div class="mb-3">
        <strong>Status:</strong> {{ ucfirst($order->status) }}
    </div>

    <h4>Customer Info</h4>
    <p>Name: {{ $order->user->name }}</p>
    <p>Email: {{ $order->user->email }}</p>
    <p>Address: {{ $order->shipping_address ?? 'N/A' }}</p>

    <h4>Ordered Items</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: ${{ number_format($order->total_amount, 2) }}</h4>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
</div>
@endsection
