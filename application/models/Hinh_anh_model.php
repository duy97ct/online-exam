<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Hinh_anh_model extends Model
{
	public $table= "hinh_anh";
	public $primary = 'HA_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('User_model');
        $this->load->model('Bai_viet_model');
    }

    public function get_baiviet()
    {
        return $this->Bai_viet_model->find($this->get('HA_BV_ID'));
    }

    public function get_nguoi_tao()
    {
        return $this->User_model->find($this->get('HA_NGUOI_TAO'));
    }
}