<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pelanggan extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function PelangganList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "pelanggan";

		$data 			= [];
		$data["Target"] = $nama_table;
		$filter 		= "";

		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["kategori"])) {
			$flt = "kategori = '".$param["kategori"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["search"])) {
			$flt = "(nama rlike '".$param["search"]."' or keterangan rlike '".$param["search"]."' )";
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

	public function PelangganAdd($param) {
		$data  				= [];
		$data["Target"] 	= "pelanggan";
		$data["ParamsData"] = json_encode($param);
		$result = $this->Api->InsertData($data, $Koneksi);
		

		ResultData:
		return $result;
	}

	public function PelangganEdit($param, $id_pegawai) {
		$id = $param["id"];
		$data  				 = [];
		$data["Target"] 	 = "pelanggan";
		$data["ParamsFilter"]= "id = '".$id."'";
		$data["ParamsData"]  = json_encode($param);
		$result = $this->Api->UpdateData($data, $Koneksi);

		ResultData:
		return $result;
	}
}