<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Van_ban_loai_model extends Model
{
	public $table= "van_ban_loai";
	public $primary = 'VBL_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }
    
}