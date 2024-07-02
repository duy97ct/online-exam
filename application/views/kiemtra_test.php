<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Navigation</title>
    <style>
        #question-nav {
			position: fixed;
			top: 220px;	
			bottom: 270px; /* Khoảng cách từ bảng điều hướng đến cuối trang */
			right: 20px;
			width: 200px;
			background: #f8f9fa;
			border: 1px solid #ddd;
			border-radius: 4px;
			padding: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
			z-index: 1000;
			max-height: 150vh; /* Giới hạn chiều cao của bảng điều hướng */
			overflow-y: auto; /* Loại bỏ thanh cuộn */
		}

		@media (max-height: 600px) {
			#question-nav {
				max-height: 80vh; /* Tăng chiều cao khi chiều cao trình duyệt nhỏ hơn 600px */
			}
		}

		#question-table {
			width: 100%;
			border-collapse: collapse;
		}

		#question-table td {
			padding: 5px;
			border: 1px solid #ddd;
			cursor: pointer;
			text-align: center;
			font-size: 12px;
		}

		#question-table td.active {
			background: #007bff;
			color: #fff;
			font-weight: bold;
			cursor: pointer; /* Thêm để chuột biến thành dạng con trỏ khi rê chuột qua */
		}

		#step_tree {
			display: flex;
			list-style-type: none;
			margin: 5px;
		}

		#step_tree li {
			margin-right: 20px; /* Điều chỉnh khoảng cách giữa các mục */
		}
    </style>
</head>
<body>
    <script src="assets/js/jquery-ui.long.js?<?=date('HisdmY')?>"></script>
    <!-- Trường hợp trong thời gian thi -->
    <div class="container bg-white pt-3 pb-3">
        <form id="frm_kiemtra" action="update_kiemtra" method="POST">
            <div class="row">
                <div id="test_status" class="col-md-12">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <ul id="step_tree">
                                    <li class="li_status_step_1 text-success">1. Nhập thông tin cá nhân &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></li>
                                    <li class="li_status_step_2 text-success">2. Trả lời câu hỏi &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></li>
                                    <li class="li_status_step_3">3. Hoàn thành</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="div_part1_info" class="col-md-3">
                    <div class="card" id="card-information">
                        <div class="row mt-3">
                            <!-- Thông tin cá nhân -->
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <div class="col-md-12" style="text-align: center;">
                                        Họ tên
                                        <br>
                                        <strong><?=$this->session->userdata('nguoiduthi')->get('ND_TEN')?></strong>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12"  style="text-align: center;">
                                        SĐT
                                        <br>
                                        <strong><?=$this->session->userdata('nguoiduthi')->get('ND_SDT')?></strong>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12"  style="text-align: center;">
                                        Địa chỉ
                                        <br>
                                        <strong><?=$this->session->userdata('nguoiduthi')->get('ND_DIA_CHI')?></strong>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12"  style="text-align: center;">
                                        Đơn vị
                                        <br>
                                        <strong><?=$this->session->userdata('nguoiduthi')->get_donvi()?></strong>
                                    </div>
                                </div>
                                <div style="margin: 25px;text-align: center ;top: 60px; border: 1px solid #76abe2; padding: 1px 20px; width:130px; background-color: #ffffff;">
                                    <span style="font-size:12px;">Thời gian còn lại</span><br/>
                                    <span id="time_countdown" style="color: #f00;">
                                        40:00
                                    </span>
                                </div>
                                <div class="col-md-12 text-center" style="padding: 10px">
                                    <input id="btn_hoanthanh" type="submit" class="btn btn-success" style="width: 180px; font-size: 18px " value="Hoàn thành" style="padding: 10px;margin: 4px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="div_part2_question" class="col-md-9">
                    <br>
                    <strong style="color: blue"> PHẦN THI TRẮC NGHIỆM</strong>
                    <?php $stt=1; foreach($ds_cau_hoi as $cauhoi): ?>
                        <div class="col-md-12 div_cauhoi mt-4" data-question="<?= $stt ?>">
                            <strong>Câu <?= $stt++; ?>: <?= $cauhoi->get('CH_TEXT') ?></strong>
                            <div class="row" style="padding-left: 20px;">
                                <?php foreach($cauhoi->ds_cau_tra_loi() as $tra_loi): ?>
                                    <div class="col-md-6">
                                        <input type="radio" name="cauhoi[<?= $cauhoi->get('CH_ID') ?>]" value="<?= $tra_loi->get('CTL_ID') ?>"/>
                                        <?= $tra_loi->get('CTL_TEXT') ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-md-12 form-group" style="margin-top: 20px;">
                        <strong style="color: blue"> PHẦN THI TỰ LUẬN</strong> <br>
                        <strong> Viết đoạn văn ngắn khoảng 400 từ nói về tầm ảnh hưởng của Bạo lực gia đình đối với vấn đề kinh tế - xã hội ?</strong>
                        <br><br>
                        <textarea class="form-control custom-height" name="songuoi" required="required" style="height: 100px;" placeholder="Viết bài tự luận của bạn vào đây..."></textarea>
                    </div>
                    <div class="mt-5 mb-5">
                        <br><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="question-nav">
        <table id="question-table">
            <?php
            $cols = 5;
            $totalQuestions = count($ds_cau_hoi);
            $rows = ceil($totalQuestions / $cols);
            for ($i = 0; $i < $rows; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < $cols; $j++): 
                        $questionNumber = $i * $cols + $j + 1;
                        if ($questionNumber <= $totalQuestions): ?>
                        <td data-question="<?= $questionNumber ?>"><?= $questionNumber ?></td>
                        <?php else: ?>
                        <td></td>
                        <?php endif; ?>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
    // Kiểm tra các câu hỏi đã được chọn và cập nhật giao diện
    $('input[type="radio"]:checked').each(function() {
        var questionId = $(this).closest('.div_cauhoi').data('question');
        $('#question-table td[data-question="' + questionId + '"]').addClass('active');
    });

    // Khi người dùng chọn câu hỏi, cập nhật bảng điều hướng và kiểm tra
    $('input[type="radio"]').change(function() {
        var questionId = $(this).closest('.div_cauhoi').data('question');
        if ($(this).is(':checked')) {
            $('#question-table td[data-question="' + questionId + '"]').addClass('active');
        } else {
            $('#question-table td[data-question="' + questionId + '"]').removeClass('active');
        }
    });

    // Cuộn đến câu hỏi khi nhấp vào số câu trong bảng điều hướng
    $('#question-table td').click(function() {
        var questionId = $(this).data('question');
        $('html, body').animate({
            scrollTop: $('.div_cauhoi[data-question="' + questionId + '"]').offset().top - 100
        }, 500);
    });
});

    </script>
</body>
</html>
