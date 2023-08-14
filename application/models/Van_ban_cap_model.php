<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Van_ban_cap_model extends Model
{
	public $table= "van_ban_cap";
	public $primary = 'VBC_ID';
	
    public function __construct($obj = NULL)
    {
        parent::__construct();
    }
    
}