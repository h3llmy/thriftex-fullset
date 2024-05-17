<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public $data = array();
	public $navbar_tab_top = array();
	public $notif = array();


	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		$this->load->helper(array('template_helper','user_helper'));
		$this->load->library(array('Site','session'));
	
	}


	
}	
