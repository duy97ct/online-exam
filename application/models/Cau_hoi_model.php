<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Cau_hoi_model extends Model
{
	public $table= "cau_hoi";
	public $primary = 'CH_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
        $this->load->model('cau_tra_loi_model');
        if($obj != NULL){
        	$this->data['CH_ID'] = $obj->CH_ID;
        	$this->data['CH_TEXT'] = $obj->CH_TEXT;
        	$this->data['CH_STATUS'] = $obj->CH_STATUS;
        }
    }

    public function ds_cau_tra_loi(){
    	$ds_traloi =  $this->cau_tra_loi_model->where(['CTL_CH_ID' => $this->get('CH_ID')]);
    	return $ds_traloi;
    }
    public function select_random($num)
    {
    	$sql = "SELECT *
    			FROM cau_hoi
    			WHERE CH_STATUS = 1
    			ORDER BY RAND()
    			LIMIT 0, $num";
    	$query = $this->db->query($sql)->result();
    	if(!$query){
    		//select thất bại
    		return NULL;
    	}else if(count($query) == 0){
    		return array();
    	}else{
    		$kq = array();
    		foreach ($query as $row) {
    			$kq[] = new cau_hoi_model($row);
    		}
    		return $kq;
    	}
    }

	// public function select_ordered($num) {
    //     $sql = "SELECT *
    //             FROM cau_hoi
    //             WHERE CH_STATUS = 1
    //             ORDER BY CH_ID ASC
    //             LIMIT 0, $num"; // Sửa CH_ID thành cột bạn muốn sắp xếp
    //     $query = $this->db->query($sql)->result();
    //     if (!$query) {
    //         // Select thất bại
    //         return NULL;
    //     } else if (count($query) == 0) {
    //         return array();
    //     } else {
    //         $kq = array();
    //         foreach ($query as $row) {
    //             $kq[] = new cau_hoi_model($row);
    //         }
    //         return $kq;
    //     }
    // }

    public function add_tra_loi_cau_hoi($nguoidung,$cauhoi, $traloi)
    {
        $data = array(
                    'TLCH_ND_ID' => $nguoidung,
                    'TLCH_CH_ID' => $cauhoi,
                    'TLCH_DAP_AN' => $traloi,
                );
        $this->db->insert('tra_loi_cau_hoi',$data);
    }

    public function check_tra_loi_cau_hoi($traloi)
    {

        $traloi =  $this->cau_tra_loi_model->find($traloi);
        if($traloi != NULL) return $traloi->get('CTL_DUNG');
        else return NULL;
    }

    // public function filter($timkiem)
    // {
  		// $this->db->like('DV_TEN',$timkiem);
	  	// $ds_result = $this->db->get($this->table)->result();
	  	// if(!$ds_result){
	  	// 	return NULL;
	  	// }else{
	  	// 	$kq = array();
	  	// 	foreach ($ds_result as $result) {
	  	// 		$ds_field = get_object_vars($result);
	  	// 		foreach ($ds_field as $key => $value) {
	  	// 			//Tung field trong row
	  	// 			$this->set($key,$value);
	  	// 		}
	  	// 		$kq[] = clone $this;
	  	// 	}
	  	// 	return $kq;
	  	// }
    // }
    
}
?>