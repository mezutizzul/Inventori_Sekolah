<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_setting extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	
	public function index() {
		$msg = $this->Func->CreateArray(true, "Invalid Request");
		echo json_encode(array("IsError" => true , "Message" => "Allah Maha Melihat dan menguasai hari pembalasan"));
	}

	public function setting_list(){
		echo json_encode($this->db->get('setting_pdf')->result()[0]);
	}

	public function setting_add(){
		$update = $this->db->update('setting_pdf', $this->input->post());
		if($update){
			$result["IsError"] = false ;
			$result["Ouput"] = "Sukses" ;
		}else{
			$result["IsError"] = true ;
			$result["ErrMessage"] = $this->db->error()['message'] ;
		}	
		echo json_encode($result);
	}

}
