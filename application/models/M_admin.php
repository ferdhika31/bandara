<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-03-26 17:53:08
	**/

	function __construct(){
		parent::__construct();
		// tambah library phpexcel
		$this->load->library('phpexcel');
		$this->load->library('PHPExcel/iofactory');

		$this->tb_user = 0;
		$this->tb_pesawat = 1;
		$this->tb_jadwal = 2;
		$this->tb_pesan = 3;

		$this->objPHPExcel = new PHPExcel();
		$this->file = './data.xlsx';
	}

	private function bukaFile(){
		try{
            $inputFileType = IOFactory::identify($this->file);
            $objReader = IOFactory::createReader($inputFileType);
            $this->objPHPExcel = $objReader->load($this->file);
        } catch (Exception $ex) {
            die("Tidak dapat mengakses file ".$ex->getMessage());
        }
	}

	/* Pesawat */
	public function tampilPesawat(){
		// Baris dibaca
		$startRow = 2;

		$this->bukaFile();

		$sheet = $this->objPHPExcel->getSheet($this->tb_pesawat);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		$isiData = array();
		$index = $startRow;

		for($row = $startRow; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
			if(!empty($rowData[0][0])){
				$isiData[] = array(
					'index'				=> $index,
					'kode_pesawat'		=> $rowData[0][0],
					'nama_maskapai'		=> $rowData[0][1],
					'image'				=> $rowData[0][2],
					'status'			=> $rowData[0][3]
				);
			}
			$index++;
		}

		return $isiData;
	}

	public function ambilSatuPesawat($baris=0){
		$this->bukaFile();

		$row = $this->objPHPExcel->getActiveSheet()->getRowIterator($baris)->current();

		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(false);

		$isiData = array();

		foreach ($cellIterator as $cell){
			array_push($isiData,$cell->getValue());
		}

		$index = (!empty($isiData[0])) ? $baris : null;

		$isiData = array(
			'index'				=> $index,
			'kode_pesawat'		=> $isiData[0],
			'nama_maskapai'		=> $isiData[1],
			'image'				=> $isiData[2],
			'status'			=> $isiData[3]
		);

		return $isiData;
	}
	
	public function tambahPesawat($insert=array()){
		$this->bukaFile();

        $sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_pesawat);
        $lastRow = $sheet->getHighestRow()+1;

        $this->objPHPExcel->getActiveSheet()->setCellValue("A".$lastRow, $insert[0]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("B".$lastRow, $insert[1]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("C".$lastRow, $insert[2]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("D".$lastRow, $insert[3]);

        $objWriter = IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		$objWriter->save($this->file);
	}

	public function ubahPesawat($insert=array(),$baris){
		$this->bukaFile();

        $sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_pesawat);
        $lastRow = $baris;

        $this->objPHPExcel->getActiveSheet()->setCellValue("A".$lastRow, $insert[0]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("B".$lastRow, $insert[1]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("C".$lastRow, $insert[2]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("D".$lastRow, $insert[3]);

        $objWriter = IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		$objWriter->save($this->file);
	}

	public function hapusPesawat($baris=0){
		$this->bukaFile();

        $sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_pesawat);
        $row = $baris;

        $this->objPHPExcel->getActiveSheet()->removeRow($row);

        $objWriter = IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		$objWriter->save($this->file);

	}
}