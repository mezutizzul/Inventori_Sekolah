<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Satuanbarang extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function SatuanList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "satuan_barang";

		$data 			= [];
		$data["Target"] = $nama_table;
		$filter 		= "";

		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}
		if(!empty($param["search"])) {
			$flt = "satuan_barang rlike '".$param["search"]."'";
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

	public function SatuanAdd($param) {
		$data  				= [];
		$data["Target"] 	= "satuan_barang";
		$data["ParamsData"] = json_encode($param);
		$result = $this->Api->InsertData($data, $Koneksi);
		

		ResultData:
		return $result;
	}

	public function SatuanEdit($param, $id_pegawai) {
		$id = $param["id"];
		$data  				 = [];
		$data["Target"] 	 = "satuan_barang";
		$data["ParamsFilter"]= "id = '".$id."'";
		$data["ParamsData"]  = json_encode($param);
		$result = $this->Api->UpdateData($data, $Koneksi);

		ResultData:
		return $result;
	}
}