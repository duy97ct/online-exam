<!DOCTYPE html>
<html lang="en">
  <head>
    <title> <?= $title ?> </title>
    <meta charset="utf-8">
    <base href="<?=base_url() ?>">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/template/css/animate.css">
    
    <link rel="stylesheet" href="assets/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/template/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/select2/dist/css/select2.css">
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.css">

    <link rel="stylesheet" href="assets/datatable/datatables.css">

    
    <link rel="stylesheet" href="assets/template/css/flaticon.css">
    <link rel="stylesheet" href="assets/template/css/style.css">
    <link rel="stylesheet" href="assets/template/css/custom.css">

    <script src="assets/template/js/jquery.min.js"></script>
    <script src="assets/select2/dist/js/select2.js"></script>
    <script src="assets/select2/dist/js/i18n/vi.js"></script>
    <script src="assets/sweetalert2/dist/sweetalert2.js"></script>
    <script src="assets/template/js/popper.min.js"></script>
    <script src="assets/template/js/bootstrap.min.js"></script>
    <script src="assets/datatable/datatables.js"></script>

  </head>
  <body>

  	<div class="container-fluid pt-md-2">
			<div class="row justify-content-between">
        <div class="col-md-2">
         <!--  <div class="social-media">
            <p class="mb-0 d-flex">
              <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
              <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-youtube  "><i class="sr-only">Youtube</i></span></a>
              
            </p>
          </div> -->
        </div>
				<div class="col-md-8 ">
					</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		
    <!-- END nav -->
    
    <!-- <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/template/images/bg_5.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate mb-0 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>About us <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread"><?= $head ?></h1>
          </div>
        </div>
      </div>
    </section> -->
    <section class="ftco-section">
      <div class="container" id="container-banner">
        <div class="row">
            <div class="col-md-12" style="background: #fff; width: 100%; background-repeat: no-repeat; background-size: 
            contain;">
              <div class="row">
                <!-- <div class="col-md-3 text-center">
                  <img src="assets/images/logo.png" alt="logo Ban di tích" style="width: 200px; height: auto;padding-top: 20px;">
                </div>
                <div class="col-md-9" style="vertical-align: middle">
                  <h3 class="page-header">BAN QUẢN LÝ DI TÍCH THÀNH PHỐ CẦN THƠ</h3>
                  <h3 class="page-header-2">CANTHO HERITAGE MANAGEMENT BOARD</h3>
                  <div class="clearfix"></div>
                </div> -->
                <img src="media/images/Cantho.jpg" style="width:100%; height: auto;">
              </div>
            </div>
        </div>

        <div class="row bg-white">
        <!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar"> -->
          <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <!-- <div class="container-fluid"> -->
            
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
              </button>
              <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                  <li class="nav-item <?=($page == 'page_trangchu')?"active":"" ?>"><a href="page/trangchu" class="nav-link">TRANG CHỦ</a></li>
                  <li class="nav-item <?=($page == 'page_gioithieu') ?"active":"" ?>"><a href="page/gioithieu" class="nav-link">GIỚI THIỆU</a></li>
                  <li class="nav-item <?=($page == 'page_tintucsukien' || $page == 'show_baiviet_theo_category' || $page == 'show_baiviet') ?"active":"" ?>"><a href="chuyenmuc/1" class="nav-link">TIN TỨC - SỰ KIỆN</a></li>
                  <li class="nav-item <?=($page == 'page_ditichthangcanh') ?"active":"" ?>"><a href="page/ditichthangcanh" class="nav-link">DI TÍCH - THẮNG CẢNH</a></li>
                  <!-- <li class="nav-item"><a href="tracnghiem" class="nav-link">Kiểm tra</a></li> -->
                  <!--li class="nav-item <?=($page == 'ds_ketqua') ?"active":"" ?>"><a href="ds_ketqua" class="nav-link">Xem lại kết quả</a></li-->
                  <li class="nav-item <?=($page == 'page_lienhe') ?"active":"" ?>"><a href="page/lienhe" class="nav-link">LIÊN HỆ</a></li>
                </ul>
              </div>
            <!-- </div> -->
          </nav>

        </div>
        <div class="clearfix"></div>

      </div>
        
      
    </section>
     
    <style>
      .wid_70{
        float: left;
        width:70%;
        margin:0;
      }
      .wid_30{
        float: left;
        width:30%;
        margin:0;
      }
    </style>

    

		<section class="ftco-section">
			<div class="container" id="main_container">
				
        <?php $this->view($page) ?>
			</div>
		</section>

		
	

   

    <footer class="ftco-footer1">
      <div class="container" >

        <div class="row" style="height: 3px; background-color: #955807;"></div>
        <div class="row mb-1">
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-3 mt-2">
              <div style="line-height: 2;">
                <h5 style="color: #b26404;font-weight: bold;">BAN QUẢN LÝ DI TÍCH THÀNH PHỐ CẦN THƠ</h5>
                <strong>Địa chỉ:</strong> Số 11B đường Hùng Vương, phường Thới Bình, quận Ninh Kiều, TP. Cần Thơ<br/>
                <strong>Số điện thoại:</strong> 0292 3.818.065 <br/>
                <strong>Email:</strong> <a href="mailto:bqlditich@cantho.gov.vn">bqlditich@cantho.gov.vn</a> - <strong>Website:</strong> <a href="http://bqlditich.cantho.gov.vn"> http://bqlditich.cantho.gov.vn</a><br/>
                  <strong>&#169;</strong> Bản quyền trang thông tin thuộc về Ban quản lý Di tích thành phố Cần Thơ. Mọi hành động đăng tải lại thông tin trên trang thông tin này phải được sự đồng ý của Ban quản lý và phải ghi rõ nguồn "Trang thông tin Ban quản lý Di tích TP. Cần Thơ" khi đăng tải lại các thông tin.

              </div>
              
            </div>
          </div>
          
       
        </div>
      </div>
      
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  
  <script src="assets/template/js/jquery-migrate-3.0.1.min.js"></script>
  
  <script src="assets/template/js/jquery.easing.1.3.js"></script>
  <script src="assets/template/js/jquery.waypoints.min.js"></script>
  <script src="assets/template/js/jquery.stellar.min.js"></script>
  <script src="assets/template/js/owl.carousel.min.js"></script>
  <script src="assets/template/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/template/js/jquery.animateNumber.min.js"></script>
  <script src="assets/template/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <!-- <script src="assets/template/js/google-map.js"></script> -->

  <script src="assets/template/js/main.js"></script>
  <!--script src="assets/template/js/myscript.js"></script-->
    
  </body>
</html>