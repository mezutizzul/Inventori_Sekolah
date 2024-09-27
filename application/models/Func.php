<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function CheckParam($param=[]) {
		$id_sekolah = "";
		$db = false;
		$result = false;

		$this->CleanParamSqlInjection();
		foreach ($param as $key => $value) {
			if(empty($this->input->post($value))) {
				$msg = $this->CreateArray(true, "'".$value."' tidak boleh kosong");
				return $msg;
			}
		}
		return $result;
	}

	//Escaping sting. supaya gak kena sql_injection
	public function CleanParamSqlInjection() {
		foreach($_POST as $key => $value) {
			$_POST[$key] = $this->db->escape_str($_POST[$key]);
		}
		return true;
	}

	public function CreateArray($is_error, $message) {
		if($is_error == true) {
			$ReturnData = ["IsError"=> $is_error, "ErrMessage"=> $message];
		} else {
			if(is_array($message)) $ReturnData = ["IsError"=> $is_error, "Data"=> $message];
			else $ReturnData = ["IsError"=> $is_error, "Output"=> $message];
		}
		return $ReturnData;
	}
	
	public function UnsetArrayByKey($data, $unset_data) {
		foreach ($data as $key => $value) {
			if(in_array($key, $unset_data, true)) {
				unset($data[$key]);
			}
		}
		return $data;
	}

	public function IsValidDate($date, $format) {
		$date = rtrim($date);
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) === $date;
	}

	public function removeslashes($string) {
		$string=implode("",explode("\\",$string));
		return stripslashes(trim($string));
	}

	public function CheckSession(){
		if(empty($this->session->userdata('user'))){
			$this->session->sess_destroy();
			$this->session->set_flashdata('Alert_login', 'Anda Harus Login Dahulu');
			redirect('Login','refresh');
		}
	}

	public function AjaxSession(){
		if(empty($this->session->userdata('user'))){
			$this->session->sess_destroy();
			$this->session->set_flashdata('Alert_login', 'Anda Harus Login Dahulu');
			return json_encode(array("IsError"=> true , "ErrMessage" => "Anda Harus Login Dahulu"));
		}
	}
}
