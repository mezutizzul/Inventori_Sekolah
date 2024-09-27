<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->Func->CheckSession();
	}

	public function index()
	{
		$this->load->view('Pengajuan_l',array("pengajuan"=> true , "list" =>true , "page" => "List Pengajuan"));
	}

	public function Pengajuan_list()
	{
		$this->load->view('Pengajuan_l2',array("pengajuan"=> true , "list" =>true , "page" => "List Pengajuan"));
	}

	public function Add(){
		$this->load->view('Pengajuan_add',array("pengajuan"=> true , "list" =>true , "page" => "Add Pengajuan"));
	}

	public function print_form_pengajuan2()
	{
		$this->load->view('Cetak/pengajuan1',array("pengajuan"=> true , "kaprokal" =>true , "page" => "List Pengajuan"));
	}

	public function print_kaprokal($file = "" )
	{
		if(empty($file)){
			echo "<script>alert('data tak tersedia') ;  window.close() ; </script>" ;
		}else{
			$this->load->view('Cetak/Kaprokal_print',array( "file" => $file , "pengajuan"=> true , "kaprokal" =>true , "page" => "List Pengajuan"));	
		}
	}

	public function print_form_pengajuan()
	{

		$this->db->where('kode_id', $this->input->get('id'));
		$list = $this->db->get('view_pengajuan')->result();
		if(empty($this->input->get('id')) || empty($list)){
			echo "<script>alert('data tak tersedia') ;  window.close() ; </script>" ;
		}else{
			$this->db->select('nama,nip');
			$user_wajib = $this->db->get('user_wajib')->result();
			$this->db->select('*');
			$user_jurusan = $this->db->where("id_jurusan" , $list[0]->id_jurusan)->get('view_ttd_jurusan')->result();
			$setting = "" ;
			$this->load->view('Cetak/Cetak_pengajuan',array("user_jurusan"=>$user_jurusan , "user_wajib"=>$user_wajib ,"pengajuan"=> true , "list" => $list ,"setting"=> $setting , "kaprokal" =>true , "page" => "List Pengajuan"));
		}
	}

	public function kaprokal()
	{
		$this->load->view('Pengajuan_k',array("pengajuan"=> true , "kaprokal" =>true , "page" => "List Pengajuan"));
	}

	public function Sarpras()
	{
		$this->load->view('Pengajuan_s',array("pengajuan"=> true , "kaprokal" =>true , "page" => "List Pengajuan"));
	}
}
