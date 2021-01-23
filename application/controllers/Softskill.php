<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Softskill extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// check_admin();
		$this->load->model("SoftskillModel");
		$this->load->model("JenisModel");
		$this->load->model("TingkatModel");

	}

	public function index()
	{
		//1. Ambil data dari model
//		$softskillList = $this->SoftskillModel->getAll();
		$nimSession = $this->session->userdata('nim');
		$idSession = $this->session->userdata('idMhs');
		$softskillList = $this->SoftskillModel->joinTabel($nimSession, $idSession);
//		var_dump($softskillList);
//		die();
		//2. Kirimkan data ke view
		$data = array(
			"softskillList" => $softskillList,
			"title" => "Softskill",
			"header" => "Data softskill",
			"list" => "list Softskill",
			"page" => "content/softskill/list"
		);
		// $this->load->view("nama_halaman",$variableYangDikirim)
		return $this->load->view("layoutuser/mainuser", $data);
	}

	public function tambah()
	{
		$jenis = $this->JenisModel->getAll();
		$tingkat = $this->TingkatModel->getAll();
		$data = array(
			"title" => " Softskill",
			"list" => "list Softskill",
			"page" => "content/softskill/v_form_tambah",
			"header" => "Tambah Data Softskill",
			"jenis" => $jenis,
			"tingkat" => $tingkat,
		);

		return $this->load->view("layoutuser/mainuser", $data);
	}

	public function proses_simpan()
	{
//		$softskill = array(
//			$gambar = $this->input->post("gambar", true),
//			$nm_kegiatan = $this->input->post("nm_kegiatan", true),
//			$tgl_kegiatan = $this->input->post("tgl_kegiatan", true),
//			$kat_kegiatan = $this->input->post("kat_kegiatan", true),
//			$poin_kegiatan = $this->input->post("poin_kegiatan", true),
//		);

		$softskill = array(
			$jenis = $this->input->post('jenis'),
			$jenis = $this->input->post('jenis'),
			$tingkat = $this->input->post('tingkat'),
			$perolehan = $this->input->post('perolehan'),
			$nama_kegiatan = $this->input->post('nama'),
			$tanggal = $this->input->post('tanggal'),
			$gambar = $this->input->post("gambar", true),
		);
//		$id = $this->SoftskillModel->insertGetId($softskill);
		$id = $this->SoftskillModel->insertData($softskill);
		if ($id > 0) {
			$uploadGambar = $this->uploadGambar("gambar");
			if ($uploadGambar["result"] == "success") {
				$dataUpdate = array(
					"gambar" => $uploadGambar["file"]["file_name"],
				);
				$this->SoftskillModel->update($id, $dataUpdate);
			}
		}
		redirect("softskill");
	}


	public function edit($id)
	{
		$softskill = $this->SoftskillModel->getByPrimaryKey($id);
		$data = array(
			"softskill" => $softskill,
			"title" => " softskill",
			"list" => "list Softskill",
			"page" => "content/softskill/v_form_ubah",
			"header" => "Tambah Data Softskill",
		);
		return $this->load->view("layoutuser/mainuser", $data);
	}

//	public function prosesTambah()
//	{
//
//		$id_softskill = $this->input->post("id_softskill", true);
//		$nm_kegiatan = $this->input->post("nm_kegiatan", true);
//		$tgl_kegiatan = $this->input->post("tgl_kegiatan", true);
//		$kat_kegiatan = $this->input->post("kat_kegiatan", true);
//		$poin_kegiatan = $this->input->post("poin_kegiatan", true);
//		$gambar = $this->input->post("gambar", true);
//		$prestasi = $this->input->post();
//		if ($prestasi == "juara 1") {
//
//		}
//
//		$softskill = array(
//			"id_softskill" => $id_softskill,
//			"nm_kegiatan" => $nm_kegiatan,
//			"tgl_kegiatan" => $tgl_kegiatan,
//			"kat_kegiatan" => $kat_kegiatan,
//			"poin_kegiatan" => $poin_kegiatan,
//			"gambar" => $gambar
//		);
//		$this->SoftskillModel->insertData($softskill);
//		redirect("softskill");
//	}

	public function prosesTambah()
	{
		$jenis = $this->input->post('jenis');
		$tingkat = $this->input->post('tingkat');
		$perolehan = $this->input->post('perolehan');
		$nama_kegiatan = $this->input->post('nama');
		$tanggal = $this->input->post('tanggal');
//		$gambar = $this->input->post("gambar", true);
		$softskill = array(
			"id_jenis" => $jenis,
			"tingkat" => $tingkat,
			"id_perolehan" => $perolehan,
			"nm_kegiatan" => $nama_kegiatan,
			"tgl_kegiatan" => $tanggal,
			"mahasiswa" => $this->session->userdata('idMhs'),
		);
		$this->SoftskillModel->insertData($softskill);
		redirect("softskill");
	}

	public function delete($id)
	{
		$softskill = $this->SoftskillModel->getByPrimaryKey($id);
		$data = array(
			"softskill" => $softskill,
			"title" => " softskill",
			"list" => "list Softskill",
			"page" => "content/softskill/v_form_hapus",
			"header" => "Tambah Data Softskill",
		);
		return $this->load->view("layoutuser/mainuser", $data);
	}

	public function prosesHapus($id)
	{
		$this->SoftskillModel->deleteData($id);
		redirect("softskill");
	}

	public function prosesEdit()
	{
		$id_softskill = $this->input->post("id_softskill", true);
		$nm_kegiatan = $this->input->post("nm_kegiatan", true);
		$tgl_kegiatan = $this->input->post("tgl_kegiatan", true);
		$kat_kegiatan = $this->input->post("kat_kegiatan", true);
		$poin_kegiatan = $this->input->post("poin_kegiatan", true);
		$gambar = $this->input->post("gambar", true);
		$softskill = array(
			"id_softskill" => $id_softskill,
			"nm_kegiatan" => $nm_kegiatan,
			"tgl_kegiatan" => $tgl_kegiatan,
			"kat_kegiatan" => $kat_kegiatan,
			"poin_kegiatan" => $poin_kegiatan,
			"gambar" => $gambar
		);
		$this->SoftskillModel->updateData($id_softskill, $softskill);
		redirect("softskill");
	}

	public function getDataSoftskill()
	{
		$daftarSoftSkill = $this->SoftskillModel->getDaftarSoftskil();
		$data = array(
			"header" => " Daftar Softskill",
			"judul" => "softskill",
			"page" => "content/softskill/v_list_transaksi",
			"daftarSoftskil" => $daftarSoftSkill
		);
		$this->load->view('layoutuser/mainuser', $data);
	}

	public function detail($idMahasiswa)
	{

		$detailSoftSkill = $this->SoftskillModel->getDetailSoftSkill($idMahasiswa);
		$dataDetail = $this->SoftskillModel->getNimNama($idMahasiswa);
		$data = array(
			"header" => "Transaksi",
			"judul" => "List Transaksi",
			"page" => "content/softskill/v_detail_softskill",
			"detail" => $detailSoftSkill,
			"tambahan" => $dataDetail
		);
		$this->load->view('layoutuser/mainuser', $data);
	}

}
