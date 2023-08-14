<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Bai_viet_model extends Model
{
	public $table= "bai_viet";
	public $primary = 'BV_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('User_model');
        $this->load->model('Hinh_anh_model');
    }

    public function where($con)
    {
        foreach ($con as $key => $value) {
            $this->db->where($key,$value);
        }
        $query = $this->db->from($this->table)->select("BV_ID, BV_CAT_ID, BV_TIEU_DE, BV_HIEN_TIEU_DE, BV_HINH_ANH, BV_NGUOI_TAO, BV_NGAY_TAO, BV_NGAY_DANG, BV_NGAY_KET_THUC, SUBSTRING_INDEX(BV_NOI_DUNG,' ',45) AS BV_NOI_DUNG")->order_by('BV_NGAY_DANG','DESC')->order_by('BV_NGAY_TAO','DESC')->get()->result();
        $ds_baiviet = array();
        foreach ($query as $row) {
            $baiviet = new Bai_viet_model();
            $baiviet->set('BV_ID',$row->BV_ID);
            $baiviet->set('BV_TIEU_DE',$row->BV_TIEU_DE);
            $baiviet->set('BV_HIEN_TIEU_DE',$row->BV_HIEN_TIEU_DE);
            $baiviet->set('BV_HINH_ANH', $row->BV_HINH_ANH);
            $baiviet->set('BV_NOI_DUNG',$row->BV_NOI_DUNG);
            $baiviet->set('BV_NGUOI_TAO',$row->BV_NGUOI_TAO);
            $baiviet->set('BV_NGAY_TAO',$row->BV_NGAY_TAO);
            $baiviet->set('BV_NGAY_DANG',$row->BV_NGAY_DANG);
            $baiviet->set('BV_NGAY_KET_THUC',$row->BV_NGAY_KET_THUC);
            $baiviet->set('BV_CAT_ID',$row->BV_CAT_ID);
            $ds_baiviet[] = clone $baiviet;
        }
        return $ds_baiviet;
    }
    public function all()
    {
        $query = $this->db->from($this->table)->select("BV_ID, BV_CAT_ID, BV_TIEU_DE, BV_HIEN_TIEU_DE, BV_HINH_ANH, BV_NGUOI_TAO, BV_NGAY_TAO, BV_NGAY_DANG, BV_NGAY_KET_THUC, SUBSTRING(BV_NOI_DUNG,1,100) AS BV_NOI_DUNG")->order_by('BV_NGAY_DANG','DESC')->order_by('BV_NGAY_TAO','DESC')->get()->result();
        $ds_baiviet = array();
        foreach ($query as $row) {
            $baiviet = new Bai_viet_model();
            $baiviet->set('BV_ID',$row->BV_ID);
            $baiviet->set('BV_TIEU_DE',$row->BV_TIEU_DE);
            $baiviet->set('BV_HIEN_TIEU_DE',$row->BV_HIEN_TIEU_DE);
            $baiviet->set('BV_HINH_ANH', $row->BV_HINH_ANH);
            $baiviet->set('BV_NOI_DUNG',$row->BV_NOI_DUNG);
            $baiviet->set('BV_NGUOI_TAO',$row->BV_NGUOI_TAO);
            $baiviet->set('BV_NGAY_TAO',$row->BV_NGAY_TAO);
            $baiviet->set('BV_NGAY_DANG',$row->BV_NGAY_DANG);
            $baiviet->set('BV_NGAY_KET_THUC',$row->BV_NGAY_KET_THUC);
            $baiviet->set('BV_CAT_ID',$row->BV_CAT_ID);
            $ds_baiviet[] = clone $baiviet;
        }
        return $ds_baiviet;
    }

    public function get_category()
    {
    	return $this->Category_model->find($this->get('BV_CAT_ID'));
    }

    public function get_nguoi_tao()
    {
        return $this->User_model->find($this->get('BV_NGUOI_TAO'));
    }

    public function get_hinhanh()
    {
        return $this->Hinh_anh_model->where(['HA_BV_ID' => $this->get('BV_ID')]);
    }


    public function Add_baiviet($cat,$tieude,$noidung,$nguoitao,$ngaydang,$ngayketthuc)
    {
     
        if(isset($_FILES)){
						$config['upload_path'] = './media/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload',$config);

			if( ! $this->upload->do_upload('AVATAR'))
			{
				$error = array('error' => $this->upload->display_errors());
				$data1 = NULL;
				//var_dump($error);
			}
			else
			{
			   
				$data1 = $this->upload->data()['file_name'];
				//var_dump($data1);
			}
		}else{
			$data1 = NULL;
		}
        $object = array ('BV_CAT_ID' => $cat,
         'BV_TIEU_DE' => $tieude,
          'BV_HIEN_TIEU_DE' => 1,
          'BV_NOI_DUNG' => $noidung,
          'BV_NGUOI_TAO' =>$nguoitao,
            'BV_NGAY_TAO' => date('Y-m-d H:i:s'),
            'BV_NGAY_DANG' => $ngaydang,
            'BV_NGAY_KET_THUC' => $ngayketthuc,
            'BV_HINH_ANH' => $data1
        );
       // var_dump($object);
        $this ->db ->insert('bai_viet',$object);
 
    }
    
    public function suahinh($id)
    {
		if(isset($_FILES)){
			$config['upload_path'] = './media/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload',$config);
			if( ! $this->upload->do_upload('AVATAR'))
			{
				//upload loi
				$error = array('error' => $this->upload->display_errors());
				//var_dump($error);
				return false;
			}
			else {
				//unlink();
				$data1 = $this->upload->data()['file_name'];
				//var_dump($data1);
				$object = array (
					'BV_HINH_ANH' => $data1
				);
				$this ->db ->update('bai_viet',$object);
				return true;

			}
		}else{
			return false;
		}
        

        // $this -> db -> select('AVATAR')->from('baiviet') ->where('BV_ID','$id');
        // $baiviet->set('AVATAR',$data);
        // $baiviet->save();
    }
}