<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_main extends CI_Model {
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-03-29 14:26:29
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

	public function tampilJadwal(){
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

		for($row = $startRow; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
			$isiData[] = array(
				'kode_pesawat'	=> $rowData[0][0],
				'tujuan'		=> $rowData[0][1],
				'waktu'			=> $rowData[0][2],
				'desk'			=> $rowData[0][3],
				'keterangan'	=> $rowData[0][4],
			);
		}

		return $isiData;
	}

	/* Pesawat */

	public function tampilPesawat(){
		// Baris dibaca
		$startRow = 2;

		try{
            $inputFileType = IOFactory::identify($this->file);
            $objReader = IOFactory::createReader($inputFileType);
            $this->objPHPExcel = $objReader->load($this->file);
        } catch (Exception $ex) {
            die("Tidak dapat mengakses file ".$ex->getMessage());
        }

		$sheet = $this->objPHPExcel->getSheet($this->tb_pesawat);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		$isiData = array();

		for($row = $startRow; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
			$isiData[] = array(
				'kode_pesawat'		=> $rowData[0][0],
				'nama_maskapai'		=> $rowData[0][1],
				'image'				=> base_url('assets/pesawat/'.$rowData[0][2]),
				'status'			=> $rowData[0][3]
			);
		}

		return $isiData;
	}

	public function tampilSatuPesawat($kode_pesawat, $strict = false){
		$data = $this->tampilPesawat();
		$isiData = array();

		foreach ($data as $item => $value) {
			if (($strict ? $value['kode_pesawat'] === $kode_pesawat : $value['kode_pesawat'] == $kode_pesawat) || (is_array($value['kode_pesawat']) && $this->tampilSatuPesawat($kode_pesawat, $value['kode_pesawat'], $strict))) {
				$isiData = array(
					'kode_pesawat'		=> $value['kode_pesawat'],
					'nama_maskapai'		=> $value['nama_maskapai'],
					'image'				=> $value['image'],
					'status'			=> $value['status']
				);
			}
		}

		return $isiData;
	}
}	