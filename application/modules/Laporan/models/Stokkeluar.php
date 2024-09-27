<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Stokkeluar extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function KeluarList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "view_barang_keluar";

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

		if(!empty($param["id_pelanggan"])) {
			$flt = "id_pelanggan = '".$param["id_pelanggan"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["no_keluaran"])) {
			$flt = "no_keluaran = '".$param["no_keluaran"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["id_kategori"])) {
			$flt = "id_kategori = '".$param["id_kategori"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param['date_range'])){
			$null = "" ;
			if(empty($param['date_range']['awal'])) $null="tanggal awal";
			if(empty($param['date_range']['akhir'])) $null="tanggal akhir";
			if(!empty($null)){
				$result = $this->Func->CreateArray(true,$null." Harus di isi");
				goto ResultData;
			}
			$flt = "tgl_keluar BETWEEN '".date("Y-m-d",strtotime($param['date_range']['awal']))."' and '".date("Y-m-d",strtotime($param['date_range']['akhir']))."' ";
			$filter .= empty($filter) ? $flt : " and ".$flt;

		}



		if(!empty($param["search"])) {
			$flt = "(no_keluaran rlike '".$param["search"]."' or nama rlike '".$param["search"]."' )";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		//Bawaan
		$data["ParamsFilter"] = $filter;
		$data["ParamsField"]  = "*";

		if(!empty($param["Sort"]))  $data["ParamsSort"] = $param["Sort"];
		if(!empty($param["Limit"])) $data["Limit"] = $param["Limit"]; 
		if(!empty($param["Page"]))  $data["Page"] = $param["Page"];
		if(!empty($param["Group"])) $data["ParamsGroupBy"] = $param["Group"];
		$result = $this->Api->GetData($data);		
		ResultData:
		return $result;
	}

	public function KeluarAdd($param) {
		$data  				= [];
		$data["Target"] 	= "barang_Keluar";
		$data["ParamsData"] = json_encode($param);
		$result = $this->Api->InsertData($data, $Koneksi);


		ResultData:
		return $result;
	}

	public function KeluarEdit($param, $id_pegawai) {
		$id = $param["id"];
		$data  				 = [];
		$data["Target"] 	 = "barang_Keluar";
		$data["ParamsFilter"]= "id = '".$id."'";
		$data["ParamsData"]  = json_encode($param);
		$result = $this->Api->UpdateData($data, $Koneksi);

		ResultData:
		return $result;
	}
}