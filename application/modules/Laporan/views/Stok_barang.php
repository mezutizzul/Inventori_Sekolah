<?php   		
	$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Thaariq');
	$pdf->SetTitle('Laporan');
	$pdf->SetSubject('Laporan');
	$pdf->SetKeywords('Laporan');
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->set_pdf = $setting ;
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	    require_once(dirname(__FILE__).'/lang/eng.php');
	    $pdf->setLanguageArray($l);
	}

	$pdf->AddPage("p","A4"); 
	$pdf->garis();
	$pdf->SetFont('times', '', 11);
	$kode = $_GET["kode"];
	$det = $list[0] ;

	$img_barcode = base_url("Laporan/barcode.html?text=".$kode) ;
	$txt ='
		<table cellpadding="4">
			<tr>
				<td width="25%" rowspan="3"></td>
				<td width="50%"style="vertical-align:bottom"></td>
				<td width="25%"rowspan="3">
					<table border="1" style="font-size:10px">
						<tr>
							<td width="40%"><b>No. Dok</b></td>
							<td width="60%"><b>CM-7.4-1/SP/03</b></td>
						</tr>
						<tr>
							<td ><b>Revisi</b></td>
							<td><b>1</b></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td width="60%"style="text-align:center ;">
					<b>LAPORAN STOK BARANG / BAHAN / ALAT</b>
				</td>
				</tr>
				<tr>
				<td width="60%"style="vertical-align:bottom"></td>
				</tr>
		</table>
	  	<table style="font-size:12px">
			<tr>
				<td width="50%">
					<table width="100%" style="">
						<tr>
							<td width="20%"></td>
							<td width="5%" align="center"></td>
							<td width="75%"></td>
						</tr>
						<tr>
							<td width="20%"></td>
							<td width="5%" align="center"></td>
							<td width="75%"></td>
						</tr>
					</table>
				</td>
				<td width="50%" >
					<table width="100%" style="float:right">
						<tr>
							<td width="25%"></td>
							<td width="15%">Tanggal</td>
							<td width="5%">:</td>
							<td width="55%">'.date("d/m/Y H:i:s").'</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table border="1" style="font-size:14px" align="center" cellpadding="5">
			<tr>
				<th align="center" width="5%"><B>No</B></th>
				<th width="20%"><B>Nama</B></th>
				<th width="15%"><B>Kode</B></th>
				<th style="text-align: center;" width="15%"><B>Stok Awal</B></th>
				<th style="text-align: center;" width="15%"><B>Stok Masuk</B></th>
				<th style="text-align: center;" width="15%"><B>Stok Keluar</B></th>
				<th style="text-align: center;" width="15%"><B>Total Barang</B></th>
			</tr>
		</table>
		<table  border="1" style="font-size:14px" align="center" rules="rows">
		';
	foreach ($list as $key => $value) {
		$txt.= '
			<tr>
				<td width="5%"  style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black">'. ($key+1) .'</td>
				<td width="20%"  style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black">'.$value['nama'].'</td>
				<td width="15%"  style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black">'.$value['kode_barang'].'</td>
				<td  style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="15%"> '.$value['stok_awal'].' </td>
				<td  style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="15%">'.$value['stok_masuk'].'</td>
				<td  style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="15%">'.$value['stok_keluar'].'</td>
				<td  style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="15%">'.$value['akhir'].'</td>
			</tr>
		' ;
	}
		
	$txt .='
		</table>
		<table  border="0" style="font-size:14px" align="center" rules="rows">
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
	';
	$pdf->Write(11, "", '', 0, 'C', true, 0, false, false, 0);
	$pdf->writeHTML($txt, true, false, false, false, '');
	// $pdf->Output($fileNL, 'F');
	$pdf->Output("Laporan_per_barang_masuk.pdf");
	//============================================================+
	// END OF FILE
	//============================================================+

?>