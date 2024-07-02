<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Carousel</title>
  <link rel="stylesheet" href="path/to/owl.carousel.min.css">
  <link rel="stylesheet" href="path/to/owl.theme.default.min.css">
  <style>
    /* Cài đặt CSS cho carousel */
    .carousel-container {
        width: 100%;
        box-sizing: border-box;
    }

    .owl-carousel .item {
        margin: 0; /* Xóa bỏ margin để đảm bảo hình ảnh nằm thẳng hàng */
    }

    .owl-carousel .item img {
        width: 100%; /* Hình ảnh co dãn theo chiều rộng của phần tử cha */
        height: auto;
        display: block;
        margin: 0; /* Xóa bỏ margin để đảm bảo hình ảnh nằm thẳng hàng */
    }

    /* Đảm bảo các phần khác không bị chồng lấn */
    .layout-content {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* Cài đặt hiển thị nút back-to-top */
    #back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        background-color: #ccc;
        border: none;
        color: #333;
        cursor: pointer;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 16px;
    }
  </style>
</head>
<body>

<div class="layout-content">
  <div class="container">
    <div class="carousel-container box-shadow widget-banner">
      <div class="owl-carousel owl-theme" id="quytrinh">
        <div class="item">
          <a title="Bạo lực gia đình" href="#">
            <img alt="anh ve cuoc thi" class="img-responsive" src="media/images/baolucgiadinh1.jpg" title=""/>
          </a>
        </div>
        <!-- Thêm các mục khác vào đây -->
      </div>
    </div>
  </div>
</div>

<button id="back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-4" style="padding: 10px">
      <div class="widget-videos">
        <div class="widget-title">Hướng dẫn</div>
        <div class="widget-content">
          <ul>
            <li>
              <div class="thumbnail">
                <a href="#" target="_blank">
                  <img src="media/images/baolucgiadinh1.jpg" alt="Hướng dẫn thí sinh dự thi" style="width: 100%; height: auto;">
                </a>
              </div>
              <h4><a href="#" target="_blank">Hướng dẫn thí sinh dự thi</a></h4>
            </li>
            <li>
              <div class="thumbnail">
                <a href="#" target="_blank">
                  <img src="media/images/tailieu_thamkhao.jpg" alt="Tài liệu tham khảo" style="width: 100%; height: auto;">
                </a>
              </div>
              <h4><a href="https://drive.google.com/drive/u/0/folders/12SFXkrjf3zyg-l5dswtqjCOQmCqxQMca" target="_blank">Tài liệu tham khảo</a></h4>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-8" style="padding: 10px">
      <div class="widget-notifications">
        <div class="widget-title position-relative">
          Thông báo từ Ban Tổ chức
          <span class="icon-notif" style="width: 10%; right: 10px; bottom: -30px;"></span>
        </div>
        <div class="widget-content">
          <ul>
            <li>
              <a href="the_le_cuoc_thi" target="_self">Thể lệ Cuộc thi "Demo thi Online Thành Phố Cần Thơ" năm 2023</a>
              <span>Ngày 16/08/2023</span>
            </li>
            <?php if (count($ds_thongbao) > 0): ?>
            <?php foreach ($ds_thongbao as $baiviet): ?>
            <li>
            <?php
            // Chuyển ngày tháng về định dạng dd/mm/yyyy 
            $dateString = $baiviet->get('BV_NGAY_DANG');
            $date = new DateTime($dateString);
            $formattedDate = $date->format('d/m/Y');
            ?>
              <a href="baiviet/<?=$baiviet->get('BV_ID') ?>" target="_self"><?= $baiviet->get('BV_TIEU_DE') ?></a>
              <span>Ngày <?=$formattedDate ?></span>
            </li>
            <?php endforeach ?>
            <?php else: ?>
            Nội dung đang cập nhật
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="path/to/jquery.min.js"></script>
<script src="path/to/owl.carousel.min.js"></script>
<script>
  $(document).ready(function() {
    $('#quytrinh').owlCarousel({
      margin: 0, /* Xóa bỏ margin để đảm bảo hình ảnh nằm thẳng hàng */
      responsiveClass: true,
      autoplay: true,
      dots: false,
      loop: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
        0: { items: 1 },
        430: { items: 2 },
        600: { items: 2 },
        800: { items: 3 },
        1000: { items: 1 }
      },
      onInitialized: function() {
        $('#quytrinh').find('.owl-item img').css({
          'width': '100%',
          'height': 'auto',
          'max-width': '100%',
          'margin-left': 'auto',
          'margin-right': 'auto'
        });
      }
    });

    // Hiển thị nút bấm khi trang web cuộn xuống 200px
    $(window).scroll(function() {
      if ($(this).scrollTop() > 200) {
        $('#back-to-top').fadeIn();
      } else {
        $('#back-to-top').fadeOut();
      }
    });

    // Thêm chức năng bấm nút để cuộn về đầu trang
    $('#back-to-top').click(function() {
      $('html, body').animate({scrollTop: 0}, 800);
      return false;
    });
  });
</script>

</body>
</html>
