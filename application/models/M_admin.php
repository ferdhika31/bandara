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
		// $this->load->library('phpexcel');
		// $this->load->library('PHPExcel/iofactory');
		$this->load->file(APPPATH.'libraries/PHPExcel.php'); //full path to
		$this->load->file(APPPATH.'libraries/PHPExcel/IOFactory.php'); //full path to

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

	public function cariPesawat($kode_pesawat=null,$nama_maskapai=null){
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
				if($kode_pesawat==$rowData[0][0] && $nama_maskapai==$rowData[0][1]){
					$isiData[] = array(
						'index'				=> $index,
						'kode_pesawat'		=> $rowData[0][0],
						'nama_maskapai'		=> $rowData[0][1],
						'image'				=> $rowData[0][2],
						'status'			=> $rowData[0][3]
					);
				}
			}
			$index++;
		}

		return $isiData;
	}

	public function ambilSatuPesawat($baris=0){
		$this->bukaFile();

		$sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_pesawat);
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

	/* Jadwal Pesawat */
	public function cariJadwal($kode_pesawat=null,$tujuan=null,$waktu=null){
		// Baris dibaca
		$startRow = 2;

		try{
            $inputFileType = IOFactory::identify($this->file);
            $objReader = IOFactory::createReader($inputFileType);
            $this->objPHPExcel = $objReader->load($this->file);
        } catch (Exception $ex) {
            die("Tidak dapat mengakses file ".$ex->getMessage());
        }

		$sheet = $this->objPHPExcel->getSheet($this->tb_jadwal);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		$isiData = array();
		$index = $startRow;

		for($row = $startRow; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
			if(!empty($rowData[0][0])){
				if($kode_pesawat==$rowData[0][0] && $tujuan==$rowData[0][1] && $waktu==$rowData[0][2]){
					$isiData[] = array(
						'index'			=> $index,
						'kode_pesawat'	=> $rowData[0][0],
						'tujuan'		=> $rowData[0][1],
						'waktu'			=> $rowData[0][2],
						'desk'			=> $rowData[0][3],
						'keterangan'	=> $rowData[0][4],
					);
				}
			}
			$index++;
		}

		return $isiData;
	}

	public function ambilSatuJadwal($baris=0){
		$this->bukaFile();

		$sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_jadwal);
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
			'tujuan'			=> $isiData[1],
			'waktu'				=> $isiData[2],
			'desk'				=> $isiData[3],
			'keterangan'		=> $isiData[4]
		);

		return $isiData;
	}

	public function tambahJadwal($insert=array()){
		$this->bukaFile();

        $sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_jadwal);
        $lastRow = $sheet->getHighestRow()+1;

        $this->objPHPExcel->getActiveSheet()->setCellValue("A".$lastRow, $insert[0]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("B".$lastRow, $insert[1]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("C".$lastRow, $insert[2]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("D".$lastRow, $insert[3]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("E".$lastRow, $insert[4]);

        $objWriter = IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		$objWriter->save($this->file);
	}

	public function ubahJadwal($insert=array(),$baris){
		$this->bukaFile();

        $sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_jadwal);
        $lastRow = $baris;

        $this->objPHPExcel->getActiveSheet()->setCellValue("A".$lastRow, $insert[0]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("B".$lastRow, $insert[1]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("C".$lastRow, $insert[2]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("D".$lastRow, $insert[3]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("E".$lastRow, $insert[4]);

        $objWriter = IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		$objWriter->save($this->file);
	}

	public function ubahJadwalKeterangan($ket,$baris){
		$this->bukaFile();

        $sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_jadwal);
        $lastRow = $baris;

		$this->objPHPExcel->getActiveSheet()->setCellValue("E".$lastRow, $ket);

        $objWriter = IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		$objWriter->save($this->file);
	}

	/* Pesan */
	public function ambilPesanBy($type,$username){
		$startRow = 2;

		$this->bukaFile();

		$sheet = $this->objPHPExcel->getSheet($this->tb_pesan);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		$isiData = array();
		$index = $startRow;

		for($row = $startRow; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);

			$tipe = ($type=='inbox') ? $rowData[0][1] : $rowData[0][0]; // index[0][0] outbox

			if(!empty($rowData[0][0]) && $tipe==$username){
				$isiData[] = array(
					'index'		=> $index,
					'dari'		=> $rowData[0][0],
					'ke'		=> $rowData[0][1],
					'pesan'		=> $rowData[0][2],
					'waktu'		=> $rowData[0][3],
					'status'	=> $rowData[0][4],
					'read'		=> $rowData[0][5]
				);
			}
			$index++;
		}

		return $isiData;
	}

	public function tambahPesan($insert=array()){
		$this->bukaFile();

        $sheet = $this->objPHPExcel->setActiveSheetIndex($this->tb_pesan);
        $lastRow = $sheet->getHighestRow()+1;

        $this->objPHPExcel->getActiveSheet()->setCellValue("A".$lastRow, $insert[0]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("B".$lastRow, $insert[1]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("C".$lastRow, $insert[2]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("D".$lastRow, $insert[3]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("E".$lastRow, $insert[4]);
		$this->objPHPExcel->getActiveSheet()->setCellValue("F".$lastRow, $insert[5]);

        $objWriter = IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		$objWriter->save($this->file);
	}
}
