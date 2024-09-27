<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_barang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jenisbarang' , 'jb');
		$this->load->model('Satuanbarang' , 'sb');
		$this->load->model('Sumberbarang' , 'sum');
		$this->load->model('Barang' , 'Bar');
	}

	
	public function index() {
		$msg = $this->Func->CreateArray(true, "Invalid Request");
		echo json_encode(array("IsError" => true , "Message" => "Allah Maha Melihat dan menguasai hari pembalasan"));
	}

	public function jenis_dropdown(){
		$params = $this->input->post("req");
		$Output = $this->GetDataJenis($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option kode="'.$value['kode_barang'].((int)$value['jml']+1).'" value="'.$value['id'].'">
				'.$value['jenis_barang'].'
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

	public function satuan_dropdown(){
		$params = $this->input->post("req");
		$Output = $this->GetDataSatuan($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option value="'.$value['id'].'">
				'.$value['satuan_barang'].'
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

	public function sumber_dropdown(){
		$params = $this->input->post("req");
		$Output = $this->GetDataSumber($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option value="'.$value['id'].'">
				'.$value['sumber_barang'].'
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

	public function barang_dropdown(){
		$params = $this->input->post("req");
		$Output = $this->GetDataBarang($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option jml_sisa="'.$value['jml_barang'].'" satuan="'.$value['satuan_barang'].'" value="'.$value['id'].'">
				'.$value['nama'].'('.$value['kode_barang'].')
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


	public function jenis_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataJenis($params,false);
		echo json_encode($Output);
	}


	public function satuan_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataSatuan($params,false);
		echo json_encode($Output);
	}

	public function sumber_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataSumber($params,false);
		echo json_encode($Output);
	}

	public function barang_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataBarang($params,false);
		echo json_encode($Output);
	}

	public function jenis_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataJenis($params,true);
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
					<td>'.$value['jenis_barang'].'</td>
					<td>'.$value['kode_barang'].'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#jenis_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['jenis_barang'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#jenis_delete">
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

	public function satuan_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataSatuan($params,true);
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
					<td>'.$value['satuan_barang'].'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#satuan_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['satuan_barang'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#satuan_delete">
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

	public function sumber_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataSumber($params,true);
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
					<td>'.$value['sumber_barang'].'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#sumber_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['sumber_barang'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#sumber_delete">
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
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$query->ErrMessage."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function barang_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataBarang($params,true);
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
					<td>'.$value['kode_barang'].'</td>
					<td>'.$value['stok_akhir'].'</td>
					<td>'.$value['sumber_barang'].'</td>
					<td>'.$value['jenis_barang'].'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#barang_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['nama'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#barang_delete">
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
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$query->ErrMessage."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function stok_barang_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataBarang($params,true);
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
					<td>'.$value['kode_barang'].'</td>
					<td> '.$value['stok_awal'].' </td>
					<td>'.$value['stok_masuk'].'</td>
					<td>'.$value['stok_keluar'].'</td>
					<td class="text-center">'.$value['akhir'].'</td>

					</tr>
					' ;
					$no++ ;
				}
				$Paging = $Output['Paging'] ;
			}
		}else{
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$query->ErrMessage."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function stok_barang1_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataBarang($params,true);
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
					<td>'.$value['kode_barang'].'</td>
					<td> '.$value['stok_awal'].' </td>
					<td>'.$value['stok_masuk'].'</td>
					<td>'.$value['stok_keluar'].'</td>
					<td class="text-center">'.$value['akhir'].'</td>
					<td class="text-center">
						<a class="btn btn-primary btn-sm btn-fab btn-icons" target="blank_" id="navbarDropdownProfile'.$index.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-file-pdf-o"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile'.$value['id'].'">
	                       <a class="dropdown-item" href="'.base_url("Laporan/laporan_masuk_perbarang.html?id=").$value['id'].'" target="_blank">Laporan Barang Masuk</a>
	                       <a class="dropdown-item" href="'.base_url("Laporan/laporan_keluar_perbarang.html?id=").$value['id'].'" target="_blank">Laporan Barang Keluar</a>
	                       <a class="dropdown-item" href="'.base_url("Laporan/laporan_stok_perbarang.html?id=").$value['id'].'" target="_blank">Laporan Stok Barang</a>
	                   </div>
					</td>
					</tr>
					' ;
					$no++ ;
				}
				$Paging = $Output['Paging'] ;
			}
		}else{
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$query->ErrMessage."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function jenis_add(){
		$Output = $this->Func->CheckParam(['jenis_barang','kode_barang']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->jb->JenisAdd($this->input->post());
			echo json_encode($Output);
		}
	}

	public function satuan_add(){
		$Output = $this->Func->CheckParam(['satuan_barang']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->sb->SatuanAdd($this->input->post());
			echo json_encode($Output);
		}
	}

	public function sumber_add(){
		$Output = $this->Func->CheckParam(['sumber_barang']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->sum->SumberAdd($this->input->post());
			echo json_encode($Output);
		}
	}

	public function barang_add(){
		$Output = $this->Func->CheckParam(['id_sumber','nama','id_satuan','id_kategori','kode_barang','stok_awal']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->Bar->BarangAdd($this->input->post());
			echo json_encode($Output);
		}
	}

	public function jenis_edit(){
		$Output = $this->Func->CheckParam(['jenis_barang','id']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->jb->JenisEdit($this->input->post());
			echo json_encode($Output);
		}
	}

	public function satuan_edit(){
		$Output = $this->Func->CheckParam(['satuan_barang','id']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->sb->SatuanEdit($this->input->post());
			echo json_encode($Output);
		}
	}

	public function sumber_edit(){
		$Output = $this->Func->CheckParam(['sumber_barang','id']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->sum->SumberEdit($this->input->post());
			echo json_encode($Output);
		}
	}

	public function barang_edit(){
		$Output = $this->Func->CheckParam(['id_sumber','nama','id_satuan']);
		if($Output['IsError']){
			echo json_encode($Output);
		} else {
			$Output = $this->Bar->BarangEdit($this->input->post());
			echo json_encode($Output);
		}
	}

	public function jenis_delete(){
		$post = $this->input->post();
		$this->db->where('id',$post['id']);
		if($this->db->delete('jenis_barang')){
			echo json_encode(array("IsError"=> false)) ;
		}else{
			echo json_encode(array("IsError"=>true , "ErrMessage" => $this->db->error()['message']));
		}
	}

	public function satuan_delete(){
		$post = $this->input->post();
		$this->db->where('id',$post['id']);
		if($this->db->delete('satuan_barang')){
			echo json_encode(array("IsError"=> false)) ;
		}else{
			echo json_encode(array("IsError"=>true , "ErrMessage" => $this->db->error()['message']));
		}
	}

	public function sumber_delete(){
		$post = $this->input->post();
		$this->db->where('id',$post['id']);
		if($this->db->delete('sumber_barang')){
			echo json_encode(array("IsError"=> false)) ;
		}else{
			echo json_encode(array("IsError"=>true , "ErrMessage" => $this->db->error()['message']));
		}
	}
	public function barang_delete(){
		$post = $this->input->post();
		$this->db->where('id',$post['id']);
		if($this->db->delete('barang')){
			echo json_encode(array("IsError"=> false)) ;
		}else{
			echo json_encode(array("IsError"=>true , "ErrMessage" => $this->db->error()['message']));
		}
	}

	private function GetDataJenis($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->jb->JenisList($params,$paging);
    		return $Output ;
    	}
    }

    private function GetDataSatuan($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->sb->SatuanList($params,$paging);
    		return $Output ;
    	}
    }

    private function GetDataSumber($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->sum->SumberList($params,$paging);
    		return $Output ;
    	}
    }

    private function GetDataBarang($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->Bar->BarangList($params,$paging);
    		return $Output ;
    	}
    }
}
