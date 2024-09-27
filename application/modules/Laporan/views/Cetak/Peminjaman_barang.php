<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Muhammad Thaariq Prasetia');
$pdf->SetTitle('Laporan Stok Barang');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
$pdf->AddPage();
$pdf->SetFont('helvetica', 'i', 10);
$pdf->writeHTML($this->input->get('awal')." - ".$this->input->get('akhir'), true, 0, true, true);

$pdf->SetFont('helvetica', 'B', 14);
$pdf->writeHTML('<span align="center">Inventori Sekolah</span>', true, 0, true, true);

$pdf->SetFont('helvetica', 'B', 17);
$pdf->writeHTML('<span align="center">Laporan Peminjaman</span>', true, 0, true, true);

$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);



// -----------------------------------------------------------------------------

// Table with rowspans and THEAD
$tbl = <<<EOD
<table border="1" cellpadding="4" cellspacing="1">
<thead>
<tr style="font-size:14px" style="background-color:#FFFF00;color:#0000FF;" bgcolor='yellow'>
<th>No</th>
<th>Kode</th>
<th>Barang</th>
<th>Pelanggan</th>
<th>Tgl Pinjam</th>
<th class="text-center">Jumlah</th>
<th  style="text-align: center;">Status</th>
</tr>
</thead>
EOD;

if(!$Data['IsError']){
	if(empty($Data['Data'])){
		$tbl .= '<tr nobr="true">
		<td colspan="7">Tidak Ada Data</td>
		</tr>';
		$Paging = "";
	}else{
		$no = 1 ;
		foreach ($Data['Data'] as $index => $value) {
			$tbl.= 	'
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

		$Paging = $Data['Paging'] ;
	}
}else{
	$tbl .= "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$query->ErrMessage."</span></td></tr>";
	$Paging = "";  
}

$tbl.= "</table>" ;


$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------

$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

// $pdf->SetFont('helvetica', 'B', 14);
// $pdf->writeHTML('<span align="center">Inventori Sekolah</span>', true, 0, true, true);

$pdf->SetFont('helvetica', 'B', 17);
$pdf->writeHTML('<span align="center">Laporan Barang Masuk</span>', true, 0, true, true);

$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

/// barang Masuk
$pdf->SetFont('helvetica', '', 10);

$rHtml = '';
$rHtml .= <<<EOD
<table  border="1" cellpadding="4" cellspacing="1">
<thead>
<tr style="font-size:14px" style="background-color:#FFFF00;color:#0000FF;" bgcolor='yellow'>
<th>No</th>
<th>Kode</th>
<th>Barang</th>
<th>Pelanggan</th>
<th>Tgl Pinjam</th>
<th>Tgl Kembali</th>
<th class="text-center">Jumlah</th>

</tr>
</thead>
EOD;

if(!$Output['IsError']){
	if(empty($Output['Data'])){
		$rHtml .= '<tr nobr="true">
		<td colspan="7">Tidak Ada Data</td>
		</tr>';
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
	$rHtml .= "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output->ErrMessage."</span></td></tr>";
	$Paging = "";
}
$rHtml.="</table>" ;

$pdf->writeHTML($rHtml, true, false, false, false, '');

$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

// $pdf->SetFont('helvetica', 'B', 14);
// $pdf->writeHTML('<span align="center">Inventori Sekolah</span>', true, 0, true, true);
//Close and output PDF document

$pdf->Output('Laporan Unit Kerja ('.date("d M Y").').pdf', 'I');


// echo json_encode($rHtml) ;
//============================================================+
// END OF FILE
//============================================================+
?>
