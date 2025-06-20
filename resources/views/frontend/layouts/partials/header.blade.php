<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Click_CTG</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.index') }}">My Orders</a>
        </li>
        @endauth
        <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
