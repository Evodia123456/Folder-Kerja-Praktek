<?php
class Tingkat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// check_admin();
		$this->load->model("TingkatModel");
		// isLogin();
	}

	public function index()
	{
		$listtingkat = $this->TingkatModel->getAll();
		$data = array(
			"header" => "Tingkat",
			"page" => "content/tingkat/v_list_tingkat",
			"tingkat" => $listtingkat
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function tambah()
	{
		$data = array(
			"header" => "Tingkat",
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
		$id = $this->TingkatModel->insertGetId($tingkat);
		if ($id > 0) {
			$uploadGambar = $this->uploadGambar("gambar");

			if ($uploadGambar["result"] == "success") {
				$dataUpdate = array(
					"gambar" => $uploadGambar["file"]["file_name"],
				);
				$this->TingkatModel->update($id, $dataUpdate);
			}
		}
		redirect("tingkat");
	}

	public function update($idtingkat)
	{
		$tingkat = $this->TingkatModel->getByPrimaryKey($idtingkat);
		$data = array(
			"header" => "tingkat",
			"page" => "content/tingkat/v_update_tingkat",
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
