<?php
// $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Thaariq');
// $pdf->SetTitle('Laporan');
// $pdf->SetSubject('Laporan');
// $pdf->SetKeywords('Laporan');
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// $pdf->set_pdf = $setting ;
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// // set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
// 	require_once(dirname(__FILE__).'/lang/eng.php');
// 	$pdf->setLanguageArray($l);
// }

// // ---------------------------------------------------------
// $pdf->AddPage();
// $pdf->SetFont('helvetica', 'i', 10);


// $pdf->garis();
// $pdf->Write(11, "", '', 0, 'C', true, 0, false, false, 0);
if($this->uri->segment(2)=="pdf_periode"){
	// $pdf->writeHTML($this->input->get('awal')." - ".$this->input->get('akhir'), true, 0, true, true);
	$date.= '<span style="float:left;font-size:14px">'.$this->input->get('awal')." - ".$this->input->get('akhir').'</span>';
} //else $pdf->writeHTML(date("d M Y"), true, 0, true, true);

// $pdf->SetFont('helvetica', 'B', 14);
// // $pdf->writeHTML('<span align="center">Inventori Sekolah</span>', true, 0, true, true);
// // $tbl.= '<span align="center" style="font-size:14px">Inventori Sekolah</span><br>';

// $pdf->SetFont('helvetica', 'B', 17);
// $pdf->writeHTML('<span align="center">Laporan Stok Barang</span>', true, 0, true, true);
$tbl.= '<br><b align="center" style="font-size:17px">Laporan Stok Barang</b><br><br>';

// $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

// $pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

// Table with rowspans and THEAD
$tbl .= <<<EOD

		<table  border="1" style="border-collapse:collapse" class="report"><thead>
<tr style="font-size:14px" style="background-color:#ffffff;color:#0000FF;" bgcolor='white'>
<th align="center" width="5%">No</th>
<th width="20%">Nama</th>
<th width="15%">Kode</th>
<th style="text-align: center;" width="15%">Stok Awal</th>
<th style="text-align: center;" width="15%">Stok Masuk</th>
<th style="text-align: center;" width="15%">Stok Keluar</th>
<th style="text-align: center;" width="15%">Total Barang</th>
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
			<td width="5%">'. $no .'</td>
			<td width="20%">'.$value['nama'].'</td>
			<td width="15%">'.$value['kode_barang'].'</td>
			<td style="text-align:center" width="15%"> '.$value['stok_awal'].' </td>
			<td style="text-align:center" width="15%">'.$value['stok_masuk'].'</td>
			<td style="text-align:center" width="15%">'.$value['stok_keluar'].'</td>
			<td style="text-align:center" width="15%">'.$value['akhir'].'</td>

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


// $pdf->writeHTML($tbl, true, false, false, false, '');

// // -----------------------------------------------------------------------------
// // -----------------------------------------------------------------------------

// $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

// // $pdf->SetFont('helvetica', 'B', 14);
// // $pdf->writeHTML('<span align="center">Inventori Sekolah</span>', true, 0, true, true);

// $pdf->SetFont('helvetica', 'B', 17);
// $pdf->writeHTML('<span align="center">Laporan Barang Masuk</span>', true, 0, true, true);
$rHtml = '<br><b align="center" style="font-size:17px">Laporan Barang Masuk</b><br><br>';

// $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

// /// barang Masuk
// $pdf->SetFont('helvetica', '', 10);

$rHtml .= <<<EOD
	
		<table  border="1" style="border-collapse:collapse" class="report" ><thead>
<tr style="font-size:14px" style="background-color:#ffffff;color:#0000FF;" bgcolor='white'>
<th>No</th>
<th>No Penerimaan</th>
<th>Supplier</th>
<th>Barang</th>
<th>Tgl Masuk</th>
<th>Jumlah(Satuan)</th>

</tr>
</thead>
EOD;

if(!$Output2['IsError']){
	if(empty($Output2['Data'])){
		$rHtml .= '<tr nobr="true">
		<td colspan="6">Tidak Ada Data</td>
		</tr>';
	}else{
		$no = 1 ;
		foreach ($Output2['Data'] as $index => $value) {
			$rHtml.= 	'
			<tr>
			<td>'. $no .'</td>
			<td> <a style="color:black">'.$value['no_penerimaan'].'</a></td>
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
	$rHtml .= "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output2->ErrMessage."</span></td></tr>";
	$Paging = "";
}
$rHtml.="</table>" ;

// $pdf->writeHTML($rHtml, true, false, false, false, '');

// $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

// $pdf->SetFont('helvetica', 'B', 14);
// $pdf->writeHTML('<span align="center">Inventori Sekolah</span>', true, 0, true, true);

// $pdf->SetFont('helvetica', 'B', 17);
// $pdf->writeHTML('<span align="center">Laporan Barang Keluar</span>', true, 0, true, true);
$rHtml2 = '<br><b align="center" style="font-size:17px">Laporan Barang Keluar</b><br> <br>';

// $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

// /// barang Masuk
// $pdf->SetFont('helvetica', '', 10);

$rHtml2 .= <<<EOD

		<table  border="1" style="border-collapse:collapse" class="report"><thead>
<tr nobr='true' style="font-size:14px" style="background-color:#ffffff;color:#0000FF;" bgcolor='white'>
<th>No</th>
<th>No Keluaran</th>
<th>Barang</th>
<th>Jumlah(Satuan)</th>
<th>Tgl keluar</th>
<!-- <th  style="text-align: center;">Action</th> -->
</tr>
</thead>
EOD;

if(!$Output['IsError']){
	if(empty($Output['Data'])){
		$rHtml2 .= '<tr nobr="true">
		<td colspan="5">Tidak Ada Data</td>
		</tr>';
		$Paging = "";
	}else{
		$no = 1 ;
		foreach ($Output['Data'] as $index => $value) {
			$rHtml2.= 	'
			<tr>
			<td>'. $no .'</td>
			<td> <a style="color:black">'.$value['no_keluaran'].'</a></td>
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
	$rHtml2 .= "<tr><td colspan='10' class='text-center'><span class='label label-warning label-form'>".$Output->ErrMessage."</span></td></tr>";
	$Paging = "";
}
$rHtml2.="</table>" ;

// $pdf->writeHTML($rHtml2, true, false, false, false, '');

//Close and output PDF document

// if($this->uri->segment(2)=="pdf_periode"){
// 	$pdf->Output("Laporan Barang Periode ".$this->input->get('awal')." - ".$this->input->get('akhir').".pdf", 'I');
// }else $pdf->Output('Laporan Per Barang ('.date("d M Y").').pdf', 'I');


// echo json_encode($rHtml) ;
//============================================================+
// END OF FILE
//============================================================+
?>


<!DOCTYPE html>
 <html>
 <head>
     <title>Stok Laporan</title>
     <style type="text/css">
         /* Styles go here */

.page-header, .page-header-space {
  height: 10mm;
}

.page-footer, .page-footer-space {
  height: 10mm;

}

.hidden{
	display:none
}

.page-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
 /* border-top: 1px solid black;  for demo */
  /* background: white; for demo */
}

.page-header {
  position: fixed;
  top: 0mm;
  width: 100%;
  /* border-bottom: 1px solid black; for demo */
 /*  background: white; for demo */
}
 center table {
	width: 100%
}
.page {
    page-break-after: always;
}
table.report body tr:last-child {
			border : 1px white solid ;
			border-bottom:1px black solid ;
		}
@media print 
        {
            .wrapper { page-break-inside:avoid; }
            table { page-break-inside:auto }
            tr    { page-break-inside:avoid; page-break-after:auto }
            thead { display:table-header-group }
            tfoot { display:table-footer-group }
           
           @page { 
                size: a4;
                /*margin: 20mm 20mm 10mm 20mm;*/
                /*margin: 2cm ;*/
            }
            body {
               
            }
			.wadwa{
				display:none
			}
			
			
	        @page table.report body tr:last-child {
				border : 1px white solid ;
				border-bottom:1px black solid ;
			}

        }  
     </style>
     
 </head>
 <body>
	
  <div class="page-header" style="text-align: center">
		<button class="wadwa" style="margin:20px"> Print </button>  
  </div>

  <div class="page-footer">
  </div>

  <table align="center" style="min-width:660px ; max-width: 660px">

    <thead>
      <tr>
        <td>
          <!--place holder for the fixed-position header-->
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <!--*** CONTENT GOES HERE ***-->
          <div class="page">
		  
		  
					<center>
			
            <table style="text-align:center ; font-size:11px ; min-width:660px">
                <tbody>
                    <tr>
                        <td width="20%" align="left">
                            <img style="max-width:120px" align="left" src="<?= base_url() ?>/file/2019.08.20_10.32.51.5d5b69e32b922.jpg" height="108px">
                        </td>
                        <td width="65%">
                            <span style="text-transform: uppercase;font-size:15px">Pemerintah Provinsi Jawa Timur</span>
                            <br>
                            <span style="font-size:15px;text-transform: uppercase;">DINAS PENDIDIKAN</span>
                            <br>
                            <b style="font-size:15px;text-transform: uppercase;">SEKOLAH MENENGAH KEJURUAN NEGERI 4</b>
                            <br>
                            <b style="font-size:15px;text-transform: uppercase;letter-spacing: 3px;">MALANG</b>
                            <br>
                            <span style="text-transform: capitalize;">Jl. Tanimbar No 22 Malang 65117 , telp: 0341-353798, fax: 0341-363099</span>
                            <br>
                            <span>http://www.smkn4malang.sch.id , email: mail@smkn4malang.sch.id</span>
                        </td>
                        <td valign="bottom" width="15%">
                            <span style="text-align:right">KodePos: 65117</span>
                        </td>
                    </tr>
                </tbody>

            </table>
            <hr style="height:4px ; background-color:black ; margin:0px">
            <hr style="height:1px ; background-color:black ;margin:0px">
            	<table cellpadding="4">
            <tbody>
                <tr>
                    <td width="50%" valign="top" rowspan="3"><?= $date ?></td>
                    <td width="25%" style="vertical-align:bottom">&nbsp;</td>
                    <td valign="top" width="25%" rowspan="3">
                        <table border="1" style="border-collapse:collapse; font-size:10px">
                            <tbody>
                                <tr>
                                    <td width="40%"><b>No. Dok</b></td>
                                    <td width="60%"><b>CM-7.4-1/SP/03</b></td>
                                </tr>
                                <tr>
                                    <td><b>Revisi</b></td>
                                    <td><b>1</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

            	<?= $tbl.$rHtml.$rHtml2 ?>
			</center> 
		  </div>
        </td>
      </tr>
    </tbody>

    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="page-footer-space"></div>
        </td>
      </tr>
    </tfoot>

  </table>
	<script>
		function S(selector){
			return document.querySelector(selector) ;
		}
		S(".wadwa").addEventListener("click",function(){
			
			window.print();
			 
		})
	</script>
</body>
 </html>
