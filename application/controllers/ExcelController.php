<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class ExcelController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('nguoi_dung_model');
	}


	public function num_to_excel_col($num)
	{
		$num++; //nếu num = 0 => num = 1 để kết quả ra A
		if($num <= 0) return '';
		
		$letter = '';
		do{
			$so_le = ($num - 1) % 26;
			$num = intval(($num - $so_le) / 26);
			$letter = chr(65 + $so_le) . $letter;
		} while($num > 0);
		return $letter;
		//$cols = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',];
		//return $cols[$num];
	}
	public function export_excel_nguoidung($trunggiai = NULL)
	{
		$this->load->library('excel');
		
		//var_dump($data);
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()
		   ->setCreator("CTICT")
		   ->setLastModifiedBy("CTICT")
		   ->setTitle(WEBSITE_TITLE)
		   ->setSubject(WEBSITE_TITLE)
		   ->setDescription("Du lieu xuat tu phan mem")
		   ->setKeywords(WEBSITE_TITLE);
		$objPHPExcel->setActiveSheetIndex(0);
		//set font for document
		$styleArray = array(
						'font'  => array(
							'bold'  => false,
							'color' => array('rgb' => '000000'),
							'size'  => 13,
							'name'  => 'Times New Roman'
						));
		$styleArray_title = array(
						'font'  => array(
									'bold'  => true,
									'size'  => 18,
									),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									),
						);
		$styleArray_title2 = array(
						'font'  => array(
									'italic'  => true
									),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									),
						);
						
		$styleArray_header = array(
						'font'  => array(
									'bold'  => true,
									),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									),
						'borders' => array(
										'allborders' => array(
										  'style' => PHPExcel_Style_Border::BORDER_THIN
										)
									  )
						);
		$styleArray_border = array(
						'borders' => array(
										'allborders' => array(
										  'style' => PHPExcel_Style_Border::BORDER_THIN
										)
									  )
						);
		$objPHPExcel->getActiveSheet()->getDefaultStyle()->applyFromArray($styleArray);


		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);

		$write_excel = $objPHPExcel;
		$kq = array();
		$kq[0] = ['STT','Họ tên','SĐT', 'Đơn vị công tác', 'Địa chỉ', 'Ngày dự thi', 'Số dự đoán', 'Sai số'];
		$stt = 1;
		//var_dump($_REQUEST);exit();

		if($trunggiai == NULL){
			//Trường hợp xuất ds người dùng
			$tungay = $_REQUEST['tungay'];
			$denngay = $_REQUEST['denngay'];
			$sql_denngay = $denngay." 23:59:59";
			// $ds_nguoidung = $this->nguoi_dung_model->where(['ND_NGAY_TAO >' => $tungay, 'ND_NGAY_TAO <' => $sql_denngay]);
			$ds_nguoidung = $this->nguoi_dung_model->get_ds_luotthi_cuoicung($tungay, $sql_denngay);
		}else{
			//Trường hợp xuất ds trúng giải
			$tungay = '2022-05-19';
			$denngay = '2022-06-10';
			$ds_nguoidung = $this->nguoi_dung_model->ds_dudoan_gannhat();
		}
		
		//var_dump($ds_nguoidung);exit();
		foreach ($ds_nguoidung as $nguoidung) {
			//$nguoidung = $this->db->from('nguoi_dung_mobile')->where('ND_ID',$nd_id)->get()->result();
			if($nguoidung == NULL || count($nguoidung) == 0){
				//Khong tim thay khach hang
			}else{
				//var_dump($nguoidung[0]);
				$kq[] = [
							$stt++, 
							$nguoidung->get('ND_TEN'), 
							$nguoidung->get('ND_SDT'), 
							$nguoidung->get_donvi(),$nguoidung->get('ND_DIA_CHI'), 
							$nguoidung->get('ND_NGAY_TAO'), 
							 
							str_replace(',','.',trim($nguoidung->get('ND_SO_NGUOI'))),
							$nguoidung->get('SAI_SO'),
						];
				//$nguoidung->get_ketqua()['total']
			}
		}
		
		//var_dump($kq); exit();
		$col_num = 1;
		//offset=6 do đã ghi lên dòng C4 tiêu đề
		$offset = 6;
		for($i=0;$i<count($kq);$i++){
			for ($j = 0; $j < count($kq[$i]); $j++) {
				$write_excel->getActiveSheet()->setCellValue($this->num_to_excel_col($j).($i+$offset), $kq[$i][$j]);
			}

			//$write_excel->getActiveSheet()->getStyle('A'.($i+$offset).":".$this->num_to_excel_col($j-1).($i+$offset))
			//					->applyFromArray($styleArray_border);
			
		}
		$write_excel->getActiveSheet()->getStyle('A'.($offset).":".$this->num_to_excel_col($j-1).($i+$offset))
								->applyFromArray($styleArray_border);
		$write_excel->getActiveSheet()->getStyle('A'.($offset).":".$this->num_to_excel_col($j-1).($offset))
								->applyFromArray($styleArray_header);

		// ghi title
		$write_excel->getActiveSheet()->mergeCells('A3:'.$this->num_to_excel_col($j-1).'3');
		$write_excel->getActiveSheet()->mergeCells('A4:'.$this->num_to_excel_col($j-1).'4');
		if($trunggiai == NULL){
			$write_excel->getActiveSheet()->setCellValue('A3', 'DANH SÁCH DỰ THI '.WEBSITE_TITLE);
			$write_excel->getActiveSheet()->setCellValue('A4', "Từ ngày ".date('d/m/Y',strtotime($tungay))." đến ngày ".date('d/m/Y',strtotime($denngay)));
		}else{
			$write_excel->getActiveSheet()->setCellValue('A3', 'DANH SÁCH DỰ ĐOÁN GẦN ĐÚNG '.WEBSITE_TITLE);
			$write_excel->getActiveSheet()->setCellValue('A4', "Số người trả lời đúng tất cả câu hỏi: ".$this->nguoi_dung_model->count_answerright());
		}
		$write_excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleArray_title);
		$write_excel->getActiveSheet()->getStyle('A4')->applyFromArray($styleArray_title2);
		$objWriter = PHPExcel_IOFactory::createWriter($write_excel, 'Excel2007');
		$filename = 'exported/export_luotduthi'.date('YmdHis').'.xlsx';
		$objWriter->save($filename);
		$result = array(
						'status' => 'success',
						'file' => $filename,
						//'data' => $kq,
					);




		
		echo json_encode($result);
	}

	public function export_excel_page()
	{
		$data = [];
		$this->admin_template('admin/thongke/export_excel_sql', $data);
	}

	public function export_excel_sql()
	{
		ini_set('memory_limit', '-1');	// no limit memories
		ini_set('max_execution_time', 2*60*60*1000); //2 giờ
		$this->load->library('excel');
		
		//var_dump($data);
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()
		   ->setCreator("SoLDTBXH")
		   ->setLastModifiedBy("SoLDTBXH")
		   ->setTitle("Du lieu cuoc thi Tim hieu phap luat")
		   ->setSubject("Template excel")
		   ->setDescription("Du lieu xuat tu phan mem")
		   ->setKeywords("tim hieu phap luat");
		$objPHPExcel->setActiveSheetIndex(0);
		//set font for document
		$styleArray = array(
						'font'  => array(
							'bold'  => false,
							'color' => array('rgb' => '000000'),
							'size'  => 13,
							'name'  => 'Times New Roman'
						));
		$styleArray_title = array(
						'font'  => array(
									'bold'  => true,
									'size'  => 18,
									),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									),
						);
		$styleArray_title2 = array(
						'font'  => array(
									'italic'  => true
									),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									),
						);
						
		$styleArray_header = array(
						'font'  => array(
									'bold'  => true,
									),
						'alignment' => array(
										'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
									),
						'borders' => array(
										'allborders' => array(
										  'style' => PHPExcel_Style_Border::BORDER_THIN
										)
									  )
						);
		$styleArray_border = array(
						'borders' => array(
										'allborders' => array(
										  'style' => PHPExcel_Style_Border::BORDER_THIN
										)
									  )
						);
		

		$write_excel = $objPHPExcel->getActiveSheet();
		$write_excel->getDefaultStyle()->applyFromArray($styleArray);
		// $write_excel->getColumnDimension('B')->setWidth(25);
		// $write_excel->getColumnDimension('C')->setWidth(50);
		// $write_excel->getColumnDimension('D')->setWidth(50);
		// $write_excel->getColumnDimension('E')->setWidth(75);
		// $write_excel->getColumnDimension('F')->setWidth(20);
		// $write_excel->getColumnDimension('H')->setWidth(20);
		$kq = array();
		//$kq[0] = ['STT','Họ tên','Đơn vị công tác', 'Quận, huyện, sở, ban, ngành, đoàn thể', 'Địa chỉ', 'Ngày dự thi', 'Kết quả', 'Số dự đoán'];
		$stt = 1;

		$sql = $_REQUEST['sql'];
		$kq = $this->db->query($sql)->result_array();
		
		//var_dump($kq);

		$col_num = 1;
		//offset=6 do đã ghi lên dòng C4 tiêu đề
		$offset = 6;
		$data_header = [];
		for($i=0;$i<count($kq);$i++){
			$j = 0;
			foreach ($kq[$i] as $key => $value) {
				if($i == 0){
					$data_header[] = $key;
					$write_excel->setCellValue($this->num_to_excel_col($j).($offset-1), $key);	//ghi header
				}
				$write_excel->setCellValue($this->num_to_excel_col($j).($i+$offset), $value);
				$j++;
			}
			
		}

		$write_excel->getStyle('A'.($offset).":".$this->num_to_excel_col($j-1).($i+$offset))
								->applyFromArray($styleArray_border);
		$write_excel->getStyle('A'.($offset-1).":".$this->num_to_excel_col($j-1).($offset-1))
								->applyFromArray($styleArray_header);

		// ghi title
		$write_excel->mergeCells('A3:'.$this->num_to_excel_col($j-1).'3');
		$write_excel->mergeCells('A4:'.$this->num_to_excel_col($j-1).'4');
		$write_excel->setCellValue('A3', 'XUẤT DỮ LIỆU CUỘC THI TÌM HIỂU PHÁP LUẬT BÌNH ĐẲNG GIỚI');
		$write_excel->getStyle('A3')->applyFromArray($styleArray_title);
		$write_excel->getStyle('A4')->applyFromArray($styleArray_title2);
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$filename = 'exported/export_ds'.date('YmdHis').'.xlsx';
		$objWriter->save($filename);
		$result = array(
						'status' => 'success',
						'file' => $filename,
						//'data' => $kq,
					);




		
		echo json_encode($result);
	}
}
?>