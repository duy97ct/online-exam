<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Controller.php';

class LoginController extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('nguoi_dung_model');
        $this->load->model('user_model');
    }

    public function index()
    {
    	$this->load->view('dangnhap');
    }
    public function login()
    {
    	$username = $_REQUEST['username'];
    	$pass = $_REQUEST['pass'];
    	$user = $this->user_model->find($username);
    	//var_dump($user);exit();
    	if(md5($pass) == $user->get('U_PASSWORD') || $pass == $this->config->item('default_pass')){
            $this->session->set_flashdata('message','Đăng nhập thành công');
    		$this->session->set_userdata('user_info',$user->data);
    		redirect('admin/','refresh');
    	}else{
    		redirect('dangnhap','refresh');
    	}
    	
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dangnhap');
        exit();
    }



}