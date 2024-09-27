<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_jurusan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurusan');
	}

	
	public function index() {
		$msg = $this->Func->CreateArray(true, "Invalid Request");
		echo json_encode(array("IsError" => true , "Message" => "Allah Maha Melihat dan menguasai hari pembalasan"));
	}

	public function bidang_add()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$params['j_id'] = "0" ;
			$params['type'] = "1" ;
			$update = $this->db->insert('jurusan', $params);
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

	public function bidang_edit()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$params['j_id'] = "0" ;
			$params['type'] = "1" ;
			$this->db->where('id', $params['id']);
			$update = $this->db->update('jurusan', $params);
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

	public function bidang_delete()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$params['j_id'] = "0" ;
			$params['type'] = "1" ;
			$this->db->where('id', $params['id']);
			$update = $this->db->delete('jurusan');
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

	public function bidang_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataJurusan($params,false);
		echo json_encode($Output);
	}

	public function bidang_tablelist(){
		$params = $this->input->post("req");
		$params['type'] = "1" ;
		$Output = $this->GetDataJurusan($params,true);
		if(!$Output['IsError']){
			$rHtml="";
			if(empty($Output['Data'])){
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='badge badge-primary bold'> Tidak Ada Data </span></td></tr>";
				$Paging = "";
			}else{
				$no = 1 ;
				foreach ($Output['Data'] as $index => $value) {
					$rHtml.= 	'
					<tr>
					<td>'. $no .'</td>
					<td>'.$value['jurusan'].'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#jurusan_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['jurusan'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#jurusan_delete">
					<i class="material-icons">close</i>
					</a>
					</td>
					</tr>
					' ;
					$no++ ;
				}
				$Paging = $Output['Paging'] ;
			}
		}else{
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output->ErrMessage."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function bidang_dropdown(){
		$params = $this->input->post("req");
		$params['type'] = "1" ;
		$Output = $this->GetDataJurusan($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option value="'.$value['id'].'">
				'.$value['jurusan'].'
				</option>
				' ;  
			}
		}else{
			$rHtml = "<optino kode='' value=''> ".$Output->ErrMessage."</option>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml);
		echo json_encode($Result) ;
	}

	private function GetDataJurusan($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->Jurusan->BidangList($params,$paging);
    		return $Output ;
    	}
    }



    // jurusan 

    public function jurusan_add()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$params['type'] = "2" ;
			$update = $this->db->insert('jurusan', $params);
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

	public function jurusan_edit()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$params['type'] = "2" ;
			$this->db->where('id', $params['id']);
			$update = $this->db->update('jurusan', $params);
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

	public function jurusan_delete()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$this->db->where('id', $params['id']);
			$update = $this->db->delete('jurusan');
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

	public function jurusan_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataJurusan2($params,false);
		echo json_encode($Output);
	}

	public function jurusan_tablelist(){
		$params = $this->input->post("req");
		$params['type'] = "2" ;
		$Output = $this->GetDataJurusan2($params,true);
		if(!$Output['IsError']){
			$rHtml="";
			if(empty($Output['Data'])){
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='badge badge-primary bold'> Tidak Ada Data </span></td></tr>";
				$Paging = "";
			}else{
				$no = 1 ;
				foreach ($Output['Data'] as $index => $value) {
					$rHtml.= 	'
					<tr>
					<td>'. $no .'</td>
					<td>'.$value['jurusan'].'</td>
					<td>'.$value['bidang'].'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#jurusan_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['jurusan'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#jurusan_delete">
					<i class="material-icons">close</i>
					</a>
					</td>
					</tr>
					' ;
					$no++ ;
				}
				$Paging = $Output['Paging'] ;
			}
		}else{
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output->ErrMessage."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function jurusan_dropdown(){
		$params = $this->input->post("req");
		$params['type'] = "2" ;
		if($this->session->userdata('level')=="3"){
			$params['j_id'] = $this->session->userdata('user')->jurusan_id;
		}
		$Output = $this->GetDataJurusan2($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option value="'.$value['id'].'">
				'.$value['jurusan'].'
				</option>
				' ;  
			}
		}else{
			$rHtml = "<optino kode='' value=''> ".$Output->ErrMessage."</option>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml);
		echo json_encode($Result) ;
	}

	private function GetDataJurusan2($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->Jurusan->JurusanList($params,$paging);
    		return $Output ;
    	}
    }

}
