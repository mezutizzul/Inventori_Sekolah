<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->Func->CheckSession();
		
	}

	public function index()
	{
		$this->load->view('Barang_pinjam',array("pinjam"=> true , "stok_barang_full" =>true , "page" => "List Barang"));
	}

	public function List_barang()
	{
		$this->load->view('Barang_pinjam',array("pinjam"=> true , "stok_barang_full" =>true , "page" => "List Barang"));
	}
	public function Pinjam()
	{
		$this->load->view('Peminjaman_v',array("pinjam"=> true , "peminjaman" =>true , "page" => "Pengembalian"));
	}

	public function Pelanggan()
	{
		$this->load->view('Pelanggan_v',array("users"=> true , "pelanggan" =>true , "page" => "Pelanggan"));
	}

	public function Kembali()
	{
		$this->load->view('Pengembalian_v',array("pinjam"=> true , "pengembalian" =>true , "page" => "Pengembalian"));
	}

	public function Dashboard()
	{
		$this->load->view('Dashboard',array("dashboard"=> true , "stok_barang_full" =>true , "page" => "List Barang"));
	} 
}
