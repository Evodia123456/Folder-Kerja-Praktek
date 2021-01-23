<?php
class Jenis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// check_admin();
		$this->load->model("JenisModel");
		$this->load->model("TingkatModel");
		$this->load->model("PerolehanModel");
		// isLogin();
	}

	public function index()
	{
		$listjenis = $this->JenisModel->getAll();
		$data = array(
			"header" => "Jenis",
			"page" => "content/jenis/v_list_jenis",
			"jenis" => $listjenis
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function tambah()
	{
		$data = array(
			"header" => "Jenis",
			"page" => "content/jenis/v_form_jenis",
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_simpan()
	{
		$jenis = array(
			"nama_jenis" => $this->input->post("namaJenis"),
			
			);
		$id = $this->JenisModel->insertGetId($jenis);
		if ($id > 0) {
			$uploadGambar = $this->uploadGambar("gambar");

			if ($uploadGambar["result"] == "success") {
				$dataUpdate = array(
					"gambar" => $uploadGambar["file"]["file_name"],
				);
				$this->JenisModel->update($id, $dataUpdate);
			}
		}
		redirect("jenis");
	}

	public function update($idjenis)
	{
		$jenis = $this->JenisModel->getByPrimaryKey($idjenis);
		$data = array(
			"header" => "jenis",
			"page" => "content/jenis/v_update_jenis",
			"jeniss" => $jenis
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_update()
	{
		$id = $this->input->post("id");
		$jenis = array(
            "nama_jenis" => $this->input->post("namaJenis"),
		);
		$this->JenisModel->update($id, $jenis);
		redirect("jenis");
	}

	public function proses_hapus()
	{
		$id = $this->input->post("id");
		$this->JenisModel->delete($id);
		redirect("jenis");
	}

	function subJenis(){
		$jenis_id = $this->input->post('jenis_id');
		$tingkat = $this->TingkatModel->getByJenis($jenis_id);
		$lists = "<option value=''> Pilih Jenis </option>";
		foreach($tingkat as $t){
			$lists .= "<option value='".$t->tingkat_id."'>".$t->nama_tingkat."</option>";
		}
		$callback = array('listTingkat'=>$lists);
		echo json_encode($callback);
	}

	function subTingkat(){
		$tingkat_id = $this->input->post('tingkat_id');
		$perolehan = $this->PerolehanModel->getByTingkat($tingkat_id);
		$lists = "<option value=''> Pilih Perolehan </option>";
		foreach($perolehan as $p){
			$lists .= "<option value='".$p->id_perolehan."'>".$p->nama_perolehan."</option>";
		}
		$callback = array('ListPerolehan'=>$lists);
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
