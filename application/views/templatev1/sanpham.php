<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Favicon -->
		
		<!-- <meta name="<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png"> -->
		<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
		<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-chrome-192x192.png">
		<link rel="icon" type="image/png" sizes="512x512"  href="favicon/android-chrome-512x512.png">
		
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<title>ARGIFARM - Bảo đảm niềm tin</title>
		<base href="<?=base_url() ?>">
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/font-awesome.min.css" media="all" />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/bootstrap.min.css" media="all" />
		<!-- slicknav CSS -->
		<link rel="stylesheet" href="assets/template/css/slicknav.min.css">
		<!-- Owl carousel CSS -->
		<link rel="stylesheet" href="assets/template/css/owl.carousel.min.css">
		<!-- Lightbox CSS -->
		<link rel="stylesheet" href="assets/template/css/lightbox.min.css"/>
		<!-- Animate CSS -->
		<link rel="stylesheet" href="assets/template/css/animate.min.css">
		<!-- Main style CSS -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/style.css" media="all" />
		<!-- Responsive CSS -->
		<link rel="stylesheet" type="text/css" href="assets/template/css/responsive.css" media="all" />
	</head>
	<body class="bg-color">
		<!-- Page loader -->
		<!-- Page loader -->
		<div id="preloader"></div>
		<!-- header area start -->
		<header class="header-area ptb-15">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="header-left-content">
							<ul>
								<li><a href="#"><i class="fa fa-phone"></i>0123 4567 8913</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>example@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-5">
						<!-- <div class="header-right-content">
							<ul>
								<li>
									<select>
										<option value="En">En</option>
										<option value="Bd">Bd</option>
									</select>
								</li>
								<li><a href="#" class="krishok-cart"><i class="fa fa-shopping-cart"></i> <span>3</span></a></li>
								<li><a href="#" class="popup-show">Login</a>
									<div class="login-popup login-form contact-form">
										<h4>Login</h4>
										<form action="#">
											<div class="row">
												<div class="col-sm-12">
													<div class="contact-container">
														<input type="email" placeholder="Email Address">
														<i class="fa fa-envelope"></i>
													</div>
												</div>
												<div class="col-sm-12 mb-15">
													<div class="contact-container">
														<input type="password" placeholder="Password">
														<i class="fa fa-eye"></i>
													</div>
												</div>
												<div class="col-sm-6 text-left mb-15">
													<input type="checkbox">
													<p>Remember me</p>
												</div>
												<div class="col-sm-6 text-right mb-15">
													<div class="popup-light">
														<p>Forget Password ?</p>
													</div>
												</div>
												<div class="col-sm-12 mb-30">
													<button class="krishok-btn">LOGIN</button>
												</div>
												<div class="col-sm-12 mb-15">
													<div class="sign-with">
														<p>Or Sign In With</p>
													</div>
												</div>
												<div class="col-sm-12">
													<a href="#" class="login-with"><i class="fa fa-facebook"></i></a>
													<a href="#" class="login-with"><i class="fa fa-twitter"></i></a>
												</div>
												<div class="col-sm-12 mt-30">
													<p>Don’t Have an Account ? <a href="#" class="registration-form-show">Create Now</a></p>
												</div>
											</div>
										</form>
										<div class="popup-close"><i class="fa fa-close"></i></div>
									</div>
									<div class="login-popup registration-form contact-form">
										<h4>Create Account</h4>
										<form action="#">
											<div class="row">
												<div class="col-sm-12">
													<div class="contact-container">
														<input type="text" placeholder="Username">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="contact-container">
														<input type="email" placeholder="Email Address">
														<i class="fa fa-envelope"></i>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="contact-container">
														<input type="password" placeholder="Password">
														<i class="fa fa-eye"></i>
													</div>
												</div>
												<div class="col-sm-12 mb-15">
													<input type="password" placeholder="Retype Password">
												</div>
												<div class="col-sm-12 text-left mb-15">
													<input type="checkbox">
													<p>Agree with <span>terms and condition</span></p>
												</div>
												<div class="col-sm-12 mb-20">
													<button class="krishok-btn">Create Account</button>
												</div>
												<div class="col-sm-12">
													<p>Already Have an Account ?  <a href="#" class="login-form-show">Login Now</a></p>
												</div>
											</div>
										</form>
										<div class="popup-close"><i class="fa fa-close"></i></div>
									</div>
								</li>
							</ul>
						</div> -->
					</div>
				</div>
			</div>
		</header><!-- header area end -->
		<!-- menu area start -->
		<?php $this->view('template/div_menubar') ?>
		<!-- hero area start -->
		<section class="theme2 theme4 hero-area ptb-110">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<div class="hero-area-content" style="height: 250px;">
							<!-- <h1 class="text-uppercase">Product Gallery</h1>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
							<a href="products.html" class="krishok-btn">Shop Now</a> -->
						</div>
					</div>
				</div>
			</div>
		</section><!-- hero area end -->
		<!-- all product area start -->
		<?php foreach ($ds_sanpham as $k => $sanpham): ?>
			<?php if ($k % 2 ==0): ?>
				<!-- sổ lẻ: hình bên trái -->
				<section class="ptb-80">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="about-area-content">
									<img src="media/images/<?=$sanpham->get('SP_HINH_ANH') ?>" alt="Hình ảnh sản phẩm">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="about-area-content">
									<h2><?= $sanpham->get('SP_TEN') ?></h2>
									<?= $sanpham->get('SP_MO_TA') ?>
									<!-- <a href="#" class="krishok-btn">Contact us</a> -->
									<p>
										<?php if ($sanpham->get('SP_BAI_VIET') != NULL && $sanpham->get('SP_BAI_VIET') == ''): ?>
											<a href="<?=$sanpham->get('SP_BAI_VIET')?>" class="read-more">Đọc tiếp <i class="fa fa-angle-right"></i></a>
										<?php endif ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php else: ?>
				<!-- số chẵn: hình bên phải -->
				<section class="ptb-80">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="about-area-content">
									<h2><?= $sanpham->get('SP_TEN') ?></h2>
									<?= $sanpham->get('SP_MO_TA') ?>
									<!-- <a href="#" class="krishok-btn">Contact us</a> -->
								</div>
							</div>
							<div class="col-lg-6">
								<div class="about-area-content">
									<img src="media/images/<?=$sanpham->get('SP_HINH_ANH') ?>" alt="Hình ảnh sản phẩm">

								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endif ?>
		<?php endforeach ?>

		

		<!-- footer area start -->
		<?php $this->view('template/div_footer') ?>
		<!-- jquery main JS -->
		<script src="assets/js/jquery.min.js"></script>
		<!-- Poppers JS -->
		<script src="assets/js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- slicknav JS -->
		<script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- owl carousel JS -->
		<script src="assets/js/owl.carousel.min.js"></script>
		<!-- Isotope JS -->
		<script src="assets/js/isotope-3.0.4.min.js"></script>
		<!-- Bx slider JS -->
		<script src="assets/js/jquery.bxslider.min.js"></script>
		<!-- lightbox JS -->
		<script src="assets/js/lightbox.min.js"></script>
		<!-- Wow JS -->
		<script src="assets/js/wow-1.3.0.min.js"></script>
		<!-- Google map api -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXNQbOV3ZGoxAQ_H2FtRAS_i9yOdZFfBo&region=GB"></script>
		<!-- Imagezoom JS -->
		<script src="assets/js/jquery.imagezoom.js"></script>
		<!-- main JS -->
		<script src="assets/js/main.js"></script>
	</body>
</html>