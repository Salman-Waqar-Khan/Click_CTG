@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Orders List</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View Details</a>
                    @if($order->status !== 'shipped')
                        <form action="{{ route('admin.orders.ship', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Mark this order as shipped?')">
                                Mark as Shipped
                            </button>
                        </form>
                    @else
                        <span class="badge bg-success">Shipped</span>
                    @endif
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No orders found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
