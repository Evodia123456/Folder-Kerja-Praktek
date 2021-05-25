<?php
class TestPrint extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_admin();
		isLogin();
	}

    public function pdf()
	{
		$this->load->library('pdfgenerator');
 
		$data['users']=array(
			array('firstname'=>'Agung','lastname'=>'Setiawan','email'=>'ag@setiawan.com'),
			array('firstname'=>'Hauril','lastname'=>'Maulida Nisfar','email'=>'hm@setiawan.com'),
			array('firstname'=>'Akhtar','lastname'=>'Setiawan','email'=>'akh@setiawan.com'),
			array('firstname'=>'Gitarja','lastname'=>'Setiawan','email'=>'git@setiawan.com')
		);
 
	    $html = $this->load->view('welcome_message', $data, true);
	    
	    $this->pdfgenerator->generate($html,'contoh');
	}
}