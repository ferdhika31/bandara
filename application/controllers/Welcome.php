<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class Welcome extends Main {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('m_main');

		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache"); 
	}

	public function index(){
		$this->global_data['title'] = "Jadwal Penerbangan";

		$data = $this->m_main->tampilJadwal();

		$resData = array();

		foreach ($data as $res) {
			$kode_pesawat = $res['kode_pesawat'];

			$maskapai = $this->m_main->tampilSatuPesawat($kode_pesawat);
			if($maskapai){
				$resData[] = array(
					'kode_pesawat'	=> $kode_pesawat,
					'nama_maskapai' => $maskapai['nama_maskapai'],
					'tujuan'		=> $res['tujuan'],
					'waktu'			=> $res['waktu'],
					'desk'			=> $res['desk'],
					'keterangan'	=> $res['keterangan'],
				);
			}
		}
		
		$this->global_data['daftar'] = $resData;

		$this->tampilan('welcome_message');
	}

	public function data(){
		$data = $this->m_main->tampilJadwal();

		$resData = array();

		foreach ($data as $res) {
			$kode_pesawat = $res['kode_pesawat'];

			$maskapai = $this->m_main->tampilSatuPesawat($kode_pesawat);
			if($maskapai){
				$waktu = $res['waktu'];

				$datetime1 = strtotime(date("H:i"));
				$datetime2 = strtotime($waktu);

				$interval  = abs($datetime2 - $datetime1);
				$minutes   = round($interval / 60);

				// echo 'Diff. in minutes is: '.$minutes.'<br>'; 
				// $datetime1<=$datetime2 || 
				if($datetime1<=$datetime2 && $minutes<=$this->config->item('jedaJadwal')){
					// echo $maskapai['nama_maskapai']." - ".$waktu.'-'.$minutes."<br>";
					$resData[] = array(
						'kode_pesawat'	=> $kode_pesawat,
						'nama_maskapai' => $maskapai['nama_maskapai'],
						'tujuan'		=> $res['tujuan'],
						'waktu'			=> $waktu,
						'desk'			=> $res['desk'],
						'keterangan'	=> $res['keterangan'],
					);
				}
			}
		}

		echo json_encode($resData);
	}

	public function getSelisih(){
		@$waktu = $this->input->get("waktu");

		$datetime1 = strtotime(date("H:i"));
		$datetime2 = strtotime($waktu);

		$interval  = abs($datetime2 - $datetime1);
		$minutes   = round($interval / 60);
		// echo 'Diff. in minutes is: '.$minutes; 

		$json = array('stt'=>false);

		if($datetime1<=$datetime2 || $minutes<=30){
			$json = array('stt'=>true);
		}

		echo json_encode($json);
	}
}
