<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_repeater extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function barang(){
		$param = $this->input->post();
		if(empty($param['repeater'])){
			$Output = array("IsError" => true , "ErrMessage"=> "Tidak Ada File Yang DiImport") ;
			goto ResultData;
		}else{
			foreach ($param['repeater'] as $index => $val) {
				$Output['IsError'] = false ;
				$add = $this->db->insert('barang', $val);
				if($add){
					$Output['repeater'][$index]['IsError'] = false ;
					$Output['repeater'][$index]['Output'] = $this->db->insert_id(); 
				}else{
					$Output['repeater'][$index]['IsError'] = true ;
					$Output['repeater'][$index]['ErrMessage'] = $this->db->error()['message'] ;
				}
			}
		}
		ResultData:
		echo json_encode($Output) ;
	}

	public function masuk(){
		$param = $this->input->post();
		$kode_masuk = $this->db->query("select count(no_penerimaan) as jml from barang_masuk group by no_penerimaan")->num_rows() ;
		$kode_masuk = intval($kode_masuk) + 1; // konversi ke integer, lalu tambahkan satu
        $kode_x = "BM/SMKN4/".date("Y.m.d-") . sprintf('%05s', $kode_masuk); // format hasilnya dan tambahkan prefix
		if(empty($param['repeater'])){
			$Output = array("IsError" => true , "ErrMessage"=> "Tidak Ada Data") ;
			goto ResultData;
		}else{
			foreach ($param['repeater'] as $index => $val) {
				$param['repeater'][$index]["no_penerimaan"] = $kode_x ;
				$param['repeater'][$index]["tgl_masuk"] = date("Y-m-d H:i:s") ;
			}
			$insert = $this->db->insert_batch('barang_masuk', $param['repeater']);
			if($insert){
				$Output["IsError"] = false ;
				$Output["kode"] = $kode_x ;
				$Output["Output"] = $this->db->insert_id(); ;
			}else{
				$Output["IsError"] = true ;
				$Output["ErrMessage"] = $this->db->error()["message"];
			}
		}
		ResultData:
		echo json_encode($Output) ;
	}

	public function keluar(){
		$param = $this->input->post();
		$kode_masuk = $this->db->query("select count(id) as jml from barang_keluar group by no_keluaran")->num_rows() ;
		$kode_masuk = intval($kode_masuk) + 1; // konversi ke integer, lalu tambahkan satu
        $kode_x = "BK/SMKN4/".date("Y.m.d-") . sprintf('%05s', $kode_masuk); // format hasilnya dan tambahkan prefix
		if(empty($param['repeater'])){
			$Output = array("IsError" => true , "ErrMessage"=> "Tidak Ada Data") ;
			goto ResultData;
		}else{
			foreach ($param['repeater'] as $index => $val) {
				$param['repeater'][$index]["no_keluaran"] = $kode_x ;
				$param['repeater'][$index]["tgl_keluar"] = date("Y-m-d H:i:s") ;
			}
			$insert = $this->db->insert_batch('barang_keluar', $param['repeater']);
			if($insert){
				$Output["IsError"] = false ;
				$Output["kode"] = $kode_x ;
				$Output["Output"] = $this->db->insert_id(); ;
			}else{
				$Output["IsError"] = true ;
				$Output["ErrMessage"] = $this->db->error()["message"];
			}
		}
		ResultData:
		echo json_encode($Output) ;
	}

	public function pengajuan(){
		$param = $this->input->post();
        $kode_x = random_string("alnum",20) ;// format hasilnya dan tambahkan prefix
		if(empty($param['repeater'])){
			$Output = array("IsError" => true , "ErrMessage"=> "Tidak Ada Data") ;
			goto ResultData;
		}else{
			foreach ($param['repeater'] as $index => $val) {
				$param['repeater'][$index]["kode_id"] = $kode_x ;
				$param['repeater'][$index]["tgl_pengajuan"] = date("Y-m-d H:i:s") ;
			}
			$insert = $this->db->insert_batch('pengajuan', $param['repeater']);
			if($insert){
				$Output["IsError"] = false ;
				$Output["kode"] = $kode_x ;
				$Output["Output"] = $this->db->insert_id(); ;
			}else{
				$Output["IsError"] = true ;
				$Output["ErrMessage"] = $this->db->error()["message"];
			}
		}
		ResultData:
		echo json_encode($Output) ;
	}
}
