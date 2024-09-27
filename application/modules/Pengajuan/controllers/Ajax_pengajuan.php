<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_pengajuan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Stoksupplier' , 'ss');
		$this->load->model('Pengajuan' , 'Pj');
	}

	
	public function index() {
		$msg = $this->Func->CreateArray(true, "Invalid Request");
		echo json_encode(array("IsError" => true , "Message" => "Allah Maha Melihat dan menguasai hari pembalasan"));
	}

	public function pengajuan_dropdown(){
		$params = $this->input->post("req");
		$params["statusx"] = "3";
		$Output = $this->GetDataPengajuan($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option value="'.$value['id'].'">
				'.$value['barang'].'
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

	public function supplier_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDataSupplier($params,false);
		echo json_encode($Output);
	}

	public function pengajuan_tablelist(){
		$params = $this->input->post("req");
		$l = $this->session->userdata('level');
		$params['jurusan'] = $this->session->userdata('user')->jurusan_id;
		$params['Group'] = " kode_id " ; 
		$Output = $this->GetDataPengajuan($params,true);
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
						<td>'.date("d M Y H:i" , strtotime($value['tgl_pengajuan'])).'</td>
						<td>'.$value['jurusan'] .' </td>
						<td align="center">'.(empty($value['upload_kaprok'])?"<i title='Belum Di Acc' class='fa fa-times' style='color:red'></i>":'<a data-id="'.$value['id'].'" href="'.base_url("file/".$value['upload_kaprok']).'" target="_blank"> Lihat </a> ') .' </td>
						<td align="center">'.(empty($value['upload_sarpras'])?"<i title='Belum Di Acc' class='fa fa-times' style='color:red'></i>":'<a data-id="'.$value['id'].'" href="'.base_url("file/".$value['upload_sarpras']).'" target="_blank"> Lihat </a> ') .' </td>
						<td class="td-actions" style="text-align: center">
							
							<a role="button" class="btn btn-success btn-round data-detail-kaprokal" data-id="'.$value['kode_id'].'" data-original-title="Detail" data-toggle="modal" href="#detail_kaprokal" title="">
								<i class="material-icons">dvr</i>
							</a>
							<a role="button" class="btn btn-success btn-round data-print-kaprokal" target="_blank" link="'.base_url().'Pengajuan/print_form_pengajuan.html?id='.$value['kode_id'].'" data-original-title="print" title="">
								<i class="material-icons">local_printshop</i>
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

	public function pengajuan_detail_tablelist(){
		$params = $this->input->post("req");
		$l = $this->session->userdata('level');
		
		$Output = $this->GetDataPengajuan($params,false);
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
					<td>'. $value['barang'] .'</td>
					<td>'.$value['jumlah'].' ('.$value['satuan_barang'].')</td>
					<td>Rp.'.$value['harga_satuan'] .' </td>
					<td >
						'.$value['status'].'
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

	public function pengajuan_editstatus_tablelist(){
		$params = $this->input->post("req");
		$l = $this->session->userdata('level');
		
		$Output = $this->GetDataPengajuan($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			if(empty($Output['Data'])){
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='badge badge-primary bold'> Tidak Ada Data </span></td></tr>";
				$Paging = "";
			}else{
				$no = 1 ;
				$select = "" ;
				foreach ($Output['Data'] as $index => $value) {
					if($value['status']=="Diterima"){
						$select = '	<option value="">Pilih Status</option>
		                            <option value="1" selected="selected">Diterima</option>
		                            <option value="2">Ditolak</option>' ;
					}elseif ($value['status']=="Ditolak") {
						$select = '	<option value="">Pilih Status</option>
		                            <option value="1">Diterima</option>
		                            <option value="2"  selected="selected">Ditolak</option>' ;
					}else{
						$select = '	<option value="">Pilih Status</option>
		                            <option value="1">Diterima</option>
		                            <option value="2">Ditolak</option>' ;

					}


					$rHtml.= 	'
					<tr>
					<td>'. $value['barang'] .'</td>
					<td>'.$value['jumlah'].' ('.$value['satuan_barang'].')</td>
					<td>Rp.'.$value['harga_satuan'] .' </td>
					<td >
						<input type="hidden" name="repeater['.$index.'][id]" value="'.$value['id'].'" >
						<select name="repeater['.$index.'][status]" id="id_satuan"  style="width: 100%" class="form-control select2 dropdown" required>
                            '.$select.'
                        </select>
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


	public function pengajuan1_tablelist(){
		$params = $this->input->post("req");
		$l = $this->session->userdata('level');
		if($l==3){
			$params['status'] = 3;
		}

		$Output = $this->GetDataPengajuan($params,true);
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
					<td>'.date("d F Y H:i" , strtotime($value['tgl_pengajuan'])).'</td>
					<td>'.$value['jurusan'] .' </td>
					<td class="td-actions" style="text-align: center">
						
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

	public function pengajuan4_tablelist(){
		$params = $this->input->post("req");
		$l = $this->session->userdata('level');
		$params['k_j_id'] = $this->session->userdata('user')->jurusan_id;
		$params['Group'] = " kode_id " ; 
		$Output = $this->GetDataPengajuan($params,true);
		if(!$Output['IsError']){
			$rHtml="";
			if(empty($Output['Data'])){
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='badge badge-primary bold'> Tidak Ada Data </span></td></tr>";
				$Paging = "";
			}else{
				$no = 1 ;
				foreach ($Output['Data'] as $index => $value) {
					if(empty($value['upload_kaprok'])) {
						$valid = "<i title='Belum Di Acc' class='' style='color:black'>-</i>" ;
					}else{
						if(empty($value['upload_sarpras'])){
							$valid = "<i title='Belum Di Acc' class='fa fa-times' style='color:red'></i>" ;
						}else{
							$valid = '<a data-id="'.$value['id'].'" href="'.base_url("file/".$value['upload_sarpras']).'" target="_blank"> Lihat </a> ' ;
						}
					}

					$rHtml.= 	'
					<tr>
						<td>'. $no .'</td>
						<td>'.date("d M Y H:i" , strtotime($value['tgl_pengajuan'])).'</td>
						<td>'.$value['jurusan'] .' </td>
						<td class="td-actions" style="text-align: center">
							<a role="button" class="btn btn-success btn-round data-detail-kaprokal" data-id="'.$value['kode_id'].'" data-original-title="Detail" data-toggle="modal" href="#detail_kaprokal" title="">
								<i class="material-icons">dvr</i>
							</a>
						</td>
						<td class="td-actions" style="text-align: center">
							'.(!empty($value['upload_kaprok'])? '<a data-id="'.$value['id'].'" href="'.base_url("file/".$value['upload_kaprok']).'" target="_blank"> Lihat </a> ':'<a class="btn btn-primary upload-kap" data-toggle="modal" data-id="'.$value['kode_id'].'" href="#upload">upload bukti</a>' ).'
						</td>
						<td align="center">'.$valid.'</td>

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

	public function pengajuan5_tablelist(){
		$params = $this->input->post("req");
		$l = $this->session->userdata('level');
		if($l==3){
			$params['status'] = 3;
		}

		if($l==2){
			$params["sarpras"] = "1" ;
		}

		$Output = $this->GetDataPengajuan($params,true);
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
					<td>'.$value['barang'].'</td>
					<td>'.$value['jumlah'] .' ('.$value['satuan_barang'].') </td>
					<td>Rp. '.$value['harga_satuan'] .' </td>
					<td>'.$value['kegunaan'] .' </td>
					<td class="td-actions" style="text-align: center">
					<a class="btn btn-primary edit-status" data-toggle="modal" data-id="'.$value['id'].'" href="#status_edit">'.$value['status'].'</a>
					</td>
					<td class="td-actions" style="text-align: center">
						'.(!empty($value['upload_kaprok'])? '<a data-id="'.$value['id'].'" href="'.base_url("file/".$value['upload_kaprok']).'" target="_blank"> Lihat </a> ':'<a class="btn btn-primary upload-kap" data-toggle="modal" data-id="'.$value['id'].'" href="#upload">upload bukti</a>' ).'
					</td>
					<td class="td-actions" style="text-align: center">
						<a class="btn btn-primary upload-kap" data-toggle="modal" data-id="'.$value['id'].'" href="#upload">upload bukti</a>
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

	public function pengajuan6_tablelist(){
		$params = $this->input->post("req");
		$l = $this->session->userdata('level');

		if($l == "2"){
			$params["sarpras"] = "1" ;
		}
		$params['Group'] = " kode_id " ; 
		$Output = $this->GetDataPengajuan($params,true);
		if(!$Output['IsError']){
			$rHtml="";
			if(empty($Output['Data'])){
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='badge badge-primary bold'> Tidak Ada Data </span></td></tr>";
				$Paging = "";
			}else{
				$no = 1 ;
				foreach ($Output['Data'] as $index => $value) {
					if(empty($value['upload_kaprok'])){
						continue;
					}
					$rHtml.= 	'
					<tr>
						<td>'. $no .'</td>
						<td>'.date("d M Y H:i" , strtotime($value['tgl_pengajuan'])).'</td>
						<td>'.$value['jurusan'] .' </td>
						<td class="td-actions" style="text-align: center">
							<a role="button" class="btn btn-success btn-round data-detail-kaprokal" data-id="'.$value['kode_id'].'" data-original-title="Detail" data-toggle="modal" href="#detail_kaprokal" title="">
								<i class="material-icons">dvr</i>
							</a>
						</td>
						<td class="td-actions" style="text-align: center">
							'.(!empty($value['upload_kaprok'])? '<a data-id="'.$value['id'].'" href="'.base_url("file/".$value['upload_kaprok']).'" target="_blank"> Download </a> ':'<a class="btn btn-primary upload-kap" data-toggle="modal" data-id="'.$value['kode_id'].'" href="#upload">upload bukti</a>' ).'
						</td>
						<td class="td-actions" style="text-align: center">
							<div class="btn-group">
							<a class="btn btn-primary edit-status" style="margin-right:2px" data-toggle="modal" data-id="'.$value['kode_id'].'" href="#status_edit">Edit Status</a>

							'.(!empty($value['upload_sarpras'])? '<a data-id="'.$value['id'].'" href="'.base_url("file/".$value['upload_sarpras']).'" target="_blank"> Lihat Bukti  </a> ':'<a class="btn btn-primary upload-kap" data-toggle="modal" data-id="'.$value['kode_id'].'" href="#upload">upload bukti</a>' ).'
							</div>
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

	public function pengajuan_add(){
		$Output = $this->Func->CheckParam();
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->Pj->PengajuanAdd($this->input->post());
			echo json_encode($Output);
		}
	}

	public function pengajuan_edit(){
		$Output = $this->Func->CheckParam();
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->Pj->PengajuanEdit($this->input->post());
			echo json_encode($Output);
		}
	}

	public function pengajuanrepeater_edit(){
		$Output = $this->Func->CheckParam();
		$Update= [];
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$params = $this->input->post("repeater") ;
			foreach ($params as $key => $value) {
				$Update = $this->db->where("id" ,$value['id'])->update('pengajuan', $value );
			} 
			if($Update){
				$Output["IsError"] = false ;
				$Output["Output"] = $this->db->affected_rows()." row affected" ;
			}else{
				$Output["IsError"] = true ;
				$Output["ErrMessage"] = $this->db->error()['message'] ;
			}
			echo json_encode($Output);
		}
	}

	public function pengajuan4_edit(){
		$Output = $this->Func->CheckParam();
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->Pj->PengajuanEdit($this->input->post());
			echo json_encode($Output);
		}
	}

	public function supplier_edit(){
		$Output = $this->Func->CheckParam(['supplier','id','email','telp','alamat']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->ss->SupplierEdit($this->input->post());
			echo json_encode($Output);
		}
	}

	public function supplier_delete(){
		$post = $this->input->post();
		$this->db->where('id',$post['id']);
		if($this->db->delete('supplier')){
			echo json_encode(array("IsError"=> false)) ;
		}else{
			echo json_encode(array("IsError"=>true , "ErrMessage" => $this->db->error()['message']));
		}
	}

	private function GetDataPengajuan($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->Pj->PengajuanList($params,$paging);
    		return $Output ;
    	}
    }

}
