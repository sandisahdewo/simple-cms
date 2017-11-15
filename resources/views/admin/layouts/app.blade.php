<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> Haltec - CMS | @yield('title') </title>

	<!-- Bootstrap -->
	<link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="{{ asset('vendors/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/dataTables.bootstrap.css') }}">
	<!-- Sweet Alert -->
	<link href="{{ asset('vendors/sweetalert/sweetalert.css') }}" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

	<!-- Datepicker -->
	<link href="{{ asset('build/css/bootstrap-datepicker3.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('vendors/select2/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}"> @stack('css')
</head>

<body class="nav-sm">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{ route('dashboard') }}" class="site_title">
							<i class="fa fa-paw"></i>
							<span>Haltec-CMS</span>
						</a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					@include('admin.partials.sidebar')
					<!-- /sidebar menu -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav class="" role="navigation">
						<div class="nav toggle">
							<a id="menu_toggle">
								<i class="fa fa-bars"></i>
							</a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									{{ Auth::user()->nama }}
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
									<li>
										<a href="{{ url('admin/logout') }}">
											<i class="fa fa-sign-out pull-right"></i> Log Out</a>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						@yield('content_header')
					</div>

					<div class="clearfix"></div>

					<div class="row">
						<div class="col-md-12">
							@if (!empty(session()->has('errorMessage')))
							<div class="alert alert-danger fade in">
								<i class="fa fa-check"></i>
								{{ session()->get('errorMessage') }}
							</div>
							@endif @if (!empty(session()->has('successMessage')))
							<div class="alert alert-success fade in">
								<i class="fa fa-check"></i>
								{{ session()->get('successMessage') }}
							</div>
							@endif @if (count($errors) > 0)
							<div class="alert alert-danger">
								<h4>
									<i class="fa fa-times"></i>
									Form tidak diisi dengan benar!
								</h4>
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
						</div>
						@yield('content_body')
					</div>
				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					Gentelella - Bootstrap Admin Template by
					<a href="https://colorlib.com">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<!-- Datatables -->
	<script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
	<!-- Sweet Alert-->
	<script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('vendors/sweetalert/custom-sweetalert.js') }}"></script>
	<script src="{{ asset('vendors/slugify/slugify.js') }}"></script>
	<!-- Custom Theme Scripts -->
	<script src="{{ asset('build/js/custom.min.js') }}"></script>
	<!-- CKEditor-->
	<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
	<!-- Datepicker -->
	<script src="{{ asset('build/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	@stack('scripts')
</body>

</html>