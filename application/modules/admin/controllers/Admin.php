<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class Admin extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-03-26 17:25:58
	**/

	function __construct(){
		parent::__construct();
		// Redirect ke halaman auth kalo belum login
		if(!$this->session->userdata('isLogin')){
			redirect('auth');
		}

		$this->load->model('m_main');
	}

	public function coba(){
		var_dump($this->m_admin->cariJadwal('GI009','NUSAWIRU','08:0'));
	}

	public function index(){
		// Title & desc
		$this->global_data['title'] = "Dashboard";
		$this->global_data['description'] = "dashboard";
		$this->global_data['menu'] = "dashboard";

		$this->global_data['listUser'] = $this->m_auth->tampilUser();
		$this->global_data['listPesawat'] = $this->m_admin->tampilPesawat();
		$this->global_data['inbox'] = $this->m_admin->ambilPesanBy('inbox',$this->session->userdata('uname'));

		$data = $this->m_main->tampilJadwal();
		$count=0;
		foreach ($data as $res){
			$waktu = $res['waktu'];

			$datetime1 = strtotime(date("H:i"));
			$datetime2 = strtotime($waktu);

			$interval  = abs($datetime2 - $datetime1);
			$minutes   = round($interval / 60);

			if($datetime1<=$datetime2 && $minutes<=$this->config->item('jedaJadwal')){
				$count++;
			}
		}

		$this->global_data['jadwal'] = ($this->session->userdata('hak')=='operator')?$count:count($data);

		$this->tampilan('dashboard');
	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}