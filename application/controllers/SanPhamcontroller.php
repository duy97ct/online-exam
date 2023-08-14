<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class SanPhamController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('Bai_viet_model');
		$this->load->model('san_pham_model');
		$this->load->model('user_model');
	}

	public function index_1()
	{
		$this->load->view('sanpham');
	}

	public function index()
	{
		$data['ds_sanpham'] = $this->san_pham_model->all();
		$this->admin_template('admin/sanpham/ds_sanpham', $data);
	}
	public function show_sanpham($id)
	{
		//echo "sfsdfds";exit();
		$data['sanpham'] = $this->Bai_viet_model->find($id);
		$this->template('show_sanpham', $data);
	}


	// public static function show_block($cat_id){
	//     $ci =& get_instance();
	//     $ci->load->model('Bai_viet_model');
	//     $ds_sanpham = $ci->Bai_viet_model->where(['BV_CAT_ID' => $cat_id]);
	//     return $ds_sanpham;
	// }

	public function show_sanpham_theo_category($category)
	{
		$data['ds_sanpham'] = $this->Bai_viet_model->where(['BV_CAT_ID' => $category]);
		$this->template('show_sanpham_theo_category',$data);
	}
	public function add_sanpham()
	{
		$data['ds_category'] = $this->Category_model->all();
		$this->admin_template('admin/sanpham/add_sanpham', $data);
	}
	
	public function add2_sanpham()
	{
		$hinhanh_url = $this->upload_image('hinhanh');
		//var_dump($this->session->userdata('user_info')); exit();
		// $this ->load->model('Bai_viet_model');
		// $data = $this ->input->post();
		// $this -> Bai_viet_model-> Add_sanpham($data);
		// redirect('admin/ds_sanpham');
		//////////////
		 // $this ->load->view('admin/sanpham/add_sanpham');
		 // $cat = $_REQUEST['category'];
		 $tieude = trim($_REQUEST['tieude']);
		 $noidung = $_REQUEST['noidung'];
		 $ngaydang = $_REQUEST['ngaydang'];
		 // $ngayketthuc = ($_REQUEST['ngayketthuc'] == '')? NULL:$_REQUEST['ngayketthuc'];
		 $nguoitao = $this->session->userdata('user_info')['U_USERNAME'];
		 $sp_moi = isset($_REQUEST['sp_moi'])?1:0;
		 $sp_banchay = isset($_REQUEST['sp_banchay'])?1:0;

		 $data = [
		 			'SP_TEN' => $tieude,
		 			'SP_MO_TA' => $noidung,
		 			'SP_MOI' => $sp_moi,
		 			'SP_BAN_CHAY' => $sp_banchay,
		 			'SP_NGUOI_TAO' => $nguoitao,
		 			'SP_NGAY_TAO' => $ngaydang,
		 			'SP_HINH_ANH' => $hinhanh_url,
		 		];
		$this->san_pham_model->add($data);
		 // $this -> Bai_viet_model-> Add_sanpham($cat,$tieude,$noidung,$nguoitao,$ngaydang,$ngayketthuc);
		 redirect('admin/ds_sanpham');

	}
	public function edit_sanpham($id)
	{   $data['ds_baiviet'] = $this->Bai_viet_model->all();
		$data['sanpham'] = $this->san_pham_model->find($id);
		$this->admin_template('admin/sanpham/edit_sanpham', $data);
	}

	public function edit2_sanpham($id)
	{

		// $this ->load ->model('Bai_viet_model');
		//neu co hinh

		
		// $old_img = $data[0]->image;
		//var_dump($_REQUEST);exit();
		$tieude = trim($_REQUEST['tieude']);
		// $hien_tieude = isset($_REQUEST['hien_tieude'])?1:0;
		$noidung = $_REQUEST['noidung'];
		$ngaydang = $_REQUEST['ngaydang'];
		// $ngayketthuc = $_REQUEST['ngayketthuc'];
		$nguoitao = $this->session->userdata('user_info')['U_USERNAME'];
		$sp_moi = isset($_REQUEST['sp_moi'])?1:0;
		$sp_banchay = isset($_REQUEST['sp_banchay'])?1:0;

		$sanpham = $this->san_pham_model->find($id);
		//var_dump($_FILES);exit();
		$sanpham->set('SP_TEN',$tieude);
		if(isset($_FILES) && $_FILES['hinhanh']['name']!=''){
			$hinhanh_url = $this->upload_image('hinhanh');
			// echo $hinhanh_url;
			$sanpham->set('SP_HINH_ANH', $hinhanh_url);
		}

		if($_REQUEST['baiviet'] != ''){
			$sanpham->set('SP_BAI_VIET', $_REQUEST['baiviet']);
		}
		// $sanpham->set('BV_HIEN_TIEU_DE',$hien_tieude);
		$sanpham->set('SP_MO_TA',$noidung);
		$sanpham->set('SP_NGAY_TAO',$ngaydang);
		$sanpham->set('SP_NGUOI_TAO', $nguoitao);
		$sanpham->set('SP_MOI',$sp_moi);
		$sanpham->set('SP_BAN_CHAY', $sp_banchay);
		// var_dump($sanpham);
		// $sanpham->set('BV_NGAY_KET_THUC',$ngayketthuc);
		$sanpham->save();
		// echo $this->db->last_query();
		redirect('admin/ds_sanpham');
	}
	// public function edit_image()
	// {
	//     $id = $this->uri->segment(3);
	//     $this->load->model('Bai_viet_model');
	//     $data['AVATAR'] = $this -> Bai_viet_model->fetch_image($id);
	//     $this ->load->view('header');
	//     $this->load->view('admin/sanpham/ds_sanpham',$data);
	//     $this->load->view('footer');
	// }
	public function del_sanpham($id)
	{
		$kq = $this->san_pham_model->find($id)->del();
		$message = ['status' => 'success', 'content' => 'Xóa sản phẩm thành công'];
		echo json_encode($message);
	}

	// public function tke_sanpham_theo_category(){
	// 	$sql = "SELECT CAT_ID, CAT_NAME, COUNT(BV_ID) AS SL FROM bai_viet right join category on bai_viet.BV_CAT_ID = category.CAT_ID WHERE 1 GROUP BY CAT_ID";
	// 	$data['ds_category'] = $this->db->query($sql)->result();
	// 	$this->admin_template('admin/sanpham/tke_sanpham_theo_category',$data);
	// }

	// public function ds_sanpham_theo_thang(){
	// 	if(isset($_REQUEST['thang'])){
	// 		$thang = $_REQUEST['thang'];
	// 	}else{
	// 		$thang = date('m');
	// 	}
	// 	if(isset($_REQUEST['nam'])){
	// 		$nam = $_REQUEST['nam'];
	// 	}else{
	// 		$nam = date('Y');
	// 	}
		

	// 	$sql = "SELECT BV_ID, BV_TIEU_DE, CAT_NAME, BV_NGAY_DANG
	// 			FROM bai_viet LEFT JOIN category ON BV_CAT_ID = CAT_ID 
	// 			WHERE MONTH(BV_NGAY_DANG) = '$thang' AND YEAR(BV_NGAY_DANG) = '$nam' 
	// 			ORDER BY BV_NGAY_DANG DESC";
	// 	$data['thang'] = $thang;
	// 	$data['nam'] = $nam;
	// 	$data['ds_sanpham'] = $this->db->query($sql)->result();
	// 	$this->admin_template('admin/sanpham/ds_sanpham_theo_thang',$data);   
	// }
}