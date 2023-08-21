<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class CauhoiController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('cau_hoi_model');

		$this->load->model('cau_tra_loi_model');
		$this->load->model('nguoi_dung_model');
		$this->load->model('don_vi_model');
	}

	public function index(){
		//Hien ds cau hoi
		$ds_cau_hoi = $this->cau_hoi_model->all();
		//var_dump($ds_cau_hoi);
		
		$data['ds_cau_hoi'] = $ds_cau_hoi;
		
		$this->admin_template('admin/ds_cauhoi',$data);
	}
	public function add_cauhoi()
	{
		$cauhoi = $_REQUEST['cauhoi'];
		$ds_traloi = $_REQUEST['traloi'];
		$status = $_REQUEST['status'];
		// var_dump($ds_traloi);
		// echo "<br/>";
		// var_dump($status);exit();
		$q_ch = $this->cau_hoi_model->add(['CH_TEXT' => $cauhoi]);
		//var_dump($q_ch);exit();
		foreach ($ds_traloi as $stt => $traloi) {
			if($traloi != ""){
				if($stt == $status){
					//Cau tra loi dung
					$q_tl = $this->cau_tra_loi_model->add(['CTL_CH_ID' => $q_ch, 'CTL_TEXT' => $traloi,'CTL_DUNG' => 1]);
				}else{
					$q_tl = $this->cau_tra_loi_model->add(['CTL_CH_ID' => $q_ch, 'CTL_TEXT' => $traloi,'CTL_DUNG' => 0]);
				}
				
			}
		}
		redirect('admin/ds_cauhoi');
	}

	public function ajax_chitiet_cauhoi($id)
	{
		$cauhoi = $this->cau_hoi_model->find($id);
		$kq['cauhoi'] = $cauhoi->data;
		$ds_traloi = $cauhoi->ds_cau_tra_loi();
		foreach ($ds_traloi as $traloi) {
			$kq['traloi'][] = $traloi->data;
		}
		echo json_encode($kq);

	}
	public function sua_cauhoi()
	{
		$id = $_REQUEST['id_cauhoi'];
		$cauhoi = $this->cau_hoi_model->find($id);
		$nd_cauhoi = $_REQUEST['cauhoi'];

		$cauhoi->set('CH_TEXT', $nd_cauhoi);
		$cauhoi->save();

		$ds_traloi = $_REQUEST['traloi'];
		$status = $_REQUEST['status'];
		foreach ($ds_traloi as $stt => $traloi) {
			$id = $traloi['id'];
			$noidung = $traloi['noidung'];
			if($noidung != NULL){
				if($status == $stt){
					//Cau tra loi dung
					$tl = $this->cau_tra_loi_model->find($id);
					$tl->set('CTL_TEXT',$noidung);
					$tl->set('CTL_DUNG',1 );
					$tl->save();
				}else{
					$tl = $this->cau_tra_loi_model->find($id);
					if($tl != NULL){
						$tl->set('CTL_TEXT',$noidung);
						$tl->set('CTL_DUNG',0 );
						$tl->save();
					}
				}

			}else if($id != 0){
				$tl = $this->cau_tra_loi_model->find($id);
				if($tl != NULL){
					$tl->del();
				}
				
			}
		}

		redirect('admin/ds_cauhoi');
	}

	public function xoa_cauhoi($id)
	{
		$kq = $this->cau_hoi_model->find($id)->del();
		if($kq == true){
			$message = ['status' => 'success', 'content' => "Câu hỏi đã được xóa"];
		}else{
			$message = ['status' => 'error', 'content' => 'Xoa that bai', 'error' => $this->db->error()];
		}
		echo json_encode($message);
	}

	public function ds_ketqua()
	{
		
		if(isset($_REQUEST['sdt'])){
			$sdt = $_REQUEST['sdt'];
			$ds_nguoidung = $this->nguoi_dung_model->where(['ND_SDT' => $sdt]);
		}else{
			$ds_nguoidung = null;
		}
		
		//var_dump($ds_nguoidung);
		$data['ds_nguoidung']=$ds_nguoidung;
		$this->template('ds_ketqua',$data);
	}

	public function kiemtra()
	{
		$begin = new DateTime("2023-01-01 07:00:00");
		$end = new DateTime("2023-12-31 17:00:00");
		$now = new DateTime("now");

		if ($now < $begin || $now > $end){
			$data = [];
			$this->template('hethan_kiemtra',$data);
		   
		}else{
			
			//Đơn vị yêu cầu để chữ "Khác" ở cuối ds
			$data['ds_donvi'] = $this->don_vi_model->where(['DV_ID <> 57' => NULL]);
			$this->template('kiemtra_dangky',$data);
		}
			
	}

	public function tra_cuu_kq()
	{
		$this->template('page_tra_cuu_kq');
			
	}
	public function kiemtra_test()
	{
			$data['ds_donvi'] = $this->don_vi_model->where(['DV_ID <> 57' => NULL]);
			$this->template('kiemtra_dangky',$data);
		
			
	}
	public function kiemtra_traloicauhoi()
	{
		if(!isset($_REQUEST['hoten'])){
			redirect('kiemtra_dangky');
			exit();
		}else{
			//save thông tin đăng ký
			$hoten = trim(mb_strtoupper($_REQUEST['hoten']));
			$sdt = trim($_REQUEST['sdt']);
			if(!isset($_REQUEST['gioitinh'])){
				echo json_encode(['status' => 'error', 'message' => 'Chưa đầy đủ thông tin cá nhân', 'error' => 'Chưa có thông tin về giới tính']);
				exit();
			}
			$gioitinh = $_REQUEST['gioitinh'];
			//$namsinh = $_REQUEST['namsinh'];
			$diachi = trim($_REQUEST['diachi']);
			$quanhuyen = NULL;
			$donvi = $_REQUEST['donvi'];
			$ten_donvi = $_REQUEST['tendonvi'];
			//Trường hợp chọn khác ở mục đơn vị
			if($donvi == '57'){
				if($ten_donvi == ''){
					//Không nhập tên đơn vị ==> không có đơn vị
					$donvi = 57;
				}else{
					//Có nhập tên đơn vị ==> thêm mới đơn vị
					$data_donvi = [

									'DV_ID' => $this->db->select('MAX(DV_ID) AS MAX')->get('don_vi')->result()[0]->MAX + 1,
									'DV_TEN' => $ten_donvi,
									];
					$donvi = $this->don_vi_model->add($data_donvi);
					if(is_array($donvi)){
						//Trường hợp có lỗi khi thêm đơn vị
						$status = 'error';
						$message = "Đăng ký dự thi không thành công. Có lỗi khi thêm đơn vị";
						echo json_encode(['status' => $status, 'message' => $message, 'error' => $this->db->error()]);
						exit();
					}else{
						$donvi = $data_donvi['DV_ID'];
					}
				}
			}
			
			//Vì được báo giờ chạy sai tầm 10 phút -> nâng giờ hiện tại lên
			$current_date = date('Y-m-d H:i:s');
			$newTime = date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($current_date)));
			
			$data = array(
						'ND_TEN' => $hoten,
						'ND_SDT' =>$sdt,
						'ND_GIOI_TINH' => $gioitinh,
						//'ND_NAM_SINH' => $namsinh,
						'ND_DIA_CHI' => $diachi,
						'ND_SO_NGUOI' => 0,
						'ND_DON_VI' => NULL,
						'ND_DON_VI_CONG_TAC' => $donvi,
						'ND_NGAY_TAO' => $newTime
					);
			$nd = $this->nguoi_dung_model->add($data);
			$error = $this->db->error();
			if($error['code'] == 0){
				//Khi thêm người dùng thành công -> tạo session
				$nguoidung = $this->nguoi_dung_model->find($nd);
				if($nguoidung==NULL){
					echo "Lỗi";
					exit();
				} 

				$this->session->set_userdata('nguoiduthi', $this->nguoi_dung_model->find($nd));
				$this->session->set_userdata('id_nguoiduthi', $this->nguoi_dung_model->find($nd)->get('ND_ID'));
				//$this->session->set_userdata('datanguoiduthi', $data);
				$ds_cau_hoi = $this->cau_hoi_model->select_random(29);
				
				$data['ds_cau_hoi'] = $ds_cau_hoi;
				$this->template('kiemtra_test',$data);

			}else{
				$this->session->set_flashdata('error', "lỗi khi đăng ký người dùng");
				redirect('kiemtra_dangky');
			}
		}
	}

	public function xem_kiemtra($id)
	{
		$nguoidung = $this->nguoi_dung_model->find($id);
		if($nguoidung != NULL){
			$ds_cau_hoi = $this->cau_hoi_model->select_random(29);
		
			$ds_ketqua = $nguoidung->ds_ketqua();
			
			foreach ($ds_cau_hoi as &$cauhoi) {
				$cauhoi->set('dapan', NULL);
				foreach ($ds_ketqua as $ketqua) {
					if($ketqua['cauhoi']->get('CH_ID') == $cauhoi->get('CH_ID')){
						$cauhoi->set('dapan',$ketqua['dapan']);
					}
				};
			}
			// var_dump($ds_cau_hoi);
			// exit();
			$data['nguoidung'] = $nguoidung;
			$data['ds_dapan'] = $ds_cau_hoi;
			
			$this->admin_template('xem_kiemtra1',$data);
		}else{
			$this->session->set_flashdata('message','Người dùng không tồn tại trong hệ thống');
			redirect('admin');
		}
		
	}
	public function update_kiemtra()
	{
		// var_dump($_REQUEST);
		// $hoten = trim(mb_strtoupper($_REQUEST['hoten']));
		// $sdt = trim($_REQUEST['sdt']);
		// if(!isset($_REQUEST['gioitinh'])){
		// 	echo json_encode(['status' => 'error', 'message' => 'Gửi bài thi thất bại, điền chưa đầy đủ thông tin cá nhân', 'error' => 'Chưa có thông tin về giới tính']);
		// 	exit();
		// }
		//$gioitinh = $_REQUEST['gioitinh'];
		//$namsinh = $_REQUEST['namsinh'];
		// $diachi = trim($_REQUEST['diachi']);
		//$quanhuyen = $_REQUEST['quanhuyen'];
		//if($quanhuyen == 'NULL' || $quanhuyen ==0) $quanhuyen = NULL;
		// $quanhuyen = NULL;
		//$donvi = $_REQUEST['donvi'];
		// $donvi = $_REQUEST['donvi'];
		// $ten_donvi = $_REQUEST['tendonvi'];
		// if($donvi == '') $donvi=NULL;
		//Trường hợp chọn khác ở mục đơn vị
		// if($donvi == '57'){
		// 	if($ten_donvi == ''){
		// 		//Không nhập tên đơn vị ==> không có đơn vị
		// 		$donvi = NULL;
		// 	}else{
		// 		//echo "them don vi";
		// 		//Có nhập tên đơn vị ==> thêm mới đơn vị
		// 		$data_donvi = [

		// 						'DV_ID' => $this->db->select('MAX(QH_ID) AS MAX')->get('quan_huyen')->result()[0]->MAX + 1,
		// 						'DV_TEN' => $ten_donvi,
		// 						];
		// 		$donvi = $this->Don_vi_model->add($data_donvi);
		// 		if(is_array($donvi)){
		// 			//Trường hợp có lỗi khi thêm đơn vị
		// 			$status = 'error';
		// 			$message = "Gửi bài dự thi không thành công. Có lỗi khi thêm đơn vị";
		// 			echo json_encode(['status' => $status, 'message' => $message, 'error' => $this->db->error()]);
		// 			exit();
		// 		}else{
		// 			$donvi = $data_donvi['DV_ID'];
		// 		}
		// 	}
		// }
		$user_id = $this->session->userdata('id_nguoiduthi');//nd;
		$songuoi = $_REQUEST['songuoi'];
		$ds_cauhoi = isset($_REQUEST['cauhoi'])?$_REQUEST['cauhoi']:[];
		// if($hoten == '' || $sdt == '' || $diachi == ''){
		// 	$status = 'error';
		// 	$message = "Gửi bài dự thi không thành công. Chưa có thông tin người dự thi.";
		// 	echo json_encode(['status' => $status, 'message' => $message]);
		// 	exit();
		// }
		if($songuoi == 0){
			session_destroy();
			$status = 'error';
			$message = "Gửi bài dự thi không thành công: Không điền số người dự đoán đúng.";
			echo json_encode(['status' => $status, 'message' => $message, 'id' => $user_id]);
			exit();
		}else{
			$user_id = $this->session->userdata('id_nguoiduthi');
			$user = $this->nguoi_dung_model->find($user_id);
			$user->set('ND_SO_NGUOI', $songuoi);
			$user->save();
		}

		//Vì được báo giờ chạy sai tầm 10 phút -> nâng giờ hiện tại lên
		$current_date = date('Y-m-d H:i:s');
		$newTime = date("Y-m-d H:i:s",strtotime("-10 minutes", strtotime($current_date)));



		//kiểm tra blacklist
		// if($sdt == '0705105405'){
		// 	$status = 'error';
		// 	$message = "Hệ thống phát hiện hoạt động bất thường. vui lòng thử lại sau hoặc liên hệ số điện thoại trên website để được tư vấn";
		// 	echo json_encode(['status' => $status, 'message' => $message]);
		// 	exit();
		// }

		// $hack_check = $this->db->where('ND_SDT',$sdt)->order_by('ND_NGAY_TAO','DESC')->get('nguoi_dung')->result();
		// if($hack_check != NULL && count($hack_check) > 0){
		// 	//Da tung gui bai thi
		// 	//var_dump($hack_check[0]);
		// 	$time_delay_nopbai = strtotime($newTime) - strtotime($hack_check[0]->ND_NGAY_TAO);
		// 	if($hack_check[0]->ND_SO_NGUOI != $songuoi){
		// 		if($time_delay_nopbai/60 < 3){
		// 			$status = 'error';
		// 			$message = "Hệ thống phát hiện hoạt động bất thường. vui lòng thử lại sau hoặc liên hệ số điện thoại trên website để được tư vấn";
		// 			echo json_encode(['status' => $status, 'message' => $message]);
		// 			exit();
		// 		}
		// 	}else{
		// 			$status = 'success';
		// 			$message = "Gửi bài dự thi thành công";
		// 			echo json_encode(['status' => $status, 'message' => $message]);
		// 			exit();
				
					
		// 	}
		// }

		
		// $data = array(
		// 			'ND_TEN' => $hoten,
		// 			'ND_SDT' =>$sdt,
		// 			//'ND_GIOI_TINH' => $gioitinh,
		// 			//'ND_NAM_SINH' => $namsinh,
		// 			'ND_DIA_CHI' => $diachi,
		// 			'ND_SO_NGUOI' => $songuoi,
		// 			//'ND_QH_ID' => $donvi,
		// 			'ND_DON_VI' => NULL,
		// 			'ND_DON_VI_CONG_TAC' => $donvi,
		// 			'ND_NGAY_TAO' => $newTime
		// 		);
		// $nd = $this->nguoi_dung_model->add($data);
		//check nguoi dung truoc khi them bang SDT
				//var_dump($this->session->userdata('id_nguoiduthi')); exit();
				
				$mark = 0;
				$total = 0;
				foreach($ds_cauhoi as $cauhoi => $traloi){
					if($traloi == '') $traloi = NULL;
					$save_db = $this->cau_hoi_model->add_tra_loi_cau_hoi($user_id,$cauhoi,$traloi);
					$check = $this->cau_hoi_model->check_tra_loi_cau_hoi($traloi);
					$mark += (int) $check;
					$total++;
				}
				session_destroy();
				$status = "success";
				// $message =  "ID của bạn là $user_id. Bạn trả lời đúng được $mark/$total câu hỏi. 
				// 			<br> Bạn có thể xem lại kết quả <a href='xem_kiemtra/".$user_id."'>ở đây</a>";
				$message =  "Gửi bài dự thi thành công";
			
		echo json_encode(['status' => $status, 'message' => $message, 'id' => $user_id]);
	}

	public function kiemtra_kq($user_id)
	{
		$data['nguoidung'] = $this->nguoi_dung_model->find($user_id);
		$data['ketqua'] = $data['nguoidung']->get_ketqua();
		$this->template('kiemtra_kq', $data);
	}

	public function ketqua_kiemtra()
	{
		$data = [];
		$data['sdt'] = '';
		$data['hoten'] = '';
		$this->template('ketqua_kiemtra',$data);
	}
	public function ketqua_kiemtra2()
	{
		$sdt = $_REQUEST['sdt'];
		$hoten = trim(mb_strtoupper($_REQUEST['hoten']));
		$data['sdt'] = $sdt;
		$data['hoten'] = $hoten;
		// if($hoten != NULL){

		//     $data['ds_nguoidung'] = $this->nguoi_dung_model->where(['ND_TEN LIKE' => "%$hoten%",'ND_SDT' => $sdt]);
		// }else{
		//     $data['ds_nguoidung'] = $this->nguoi_dung_model->where(['ND_SDT' => $sdt]);
		// }

		$data['ds_nguoidung'] = $this->nguoi_dung_model->get_2first_exam($sdt, $hoten);
		//$data['ds_nguoidung'] = $this->nguoi_dung_model->where(['ND_TEN LIKE' => "$hoten",'ND_SDT' => $sdt]);
		//echo $this->db->last_query();exit();
		$this->template('ketqua_kiemtra',$data);
	}
}