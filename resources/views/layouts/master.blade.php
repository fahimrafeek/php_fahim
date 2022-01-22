<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>
		Sales Representative | @yield('title')
	</title>

  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
  	<!-- Font Awesome -->
 	<link rel="stylesheet" href="{{ asset('css/common/font-awesome.min.css') }}">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="{{ asset('css/common/ionicons.min.css') }}">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="{{ asset('css/common/AdminLTE.min.css') }}">
  	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  	<link rel="stylesheet" href="{{ asset('css/common/skin-blue.min.css') }}">

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
	  
	<link rel="stylesheet" href="{{ asset('css/datetime/bootstrap-datepicker3.min.css') }}">

    @stack('styles')
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<!-- Header -->
		@include('layouts.header')

		<!-- Sidebar -->
		
		@include('layouts.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					@yield('header')
					<small>@yield('description')</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
					<li class="active">Here</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content container-fluid">
				@yield('content')
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Main Footer -->
		@include('layouts.footer')
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED JS SCRIPTS -->

	<!-- jQuery 3 -->
	<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('js/common/adminlte.min.js') }}"></script>

	<!-- Optionally, you can add Slimscroll and FastClick plugins.
		Both of these plugins are recommended to enhance the
		user experience. -->

	<script src="{{ asset('js/datetime/bootstrap-datepicker.min.js') }}"></script>

	<script src="{{ asset('js/custom.js') }}"></script>

    @if(!isset($requestHeaders))
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    @endif
	@stack('scripts')
</body>
</html>