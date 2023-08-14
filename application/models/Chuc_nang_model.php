<?php 
	class Chuc_nang_model extends Model
	{
		public $table= "chuc_nang";
		public $primary = 'CN_ID';
		
	    public function __construct()
	    {
	        parent::__construct();

	    }

	    public function get_url($donvi, $loaichucnang)
	    {
	  		$this->db->where('DV_ID',$donvi)->where('LCN_ID',$loaichucnang);
		  	$result = $this->db->get($this->table)->result();
		  	//echo $this->db->last_query();
		  	//var_dump($result);
		  	if(!$result){
		  		return NULL;
		  	}else{
		  		return $result[0]->CN_LINK;
		  	}
	    }
	    
	}
?>