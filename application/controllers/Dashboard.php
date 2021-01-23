<?php


class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		// isLogin2();

		// $this->load->library('form_validation');
		$this->load->model('MahasiswaModel');

		
	}
	public function index() {
		$data = array(
			"header" => "Dashboard",
			"page" => "dashboard",
			"judul"	=> "Dashboard"
		);
		$this->load->view("layoutuser/mainuser", $data);
	}
}
