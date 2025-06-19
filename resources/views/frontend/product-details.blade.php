@extends('frontend.layouts.frontend')

@section('title', $product->name)

@section('content')
<div class="container py-5">
  <div class="row align-items-center">
    <!-- Product Image -->
    <div class="col-md-6 mb-4 mb-md-0 text-center">
      <img src="{{ asset('assets/img/' . $product->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $product->name }}" style="max-height: 400px;">
    </div>

    <!-- Product Details -->
    <div class="col-md-6">
      <h2 class="mb-3">{{ $product->name }}</h2>
      <h4 class="text-success mb-3">${{ number_format($product->price, 2) }}</h4>
      <p class="mb-4">{{ $product->description }}</p>

      <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" class="btn btn-primary">Add to Cart</button>
      </form>

      <a href="{{ route('shop') }}" class="btn btn-outline-secondary ms-2">Back to Shop</a>
    </div>
  </div>
</div>
@endsection
