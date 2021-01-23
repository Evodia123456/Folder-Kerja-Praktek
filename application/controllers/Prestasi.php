<?php
class Prestasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// check_admin();
		$this->load->model("PrestasiModel");
	}

	public function index()
	{
		$listprestasi = $this->PrestasiModel->getAll();
		$data = array(
			"header" => "prestasi",
			"page" => "content/prestasi/v_list_prestasi",
			"prestasis" => $listprestasi
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function tambah()
	{
		$data = array(
			"header" => "prestasi",
			"page" => "content/prestasi/v_form_prestasi",
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_simpan()
	{
		$prestasi = array(
			"nama_prestasi" => $this->input->post("namaPrestasi"),
			"poin" => $this->input->post("poin"),
			"tingkat_id" => $this->input->post("tingkatId"),
			
			);
		$id = $this->PrestasiModel->insertGetId($prestasi);
		if ($id > 0) {
			$uploadGambar = $this->uploadGambar("gambar");

			if ($uploadGambar["result"] == "success") {
				$dataUpdate = array(
					"gambar" => $uploadGambar["file"]["file_name"],
				);
				$this->PrestasiModel->update($id, $dataUpdate);
			}
		}
		redirect("prestasi");
	}

	public function update($idprestasi)
	{
		$prestasi = $this->PrestasiModel->getByPrimaryKey($idprestasi);
		$data = array(
			"header" => "prestasi",
			"page" => "content/prestasi/v_update_prestasi",
			"prestasis" => $prestasi
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_update()
	{
		$id = $this->input->post("id_prestasi");
		$prestasi = array(
			"nama_prestasi" => $this->input->post("namaPrestasi"),
			"poin" => $this->input->post("poin"),
			"tingkat_id" => $this->input->post("tingkatId"),
		);
		$this->PrestasiModel->update($id, $prestasi);
		redirect("prestasi");
	}

	public function proses_hapus()
	{
		$id = $this->input->post("id");
		$this->PrestasiModel->delete($id);
		redirect("prestasi");
	}
	
	public function uploadGambar($field)
	{
		$config = array(
			"upload_path" => "upload/images/",
			"allowed_types" => "jpg|jpeg|png",
			"max_size" => "5000",
			"remove_space" => true,
			"encrypt_name" => true
		);
		$this->load->library("upload", $config);
		if ($this->upload->do_upload($field)) {
			$result = array("result" => "success", "file" => $this->upload->data(), "error" => "");
			return $result;
		} else {
			$result = array("result" => "failed", "file" => "", "error" => $this->upload->display_errors());
			return $result;
		}

	}
	
	}

