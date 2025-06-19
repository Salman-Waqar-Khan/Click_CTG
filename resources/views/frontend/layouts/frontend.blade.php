<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Click_CTG - @yield('title')</title>

  <!-- ✅ Bootstrap 5 CSS from CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- ✅ Custom CSS -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  @yield('head')
</head>
<body>

  <!-- ✅ Header -->
  @include('frontend.layouts.partials.header')

  @if (session('success'))
    <div id="flash-success" class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session('error'))
    <div id="flash-error" class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <main class="container mt-4">
    @yield('content')
  </main>

  <!-- ✅ Footer -->
  @include('frontend.layouts.partials.footer')

  <!-- ✅ Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- ✅ Custom JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- ✅ Flash Message Auto-Hide Script -->
  <script>
    setTimeout(() => {
      const success = document.getElementById('flash-success');
      const error = document.getElementById('flash-error');

      if (success) {
        success.classList.remove('show');
        success.classList.add('fade');
        success.style.opacity = 0;
      }

      if (error) {
        error.classList.remove('show');
        error.classList.add('fade');
        error.style.opacity = 0;
      }
    }, 3000); // 3 seconds
  </script>

  @yield('scripts')
</body>
</html>
