<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KIP | <?= $header ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet"
		  href="<?= base_url() . 'assets/' ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/jqvmap/jqvmap.min.css">

	<!--	select2 css-->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/select2/css/select2.min.css">
	<link rel="stylesheet"
		  href="<?= base_url() . 'assets/' ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- jQuery -->
	<script src="<?= base_url() . 'assets/' ?>plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url() . 'assets/' ?>plugins/jquery-ui/jquery-ui.min.js"></script>
	<script>
		window.base_url = '<?= base_url() ?>';
	</script>
</head>

<body id="page-top" class="<?= $this->uri->segment(1) == 'app' ? 'sidebar-collapse' : null ?>">


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="index3.html" class="nav-link">Home</a>
			</li>

		</ul>

		<!-- SEARCH FORM -->
		<form class="form-inline ml-3">
			<div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-navbar" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</form>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">

			<!-- Notifications Dropdown Menu -->
			<!--  -->
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->


		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?= base_url() . 'assets/' ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2"
						 alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">KIP UKRIM</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
				 with font-awesome or any other icon font library -->
					<?php if ($this->session->userdata("role") == 'mahasiswa') { ?>
						<li class="nav-header">MENU USER</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Umum
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url("users") ?>" class="nav-link">
										<i class="nav-icon fas fa-user"></i>
										<p>
											Profile
										</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?= site_url("softskill") ?>" class="nav-link">
								<i class="nav-icon fas fa-skating"></i>
								<p>
									List Softskill
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= site_url("login/logout") ?>" class="nav-link">
								<i class="nav-icon fas fa-power-off"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					<?php } ?>
					<?php if ($this->session->userdata("role") == 'admin') { ?>
						<li class="nav-header">MENU ADMIN</li>
						<li class="nav-item">
							<a href="<?= site_url("dashboard") ?>" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-chart-pie"></i>
								<p>
									Master
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url("perolehan") ?>" class="nav-link">
										<i class="nav-icon fas fa-x-ray"></i>
										<p>
											Perolehan
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url("tingkat") ?>" class="nav-link">
										<i class="nav-icon fas fa-wine-glass"></i>
										<p>
											Tingkat
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url("jenis") ?>" class="nav-link">
										<i class="nav-icon fas fa-boxes"></i>
										<p>
											Jenis
										</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?= site_url("softskill/getDataSoftskill") ?>" class="nav-link">
								<i class="nav-icon fas fa-tasks"></i>
								<p>
									Softskill
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url("users") ?>" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
									User
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= site_url("login/logout") ?>" class="nav-link">
								<i class="nav-icon fas fa-power-off"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					<?php } ?>
					<ul class="nav nav-treeview">

					</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"></h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Dashboard v1</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<?php $this->load->view($page); ?>
			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
		All rights reserved.
		<div class="float-right d-none d-sm-inline-block">
			<b>Version</b> 3.0.3-pre
		</div>
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>


<!--JQUERY VALIDATION-->
<script src="<?= base_url() . 'assets/' ?>plugins/jquery-validation/jquery.validate.js"></script>
<script src="<?= base_url() . 'assets/' ?>plugins/jquery-validation/additional-methods.js"></script>
<script src="<?= base_url() . 'assets/' ?>plugins/jquery-validation/localization/messages_id.js"></script>

<!--select2-->
<script src="<?= base_url() . 'assets/' ?>plugins/select2/js/select2.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url() . 'assets/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() . 'assets/' ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() . 'assets/' ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() . 'assets/' ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() . 'assets/' ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() . 'assets/' ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() . 'assets/' ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url() . 'assets/' ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() . 'assets/' ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() . 'assets/' ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() . 'assets/' ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() . 'assets/' ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() . 'assets/' ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() . 'assets/' ?>dist/js/demo.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
</body>

</html>
