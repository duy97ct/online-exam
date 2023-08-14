<?php 
	class Cau_tra_loi_model extends Model
	{
		public $table= "cau_tra_loi";
		public $primary = 'CTL_ID';
		
	    public function __construct()
	    {
	        parent::__construct();

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