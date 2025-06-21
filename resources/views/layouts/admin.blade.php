<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel - @yield('title', 'Dashboard')</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- NiceAdmin custom styles -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    #sidebar {
      min-width: 220px;
      max-width: 220px;
      background: #343a40;
      color: white;
      min-height: 100vh;
    }
    #sidebar .nav-link {
      color: white;
    }
    #sidebar .nav-link.active {
      background: #0d6efd;
    }
    main {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <nav id="sidebar" class="d-flex flex-column p-3">
      <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="fas fa-cogs fs-4 me-2"></i>
        <span class="fs-5 fw-bold">Admin Panel</span>
      </a>
      <hr />
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
          </a>
        </li>
        <li>
          <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
            <i class="fas fa-box me-2"></i> Orders
          </a>
        </li>
        <li>
          <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fas fa-tags me-2"></i> Products
          </a>
        </li>
      </ul>
      <hr />
      <div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-danger w-100" type="submit"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
        </form>
      </div>
    </nav>

    <!-- Main content -->
    <main class="flex-grow-1">
        @if(session('success'))
    <div class="alert alert-success my-3">{{ session('success') }}</div>
        @endif

        @if(session('message'))
            <div class="alert alert-info my-3">{{ session('message') }}</div>
        @endif

      @yield('content')
    </main>
  </div>

  <!-- Bootstrap 5 JS Bundle (Popper + Bootstrap JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
