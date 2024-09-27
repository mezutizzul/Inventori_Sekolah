<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Jurusan extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function BidangList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "jurusan";

		$data 			= [];
		$data["Target"] = $nama_table;
		$filter 		= "";

		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["type"])) {
			$flt = "type = '".$param["type"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["j_id"])) {
			$flt = "j_id = '".$param["j_id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["search"])) {
			$flt = "(jurusan rlike '".$param["search"]."')";
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

	public function JurusanList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "view_jurusan";

		$data 			= [];
		$data["Target"] = $nama_table;
		$filter 		= "";

		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["type"])) {
			$flt = "type = '".$param["type"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}
		if(!empty($param["j_id"])) {
			$flt = "j_id = '".$param["j_id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["search"])) {
			$flt = "(jurusan rlike '".$param["search"]."' or bidang rlike '".$param["search"]."')";
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