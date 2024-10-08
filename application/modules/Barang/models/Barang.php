<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Barang extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function BarangList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "view_barang";

		$data 			= [];
		$data["Target"] = $nama_table;
		$filter 		= "";

		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["id_barang"])) {
			$flt = "id = '".$param["id_barang"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["id_sumber"])) {
			$flt = "id_sumber = '".$param["id_sumber"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["id_satuan"])) {
			$flt = "id_satuan = '".$param["id_satuan"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["id_kategori"])) {
			$flt = "id_kategori = '".$param["id_kategori"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}


		if(!empty($param["search"])) {
			$flt = "(nama rlike '".$param["search"]."' or kode_barang rlike '".$param["search"]."' )";
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

	public function BarangAdd($param) {
		$data  				= [];
		$data["Target"] 	= "barang";
		$data["ParamsData"] = json_encode($param);
		$result = $this->Api->InsertData($data, $Koneksi);
		

		ResultData:
		return $result;
	}

	public function BarangEdit($param, $id_pegawai) {
		$id = $param["id"];
		$data  				 = [];
		$data["Target"] 	 = "barang";
		$data["ParamsFilter"]= "id = '".$id."'";
		$data["ParamsData"]  = json_encode($param);
		$result = $this->Api->UpdateData($data, $Koneksi);

		ResultData:
		return $result;
	}
}