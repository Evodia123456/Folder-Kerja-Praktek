<?php
class Tingkat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_admin();
		$this->load->model("TingkatModel");
		$this->load->model("JenisModel");
		isLogin();
	}

	public function index()
	{
		$listtingkat = $this->TingkatModel->getTingkt();
		$data = array(
			"header" => "Tingkat",
			"page" => "content/tingkat/v_list_tingkat",
			"tingkat" => $listtingkat,

		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function tambah()
	{
		$jenis = $this->JenisModel->getAll();
		$data = array(
			"header" => "Tingkat",
			"jenis" => $jenis,
			"page" => "content/tingkat/v_form_tingkat",
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_simpan()
	{
		$tingkat = array(
			"nama_tingkat" => $this->input->post("namaTingkat"),
			"jenis_id" => $this->input->post("jenisId"),
		);
		$this->TingkatModel->insert($tingkat);
		redirect("tingkat");
	}

	public function update($idtingkat)
	{
		$jenis = $this->JenisModel->getAll();
		$tingkat = $this->TingkatModel->getByPrimaryKey($idtingkat);
		$data = array(
			"header" => "tingkat",
			"page" => "content/tingkat/v_update_tingkat",
			"jenis" => $this->JenisModel->getAll(),
			"tingkatt" => $tingkat
			
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_update()
	{
		$id = $this->input->post("id");
		$tingkat = array(
			"nama_tingkat" => $this->input->post("namaTingkat"),
			"jenis_id" => $this->input->post("jenisId"),
		);
		$this->TingkatModel->update($id, $tingkat);
		redirect("tingkat");
	}

	public function proses_hapus()
	{
		$id = $this->input->post("id");
		$this->TingkatModel->delete($id);
		redirect("tingkat");
	}

	
}
