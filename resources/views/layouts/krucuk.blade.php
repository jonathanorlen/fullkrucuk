<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	{{-- <link rel="stylesheet" href="assets/plugin/slick/slick.css"> --}}
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	@stack('prepend-style')
	<link rel="stylesheet" href="{{url('frontend/style.css')}}">
	@stack('post-style')
</head>

<body>
     @include('includes.krucuk.navbar')
	<section class="header mt-5">
		@yield('content')
	</section>
     @include('includes.krucuk.footer')
	@stack('prepend-script')
	@include('includes.krucuk.script')
	@stack('post-script')
</body>

</html>