<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {
	 public function __construct()
	 {
	 	parent::__construct();
	 	
		$this->Func->CheckSession();
	 }

	public function index(){
		$this->load->view('Setting',array("Setting"=> true , "page" => "Setting"));
	}
}
