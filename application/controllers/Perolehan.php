<?php
class Perolehan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// check_admin();
		$this->load->model("JenisModel");
		$this->load->model("TingkatModel");
		$this->load->model("PerolehanModel");
		// $this->load->library('form_validation');

		// isLogin();
	}

	public function index()
	{
		$listperolehan = $this->PerolehanModel->getAll();
		$data = array(
			"header" => "Perolehan",
			"page" => "content/perolehan/v_list_perolehan",
			"perolehans" => $listperolehan
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function tambah()
	{
		$data = array(
			"header" => "Perolehan",
			"page" => "content/perolehan/v_form_perolehan",
			"tingkat" => $this->TingkatModel->getAll(),
			"jenis" => $this->JenisModel->getAll(),
			// "perolehans" => $listperolehan
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_simpan()
	{
		$perolehan = array(
			"nama_perolehan" => $this->input->post("namaPerolehan"),
			"poin" => $this->input->post("poin"),
			"tingkat_id" => $this->input->post("tingkat"),
			
			);
		$id = $this->PerolehanModel->insertGetId($perolehan);
		if ($id > 0) {
			$uploadGambar = $this->uploadGambar("gambar");

			if ($uploadGambar["result"] == "success") {
				$dataUpdate = array(
					"gambar" => $uploadGambar["file"]["file_name"],
				);
				$this->PerolehanModel->update($id, $dataUpdate);
			}
		}
		redirect("perolehan");
	}

	public function update($idperolehan)
	{
		$perolehan = $this->PerolehanModel->getByPrimaryKey($idperolehan);
		$data = array(
			"header" => "perolehan",
			"page" => "content/perolehan/v_update_perolehan",
			"perolehans" => $perolehan
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_update()
	{
		$id = $this->input->post("id");
		$perolehan = array(
            "nama_perolehan" => $this->input->post("namaPerolehan"),
            "poin" => $this->input->post("poin"),
            "tingkat_id" => $this->input->post("tingkatId"),
		);
		$this->PerolehanModel->update($id, $perolehan);
		redirect("perolehan");
	}

	public function proses_hapus()
	{
		$id = $this->input->post("id");
		$this->PerolehanModel->delete($id);
		redirect("perolehan");
	}

	function subJenis(){
		$jenis_id = $this->input->post('jenis_id');
		$tingkat = $this->TingkatModel->getByJenis($jenis_id);
		$lists = "<option value=''> Pilih Jenis </option>";
		foreach($tingkat as $t){
			$lists = "<option value='".$t->tingkat_id."'>".$t->nama_tingkat."</option>";
		}
		$callback = array('listTingkat'=>$lists);
		echo json_encode($callback);
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
