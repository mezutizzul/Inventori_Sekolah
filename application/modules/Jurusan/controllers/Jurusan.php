<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->Func->CheckSession();
	}

	public function index()
	{
		$this->load->view('Jurusan',array("Barang"=> true , "Jurusan" =>true , "page" => "Jurusan"));
	}

	public function Bidang()
	{
		$this->load->view('Bidang',array("Barang"=> true , "Bidang" =>true , "page" => "Bidang Keahlian"));
	}
}
