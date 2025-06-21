<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Back to Shop</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
