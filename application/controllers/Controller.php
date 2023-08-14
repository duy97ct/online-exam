<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('nguoi_dung_model');
		// $this->load->file(APPPATH.'controllers/BaivietController.php', false);
  // 	$this->load->file(APPPATH.'controllers/CategoryController.php', false);
	}

	

	public function page($page_name)
	{
		
		include_once(APPPATH.'controllers/CategoryController.php');
		$data['head'] = isset($data['head'])?$data['head']:"";
		// $data['menu'] = $this->get_menu();
		//$data['type'] = $this->session->userdata('user')->LU_ID;
		$data['avartar'] = 'noname.jpg';
		// echo $page_name;
		
		if(file_exists(APPPATH.'views/'.'page_'.$page_name.'.php')){
			// echo "có file".APPPATH.'views/'.'page_'.$page_name.'.php';
			// exit();
			$this->template('page_'.$page_name,$data);
		}else{
			// echo "khong có file".APPPATH.'views/'.'page_'.$page_name.'.php';
			// exit();
			
			$data['page_name'] = $page_name;
			$this->template('page_chung',$data);
		}


	}

	public function index()
	{
		//Tính lượt truy cập
		$this->load->model('Counter_login_model');
		$this->load->model('Counter_model');
		$this->load->model('San_pham_model');
		$ip = $this->input->ip_address();
		$access = $this->db->from('counter_login')->where('CL_IP', $ip)->select('MAX(CL_ACCESS_TIME) AS LAST_ACCESS')->get()->result()[0];
		if($access->LAST_ACCESS == NULL || (time() - strtotime($access->LAST_ACCESS)) > 1*60*60){
			$data_counter = [
							'CL_ID' => $this->Counter_login_model->unique_id(),
							'CL_IP' => $ip,
							'CL_ACCESS_TIME' => date('Y-m-d H:i:s'),
						];
			$this->Counter_login_model->add($data_counter);
			//cộng counter
			$this->Counter_model->count_up();
		}
		$data['counter'] = $this->Counter_login_model->count();
		//$data['luot_tham_gia'] = $this->nguoi_dung_model->count();


		// if($this->session->userdata('user_info') == null){
		// 	redirect('dangnhap','refresh');
		// }
		$data['title'] = "ARGIFARM - BẢO ĐẢM NIỀM TIN";

		$data['head'] = isset($data['head'])?$data['head']:"";
		// $data['menu'] = $this->get_menu();
		//$data['type'] = $this->session->userdata('user')->LU_ID;
		$data['avartar'] = 'noname.jpg';
		$data['page'] = 'page_trangchu';
		$data['ds_san_pham'] = $this->San_pham_model->all();
		$this->load->view('template/layout',$data);
	}

	public function index_admin()
	{
		$data['count_user'] = $this->nguoi_dung_model->count_user();
		$data['count_nguoidung'] = $this->nguoi_dung_model->count();
		$data['count_nguoidung_answerright'] = $this->nguoi_dung_model->count_answerright();
		// $data['chart_data'][0] = $this->db->query("SELECT DATE(ND_NGAY_TAO) AS NGAY, COUNT(ND_ID) AS SL
		// 										FROM nguoi_dung
		// 										GROUP BY DATE(ND_NGAY_TAO) ")->result();


		$data['chart_data']= $this->db->query("SELECT NGAY, COUNT(CASE WHEN tb.SL_DUNG = ".QUESTION_NUMBER." THEN 1 END) AS SL_DUNG, COUNT(*) AS SL
													FROM 
													(SELECT TLCH_ND_ID, DATE(ND_NGAY_TAO) AS NGAY, SUM(`CTL_DUNG`) AS SL_DUNG, COUNT(`CTL_ID`) AS SL
													FROM `nguoi_dung` LEFT JOIN `tra_loi_cau_hoi` ON `ND_ID` = `TLCH_ND_ID` LEFT JOIN `cau_tra_loi` ON `TLCH_DAP_AN` = `CTL_ID` 
													WHERE 1
													GROUP BY `TLCH_ND_ID`, DATE(ND_NGAY_TAO)) tb
													GROUP BY NGAY")->result();

		// $data['chart_data']= $this->db->query("SELECT NGAY, COUNT(CASE WHEN tb.SL_DUNG = tb.SL THEN 1 END) AS SL_DUNG, COUNT(*) AS SL
		// 											FROM 
		// 											(SELECT TLCH_ND_ID, DATE(ND_NGAY_TAO) AS NGAY, SUM(`CTL_DUNG`) AS SL_DUNG, COUNT(`CTL_ID`) AS SL
		// 											FROM `nguoi_dung` LEFT JOIN `tra_loi_cau_hoi` ON `ND_ID` = `TLCH_ND_ID` LEFT JOIN `cau_tra_loi` ON `TLCH_DAP_AN` = `CTL_ID` 
		// 											WHERE 1
		// 											GROUP BY `TLCH_ND_ID`, DATE(ND_NGAY_TAO)) tb
		// 											GROUP BY NGAY")->result();
		

		//var_dump($data['chart_data']); exit();
		$this->admin_template('admin/Dashboard', $data);
	}

	public function admin_template($page, $data = null)
	{

		if($this->session->userdata('user_info') == NULL){
			redirect('dangnhap');
			exit();
		}

		$data['title'] = ".:Ban quản lý Di tích thành phố Cần Thơ:.";

		$data['head'] = isset($data['head'])?$data['head']:"";
		//var_dump($this->session->userdata('user_info'));exit();
		$data['hoten'] = $this->session->userdata('user_info')['U_TEN'];
		$data['type'] = $this->session->userdata('user_info')['U_LEVEL'];

		$data['avartar'] = 'noname.jpg';
		$data['page'] = $page;
		
		$this->load->view('admin_template/layout',$data);
	}

	public function template($page, $data = null)
	{
		//Tính lượt truy cập
		$this->load->model('Counter_login_model');
		$this->load->model('Counter_model');
		$ip = $this->input->ip_address();
		$access = $this->db->from('counter_login')->where('CL_IP', $ip)->select('MAX(CL_ACCESS_TIME) AS LAST_ACCESS')->get()->result()[0];
		if($access->LAST_ACCESS == NULL || (time() - strtotime($access->LAST_ACCESS)) > 1*60*60){
			$data_counter = [
							'CL_ID' => $this->Counter_login_model->unique_id(),
							'CL_IP' => $ip,
							'CL_ACCESS_TIME' => date('Y-m-d H:i:s'),
						];
			$this->Counter_login_model->add($data_counter);
			//cộng counter
			$this->Counter_model->count_up();
		}
		$data['counter'] = $this->Counter_login_model->count();
		$data['luot_tham_gia'] = $this->nguoi_dung_model->count();


		$data['title'] = ".:Ban quản lý Di tích thành phố Cần Thơ:.";

		$data['head'] = isset($data['head'])?$data['head']:"";
		$data['avartar'] = 'noname.jpg';
		$data['page'] = $page;
		$this->load->view('template/layout',$data);
	}


	public static function show_block_baiviet($id)
    {
		$ci =& get_instance();
        $ci->load->model('Bai_viet_model');
        //echo "sfsdfds";exit();
        $data['baiviet'] = $ci->Bai_viet_model->find($id);
		$kq = $ci->load->view('show_block_baiviet', $data, TRUE);
		return $kq;
    }

    public static function show_block_vanban()
    {
		$ci =& get_instance();
		$ci->load->model('Van_ban_lien_quan_model');
		$ci->load->model('Van_ban_cap_model');
		$ci->load->model('Van_ban_loai_model');
        $data['ds_vanban'] = $ci->Van_ban_lien_quan_model->all();
		$data['ds_cap'] = $ci->Van_ban_cap_model->all();
		$data['ds_loai'] = $ci->Van_ban_loai_model->all();
		
		$kq = $ci->load->view('block/show_block_vanban', $data, TRUE);
		echo $kq;
		//return $kq;
    }

	public static function show_block($cat_id,$style_name){
		
        //echo "sdfsldkjfklsdjflsdk"; exit();
        $ci =& get_instance();
        $ci->load->model('Bai_viet_model');
        $ci->load->model('Category_model');
        //$ci->load->model('Bai_viet_model');
        $cat = $ci->Category_model->find($cat_id);
        $ds_baiviet = $ci->Bai_viet_model->where(['BV_CAT_ID' => $cat_id]);
        //var_dump($cat);
        //var_dump($ds_baiviet);
        //echo('<br/>-----</br>');
        $kq = $ci->load->view('block/'.$style_name,['ds_baiviet' => $ds_baiviet, 'cat' => $cat],TRUE);
        //echo $kq;
        //var_dump($kq);
        return $kq;
        //return $ds_baiviet;
    }
	

	public static function get_weekday_vn($w){
		$ngay = [
					'Monday' => 'Thứ 2',
					'Tuesday' => 'Thứ 3',
					'Wednesday' => 'Thứ 4',
					'Thursday' => 'Thứ 5',
					'Friday' => 'Thứ 6',
					'Saturday' => 'Thứ 7',
					'Sunday' => 'Chủ nhật',
				];
		return $ngay[$w];
	}

	public function upload_file($file){
		$config['upload_path'] = 'media/files';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|rar|zip|doc|docx|xls|xlsx';
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		if ($this->upload->do_upload($file)) {
          $uploadData = $this->upload->data();
          $filename = $uploadData['file_name'];
        } else{
        	var_dump($this->upload->display_errors());
          $filename = '';
        }
        return $filename;
	}

	public function upload_image($file){
		$config['upload_path'] = 'media/images';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload($file)) {
          $uploadData = $this->upload->data();
          $filename = $uploadData['file_name'];
        } else{
          $filename = '';
        }
        return $filename;
	}

	public function view_portlet($skin, $header, $content){
		$data = ['header' => $header, 'content' => $content];
		return $this->load->view('skins/'.$skin, $data,'TRUE');
	}

}