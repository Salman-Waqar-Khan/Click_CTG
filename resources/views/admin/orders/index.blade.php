@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
    <h2>All Orders</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Placed At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        @if($order->status !== 'shipped')
                            <form method="POST" action="{{ route('admin.orders.ship', $order->id) }}">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-success">Mark as Shipped</button>
                            </form>
                        @else
                            <span class="badge bg-secondary">Shipped</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No orders yet.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
