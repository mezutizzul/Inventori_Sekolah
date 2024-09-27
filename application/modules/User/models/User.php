<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function UserjurusanList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "view_user_jurusan";

		$data 			= [];
		$data["Target"] = $nama_table;
		$filter 		= "";

		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["jabatan"])) {
			$flt = "jabatan = '".$param["jabatan"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["search"])) {
			$flt = "(nama rlike '".$param["search"]."' or nip rlike '".$param["search"]."' or telp rlike '".$param["search"]."'  or jurusan rlike '".$param["search"]."' )";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		//Bawaan
		$data["ParamsFilter"] = $filter;
		$data["ParamsField"]  = "*";

		if(!empty($param["Sort"]))  $data["ParamsSort"] = $param["Sort"];
		if(!empty($param["Limit"])) $data["Limit"] = $param["Limit"]; 
		if(!empty($param["Page"]))  $data["Page"] = $param["Page"];
		$result = $this->Api->GetData($data);		
		ResultData:
		return $result;
	}
}