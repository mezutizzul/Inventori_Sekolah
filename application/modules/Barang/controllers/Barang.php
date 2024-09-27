<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->Func->CheckSession();
	}

	public function index()
	{
		$this->load->view('Barang',array("Barang"=> true , "manage" =>true , "page" => "Manage Barang"));
	}

	public function import()
	{
		$this->load->view('Import',array("Barang"=> true , "manage" =>true , "page" => "Import Barang"));
	}

	public function Jenis()
	{
		$this->load->view('Jenis_barang',array("Barang"=> true , "jenis_barang" =>true , "page" => "Jenis Barang"));
	}
	public function Satuan()
	{
		$this->load->view('Satuan_barang',array("Barang"=> true , "satuan_barang" =>true , "page" => "Satuan Barang"));
	}
	public function Sumber()
	{
		$this->load->view('Sumber_barang',array("Barang"=> true , "sumber_barang" =>true , "page" => "Sumber Barang"));
	}


}
