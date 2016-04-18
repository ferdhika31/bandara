<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class Auth extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-03-26 16:10:29
	**/

	function __construct(){
		parent::__construct();

		if($this->session->userdata('isLogin')){
			redirect('admin');
		}

		$this->load->library('form_validation');
		$this->load->model('m_auth');
	}

	public function index(){
		$this->global_data['title'] = "Masuk";

		// Pesan
		$this->global_data['message'] = $this->session->flashdata('message');

		// Validasi
		$this->form_validation->set_rules('A_uname', 'Username', 'required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('A_pass', 'Password', 'required');

		if($this->form_validation->run() == true){
			$uname = $this->input->post('A_uname');
			$pass = $this->input->post('A_pass');

			$masuk = $this->m_auth->masuk($uname,$pass);

			if(!empty($masuk)){
				$cek = $this->m_auth->tampilSatuUser($uname);
				// Set session
				$this->session->set_userdata(array(
					'isLogin'   => TRUE,
					'hak'		=> $cek['hak'],
					'uname'  	=> $uname,
				));
				// cek permission
				// if($cek['hak']=='admin'){
				// 	redirect('admin');
				// }else{
				// 	redirect('operator');
				// }
				redirect('admin');
			}else{
				$this->global_data['message'] = "Gagal login";
			}
		}else{
			// Pesan validasi
			$this->global_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		}

		$this->load->view('login',$this->global_data);
	}

}