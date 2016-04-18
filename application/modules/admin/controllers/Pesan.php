<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class Pesan extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-04-04 00:54:18
	**/

	function __construct(){
		parent::__construct();
		// Redirect ke halaman auth kalo belum login
		if(!$this->session->userdata('isLogin')){
			redirect('auth');
		}

		$this->load->library('form_validation');
		$this->load->helper('tgl_indonesia');
	}

	public function index(){
		// Title & desc
		$this->global_data['title'] = "Pesan";
		$this->global_data['description'] = "kirim/terima pesan";
		$this->global_data['menu'] = "pesan";

		// Pesan
		$this->global_data['message'] = $this->session->flashdata('message');

		$this->global_data['inbox'] = $this->m_admin->ambilPesanBy('inbox',$this->session->userdata('uname'));
		$this->global_data['sent'] = $this->m_admin->ambilPesanBy('sent',$this->session->userdata('uname'));

		$this->tampilan('pesan/inbox');
	}

	public function sent(){
		// Title & desc
		$this->global_data['title'] = "Pesan";
		$this->global_data['description'] = "kirim/terima pesan";
		$this->global_data['menu'] = "pesan";

		$this->global_data['inbox'] = $this->m_admin->ambilPesanBy('inbox',$this->session->userdata('uname'));
		$this->global_data['sent'] = $this->m_admin->ambilPesanBy('sent',$this->session->userdata('uname'));

		$this->tampilan('pesan/sent');
	}

	public function kirim(){
		// Validasi
		$this->form_validation->set_rules('A_ke', 'User', 'required|min_length[3]');
		$this->form_validation->set_rules('A_pesan', 'Pesan', 'required|min_length[10]|max_length[140]');

		if($this->form_validation->run()){
			$ke = $this->input->post('A_ke');
			$pesan = $this->input->post('A_pesan');

			$pecah = explode(',', $ke);

			foreach ($pecah as $value) {
				$this->m_admin->tambahPesan(array(
					$this->session->userdata('uname'),
					$value,
					$pesan,
					date('Y-m-d h:i:s'),
					'send',
					'yes'
				));
			}
			$this->session->set_flashdata('message',"Berhasil mengirim pesan ke : ".$ke);
		}else{
			$this->session->set_flashdata('message',(validation_errors()) ? validation_errors() : $this->session->flashdata('message'));
		}
		redirect("admin/pesan");
	}

	public function getUser(){
		$data = $this->m_auth->tampilUser();

		$res = array();

		foreach ($data as $data) {
			if($data['username']!=$this->session->userdata('uname')){
				$res[] = array(
					'username' => $data['username']
				);
			}
		}

		echo json_encode($res);
	}

}