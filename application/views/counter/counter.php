<?php 
	//Nếu số không đủ 7 chữ số -> thêm 0 vào phía trước
	
  $len = strlen($counter['all']);
	for ($i = $len; $i < 7; $i++) {
		$counter['all'] = '0'.$counter['all'];
	}
  //Tạo khoảng cách phần ngàn cho counter
  $len = strlen($counter['all']);
  $kq = '';
  for($j=$len-1; $j>=0; $j--){
    if(($len - $j)%3 == 0) $kq = ' '.$counter['all'][$j].$kq;
    else $kq = $counter['all'][$j].$kq;
  }
  $counter['all'] = $kq;
	//hiện theo kiểu
	
?>

<div class=" mt-3 mb-3">
              <div class=" text-center">
                THỐNG KÊ TRUY CẬP
              </div>
              <div class="">
                <h3 class="text-center" style="color:darkgoldenrod;"><?= $counter['all'] ?></h3>
                <!-- <table class="table">
                  <tr>
                    <td>Hôm nay</td>
                    <td class="text-right"><?= $counter['homnay'] ?></td>
                  </tr> 
                  <tr>
                    <td>Hôm qua</td>
                    <td class="text-right"><?= $counter['homqua'] ?> </td>
                  </tr> 
                  
                  <tr>
                    <td>Trong tuần</td>
                    <td class="text-right"><?= $counter['tuannay'] ?></td>
                  </tr> 
                  <tr>
                    <td>Tất cả</td>
                    <td class="text-right"><?= $counter['tuantruoc'] ?></td>
                  </tr> 
                </table> -->
              </div>
            </div>