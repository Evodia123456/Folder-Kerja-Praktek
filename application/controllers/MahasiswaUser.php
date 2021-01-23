<?php
class MahasiswaUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		
		// check_admin();
		$this->load->model("MahasiswaUserModel");
		// $this->load->library('form_validation');
		//  isLogin();
	}

	public function index()
	{
		$listmahasiswa = $this->MahasiswaUserModel->getAll();
		$data = array(
			"header" => "Mahasiswa",
			"judul"	=> "Data Mahasiswa User",
			"page" => "contentuser/mahasiswauser/v_list_mahasiswauser",
			"mhs" => $listmahasiswa
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function delete($idmahasiswa){
		$this->MahasiswaUserModel->delete($idmahasiswa);
		$error = $this->db->error();

		if ($error['code'] !=0){
			$this->session->set_flashdata('error', 'Tidak bisa dihapus ! sudah berelasi');

		} else{
			$this->session->set_flashdata('succes', 'berhasil dihapus');

		}

		redirect('mahasiswauser');
	}


	public function tambah()
	{

		$Mahasiswa = new stdClass();
		$Mahasiswa->id = null;
		$Mahasiswa->nim = null;
		$Mahasiswa->nama = null;
		$Mahasiswa->jk = null;
		$Mahasiswa->alamat = null;
		$Mahasiswa->tgl_lahir = null;
		$Mahasiswa->ipk = null;
		$Mahasiswa->gambar = null;

		$data = array(
			"header" => "Mahasiswa User",
			"judul" => "Tambah Mahasiswa",
			"page" => "contentuser/mahasiswauser/v_form_mahasiswauser",
			"mhs" => $Mahasiswa
		);
		$this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_simpan()
	{
		$mahasiswa = array(
			"nim" => $this->input->post("nim"),
			"nama" => $this->input->post("nama"),
			"jk" => $this->input->post("jk"),
			"alamat" => $this->input->post("alamat"),
			"tgl_lahir" => $this->input->post("tgl_lahir"),
			"ipk" => $this->input->post("ipk"),
			);
		$id = $this->MahasiswaUserModel->insertGetId($mahasiswa);
		if ($id > 0) {
			$uploadGambar = $this->uploadGambar("gambar");

			if ($uploadGambar["result"] == "success") {
				$dataUpdate = array(
					"gambar" => $uploadGambar["file"]["file_name"],
				);
				$this->MahasiswaUserModel->update($id, $dataUpdate);
			}
		}
		redirect("mahasiswauser");
	}

	public function update($idmahasiswa)
	{
		$mahasiswa = $this->MahasiswaUserModel->getByPrimaryKey($idmahasiswa);
		if ($mahasiswa->num_rows() > 0){
			$Mahasiswa = $mahasiswa->row();

		$data = array(
			"header" => "Mahasiswa",
			"judul"	=> "Ubah Data Mahasiswa",
			"page" => "contentuser/mahasiswauser/v_update_mahasiswauser",
			"mhs" => $mahasiswa
		);
		$this->load->view("layoutuser/mainuser", $data);
	} else{
		echo "<script>
		alert('Data tidak ditemukan');
		window.location='" . base_url('mahasiswauser') . "';
		</script>";
	}
}

	public function proses_update()
	{

		$post = $this->input->post(null,true);
		if (isset($_POST['Tambah'])){
			$this->MahasiswaUserModel->insert($post);
		}
		if ($this->db->affected_rows() > 0){
			$this->session->set_flashdata('succes', 'berhasil ditambahkan');
			redirect('mahasiswauser');
		} else if(isset($_POST['Update'])){
			$this->MahasiswaUserModel->update($post);
		}

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('succes', 'berhasil diupdate');
			redirect('mahasiswauser');
		}
	}


		

	// 	$id = $this->input->post("id");
	// 	$mahasiswa = array(
	// 		"nim" => $this->input->post("nim"),
	// 		"nama" => $this->input->post("nama"),
	// 		"jk" => $this->input->post("jk"),
	// 		"alamat" => $this->input->post("alamat"),
	// 		"tgl_lahir" => $this->input->post("tgl"),
	// 		"ipk" => $this->input->post("ipk"),
	// 	);
	// 	$this->MahasiswaUserModel->update($id, $mahasiswa);
	// 	redirect("mahasiswa");
	// }

	// public function proses_hapus()
	// {
	// 	$id = $this->input->post("id");
	// 	$this->MahasiswaUserModel->delete($id);
	// 	redirect("mahasiswa");
	// }
	
	
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