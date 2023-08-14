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
		<!-- contact area start -->
		<section class="ptb-80" id="email-us">
			<div class="container">
				<div class="row">
				    <div class="col-lg-6">
				        <div class="contact-form">
                            <h4>Phản hồi</h4>
				            <form action="#">
				                <input type="text" placeholder="Nhập tên...">
				                <input type="email" placeholder="Email...">
				                <textarea placeholder="Nội dung..." rows="10"></textarea>
				                <button class="krishok-btn">GỬI PHẢN HỒI</button>
				            </form>
				        </div>
				    </div>
				    <div class="col-lg-6">
				        <div class="contact-form">
                            <h4>Văn phòng</h4>
				            <div class="contact-area">
				                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum is simply dummy text psum has been standard dummy text ever</p>
				                <p>Giờ mở cửa: 7 giờ - 11 giờ và từ 13 giờ - 17 giờ các ngày từ thứ 2 đến thứ 6</p>
				                <p>Địa chỉ: Quận Ninh Kiều, thành phố Cần Thơ</p>
				                <p>
                                    SĐT: 0123 4567 8913 - Email: example@mail.com <br/>hoặc
                                    <br/>
                                    SĐT: 0123 4567 8913 (Tín) - Email: example@mail.com
                                </p>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</section><!-- contact gallery area end -->
		<!-- contact map area start -->
		<section>
			<div class="container">
				<div class="row map-area">
                    <div class="col-lg-12">
                        <div class="sec-title pt-75">
                            <h3>VỊ TRÍ CÔNG TY</h3>
                            
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62860.63914868784!2d105.72255077236285!3d10.034185113833168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ-G6p24gVGjGoSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1617909120541!5m2!1svi!2s" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
				</div>
			</div>
        	<!-- <div class="google-map"></div> -->
		</section><!-- contact map area end -->
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
		<!-- Gmap JS -->
		<!-- <script src="assets/template/js/gmap3.min.js"></script> -->
        <!-- Google map api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXNQbOV3ZGoxAQ_H2FtRAS_i9yOdZFfBo&region=GB"></script>
		<!-- Imagezoom JS -->
		<script src="assets/template/js/jquery.imagezoom.js"></script>
		<!-- main JS -->
		<script src="assets/template/js/main.js"></script>
	</body>
</html>