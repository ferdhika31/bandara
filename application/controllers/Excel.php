<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class Excel extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-03-28 19:03:14
	**/

	function __construct(){
		parent::__construct();
		$this->load->library('phpexcel');
		$this->load->library('PHPExcel/iofactory');
        $this->load->library('tools');
	}

	public function index(){
		$objPHPExcel = new PHPExcel();

		$file = './data.xlsx';
		$startRow = 2;

		try{
            $inputFileType = IOFactory::identify($file);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($file);
        } catch (Exception $ex) {
            die("Tidak dapat mengakses file ".$ex->getMessage());
        }

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		$isiData = array();

		for($row = $startRow; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
			$isiData[] = array(
				'username'		=> $rowData[0][0],
				'password'		=> $rowData[0][1],
				'nama'			=> $rowData[0][2],
				'hak'			=> $rowData[0][3]
			);
		}

		// $sheet->setCellValue('G6', '=VLOOKUP(A2;pesawat!A2:C5;2)');

        echo "Username : ".$isiData[1]['username']."<br>";
        echo "Password : ".$isiData[1]['password']."<br>";
        echo "Hak : ".$isiData[1]['hak']."<br>";
        echo $highestRow;

		// echo $this->in_array_r("ferdhika", $isiData) ? 'ketemu' : 'ga ketemu';
        // echo $sheet->getCell('G6')->getFormattedValue();
        // var_dump($rowd);
	}

	public function test(){
        $adaw = $this->tools->exportdata('client','Mamas','adaw','adaw','./');
        if($adaw){
            print("Berhasil");
        }else{
            print("arg");
        }
    }

	public function tambah(){
		$objPHPExcel = new PHPExcel();
		$file = './data.xlsx';

		try{
            $inputFileType = IOFactory::identify($file);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($file);
        } catch (Exception $ex) {
            die("Tidak dapat mengakses file ".$ex->getMessage());
        }

        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow = $sheet->getHighestRow()+1;
        $highestColumn = $sheet->getHighestColumn();
        // $sheet = $objPHPExcel->getActiveSheet();

		// $sheet->setCellValueByColumnAndRow("A", 1, "Hello world"); 

		// $adw = $objPHPExcel->getActiveSheet()->getCell('B8')->getValue();
		// $objPHPExcel->getActiveSheet()->setCellValue('B8', 'Some value');
		$objPHPExcel->getActiveSheet()->removeRow(5);
		// $objPHPExcel->getActiveSheet()->setCellValue("A".$highestRow, 'user');
		// $objPHPExcel->getActiveSheet()->setCellValue("B".$highestRow, '123');
		// $objPHPExcel->getActiveSheet()->setCellValue("C".$highestRow, 'User');
		// $objPHPExcel->getActiveSheet()->setCellValue("D".$highestRow, 'operator');

		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');

		$objWriter->save($file);

        echo "A".$highestRow;
	}

	private function in_array_r($needle, $haystack, $strict = false) {
		foreach ($haystack as $item => $value) {
			// echo "string ".$value['username'];
			if (($strict ? $value['username'] === $needle : $value['username'] == $needle) || (is_array($value['username']) && $this->in_array_r($needle, $value['username'], $strict))) {
				return true;
			}
		}

		return false;
	}

}