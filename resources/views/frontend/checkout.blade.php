@extends('frontend.layouts.frontend')

@section('title', 'Checkout')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Checkout</h2>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name', auth()->user()->name) }}">
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Shipping Address</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Place Order</button>
        </form>
    </div>
</div>
@endsection
