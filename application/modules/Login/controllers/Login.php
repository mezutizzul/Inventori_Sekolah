<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function dd(){
		$this->load->view('Awal');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login','refresh');
	}

	public function login(){
		$p = $this->input->post();  
 		if($p['jabatan']==1){
 			$arra = array("id"=>1 ,"username"=>$p['username'] ,"password"=>$p['password']);
			$this->db->where($arra);
			$data = $this->db->get('user_wajib')->result();
			if(empty($data)){
				$this->session->set_flashdata('Alert_login', 'Username dan Password Yang anda masukan salah');
				redirect('Login','refresh') ;
			}else{
				$this->session->set_userdata(array('user'=>$data[0],"level"=>"1"));
				redirect(base_url('Dashboard.html'),'refresh');
			}
		}else if($p['jabatan']==2){
			// echo "serpras";
			$arra = array("id"=>2 ,"username"=>$p['username'] ,"password"=>$p['password']);
			$this->db->where($arra);
			$data = $this->db->get('user_wajib')->result();
			if(empty($data)){
				$this->session->set_flashdata('Alert_login', 'Username dan Password Yang anda masukan salah');
				redirect('Login','refresh') ;
			}else{
				$this->session->set_userdata(array('user'=>$data[0],"level"=>"2"));
				redirect(base_url('Dashboard.html'),'refresh');
			}
		}else if($p['jabatan']==3){
			// echo "kaprokal";
			$arra = array("jabatan"=>"kaprokal" ,"username"=>$p['username'] ,"password"=>$p['password']);
			$this->db->where($arra);
			$data = $this->db->get('view_user_jurusan')->result();
			
			if(empty($data)){
				$this->session->set_flashdata('Alert_login', 'Username dan Password Yang anda masukan salah');
				redirect('Login','refresh') ;
			}else{
				$this->session->set_userdata(array('user'=>$data[0],"level"=>"3"));
				redirect(base_url('Dashboard.html'),'refresh');
			}
		}else if($p['jabatan']==4){
			$arra = array("jabatan"=>"kabeng" ,"username"=>$p['username'] ,"password"=>$p['password']);
			$this->db->where($arra);
			$data = $this->db->get('view_user_jurusan')->result();
			if(empty($data)){
				$this->session->set_flashdata('Alert_login', 'Username dan Password Yang anda masukan salah');
				redirect('Login','refresh') ;
			}else{
				$this->session->set_userdata(array('user'=>$data[0],"level"=>"4"));
				redirect(base_url('Dashboard.html'),'refresh');
			}
		}else if($p['jabatan']==5){
			$arra = array("username"=>$p['username'] ,"password"=>$p['password']);
			$this->db->where($arra);
			$data = $this->db->get('user_admin')->result();
			if(empty($data)){
				$this->session->set_flashdata('Alert_login', 'Username dan Password Yang anda masukan salah');
				redirect('Login','refresh') ;
			}else{
				$this->session->set_userdata(array('user'=>$data[0],"level"=>"5"));
				redirect(base_url('Dashboard.html'),'refresh');
			}
		}else redirect(base_url("Login")) ;
	}
}
