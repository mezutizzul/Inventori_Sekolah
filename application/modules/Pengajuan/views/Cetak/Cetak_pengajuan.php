<?php   	
	
	// class Data_pdf extends Pdf
	// {
	// 	function __construct()
	// 	{
	// 		parent::__construct();
	// 	}

	// 	public function Header() {
	//         if ($this->page == 1) {

	//             $this->SetFont('times');
	//             $txt = '
	//                     <table  style="text-align:center">
	//                         <tr>
	//                             <td width="20%" rowspan="6" align="left">
	//                                 <img style="max-width:120px" align="left" src="'.base_url("/assets/s.png").'" height="108px"/>
	//                             </td>
	//                             <td width="65%">
	//                                 <span style="text-transform: uppercase;font-size:15px">Pemerintah Provinsi Jawa Timur</span>
	//                             </td>
	//                             <td width="15%" rowspan="6" align="right">
	//                                 <img style="max-width:120px" align="left" src="'.base_url("/assets/img/logo.png").'" height="108px"/>
	//                             </td>
	//                         </tr>
	//                         <tr>
	//                             <td>
	//                                 <span style="font-size:15px;text-transform: uppercase;">DINAS PENDIDIKAN</span>
	//                             </td>
 // 	                        </tr>
	//                         <tr>
	//                             <td>
	//                                 <b style="font-size:15px;text-transform: uppercase;">SEKOLAH MENENGAH KEJURUAN NEGERI 4</b>
	//                             </td>
 // 	                        </tr>
	//                         <tr>
	//                             <td>
	//                                 <b style="font-size:15px;text-transform: uppercase;letter-spacing: 3px;">MALANG</b>
	//                             </td>
 // 	                        </tr>
	//                         <tr>
	//                             <td>
	//                                 <span style="text-transform: capitalize;">Jl. Tanimbar No 22 Malang 65117 , telp: 0341-353798, fax: 0341-363099</span>
	//                             </td>
 // 	                        </tr>
	//                         <tr>
	//                             <td>
	//                                 <span>http://www.smkn4malang.sch.id , email: mail@smkn4malang.sch.id</span>
	//                             </td>
	//                         </tr>
	//                     </table>
	//                 ' ;
	//             $this->writeHTML($txt, true, false, false, false, '');
	//         }
	//     }
	//     public function Footer() {
	       
	//     }

	//     function garis(){
	//         $this->SetLineWidth(1);
	//         $this->Line(15,36,283,36);
	//         $this->SetLineWidth(0);
	//         $this->Line(15,37,283,37);
	//     }
	//     function rupiah($angka){
	
	// 		$hasil_rupiah = "Rp " . number_format($angka,0,'','.');
	// 		return $hasil_rupiah;
		 
	// 	}
	// }

	function rupiah($angka){
	
		$hasil_rupiah = "Rp " . number_format($angka,0,'','.');
		return $hasil_rupiah;
	 
	}


	// $pdf = new Data_pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// $pdf->SetCreator(PDF_CREATOR);
	// $pdf->SetAuthor('Thaariq');
	// $pdf->SetTitle('Laporan');
	// $pdf->SetSubject('Laporan');
	// $pdf->SetKeywords('Laporan');
	// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

	// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	// // $pdf->set_pdf = $setting ;
	// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	//     require_once(dirname(__FILE__).'/lang/eng.php');
	//     $pdf->setLanguageArray($l);
	// }

	// $pdf->AddPage("L","A4"); 
	// $pdf->garis();
	// $pdf->SetFont('times', '', 11);
	
	$kabeng = [] ;
	$kaprokal = [] ;
	foreach ($user_jurusan[0] as $k => $x) {
		if(preg_match("/^k/", $k )){
			$y = str_replace("k_", "" , $k ) ;
			$kaprokal[$y] = $x ;
		}else {
			$kabeng[$k] = $x ;
		}
	}

	$txt ='
		<table>
			<tr>
				<td  width="100%"style="text-align:center ;"  colspan="2"><br><br>
					<b>PENGAJUAN BARANG / BAHAN / ALAT</b>
				</td>
			</tr>
			<tr>
				<td width="50%"style="text-align:left ;text-transform:uppercase">
					JURUSAN : '.$list[0]->jurusan.'
				</td>
				<td width="50%"style="text-align:right ;">
					Tanggal : '.date("d M Y H:i" ,strtotime($list[0]->tgl_pengajuan)).'
				</td>
			</tr>
		</table>
		
		<table  border="1" style="border-collapse:collapse" cellpadding="2" class="report">
			<thead>
			<tr style="border:1px black solid">
                <th width="25%">Barang</th>
                <th width="20%">Spesifikasi</th>
                <th width="8%">Jumlah</th>
                <th width="8%">Satuan</th>
                <th width="14%">Harga Satuan</th>
                <th width="15%">Kegunaan</th>
                <th width="10%">Keterangan</th>
			</tr>
		</thead>
		<tbody>
		';
	foreach ($list as $key => $val) {
		$txt.= '
			<tr>
				<th align="left" style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="25%">&nbsp;
					'.$val->barang.'
				</th>
                <th align="left" style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="20%">
                	&nbsp;'.$val->spesifikasi.'
                </th>
                <th style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="8%">
                	&nbsp;'.$val->jumlah.'
                </th>
                <th style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="8%">
                	&nbsp;'.$val->satuan_barang.'
                </th>
                <th align="left" style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="14%">
                	 &nbsp;'.rupiah($val->harga_satuan).'
                 </th>
                <th align="left" style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="15%">
                	&nbsp;'.$val->kegunaan.'
                </th>
                <th align="left" style="border-top: 1px dashed #ddd; border-bottom:none; border-right:1px solid black" width="10%">
                	&nbsp;'.$val->keterangan.'
                </th>
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
		 <table class="table" align="center"  nobr="true">
            <tr>
                <th class="text-center">Mengetahui<br>
                	Kabeng '.$kabeng['jurusan'].'
                	<br>
                	<br>
                	<br>
                	<br>
                	<b>'.$kabeng['nama'].'</b><br>
                	NIP : '.$kabeng['nip'].'
                </th>
                <th class="text-center">Mengetahui<br>
                	Kaprokal '.$kaprokal['jurusan'].'
                	<br>
                	<br>
                	<br>
                	<br>
                	
                	<b>'.$kaprokal['nama'].'</b><br>
                	NIP : '.$kaprokal['nip'].'
                </th>
                <th class="text-center">Mengetahui<br>
                	Sarpras
                	<br>
                	<br>
                	<br>
                	<br>
                	<b>'.$user_wajib[1]->nama.'</b><br>
                	NIP. '.$user_wajib[1]->nama.'
                </th>
                <th class="text-center">Mengetahui<br>
                	Kepala Sekolah
                	<br>
                	<br>
                	<br>
                	<br>
                	<b>'.$user_wajib[0]->nama.'</b><br>
                	NIP. '.$user_wajib[0]->nip.'
                </th>
            </tr> 
    </table>
	';
	// $pdf->Write(11, "", '', 0, 'C', true, 0, false, false, 0);
	// $pdf->writeHTML($txt, true, false, false, false, '');
	// $pdf->Output($fileNL, 'F');
	// $pdf->Output("Penngajuan.pdf");
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
           	table.report tr td{
           		margin-left: 2px; 
           		margin-right: 2px; 
           	}

           @page { 
                size: a4 lenscape;
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

  <table align="center" style="min-width:260mm ; max-width: 260mm">

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
			

			 <?= '<table   style="text-align:center ; font-size:11px ; min-width:260mm">
                <tr>
                    <td width="20%" rowspan="6" align="left">
                        <img style="max-width:120px" align="left" src="'. base_url().'/file/2019.08.20_10.32.51.5d5b69e32b922.jpg'.'" height="108px"/>
                    </td>
                    <td width="65%">
                        <span style="text-transform: uppercase;font-size:15px">Pemerintah Provinsi Jawa Timur</span>
                    </td>
                    <td width="15%" rowspan="6" align="right">
                        <img style="max-width:120px" align="left" src="'.base_url("/assets/img/logo.png").'" height="108px"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-size:15px;text-transform: uppercase;">DINAS PENDIDIKAN</span>
                    </td>
                    </tr>
                <tr>
                    <td>
                        <b style="font-size:15px;text-transform: uppercase;">SEKOLAH MENENGAH KEJURUAN NEGERI 4</b>
                    </td>
                    </tr>
                <tr>
                    <td>
                        <b style="font-size:15px;text-transform: uppercase;letter-spacing: 3px;">MALANG</b>
                    </td>
                    </tr>
                <tr>
                    <td>
                        <span style="text-transform: capitalize;">Jl. Tanimbar No 22 Malang 65117 , telp: 0341-353798, fax: 0341-363099</span>
                    </td>
                    </tr>
                <tr>
                    <td>
                        <span>http://www.smkn4malang.sch.id , email: mail@smkn4malang.sch.id</span>
                    </td>
                </tr>
            </table>' ?>
            <hr style="height:4px ; background-color:black ; margin:0px">
            <hr style="height:1px ; background-color:black ;margin:0px">
            	<?= $txt ?>
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

			window.print();
			window.close();
			 
		function S(selector){
			return document.querySelector(selector) ;
		}
		S(".wadwa").addEventListener("click",function(){
			
		})
	</script>
</body>
 </html>