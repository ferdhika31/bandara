<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Main.php");

class Jadwal extends Main{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-04-11 18:47:27
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

		$this->load->library('form_validation');
		$this->load->model('m_main');
	}

	public function index(){
		// Title
		$this->global_data['title'] = "Jadwal Pesawat";
		$this->global_data['description'] = "Data Jadwal Pesawat";
		$this->global_data['menu'] = "list_pesawat";

		// Pesan
		$this->global_data['message'] = $this->session->flashdata('message');

		// tampil jadwal
		$data = $this->m_main->tampilJadwal();

		$resData = array();

		foreach ($data as $res) {
			$kode_pesawat = $res['kode_pesawat'];

			$maskapai = $this->m_main->tampilSatuPesawat($kode_pesawat);
			// kalo ada data maskapai
			if($maskapai){
				$resData[] = array(
					'index'			=> $res['index'],
					'kode_pesawat'	=> $kode_pesawat,
					'nama_maskapai' => $maskapai['nama_maskapai'],
					'tujuan'		=> $res['tujuan'],
					'waktu'			=> $res['waktu'],
					'desk'			=> $res['desk'],
					'keterangan'	=> $res['keterangan'],
				);
			}
		}

		$this->global_data['list'] = $resData;

		$this->tampilan('jadwal/list');
	}

	public function tambah(){
		// Title
		$this->global_data['title'] = "Tambah Jadwal Pesawat";
		$this->global_data['description'] = "Tambah Jadwal Pesawat";
		$this->global_data['menu'] = "tambah_jadwal";

		// Pesan
		$this->global_data['message'] = $this->session->flashdata('message');

		// Data semua pesawat
		$this->global_data['dataPesawat'] = $this->m_main->tampilPesawat();

		// Validasi
		$this->form_validation->set_rules('A_pesawat', 'Pesawat', 'required|min_length[4]|max_length[10]');
		$this->form_validation->set_rules('A_tujuan', 'Tujuan', 'required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('A_waktu', 'Waktu', 'required|min_length[4]|max_length[5]');

		if($this->form_validation->run()){
			$pesawat = $this->input->post('A_pesawat');
			$tujuan = $this->input->post('A_tujuan');
			$waktu = $this->input->post('A_waktu');
			$keterangan = $this->input->post('A_ket');

			$this->m_admin->tambahJadwal(array($pesawat, $tujuan, $waktu, null, $keterangan));
			$this->session->set_flashdata('message','Berhasil menambahkan jadwal pesawat dengan kode '.$pesawat.' tujuan '.$tujuan.'.');
			redirect("admin/jadwal");
		}else{
			// Pesan validasi
			$this->global_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		}

		$this->tampilan('jadwal/form');
	}

	public function ubah($id=0){
		if(!empty($id)){
			$dataJadwal = $this->m_admin->ambilSatuJadwal($id);

			($dataJadwal['kode_pesawat']==NULL) ? redirect('admin/jadwal') : '';

			// Title
			$this->global_data['title'] = "Ubah Jadwal";
			$this->global_data['description'] = "Ubah Jadwal";
			$this->global_data['menu'] = "ubah_jadwal";

			// Pesan
			$this->global_data['message'] = $this->session->flashdata('message');

			// Data semua pesawat
			$this->global_data['dataPesawat'] = $this->m_main->tampilPesawat();

			// Data
			$this->global_data['data'] = $dataJadwal;

			// Validasi
			$this->form_validation->set_rules('A_pesawat', 'Pesawat', 'required|min_length[4]|max_length[10]');
			$this->form_validation->set_rules('A_tujuan', 'Tujuan', 'required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('A_waktu', 'Waktu', 'required|min_length[4]|max_length[5]');
		
			// Action ubah
			if($this->form_validation->run()){
				$pesawat = $this->input->post('A_pesawat');
				$tujuan = $this->input->post('A_tujuan');
				$waktu = $this->input->post('A_waktu');
				$keterangan = $this->input->post('A_ket');

				$this->m_admin->ubahJadwal(array($pesawat, $tujuan, $waktu, null, $keterangan), $id);
				$this->session->set_flashdata('message','Berhasil mengubah data.');
				redirect("admin/jadwal");
			}else{
				// Pesan validasi
				$this->global_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			}

			$this->tampilan('jadwal/form');
		}
	}

}