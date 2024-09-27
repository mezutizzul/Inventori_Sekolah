<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
	function __construct()
	{
		parent::__construct();
	}

	public function Header() {
        if ($this->page == 1) {

            $this->SetFont('times');
            $txt = '
                    <table  style="text-align:center">
                        <tr>
                            <td width="20%" rowspan="6" align="left">
                                <img style="max-width:120px" align="left" src="'.base_url("/file/2019.08.20_10.32.51.5d5b69e32b922.jpg").'" height="108px"/>
                            </td>
                            <td width="65%">
                                <span style="text-transform: uppercase;font-size:15px">Pemerintah Provinsi Jawa Timur</span>
                            </td>
                            <td width="15%"></td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-size:15px;text-transform: uppercase;">DINAS PENDIDIKAN</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <b style="font-size:15px;text-transform: uppercase;">SEKOLAH MENENGAH KEJURUAN NEGERI 4</b>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <b style="font-size:15px;text-transform: uppercase;letter-spacing: 3px;">MALANG</b>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <span style="text-transform: capitalize;">Jl. Tanimbar No 22 Malang 65117 , telp: 0341-353798, fax: 0341-363099</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <span>http://www.smkn4malang.sch.id , email: mail@smkn4malang.sch.id</span>
                            </td>
                            <td>
                                <span style="text-align:right">KodePos: 65117</span>
                            </td>
                        </tr>
                    </table>
                ' ;
            $this->writeHTML($txt, true, false, false, false, '');
        }
    }
    public function Footer() {
         // Membuat posisi footer pada 15 mm dari bawah
        $this->SetY(-15);
        // menentukan tulisan miring dan ukuran font 8
        $this->SetFont('helvetica', 'I', 8);
        // menampilkan nomor halaman
        $this->Cell(0, 10, $this->getAliasNumPage(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    function garis(){
        $this->SetLineWidth(1);
        $this->Line(15,36,195,36);
        $this->SetLineWidth(0);
        $this->Line(15,37,195,37);
    }
}
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */