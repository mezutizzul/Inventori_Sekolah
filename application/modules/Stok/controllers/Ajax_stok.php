<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_stok extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Stoksupplier' , 'ss');
		$this->load->model('Stokmasuk' , 'sm');
		$this->load->model('Stokkeluar' , 'sk');
	}

	
	public function index() {
		$msg = $this->Func->CreateArray(true, "Invalid Request");
		echo json_encode(array("IsError" => true , "Message" => "Allah Maha Melihat dan menguasai hari pembalasan"));
	}

	public function supplier_dropdown(){
		$params = $this->input->post("req");
		$Output = $this->GetDatasupplier($params,false);
		if(!$Output['IsError']){
			$rHtml="";
			foreach ($Output['Data'] as $index => $value) {
				$rHtml.= 	'
				<option value="'.$value['id'].'">
				'.$value['supplier'].'
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

	public function masuk_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDatamasuk($params,false);
		echo json_encode($Output);
	}

	public function keluar_list(){
		$params = $this->input->post("req");
		$Output = $this->GetDatakeluar($params,false);
		echo json_encode($Output);
	}


	public function supplier_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDatasupplier($params,true);
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
					<td>'.$value['supplier'].'</td>
					<td>'.$value['alamat'] .' </td>
					<td>'.$value['telp'] .' </td>
					<td>'.$value['email'] .' </td>
					<td class="td-actions" style="text-align: center">
					<a role="button" class="btn btn-success btn-round edit-data" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#supplier_edit" title="">
					<i class="material-icons">edit</i>
					</a>
					<a role="button" class="btn btn-danger btn-round delete-data" data-name="'.$value['supplier'].'" data-id="'.$value['id'].'" data-original-title="" data-toggle="modal" href="#supplier_delete">
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

	public function masuk_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDatamasuk($params,true);
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
					<td> <a class="keterangan" data-toggle="modal" href="#keterangan" keterangan="'.$value['keterangan'].'">'.$value['no_penerimaan'].'</a></td>
					<td>'.$value['supplier'] .' </td>
					<td>'.$value['nama'] .' </td>
					<td>'.date("d M Y" , strtotime( $value['tgl_masuk'])) .' </td>
					<td>'.$value['jml']." (".$value['satuan_barang'] .') </td>
					
					</tr>
					' ;
					$no++ ;
				}
				$Paging = $Output['Paging'] ;
			}
		}else{
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output['ErrMessage']."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function masukdetail_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDatamasuk($params,false);
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
						<td>'.$value['nama'] .' </td>
						<td>'.$value['jml']." (".$value['satuan_barang'] .') </td>
					</tr>
					' ;
					$no++ ;
				}
				$Paging = $Output['Paging'] ;
			}
		}else{
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output['ErrMessage']."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}


	public function masukgroup_tablelist(){
		$params = $this->input->post("req");
		$params["Group"] = "no_penerimaan" ;
		$Output = $this->GetDatamasuk($params,true);
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
					<td> <a class="keterangan" data-toggle="modal" href="#keterangan" keterangan="'.$value['keterangan'].'">'.$value['no_penerimaan'].'</a></td>
					<td>'.$value['supplier'] .' </td>
					<td>'.date("d M Y" , strtotime( $value['tgl_masuk'])) .' </td>
					<td class="td-actions">
						<a role="button" class="btn btn-success btn-round data-detail" data-id="'.$value['no_penerimaan'].'" data-original-title="Detail" data-toggle="modal" href="#detail_masuk" title="">
							<i class="material-icons">dvr</i>
						</a>
						<a role="button" class="btn btn-success btn-round data-print" target="_blank" href="'.base_url().'/Laporan/print_barang_masuk.html?kode='.$value['no_penerimaan'].'" data-original-title="print" title="">
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
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output['ErrMessage']."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function keluar_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDatakeluar($params,true);
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
					<td> <a class="keterangan" data-toggle="modal" href="#keterangan" keterangan="'.$value['keterangan'].'">'.$value['no_keluaran'].'</a></td>
					<td>'.$value['nama'] .' </td>
					<td>'.$value['jml']." (".$value['satuan_barang'] .') </td>
					<td>'. date("d F Y",strtotime($value['tgl_keluar'])).' </td>
					
					</tr>
					' ;
					$no++ ;
				}
				$Paging = $Output['Paging'] ;
			}
		}else{
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output['ErrMessage']."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function keluardetail_tablelist(){
		$params = $this->input->post("req");
		$Output = $this->GetDatakeluar($params,false);
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
						<td>'.$value['nama'] .' </td>
						<td>'.$value['jml']." (".$value['satuan_barang'] .') </td>
					</tr>
					' ;
					$no++ ;
				}
				$Paging = $Output['Paging'] ;
			}
		}else{
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output['ErrMessage']."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function keluargroup_tablelist(){
		$params = $this->input->post("req");
		$params["Group"] = "no_keluaran" ;
		$Output = $this->GetDatakeluar($params,true);
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
					<td>'.$value['no_keluaran'].'</a></td>
					<td>'.$value['nama_pelanggan'] .' </td>
					<td>'.$value['unit_kerja'] .' </td>
					<td>'. date("d F Y",strtotime($value['tgl_keluar'])).' </td>
					<td class="td-actions" align="center">
						<a role="button" class="btn btn-success btn-round data-detail" data-id="'.$value['no_keluaran'].'" data-original-title="Detail" data-toggle="modal" href="#detail_keluar" title="">
							<i class="material-icons">dvr</i>
						</a>
						<a role="button" class="btn btn-success btn-round data-print" target="_blank" href="'.base_url().'/Laporan/print_barang_keluar.html?kode='.$value['no_keluaran'].'" data-original-title="print" title="">
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
			$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output['ErrMessage']."</span></td></tr>";
			$Paging = "";
		}
		$Result = array("lsdt" => $rHtml , "Paging" => $Paging);
		echo json_encode($Result) ;
	}

	public function supplier_add(){
		$Output = $this->Func->CheckParam(['supplier','email','telp','alamat']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$Output = $this->ss->SupplierAdd($this->input->post());
			echo json_encode($Output);
		}
	}

	public function masuk_add(){
		$Output = $this->Func->CheckParam(['id_barang','id_supplier','tgl_masuk']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$params = $this->input->post() ;
			$params['no_penerimaan'] = random_string("alnum",20) ;
			$params['tgl_masuk'] = date("Y-m-d",strtotime($params['tgl_masuk']));
			$Output = $this->sm->MasukAdd($params);
			echo json_encode($Output);
		}
	}


	public function keluar_add(){
		$Output = $this->Func->CheckParam(['id_barang','jml','tgl_keluar']);
		if($Output["IsError"]) {
			echo json_encode($Output);
		} else {
			$params = $this->input->post() ;
			$params['no_keluaran'] = random_string("alnum",20) ;
			$params['tgl_keluar'] = date("Y-m-d",strtotime($params['tgl_keluar']));
			$Output = $this->sk->KeluarAdd($params);
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

	private function GetDatasupplier($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->ss->SupplierList($params,$paging);
    		return $Output ;
    	}
    }

    private function GetDatamasuk($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->sm->MasukList($params,$paging);
    		return $Output ;
    	}
    }

    private function GetDatakeluar($params , $paging = false){
    	$Output = $this->Func->CheckParam([]); //Hak akses sekolah

    	if($Output["IsError"]) {
    		return $Output;
    	} else {
    		if ($paging && empty($params['Page'])) {
    			$params['Page'] = 1 ;
    		}else if(!$paging){
    			$params['Page'] = '';
    		}
    		$Output = $this->sk->KeluarList($params,$paging);
    		return $Output ;
    	}
    }

}
