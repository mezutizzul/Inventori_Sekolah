<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pengajuan extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function PengajuanList($param , $paging) {
		//Connect database ke 2
		$nama_table  = "view_pengajuan";

		$data 			= [];
		$data["Target"] = $nama_table;
		$filter 		= "";

		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["id_satuan"])) {
			$flt = "id_satuan = '".$param["id_satuan"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["kode_id"])) {
			$flt = "kode_id = '".$param["kode_id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["jurusan"])) {
			$flt = "id_jurusan = '".$param["jurusan"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["k_j_id"])) {
			$flt = "j_id = '".$param["k_j_id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["sarpras"])) {
			$flt = " upload_kaprok is not null or upload_kaprok !='' ";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["statusx"])) {
			$flt = "status != 'pending' and status!='ditolak' and status!='diterima'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["status"])) {
			$flt = "status = 'pending'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["id_pengaju"])) {
			$flt = "id_pengaju = '".$param["id_pengaju"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["search"])) {
			$flt = "(jurusan rlike '".$param['search']."' )";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		//Bawaan
		$data["ParamsFilter"] = $filter;
		$data["ParamsField"]  = "*";


		if(!empty($param["Sort"]))  $data["ParamsSort"] = $param["Sort"];
		if(!empty($param["Group"]))  $data["ParamsGroupBy"] = $param["Group"];
		if(!empty($param["Limit"])) $data["Limit"] = $param["Limit"]; 
		if(!empty($param["Page"]))  $data["Page"] = $param["Page"];
		$result = $this->Api->GetData($data);		
		ResultData:
		return $result;
	}

	public function PengajuanAdd($param) {

		$param['tgl_pengajuan'] = date("Y-m-d",strtotime($param['tgl_pengajuan'])) ;
		$data  				= [];
		$data["Target"] 	= "pengajuan";
		$data["ParamsData"] = json_encode($param);
		$result = $this->Api->InsertData($data, $Koneksi);
		

		ResultData:
		return $result;
	}

	public function PengajuanEdit($param) {
		$id = $param["id"];
		$filter = "" ;
		if(!empty($param["id"])) {
			$flt = "id = '".$param["id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		if(!empty($param["kode_id"])) {
			$flt = "kode_id = '".$param["kode_id"]."'";
			$filter .= empty($filter) ? $flt : " and ".$flt;
		}

		$data  				 = [];
		$data["Target"] 	 = "pengajuan";
		$data["ParamsFilter"]= $filter ;
		$data["ParamsData"]  = json_encode($param);
		$result = $this->Api->UpdateData($data, $Koneksi);

		ResultData:
		return $result;
	}
}