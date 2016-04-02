<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-03-26 16:42:21
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

	public function tampilUser(){
		// Baris dibaca
		$startRow = 2;

		try{
            $inputFileType = IOFactory::identify($this->file);
            $objReader = IOFactory::createReader($inputFileType);
            $this->objPHPExcel = $objReader->load($this->file);
        } catch (Exception $ex) {
            die("Tidak dapat mengakses file ".$ex->getMessage());
        }

		$sheet = $this->objPHPExcel->getSheet($this->tb_user);
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

		return $isiData;
	}

	public function tampilSatuUser($username, $strict = false){
		$data = $this->tampilUser();
		$isiData = array();

		foreach ($data as $item => $value) {
			if (($strict ? $value['username'] === $username : $value['username'] == $username) || (is_array($value['username']) && $this->tampilSatuUser($username, $value['username'], $strict))) {
				$isiData = array(
					'username'		=> $value['username'],
					'password'		=> $value['password'],
					'nama'			=> $value['nama'],
					'hak'			=> $value['hak']
				);
			}
		}

		return $isiData;
	}

	private function cek($keyword, $data, $field, $strict = false) {
		foreach ($data as $item => $value) {
			if (($strict ? $value[$field] === $keyword : $value[$field] == $keyword) || (is_array($value[$field]) && $this->cek($keyword, $value[$field], $strict))) {
				return true;
			}
		}

		return false;
	}

	public function masuk($username="",$password=""){
		$uname = $this->cek($username, $this->tampilUser(),'username') ? true : false;
		$pass = $this->cek($password, $this->tampilUser(),'password') ? true : false;

		if($uname && $pass){
			return true;
		}else{
			return false;
		}
	}

	public function tambahUser($data=array()){
		$query = $this->db->insert($this->tb_user,$data);
		return $query;
	}

	public function ubahUser($data=array(),$id=array()){
		$query = $this->db->update($this->tb_user,$data,$id);
		return $query;
	}

}