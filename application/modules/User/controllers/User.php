<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->Func->CheckSession();
	}

	public function index()
	{
		$this->load->view('Admin');
	}

	public function Admin()
	{
		$this->load->view('Admin',array("users"=> true , "user_admin" =>true , "page" => "Setting Admin"));
	}

	public function User_wajib()
	{
		$this->load->view('User_wajib',array("users"=> true , "user_wajib" =>true , "page" => "User Wajib"));
	}

	public function User_jurusan()
	{
		$this->load->view('User_jurusan',array("users"=> true , "user_jurusan" =>true , "page" => "User Jurusan"));
	}

	public function Admin_add()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$update = $this->db->update('user_admin', $params);
			if($update){
				$result['IsError'] = false ;
				$result['Output'] = "Success" ;
			}else{
				$result['IsError'] = true ;
				$result['ErrMessage'] = $this->db->error()['message'] ;
			}
		}else {
			$result['IsError'] = true ;
			$result['ErrMessage'] = "Allah is watching " ;
		}
		echo json_encode($result);
	}
	
	public function Adminpassword_add()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$update = $this->db->update('user_admin', $params);
			if($update){
				$result['IsError'] = false ;
				$result['Output'] = "Success" ;
			}else{
				$result['IsError'] = true ;
				$result['ErrMessage'] = $this->db->error()['message'] ;
			}
		}else {
			$result['IsError'] = true ;
			$result['ErrMessage'] = "Allah is watching " ;
		}
		echo json_encode($result);
	}

	public function Admin_list()
	{
		if($this->input->is_ajax_request()){
			$update = $this->db->get('user_admin');
			if($update){
				$result= $update->result()[0]  ;
			}else{
				$result['IsError'] = true ;
				$result['ErrMessage'] = $this->db->error()['message'] ;
			}
		}else {
			$result['IsError'] = true ;
			$result['Output'] = "Allah is watching " ;
		}
		echo json_encode($result);
	}

	public function userwajib_list()
	{
		if($this->input->is_ajax_request()){
			$this->db->select('nama, nip, username, telp, alamat, email');
			$update = $this->db->get('user_wajib');
			if($update){
				$result['IsError'] = false ;
				$result['Data'] = $update->result()  ;
			}else{
				$result['IsError'] = true ;
				$result['ErrMessage'] = $this->db->error()['message'] ;
			}
		}else {
			$result['IsError'] = true ;
			$result['Output'] = "Allah is watching " ;
		}
		echo json_encode($result);
	}

	public function userwajib_add()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$this->db->where('id', $params['id']);
			$update = $this->db->update('user_wajib', $params);
			if($update){
				$result['IsError'] = false ;
				$result['Output'] = "Success" ;
			}else{
				$result['IsError'] = true ;
				$result['ErrMessage'] = $this->db->error()['message'] ;
			}
		}else {
			$result['IsError'] = true ;
			$result['ErrMessage'] = "Allah is watching " ;
		}
		echo json_encode($result);
	}
}
