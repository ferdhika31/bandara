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
		// Hak akses user
		if($this->session->userdata('hak')=='operator'){
			redirect('operator');
		}
	}

	public function index(){
		// Title
		$this->global_data['title'] = "Dashboard";

		$this->global_data['listUser'] = $this->m_auth->tampilUser();

		$this->tampilan('user/list');
	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}