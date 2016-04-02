<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class User extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-03-26 17:47:17
	**/

	function __construct(){
		parent::__construct();
		// Redirect ke halaman auth kalo belum login
		if(!$this->session->userdata('isLogin')){
			redirect('auth');
		}
		// Hak akses admin
		if($this->session->userdata('hak')==1){
			redirect('admin');
		}

		$this->load->model('m_auth');
	}

	public function index(){
		$data = $this->m_auth->tampilSatuUser(array('id'=>$this->session->userdata('id_uname')));

		echo "Halo, ".$data['nama']." Alamat : ".$data['alamat'];
	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}