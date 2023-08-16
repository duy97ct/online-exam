<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=WEBSITE_TITLE?> - Trang quản trị</title>
	<base href="<?=base_url(); ?>">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/admin_template/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="assets/admin_template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="assets/admin_template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<!-- <link rel="stylesheet" href="assets/admin_template/plugins/jqvmap/jqvmap.min.css"> -->
	<link rel="stylesheet" href="assets/datatable/datatables.css">
	<link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.css">
	<link rel="stylesheet" href="assets/select2/dist/css/select2.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/admin_template/dist/css/adminlte.css">
	<link rel="stylesheet" href="assets/admin_template/dist/css/custom.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="assets/admin_template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="assets/admin_template/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="assets/admin_template/plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- jQuery -->
	<script src="assets/admin_template/plugins/jquery/jquery.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="assets/admin_template/plugins/jquery-ui/jquery-ui.min.js"></script>

	<script src="node_modules/ckeditor4/ckeditor.js"></script>
	<script src="node_modules/ckfinder/ckfinder.js"></script>

	<link rel="stylesheet" href="node_modules/treetable/css/jquery.treetable.css">
	<link rel="stylesheet" href="node_modules/treetable/css/jquery.treetable.theme.default.css">
	<script src="node_modules/treetable/jquery.treetable.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	
	<!-- /.navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light text-right">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- right div -->
    <div class="pull-right">
    	<a href="<?=base_url() ?>" target="_blank">Website</a>
    </div>
  </nav>
	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="admin" class="brand-link">
			<img src="<?=base_url()?>/media/images/logo_website.png" alt="Logo website" class="brand-image img-circle elevation-3"
					 >
			<span class="brand-text font-weight"><?=WEBSITE_TITLE_SHORT ?></span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="assets/admin_template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<span class="d-block text-white"><?=$hoten ?></span>
					<br>
					<a href="dangxuat">Đăng xuất</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2" id="nav-header">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
							 with font-awesome or any other icon font library -->
					<li class="nav-item has-treeview" style="border-bottom: 1px solid #666666;">
						<a href="admin/ds_taikhoan" class="nav-link">
							<i class="nav-icon fas fa-user"></i>
							<p>
								Tài khoản
								
							</p>
						</a>
						
					</li>
					
					<li class="nav-item has-treeview">
						<a href="admin/ds_category" class="nav-link">
							<i class="nav-icon fa fa-list-alt"></i>
							<p>
								Chuyên mục
							</p>
						</a>
						
					</li>
					
					<li class="nav-item has-treeview">
						<a href="admin/ds_baiviet" class="nav-link">
							<i class="nav-icon fa fa-list-alt"></i>
							<p>
								Bài viết
							</p>
						</a>
						
					</li>
					
					<!-- <li class="nav-item has-treeview">
						<a href="admin/vanban/" class="nav-link">
							<i class="nav-icon fa fa-file-o "></i>
							<p>
								Văn bản liên quan
							</p>
						</a>
					</li> -->
					<li class="nav-item has-treeview">
						<a href="admin/tke_theo_category" class="nav-link">
							<i class="nav-icon fa fa-pie-chart"></i>
							<p>
								T.kê theo chuyên mục
							</p>
						</a>
						
					</li>
					<li class="nav-item has-treeview" style="border-bottom: 1px solid #666666;">
						<a href="admin/ds_baiviet_theo_thang" class="nav-link">
							<i class="nav-icon fa fa-pie-chart"></i>
							<p>
								T.kê theo tháng
							</p>
						</a>
						
					</li>

					<li class="nav-item has-treeview">
						<a href="admin/ds_nguoidung" class="nav-link">
							<i class="nav-icon fas fa-user"></i>
							<p>
								Người dùng
								
							</p>
						</a>
						
					</li>
					<li class="nav-item has-treeview">
						<a href="admin/ds_trunggiai" class="nav-link">
							<i class="nav-icon fas fa-star"></i>
							<p>
								DS dự đoán gần nhất
							</p>
						</a>
						
					</li>
					<li class="nav-item has-treeview" style="border-bottom: 1px solid #666666;">
						<a href="admin/ds_cauhoi" class="nav-link">
							<i class="nav-icon fas fa-edit"></i>
							<p>
								Câu hỏi
							</p>
						</a>
						
					</li>
					
					
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper p-3"> 
				<?php $this->view($page) ?>
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<strong></strong>
		
		<div class="float-right ">
			@2022 - Do <a href="http://ctict.cantho.gov.vn" target="_blank">CTICT</a> xây dựng và thiết kế
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
<!-- Bootstrap 4 -->
<script src="assets/admin_template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/datatable/datatables.js"></script>
<script src="assets/datatable/sort/date-uk.js"></script>
<script src="assets/sweetalert2/dist/sweetalert2.js"></script>
<script src="assets/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="assets/select2/dist/js/select2.js"></script>
<!-- ChartJS -->
<script src="assets/admin_template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/admin_template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="assets/admin_template/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="assets/admin_template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="assets/admin_template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/admin_template/plugins/moment/moment.min.js"></script>
<script src="assets/admin_template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/admin_template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/admin_template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/admin_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/admin_template/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/admin_template/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/admin_template/dist/js/demo.js"></script>
</body>
</html>
