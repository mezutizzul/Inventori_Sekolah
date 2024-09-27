<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_user extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User' , 'Us');
	}

	
	public function index() {
		$msg = $this->Func->CreateArray(true, "Invalid Request");
		echo json_encode(array("IsError" => true , "Message" => "Allah Maha Melihat dan menguasai hari pembalasan"));
	}

	public function userjurusan_add()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$update = $this->db->insert('user_jurusan', $params);
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

	public function userjurusan_edit()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$this->db->where('id', $params['id']);
			$update = $this->db->update('user_jurusan', $params);
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

	public function userjurusan_delete()
	{
		if($this->input->is_ajax_request()){
			$params = $this->input->post();
			$this->db->where('id', $params['id']);
			$update = $this->db->delete('user_jurusan');
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

	public function userjurusan_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataUserjurusan($params,false);
		echo json_encode($Output);
	}

	public function userjurusan_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataUserjurusan($params,true);
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
					<td>'.$value['nama'].'</td>
					<td>'.$value['jurusan'].'</td>
					<td>'.$value['nip'].'</td>
					<td>'.$value['jabatan'].'</td>
					<td>'.$value['telp'].'</td>
					<td>'.$value['email'].'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#userjurusan_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['nama'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#userjurusan_delete">
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

	private function GetDataUserjurusan($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->Us->UserjurusanList($params,$paging);
    		return $Output ;
    	}
    }

}
