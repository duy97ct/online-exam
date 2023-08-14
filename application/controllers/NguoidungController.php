<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class NguoidungController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('nguoi_dung_model');
		// $this->load->model('Quan_huyen_model');
	}

	public function index(){
		//Hien ds cau hoi
		$search_quanhuyen = null;
		$search_traloi_dung = null;
		
		//Lọc theo ngày
		$tungay = isset($_REQUEST['tungay'])?$_REQUEST['tungay']:date('Y-m-d');
		$denngay = isset($_REQUEST['denngay'])?$_REQUEST['denngay']:date('Y-m-d');
		$sql_denngay = $denngay." 23:59:59";
		// $ds_nguoidung = $this->nguoi_dung_model->where(['ND_NGAY_TAO >' => $tungay, 'ND_NGAY_TAO <' => $sql_denngay]);
		$ds_nguoidung = $this->nguoi_dung_model->get_ds_luotthi_cuoicung($tungay, $sql_denngay);

		//Nếu có chọn lọc theo quận huyện trên form search
		// if(isset($_REQUEST['quanhuyen']) && $_REQUEST['quanhuyen'] != ""){
		//     $search_quanhuyen = $_REQUEST['quanhuyen'];
		//     $ds_nguoidung = $this->nguoi_dung_model->where(['ND_QH_ID' => $_REQUEST['quanhuyen']]);
		// }else{
		//    $ds_nguoidung = $this->nguoi_dung_model->all();
		// }

		//Nếu có check vào nút check tả lời đúng tất cả các câu trên form tìm kiếm
		
		if(isset($_REQUEST['traloi_dung'])) {
			$search_traloi_dung = 1;
			if(count($ds_nguoidung)>0)
			foreach ($ds_nguoidung as $key => $nguoidung) {
				//Người nào có số câu đúng nhỏ với tổng số câu == có trả lời sai => xóa ra khỏi ds 
				if($nguoidung->get_ketqua()['mark'] < QUESTION_NUMBER){ //$nguoidung->get_ketqua()['total']
					
					unset($ds_nguoidung[$key]);
				}
			}
		}
		
		// $data['search_quanhuyen'] = $search_quanhuyen;
		$data['search_traloi_dung'] = $search_traloi_dung;
		// $data['ds_quanhuyen'] = $this->Quan_huyen_model->all();
		$data['ds_nguoidung'] = $ds_nguoidung;
		$data['tungay'] = $tungay;
		$data['denngay'] = $denngay;
		
		$this->admin_template('admin/nguoidung/ds_nguoidung',$data);
	}

	public function del_nguoidung($id)
	{
		//Kiểm tra trước khi xóa
		$result = $this->nguoi_dung_model->find($id)->del();
		if($result == 1){
			$status = 'success';
			$message = 'Xóa người dùng thành công';
		}else{
			$status = 'error';
			$message = 'Xóa người dùng thất bại, có lỗi xảy ra';
		}
		echo json_encode(['status' => $status, 'message' => $message]);
	}

	public function ds_trunggiai()
	{
		$data['ds_nguoidung'] = $this->nguoi_dung_model->ds_dudoan_gannhat();
		$this->admin_template('admin/nguoidung/ds_trunggiai',$data);
	}
}