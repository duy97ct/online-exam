<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class San_pham_model extends Model
{
	public $table= "san_pham";
	public $primary = 'SP_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }

    public function get_nguoi_tao()
	{
		return $this->User_model->find($this->get('SP_NGUOI_TAO'));
	}
}