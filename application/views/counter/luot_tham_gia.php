<?php 
	//Nếu số không đủ 7 chữ số -> thêm 0 vào phía trước
	$len = strlen($luot_tham_gia);
	for ($i = $len; $i < 7; $i++) {
		if($i%3 == 0) $luot_tham_gia = ' '.$luot_tham_gia;
		$luot_tham_gia = '0'.$luot_tham_gia;
	}

	//hiện theo kiểu
	
?>
<!-- <div class="block_trangchu_header text-center">
	<h3>LƯỢT THAM GIA</h3>
	<h2 class="text-center"><?= $luot_tham_gia ?></h2>
</div>
 -->
<div class="block_ditich_01 mt-3 mb-3">
              <div class="block_ditich_01_header">
                LƯỢT THAM GIA
              </div>
              <div class="block_ditich_01_content">
                <h3 class="text-center"><?= $luot_tham_gia ?></h3>
                <table class="table">
                  <tr>
                    <td>Hôm qua</td>
                    <td class="text-right">389</td>
                  </tr> 
                  <tr>
                    <td>Hôm nay</td>
                    <td class="text-right">459</td>
                  </tr> 
                  <tr>
                    <td>Trong tuần</td>
                    <td class="text-right">1416</td>
                  </tr> 
                  <tr>
                    <td>Tất cả</td>
                    <td class="text-right">328589</td>
                  </tr> 
                </table>
              </div>
            </div>