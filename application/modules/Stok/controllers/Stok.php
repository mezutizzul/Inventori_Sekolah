<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->Func->CheckSession();
	}

	public function index()
	{
		$this->load->view('Stok',array("Stok"=> true , "Stok_barang" =>true , "page" => "Stok Barang"));
	}

	public function Supplier()
	{
		$this->load->view('Supplier',array("Stok"=> true , "Supplier" =>true , "page" => "Supplier"));
	}
	public function Masuk()
	{
		$this->load->view('Masuk',array("Stok"=> true , "barang_masuk" =>true , "barang_barang" =>true , "page" => "Barang Masuk"));
	}
	public function MasukList()
	{
		$this->load->view('Masuk_group',array("Stok"=> true , "barang_masuk" =>true , "barang_group" =>true , "page" => "Barang Masuk"));
	}

	public function Masuk_add()
	{
		$this->load->view('Masuk_add',array("Stok"=> true , "barang_masuk" =>true , "page" => "Barang Masuk"));
	}

	public function Keluar()
	{
		$this->load->view('Keluar',array("Stok"=> true , "barang_keluar" =>true , "bk_list" => true , "page" => "Barang Keluar"));
	}
	public function KeluarList()
	{
		$this->load->view('Keluar_group',array("Stok"=> true , "barang_keluar" =>true , "bkg_list" => true , "page" => "Barang Keluar"));
	}
	public function Keluar_add()
	{
		$this->load->view('Keluar_add',array("Stok"=> true , "barang_keluar" =>true , "page" => "Barang Keluar"));
	} 
}
