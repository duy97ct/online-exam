<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<base href="<?=base_url() ?>">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="login" class="login100-form validate-form" method="POST">
					<h4><?=WEBSITE_TITLE ?></h4>
					<br>
					<h5 style="color:red">TRANG ĐĂNG NHẬP DÀNH CHO ADMIN</h5>
					<span class="login100-form-title p-b-43">
						
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Chưa nhập tên tài khoản">
						<input class="" type="text" name="username" >
						<span class="focus-input100"></span>
						<span class="label-input100">Tài khoản</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Chưa nhập mật khẩu">
						<input class="" type="password" name="pass" >
						<span class="label-input100">Mật khẩu</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							ĐĂNG NHẬP
						</button>
					</div>


						<!-- <div class="container-signup100-form-btn">
					
							<button class="signup100-form-btn">
								ĐĂNG KÝ
							</button>
						</div> -->
						
						
					</form>

					<div class="login100-more" style="background-image: url('assets/login/images/bg-01.jpg');">
					</div>
				</div>
			</div>
		</div>
	
	

	
	
===============================================================================================-->
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/js/main.js"></script>

</body>
</html>