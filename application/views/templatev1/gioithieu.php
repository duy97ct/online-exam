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
	<body>
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
		<!-- about area start -->
		<section class="ptb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="about-area-content">
							<img src="assets/template/img/gioithieu.jpg" alt="about">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-area-content">
							<h2>GIỚI THIỆU</h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<!-- <a href="#" class="krishok-btn">Contact us</a> -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="about-area ptb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="about-area-content">
							<h2>SẢN PHẨM - DỊCH VỤ</h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<!-- <a href="#" class="krishok-btn">Watch More Videos</a> -->
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-area-content">
							<!-- <iframe src="https://player.vimeo.com/video/204451045" allowfullscreen></iframe> -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/31_l8GNPtds" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section><!-- about area end -->
		<!-- testimonial area start -->
		<section class="ptb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="sec-title">
							<h2>CÁC ĐÁNH GIÁ VỀ SẢN PHẨM</h2>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 mt-30">
						<div class="testimonial-slide owl-carousel">
							<div class="single-testimonial-box">
								<div class="testimonial-box-img">
								   <img src="assets/template/img/user5-128x128.jpg" alt="ok">
								</div>
								<h5>Người 1</h5>
								<p>Lorem Ipsum is simply dummy text of the printing and type settin the readable content of a page in when the readable content of a page in when looking.</p>
								<div class="review-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div class="single-testimonial-box">
								<div class="testimonial-box-img">
								   <img src="assets/template/img/user6-128x128.jpg" alt="testimonial-box">
								</div>
								<h5>Người 2</h5>
								<p>Lorem Ipsum is simply dummy text of the printing and type settin the readable content of a page in when the readable content of a page in when looking.</p>
								<div class="review-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div class="single-testimonial-box">
								<div class="testimonial-box-img">
								   <img src="assets/template/img/user7-128x128.jpg" alt="testimonial-box">
								</div>
								<h5>Người 3</h5>
								<p>Lorem Ipsum is simply dummy text of the printing and type settin the readable content of a page in when the readable content of a page in when looking.</p>
								<div class="review-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div class="single-testimonial-box">
								<div class="testimonial-box-img">
								   <img src="assets/template/img/user8-128x128.jpg" alt="testimonial-box">
								</div>
								<h5>Người 4</h5>
								<p>Lorem Ipsum is simply dummy text of the printing and type settin the readable content of a page in when the readable content of a page in when looking.</p>
								<div class="review-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div class="single-testimonial-box">
								<div class="testimonial-box-img">
								   <img src="assets/template/img/user3-128x128.jpg" alt="testimonial-box">
								</div>
								<h5>Người 5</h5>
								<p>Lorem Ipsum is simply dummy text of the printing and type settin the readable content of a page in when the readable content of a page in when looking.</p>
								<div class="review-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div class="single-testimonial-box">
								<div class="testimonial-box-img">
								   <img src="assets/template/img/user1-128x128.jpg" alt="testimonial-box">
								</div>
								<h5>Người 6</h5>
								<p>Lorem Ipsum is simply dummy text of the printing and type settin the readable content of a page in when the readable content of a page in when looking.</p>
								<div class="review-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- testimonial area end -->
		<!-- get quote area start -->
		<!-- <section class="get-quote ptb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2>Get Update About Products</h2>
						<form action="#">
							<input type="text" placeholder="Email Address">
							<button type="submit">SUBSCRIBE</button>
						</form>
					</div>
				</div>
			</div>
		</section> --><!-- get quote area end -->
		<!-- footer area start -->
		<?php $this->view('template/div_footer') ?>
		<!-- jquery main JS -->
		<script src="assets/template/js/jquery.min.js"></script>
		<!-- Poppers JS -->
		<script src="assets/template/js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets/template/js/bootstrap.min.js"></script>
		<!-- slicknav JS -->
		<script src="assets/template/js/jquery.slicknav.min.js"></script>
		<!-- owl carousel JS -->
		<script src="assets/template/js/owl.carousel.min.js"></script>
		<!-- Isotope JS -->
		<script src="assets/template/js/isotope-3.0.4.min.js"></script>
		<!-- Bx slider JS -->
		<script src="assets/template/js/jquery.bxslider.min.js"></script>
		<!-- lightbox JS -->
		<script src="assets/template/js/lightbox.min.js"></script>
		<!-- Wow JS -->
		<script src="assets/template/js/wow-1.3.0.min.js"></script>
		<!-- Google map api -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXNQbOV3ZGoxAQ_H2FtRAS_i9yOdZFfBo&region=GB"></script>
		<!-- Imagezoom JS -->
		<script src="assets/template/js/jquery.imagezoom.js"></script>
		<!-- main JS -->
		<script src="assets/template/js/main.js"></script>
	</body>
</html>