@extends('frontend.layouts.frontend')

@section('title', 'Shop')

@section('content')
  <div class="row">
    @foreach($products as $product)
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="{{ asset('assets/img/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text text-muted">${{ number_format($product->price, 2) }}</p>
            <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-primary btn-sm">View</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
  </div>
@endsection
