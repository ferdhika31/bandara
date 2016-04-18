<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-03-26 16:11:11
	**/

	function __construct(){
		parent::__construct();

		// Deklarasi
		$this->global_data = array();

		$this->global_data['asset'] = base_url('asset');
		$this->config->load('website');
	}


	protected function tampilan($view){
		$this->load->view('header',$this->global_data);
		$this->load->view($view,$this->global_data);
		$this->load->view('footer',$this->global_data);
	} 

}