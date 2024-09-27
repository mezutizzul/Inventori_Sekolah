<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_action extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pinjam' , 'pj');
		$this->load->model('Pelanggan' , 'pg');
	}

	
	public function index() {
		$msg = $this->Func->CreateArray(true, "Invalid Request");
		echo json_encode(array("IsError" => true , "Message" => "Allah Maha Melihat dan menguasai hari pembalasan"));
	}

	public function pelanggan_dropdown(){
		$params = $this->input->post("req");
		$Output = $this->GetDataPelanggan($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option value="'.$value['id'].'">
				'.$value['nama'].'
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

	public function barang_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataBarang($params,false);
		echo json_encode($Output);
	}

	public function pelanggan_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataPelanggan($params,false);
		echo json_encode($Output);
	}

	public function barang_tablelist(){
		$params = $this->input->post("req");
		$params['Sort'] = "stok_barang desc " ;
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
					<td  class="text-center">'.$value['stok_barang'].'</td>
					<td class="text-center">'.(empty($value['jml_dipinjam'])?'0':$value['jml_dipinjam']).'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round btn-pinjam"   data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#mdl-pinjam" title="">
					pinjam
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

	public function pelanggan_tablelist(){
		$params = $this->input->post("req");
		$params['Sort'] = "id desc " ;
		$Output = $this->GetDataPelanggan($params,true);
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
					<td>'.$value['kategori'].'</td>
					<td>'. str_replace('\r\n', '<br>',$value['keterangan']).'</td>
					<td class="td-actions text-center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#pelanggan_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['nama'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#pelanggan_delete">
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

	public function peminjaman_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataPeminjaman($params,true);
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
					<td>'.$value['kode_peminjaman'].'</td>
					<td>'.$value['nama_barang'].'</td>
					<td>'.$value['nama_pelanggan'].'</td>
					<td>'. date("d M Y" , strtotime($value['tgl_peminjaman'])).'</td>
					<td  class="text-center">'.$value['jml'].'</td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round btn-kembali" data-jml="'.$value['jml'].'" data-id="'.$value['kode_peminjaman'].'" data-original-title="" data-toggle="modal" href="#mdl-kembali" title="">
					Kembali
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

	public function peminjaman1_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataPeminjaman2($params,true);
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
					<td>'.$value['kode_peminjaman'].'</td>
					<td>'.$value['nama_barang'].'</td>
					<td>'.$value['nama_pelanggan'].'</td>
					<td>'. date("d M Y" , strtotime($value['tgl_peminjaman'])).'</td>
					<td  class="text-center">'.$value['jml'].'</td>
					<td class="td-actions" style="text-align: center">
					'.($value['status']=='1'?'Dikembalikan':'Dipinnjam').'
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

	public function pengembalian_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDataPengembalian($params,true);
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
					<td>'.$value['kode_peminjaman'].'</td>
					<td>'.$value['nama_barang'].'</td>
					<td>'.$value['nama_pelanggan'].'</td>
					<td>'. date("d M Y" , strtotime($value['tgl_peminjaman'])).'</td>
					<td>'. date("d M Y" , strtotime($value['tgl_pengembalian'])).'</td>
					<td  class="text-center">'.$value['jml'].'</td>
					
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


	public function pelanggan_add(){
		$Output = $this->Func->CheckParam(['nama','kategori']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			if($this->db->insert('pelanggan', $this->input->post())){
				$Output = $this->Func->CreateArray(false , "sukses");
			}else{
				$Output = $this->Func->CreateArray(true ,$this->db->error()['message']);	
			}
			echo json_encode($Output);
		}
	}


	public function peminjaman_add(){
		$Output = $this->Func->CheckParam(['id_pelanggan','id_barang','tgl_peminjaman' ,'jml']);
		$params = $this->input->post() ;
		$params['tgl_peminjaman'] = date("Y-m-d",strtotime($params['tgl_peminjaman']));
		$params['kode_peminjaman'] = random_string("alnum",20) ;
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			if($this->db->insert('peminjaman', $params)){
				$Output = $this->Func->CreateArray(false , "sukses");
			}else{
				$Output = $this->Func->CreateArray(true ,$this->db->error()['message']);	
			}
			echo json_encode($Output);
		}
	}

	public function pengembalian_add(){
		$Output = $this->Func->CheckParam(['tgl_pengembalian','kode_peminjaman','jml']);
		$params = $this->input->post() ;
		$params['tgl_pengembalian'] = date("Y-m-d",strtotime($params['tgl_pengembalian']));
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			if($this->db->insert('pengembalian', $params)){
				$Output = $this->Func->CreateArray(false , "sukses");
			}else{
				$Output = $this->Func->CreateArray(true ,$this->db->error()['message']);	
			}
			echo json_encode($Output);
		}
	}
	

	public function pelanggan_edit(){
		$Output = $this->Func->CheckParam(['nama','kategori','id']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->pg->PelangganEdit($this->input->post());
			echo json_encode($Output);
		}
	}

	public function pelanggan_delete(){
		$post = $this->input->post();
		$this->db->where('id',$post['id']);
		if($this->db->delete('pelanggan')){
			echo json_encode(array("IsError"=> false)) ;
		}else{
			echo json_encode(array("IsError"=>true , "ErrMessage" => $this->db->error()['message']));
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
    		$Output = $this->pj->BarangList($params,$paging);
    		return $Output ;
    	}
    }

    private function GetDataPelanggan($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->pg->PelangganList($params,$paging);
    		return $Output ;
    	}
    }

    private function GetDataPeminjaman($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->pj->PinjamList($params,$paging);
    		return $Output ;
    	}
    }
    
    private function GetDataPeminjaman2($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->pj->Pinjam2List($params,$paging);
    		return $Output ;
    	}
    }

    private function GetDataPengembalian($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->pj->KembaliList($params,$paging);
    		return $Output ;
    	}
    }

}
