<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class BaivietController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Bai_viet_model');
		$this->load->model('Category_model');
		$this->load->model('nguoi_dung_model');
	}

	

	public function index()
	{
		$data['ds_baiviet'] = $this->Bai_viet_model->all();
		$this->admin_template('admin/baiviet/ds_baiviet', $data);
	}
	public function show_baiviet($id)
	{
		//echo "sfsdfds";exit();
		$data['baiviet'] = $this->Bai_viet_model->find($id);
		$this->template('show_baiviet', $data);
	}


	// public static function show_block($cat_id){
	//     $ci =& get_instance();
	//     $ci->load->model('Bai_viet_model');
	//     $ds_baiviet = $ci->Bai_viet_model->where(['BV_CAT_ID' => $cat_id]);
	//     return $ds_baiviet;
	// }

	public function show_baiviet_theo_category($category)
	{
		$data['ds_baiviet'] = $this->Bai_viet_model->where(['BV_CAT_ID' => $category]);
		$this->template('show_baiviet_theo_category',$data);
	}

	public function add_baiviet()
	{
		$data['ds_category'] = $this->Category_model->all();
		$this->admin_template('admin/baiviet/add_baiviet', $data);
	}
	
	public function add2_baiviet()
	{
		//var_dump($this->session->userdata('user_info')); exit();
		// $this ->load->model('Bai_viet_model');
		// $data = $this ->input->post();
		// $this -> Bai_viet_model-> Add_baiviet($data);
		// redirect('admin/ds_baiviet');
		//////////////
		 $this ->load->view('admin/baiviet/add_baiviet');
		 $cat = $_REQUEST['category'];
		 $tieude = trim($_REQUEST['tieude']);
		 $noidung = $_REQUEST['noidung'];
		 $ngaydang = $_REQUEST['ngaydang'];
		 $ngayketthuc = ($_REQUEST['ngayketthuc'] == '')? NULL:$_REQUEST['ngayketthuc'];
		 $nguoitao = $this->session->userdata('user_info')['U_USERNAME'];

		 $this ->load->model('Bai_viet_model');
		 $this -> Bai_viet_model-> Add_baiviet($cat,$tieude,$noidung,$nguoitao,$ngaydang,$ngayketthuc);
		 redirect('admin/ds_baiviet');

	}
	public function edit_baiviet($id)
	{   $data['ds_category'] = $this->Category_model->all();
		$data['baiviet'] = $this->Bai_viet_model->find($id);
		$this->admin_template('admin/baiviet/edit_baiviet', $data);
	}

	public function edit2_baiviet($id)
	{

		$this ->load ->model('Bai_viet_model');
		//neu co hinh
		if(isset($_FILES)){
			$this->Bai_viet_model->suahinh($id);
		}
		
		// $old_img = $data[0]->image;
		//var_dump($_REQUEST);exit();
		$tieude = trim($_REQUEST['tieude']);
		$hien_tieude = isset($_REQUEST['hien_tieude'])?1:0;
		$noidung = $_REQUEST['noidung'];
		$ngaydang = $_REQUEST['ngaydang'];
		$ngayketthuc = $_REQUEST['ngayketthuc']==""?NULL:$_REQUEST['ngayketthuc'];
		//var_dump($_REQUEST['ngayketthuc'],$ngayketthuc);exit();
		$baiviet = $this->Bai_viet_model->find($id);
		$baiviet->set('BV_TIEU_DE',$tieude);
		$baiviet->set('BV_HIEN_TIEU_DE',$hien_tieude);
		$baiviet->set('BV_NOI_DUNG',$noidung);
		$baiviet->set('BV_NGAY_DANG',$ngaydang);
		$baiviet->set('BV_NGAY_KET_THUC',$ngayketthuc);
		$baiviet->set('BV_NGUOI_CAP_NHAT',$this->session->userdata('user_info')['U_USERNAME']);
		$baiviet->set('BV_NGAY_CAP_NHAT', date('Y-m-d'));
		$baiviet->save();
		redirect('admin/ds_baiviet');
	}
	// public function edit_image()
	// {
	//     $id = $this->uri->segment(3);
	//     $this->load->model('Bai_viet_model');
	//     $data['AVATAR'] = $this -> Bai_viet_model->fetch_image($id);
	//     $this ->load->view('header');
	//     $this->load->view('admin/baiviet/ds_baiviet',$data);
	//     $this->load->view('footer');
	// }
	public function del_baiviet($id)
	{
		$kq = $this->Bai_viet_model->find($id)->del();
		$message = ['status' => 'success', 'content' => 'Xóa bài viết thành công'];
		echo json_encode($message);
	}

	public function tke_baiviet_theo_category(){
		$sql = "SELECT CAT_ID, CAT_NAME, COUNT(BV_ID) AS SL FROM bai_viet right join category on bai_viet.BV_CAT_ID = category.CAT_ID WHERE 1 GROUP BY CAT_ID";
		$data['ds_category'] = $this->db->query($sql)->result();
		$this->admin_template('admin/baiviet/tke_baiviet_theo_category',$data);
	}

	public function ds_baiviet_theo_thang(){
		if(isset($_REQUEST['thang'])){
			$thang = $_REQUEST['thang'];
		}else{
			$thang = date('m');
		}
		if(isset($_REQUEST['nam'])){
			$nam = $_REQUEST['nam'];
		}else{
			$nam = date('Y');
		}
		

		$sql = "SELECT BV_ID, BV_TIEU_DE, CAT_NAME, BV_NGAY_DANG
				FROM bai_viet LEFT JOIN category ON BV_CAT_ID = CAT_ID 
				WHERE MONTH(BV_NGAY_DANG) = '$thang' AND YEAR(BV_NGAY_DANG) = '$nam' 
				ORDER BY BV_NGAY_DANG DESC";
		$data['thang'] = $thang;
		$data['nam'] = $nam;
		$data['ds_baiviet'] = $this->db->query($sql)->result();
		$this->admin_template('admin/baiviet/ds_baiviet_theo_thang',$data);   
	}
}