@extends('frontend.layouts.frontend')

@section('title', 'Your Cart')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Your Cart</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(count($cart))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $total += $item['price'] * $item['quantity']; @endphp
                        <tr>
                            <td><img src="{{ asset('assets/img/' . $item['image']) }}" width="60"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total:</strong></td>
                        <td colspan="2"><strong>${{ number_format($total, 2) }}</strong></td>
                    </tr>
                    @if(auth()->check())
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary">Proceed to Checkout</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-warning">Login to Checkout</a>
                    @endif
                </tbody>
            </table>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</div>
@endsection
