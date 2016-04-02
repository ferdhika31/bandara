<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class Pesawat extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-04-01 22:27:05
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

		$this->load->library('form_validation');
	}

	public function index(){
		// Title
		$this->global_data['title'] = "Pesawat";

		// Pesan
		$this->global_data['message'] = $this->session->flashdata('message');

		$this->global_data['list'] = $this->m_admin->tampilPesawat();

		$this->tampilan('pesawat/list');
	}

	public function tambah(){
		// Title
		$this->global_data['title'] = "Tambah Pesawat";

		// Pesan
		$this->global_data['message'] = $this->session->flashdata('message');

		// Validasi
		$this->form_validation->set_rules('A_kode', 'Kode', 'required|min_length[4]|max_length[10]');
		$this->form_validation->set_rules('A_nama', 'Nama', 'required|min_length[4]|max_length[20]');

		if($this->form_validation->run()){
			$kode = $this->input->post('A_kode');
			$nama = $this->input->post('A_nama');
			$image = $this->input->post('A_image');
			$status = $this->input->post('A_stt');

			$this->m_admin->tambahPesawat(array($kode, $nama, $image, $status));
			$this->session->set_flashdata('message','Berhasil menambahkan.');
			redirect("admin/pesawat");
		}else{
			// Pesan validasi
			$this->global_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		}

		$this->tampilan('pesawat/form');
	}

	public function ubah($id=0){
		if(!empty($id)){
			$dataPesawat = $this->m_admin->ambilSatuPesawat($id);

			($dataPesawat['kode_pesawat']==NULL) ? redirect('admin/pesawat') : '';

			// Title
			$this->global_data['title'] = "Ubah Pesawat ".$dataPesawat['nama_maskapai']."-".$dataPesawat['kode_pesawat'];

			// Pesan
			$this->global_data['message'] = $this->session->flashdata('message');

			// Data
			$this->global_data['data'] = $dataPesawat;

			// Validasi
			$this->form_validation->set_rules('A_kode', 'Kode', 'required|min_length[4]|max_length[10]');
			$this->form_validation->set_rules('A_nama', 'Nama', 'required|min_length[4]|max_length[20]');
		
			// Action ubah
			if($this->form_validation->run()){

				$kode = $this->input->post('A_kode');
				$nama = $this->input->post('A_nama');
				$image = $this->input->post('A_image');
				$status = $this->input->post('A_stt');

				$this->m_admin->ubahPesawat(array($kode, $nama, $image, $status), $id);
				$this->session->set_flashdata('message','Berhasil mengubah data : '.$dataPesawat['nama_maskapai'].'-'.$dataPesawat['kode_pesawat']);
				redirect("admin/pesawat");
			}else{
				// Pesan validasi
				$this->global_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			}

			$this->tampilan('pesawat/form');
		}
	}

	public function hapus($id=0){
		if(!empty($id)){
			$this->m_admin->hapusPesawat($id);
			$this->session->set_flashdata('message','Berhasil menghapus.');
			redirect("admin/pesawat");
		}
	}
}