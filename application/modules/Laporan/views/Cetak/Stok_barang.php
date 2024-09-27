<?php   		
	// $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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

	// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	//     require_once(dirname(__FILE__).'/lang/eng.php');
	//     $pdf->setLanguageArray($l);
	// }

	// $pdf->AddPage("p","A4"); 
	// $pdf->garis();
	// $pdf->SetFont('times', '', 11);
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
		<table  border="1" style="border-collapse:collapse" class="report">
		<thead>
			<tr>
				<th align="center" width="5%"><B>No</B></th>
				<th width="20%"><B>Nama</B></th>
				<th width="15%"><B>Kode</B></th>
				<th style="text-align: center;" width="15%"><B>Stok Awal</B></th>
				<th style="text-align: center;" width="15%"><B>Stok Masuk</B></th>
				<th style="text-align: center;" width="15%"><B>Stok Keluar</B></th>
				<th style="text-align: center;" width="15%"><B>Total Barang</B></th>
			</tr>
		</thead>
		<tbody>
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
		</tbody>
		</table>
		<table  border="0" style="font-size:14px" align="center" rules="rows">
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
	';
	// $pdf->Write(11, "", '', 0, 'C', true, 0, false, false, 0);
	// $pdf->writeHTML($txt, true, false, false, false, '');
	// $pdf->Output($fileNL, 'F');
	// $pdf->Output("Laporan_per_barang_masuk.pdf");
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
  /* background: yellow; for demo */
}

.page-header {
  position: fixed;
  top: 0mm;
  width: 100%;
  /* border-bottom: 1px solid black; for demo */
 /*  background: yellow; for demo */
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
			
            <table style="text-align:center ; font-size:11px ; min-width:660px ; max-width: 660px">
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
            <width="100" height="75">
                </hr>
                <table cellpadding="4">
                    <tbody>
                        <tr>
                            <td width="25%" rowspan="3">&nbsp;</td>
                            <td width="50%" style="vertical-align:bottom">&nbsp;</td>
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
                        <tr>
                            <td width="50%" style="text-align:center ;">
                                <b>LAPORAN STOK BARANG / BAHAN / ALAT</b>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="vertical-align:bottom"></td>
                        </tr>
                    </tbody>
                </table>
                <table style="font-size:12px">
                    <tbody>
                        <tr>
                            <td width="50%">
                                <table width="100%" style="">
                                    <tbody>
                                        <tr>
                                            <td width="20%"></td>
                                            <td width="5%" align="center"></td>
                                            <td width="75%"></td>
                                        </tr>
                                        <tr>
                                            <td width="20%"></td>
                                            <td width="5%" align="center"></td>
                                            <td width="75%" align="right">Tanggal : <?= date("d m Y H:i") ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table  border="1" style="border-collapse:collapse" class="report">
                    <thead>
						<tr style="border-top:1px black solid ;border-bottom:1px black solid">
                            <th align="center" width="5%"><b>No</b></th>
                            <th  style="width:141px"><b>Nama</b></th>
                            <th width="=105"><b>Kode</b></th>
                            <th style="text-align: center;" width="105"><b>Stok Awal</b></th>
                            <th style="text-align: center;" width="105"><b>Stok Masuk</b></th>
                            <th style="text-align: center;" width="105"><b>Stok Keluar</b></th>
                            <th style="text-align: center;" width="105"><b>Total Barang</b></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                    		foreach ($list as $key => $value) {
								echo '
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
                    	?>
                    </tbody>
                </table>
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