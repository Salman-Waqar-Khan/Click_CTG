@extends('frontend.layouts.frontend')

@section('title', 'My Orders')

@section('content')
    <h2>My Orders</h2>
    @if($orders->isEmpty())
        <p>You haven't placed any orders yet.</p>
    @else
        @foreach($orders as $order)
            <div class="card mb-4">
                <div class="card-header">
                    Order #{{ $order->id }} | {{ $order->created_at->format('d M Y') }} | Status: <strong>{{ ucfirst($order->status) }}</strong>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($order->orderItems as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <strong>{{ $item->product->name }}</strong><br>
                                    Quantity: {{ $item->quantity }}
                                </div>
                                <span>৳{{ number_format($item->price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-3 text-end">
                        <strong>Total: ৳{{ number_format($order->total, 2) }}</strong>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
