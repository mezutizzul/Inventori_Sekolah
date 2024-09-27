<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tool extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("File");
	}

	public function index(){
		echo json_encode(array("Error_code"=> "414" , "Message"=> "Allah is watching"));
	}

	public function upload_file() {
 
		$param = $this->input->post();
		if(empty($param['FileExtension']) || empty($param['FileBase64'])){
			$Output = array("IsError" => true , "ErrMessage"=> "Data tidak lengkap") ;
		}else$Output = $this->File->UploadFile($param);
		
		echo json_encode($Output) ;
	}

	public function reader_list() {
 
		$param = $this->input->post("req");
		if(empty($param['file'])){
			$Output = array("IsError" => true , "ErrMessage"=> "Tidak Ada File Yang DiImport") ;
		}else$Output = $this->File->ExcelReader($param);
		
		echo json_encode($Output) ;
	}
}
