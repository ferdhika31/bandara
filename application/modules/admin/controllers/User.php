<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class User extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-04-04 00:19:41
	**/

	function __construct(){
		parent::__construct();
		// Redirect ke halaman auth kalo belum login
		if(!$this->session->userdata('isLogin')){
			redirect('auth');
		}
		// Hak akses user
		// if($this->session->userdata('hak')=='operator'){
		// 	redirect('operator');
		// }
	}

	public function index(){
		// Title & desc
		$this->global_data['title'] = "Pengguna";
		$this->global_data['description'] = "pengguna";
		$this->global_data['menu'] = "pengguna";

		$this->global_data['listUser'] = $this->m_auth->tampilUser();

		if($this->session->userdata("hak")=='admin'){
			$this->tampilan('user/list');
		}else{
			$this->tampilan('permission');
		}
	}

}