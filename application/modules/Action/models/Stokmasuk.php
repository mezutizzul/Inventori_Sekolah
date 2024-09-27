<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Stokmasuk extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function MasukList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "view_barang_masuk";

		$data 			= [];
		$data["Target"] = $nama_table;
		$filter 		= "";

		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["id_barang"])) {
			$flt = "id_barang = '".$param["id_barang"]."'";
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

		if(!empty($param["id_supplier"])) {
			$flt = "id_supplier = '".$param["id_supplier"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}


		if(!empty($param["search"])) {
			$flt = "no_penerimaan rlike '".$param["search"]."' or supplier rlike '".$param["search"]."' or nama rlike '".$param["search"]."' ";
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

	public function MasukAdd($param) {
		$data  				= [];
		$data["Target"] 	= "barang_masuk";
		$data["ParamsData"] = json_encode($param);
		$result = $this->Api->InsertData($data, $Koneksi);
		

		ResultData:
		return $result;
	}

	public function MasukEdit($param, $id_pegawai) {
		$id = $param["id"];
		$data  				 = [];
		$data["Target"] 	 = "barang_masuk";
		$data["ParamsFilter"]= "id = '".$id."'";
		$data["ParamsData"]  = json_encode($param);
		$result = $this->Api->UpdateData($data, $Koneksi);

		ResultData:
		return $result;
	}
}