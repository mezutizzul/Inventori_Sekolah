<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH."/third_party/phpexcel/PHPExcel.php";
require_once APPPATH."/third_party/phpexcel/PHPExcel/IOFactory.php";


class File extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function UploadFile($args) {
		$data = base64_decode($args["FileBase64"]);
		$name_file = date("Y.m.d_H.i.s.").uniqid().".".$args["FileExtension"];
 
		$success = file_put_contents("file/".$name_file, $data);

		if($success){
			$return_data["IsError"]	= false;
			$return_data["Output"] 	= $name_file;
		} else {
			$return_data["IsError"] = true;
			$return_data["ErrorMessage"] = "File gagal disimpan";
		}
		return ($return_data);
	}

	public function ExcelReader($param) {
		// Get Config
		if(!preg_match("!([\d+]|)(.*)!", $param["ExcelPath"])) {
			$result = $this->Func->CreateArray(true, "Lokasi excel tidak valid. Mohon cek kembali. ([\d+]|)(.*)");
			goto ResultData;
		}
		if(empty($param["Sheet"])) {
			$param["Sheet"] = 1;
		}
		if(!is_numeric($param["Sheet"])) {
			$result = $this->Func->CreateArray(true, "Sheet wajib numeric. ([\d+]|)(.*)");
			goto ResultData;
		}

        $FilePath = "file/".$param['file'];

        $param["Sheet"] = 0;
        $result = $this->ReadExcel($FilePath, $param["Sheet"]);

        ResultData:
        return $result;
	}

	private function ReadExcel($path, $sheet) {
		try {
			$PHPExcel = PHPExcel_IOFactory::load($path);
			$PHPExcel->setActiveSheetIndex($sheet);

			$DateSheet  = $PHPExcel->getActiveSheet()->toArray(null,true,true,true);
			$ArrayCount = count($DateSheet);
			$Temp		= [];

			$n = 0;
			$show_column = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"];
			for($i = 2; $i <= $ArrayCount; $i++){
				foreach ($show_column as $value) {
					if(!empty($DateSheet[$i][$value])) {
						if(!empty($DateSheet[1][$value])) $Temp[$n][$DateSheet[1][$value]] = $DateSheet[$i][$value];
					}
				}
				$n++;
			}
			$Temp = $this->Func->CreateArray(false, $Temp);
		} catch(Exception $e) {
			$Temp = $this->Func->CreateArray(true, $e->getMessage());
		}
		return $Temp;
	}

}

