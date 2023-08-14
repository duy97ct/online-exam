<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class VanbanlienquanController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Van_ban_lien_quan_model');
		$this->load->model('Van_ban_cap_model');
		$this->load->model('Van_ban_loai_model');
		$this->load->model('nguoi_dung_model');
	}

	public function index()
	{
		$data['ds_vanban'] = $this->Van_ban_lien_quan_model->all();
		$data['ds_cap'] = $this->Van_ban_cap_model->all();
		$data['ds_loai'] = $this->Van_ban_loai_model->all();
		$this->admin_template('admin/vanban/ds_vanban', $data);
	}

	public function get_ajax(){
		$id = $_REQUEST['id'];
		$vb =  $this->Van_ban_lien_quan_model->find($id);
		echo json_encode(['status' => 'success', 'content' => $vb->data]);
	}

	
	public function addloaivb(){
		$id = $_REQUEST['loaivb'];
		$this->Van_ban_loai_model->add(['VBL_ID' => $id]);
		$error = $this->db->error();
		if($error['code']==0){
			$kq = ['status' => 'success', 'message' => 'Thêm thành công'];
		}else{
			$kq = ['status' => 'error', 'message' => 'Thêm thất bại, có lỗi trong quá trình thực hiện', 'error' => $error];
		}
		echo json_encode(['status' => 'success', 'message' => 'Thêm thành công']);
	}
	
	

	public function add()
	{
		//upload file van ban
		
		// if(empty($_FILES['file']['name'])){
		// 	//Trường hợp không có file đính kèm -> báo lỗi
		// 	$kq = ['status' => 'fail', 'message' => 'Không có file đính kèm'];
		// }else
		{
			//Trường hợp có file -> upload file
			$url = $this->upload_file('file');
			
			if(!empty($_FILES['file2']['name'])){
				$url2 = $this->upload_file('file2');
			}else{
				$url2 = NULL;
			}

			if(!empty($_FILES['file3']['name'])){
				$url3 = $this->upload_file('file3');
			}else{
				$url3 = NULL;
			}

			//luu vao CSDL
			$data = [
						'VB_ID' => $this->Van_ban_lien_quan_model->max_id() + 1,
						'VB_SO' => $_REQUEST['so'],
						'VB_TRICH_YEU' => $_REQUEST['trichyeu'],
						'VB_NGAY_BAN_HANH' => $_REQUEST['ngaybanhanh'],
						'VB_TRANG_THAI' => $_REQUEST['trangthai'],
						'VB_URL' => $url,
						'VB_URL2' => $url2,
						'VB_URL3' => $url3,
						'VB_LOAI' => $_REQUEST['loai'],
						'VB_CAP' => $_REQUEST['cap'],
						'VB_CO_QUAN_BAN_HANH' => $_REQUEST['coquanbanhanh'],
						'VB_NGUOI_KY' => $_REQUEST['nguoiky'],
						'VB_NGUOI_TAO' => $this->session->userdata('user_info')['U_USERNAME'],
						'VB_NGAY_TAO' => date('Y-m-d'),
					];
			$result = $this->Van_ban_lien_quan_model->add($data);
			$error = $this->db->error();
			if($error['code']==0){
				$kq = ['status' => 'success', 'message' => 'Lưu văn bản thành công'];
			}else{
				$kq = ['status' => 'error', 'message' => 'Lưu văn bản thất bại, có lỗi trong quá trình thực hiện', 'error' => $error];
			}
		}
		echo json_encode($kq);
	}

	public function edit()
	{
		$vanban = $this->Van_ban_lien_quan_model->find($_REQUEST['id']);
		if($vanban == NULL){
			//Trường hợp không có vb tồn tại
			$kq = ['status' => 'fail', 'message' => 'Văn bản không tồn tại'];
		}else{
			// var_dump($_FILES['file']['name']);
			//Trường hợp có file upload
			if(!empty($_FILES['file']['name'])){
				//Trường hợp có file -> upload file
				$url = $this->upload_file('file');
				$vanban->set('VB_URL',$url);
			}

			if(!empty($_FILES['file2']['name'])){
				//Trường hợp có file -> upload file
				$url2 = $this->upload_file('file2');
				$vanban->set('VB_URL2',$url2);
			}

			if(!empty($_FILES['file3']['name'])){
				//Trường hợp có file -> upload file
				$url3 = $this->upload_file('file3');
				$vanban->set('VB_URL3',$url3);
			}




			$vanban->set('VB_SO',$_REQUEST['so']);
			$vanban->set('VB_TRICH_YEU',$_REQUEST['trichyeu']);
			$vanban->set('VB_NGAY_BAN_HANH',$_REQUEST['ngaybanhanh']);
			$vanban->set('VB_TRANG_THAI',$_REQUEST['trangthai']);
			$vanban->set('VB_LOAI',$_REQUEST['loai']);
			$vanban->set('VB_CAP',$_REQUEST['cap']);
			$vanban->set('VB_CO_QUAN_BAN_HANH',$_REQUEST['coquanbanhanh']);
			$vanban->set('VB_NGUOI_KY',$_REQUEST['nguoiky']);
			$vanban->set('VB_URL',$_REQUEST['so']);
			$vanban->set('VB_NGUOI_CAP_NHAT',$this->session->userdata('user_info')['U_USERNAME']);
			$vanban->set('VB_NGAY_CAP_NHAT',date('Y-m-d'));
			//luu vao CSDL
			$vanban->save();
			$error = $this->db->error();
			if($error['code']==0){
				$kq = ['status' => 'success', 'message' => 'Lưu văn bản thành công'];
			}else{
				$kq = ['status' => 'error', 'message' => 'Lưu văn bản thất bại, có lỗi trong quá trình thực hiện', 'error' => $error];
			}
		}
			
		
		echo json_encode($kq);
	}

	public function xoa()
    {
        $id = $_REQUEST['id'];
        $cat = $this->Van_ban_lien_quan_model->find($id)->del();
        if($cat == true){
            $message = ['status' => 'success', 'message' => "Văn bản đã được xóa"];
        }else{
            $message = ['status' => 'error', 'message' => 'Xóa thất bại', 'error' => $this->db->error()];
        }
        echo json_encode($message);
    }

    public function search(){
    	$where = [];
    	$so = $_REQUEST['so'];
    	if($so != ''){
    		$this->db->where('VB_SO',$so);
    	}
    	$trichyeu = $_REQUEST['trichyeu'];
    	if($trichyeu != ''){
    		$this->db->like('VB_TRICH_YEU',$trichyeu);
    	}
    	$loai = $_REQUEST['loai'];
    	if($loai != ''){
    		$this->db->where('VB_LOAI',$loai);
    	}
    	$cap = $_REQUEST['cap'];
    	if($cap != ''){
    		$this->db->where('VB_CAP',$cap);
    	}
    	$query = $this->db->from('van_ban_lien_quan')->select('VB_ID')->get();
    	//echo $this->db->last_query();
    	$ds_vanban = $query->result();
    	foreach($ds_vanban as $vanban){
    		$data['ds_vanban'][] = clone $this->Van_ban_lien_quan_model->find($vanban->VB_ID);
    	}
    	 
    	$html =  $this->load->view('admin/vanban/table_view',$data, TRUE);
    	echo json_encode(['status' => 'success', 'message' => 'Tim kiem thanh cong', 'html' => $html]);
    }
}