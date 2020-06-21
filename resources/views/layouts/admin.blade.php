<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ecommerce Dashboard &mdash; Stisla</title>
  @stack('prepend-style')
  @include('includes.admin.style')
  @stack('addon-style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
     {{-- Navbar --}}
     @include('includes.admin.navbar') 

     {{-- Sidebar  --}}
     @include('includes.admin.sidebar') 

     {{-- Content --}}
     @yield('content')
     
     {{-- Footer --}}
     @include('includes.admin.sidebar')
    </div>
  </div>

  <!-- General JS Scripts -->
  @stack('prepend-script')
  @include('includes.admin.script')
  @stack('addon-script')
</body>
</html>
