<?php   		
	$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Nicola Asuni');
	$pdf->SetTitle('TCPDF Example 003');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
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
	$this->db->where('no_keluaran',$kode);
	$get_barang = $this->db->get('view_barang_keluar')->result();

	$img_barcode = base_url("Laporan/barcode.html?text=".substr($kode,-15)) ;
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
					<b>BON BARANG / BAHAN / ALAT</b>
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
							<td width="20%">Unit Kerja</td>
							<td width="5%" align="center">:</td>
							<td width="75%"><b>CM-7.4-1/SP/03</b></td>
						</tr>
						<tr>
							<td width="20%">Keterangan</td>
							<td width="5%" align="center">:</td>
							<td width="75%"><b>CM-7.4-1/SP/03</b></td>
						</tr>
					</table>
				</td>
				<td width="50%" >
					<table width="100%" style="float:right">
						<tr>
							<td width="25%"></td>
							<td width="15%">Tanggal</td>
							<td width="5%">:</td>
							<td width="55%">02/06/2019 08:06:09</td>
						</tr>
						<tr>
							<td></td>
							<td>Nomor</td>
							<td>:</td>
							<td>BK/SMKN4/2019.06.21-0002</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table border="1" style="font-size:14px" align="center" cellpadding="5">
			<tr>
				<td width="15%">
					<b>KODE BRG.</b>
				</td>
				<td width="55%">
					<b>NAMA BARANG/ALAT</b>
				</td>
				<td width="15%">
					<b>JUMLAH</b>
				</td>
				<td width="15%">
					<b>SATUAN</b>
				</td>
			</tr>
		</table>
		<table  border="1" style="font-size:14px" align="center" rules="rows">
			<tr>
				<td width="15%" style="border-top: 1px dashed #ddd; border-bottom:none;">
					<b>KODE BRG.</b>
				</td>
				<td width="55%" style="border-top: 1px dashed #ddd; border-bottom:none;">
					<b>NAMA BARANG/ALAT</b>
				</td>
				<td width="15%" style="border-top: 1px dashed #ddd; border-bottom:none;">
					<b>JUMLAH</b>
				</td>
				<td width="15%" style="border-top: 1px dashed #ddd; border-bottom:none;">
					<b>SATUAN</b>
				</td>
			</tr>
		</table>
		<table  border="0" style="font-size:14px" align="center" rules="rows">
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
		<table  border="1" style="font-size:14px" align="center" rules="rows">
			<tr>
				<td width="30%">
					<table align="left">
						<tr>
							<td>
								Admin Gudang
							</td>
						</tr>
						<tr>
							<td height="50">&nbsp;</td>
						</tr>
						<tr>
							<td>
								<b>Nama admin</b>
							</td>
						</tr>
					</table>
				</td>
				<td width="30%">
					<table align="left">
						<tr>
							<td>
								Diterima Oleh
							</td>
						</tr>
						<tr>
							<td height="50">&nbsp;</td>
						</tr>
						<tr>
							<td>
								<b>Pelanggan</b>
							</td>
						</tr>
					</table>
				</td>
				<td width="40%" align="center">
					<table>
						<tr>
							<td> </td>
						</tr>
						<tr>
							<td><img src="'.$img_barcode.'"></td>
						</tr>
						<tr>
							<td> </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	';
	$pdf->Write(11, "", '', 0, 'C', true, 0, false, false, 0);
	$pdf->writeHTML($txt, true, false, false, false, '');
	// $pdf->Output($fileNL, 'F');
	$pdf->Output("tetew.pdf");
	//============================================================+
	// END OF FILE
	//============================================================+

?>