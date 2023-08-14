<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Van_ban_lien_quan_model extends Model
{
	public $table= "van_ban_lien_quan";
	public $primary = 'VB_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }

    public function get_cap(){
    	return $this->Van_ban_cap_model->find($this->get('VB_CAP'));
    }
    
}