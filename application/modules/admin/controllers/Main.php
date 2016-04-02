<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-04-01 21:51:19
	**/

	function __construct(){
		parent::__construct();

		$this->load->model(array(
			'm_auth',
			'm_admin'
		));

		// Deklarasi
		$this->global_data = array();

		$this->global_data['asset'] = base_url('asset');

		$this->global_data['dataUser'] = $this->m_auth->tampilSatuUser($this->session->userdata('uname'));
	}


	protected function tampilan($view){
		$this->load->view($view,$this->global_data);
	} 

}