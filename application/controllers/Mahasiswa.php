<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_admin();
        $this->load->model("MahasiswaModel");
        $this->load->library('form_validation');
        isLogin();
    }

    public function index()
    {
        $listmahasiswa = $this->MahasiswaModel->getAll();
        $data = array(
            "header" => "Mahasiswa",
            "judul" => "Data Mahasiswa",
            "page" => "content/mahasiswa/v_list_mahasiswa",
            "mhs" => $listmahasiswa,
        );
        $this->load->view("layoutuser/mainuser", $data);
    }

    public function delete($idmahasiswa)
    {
        $this->MahasiswaModel->delete($idmahasiswa);
        $error = $this->db->error();

        if ($error['code'] != 0) {
            $this->session->set_flashdata('error', 'Tidak bisa dihapus ! sudah berelasi');

        } else {
            $this->session->set_flashdata('succes', 'berhasil dihapus');

        }

        redirect('mahasiswa');
    }

    public function tambah()
    {
        $data = array(
            "header" => "Mahasiswa",
            "judul" => "Tambah Mahasiswa",
            "page" => "content/mahasiswa/v_form_mahasiswa",
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
            "email" => $this->input->post("email"),
            "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
        );
        $id = $this->MahasiswaModel->insertGetId($mahasiswa);
        if ($id > 0) {
            $uploadGambar = $this->uploadGambar("gambar");

            if ($uploadGambar["result"] == "success") {
                $dataUpdate = array(
                    "gambar" => $uploadGambar["file"]["file_name"],
                );
                $this->MahasiswaModel->update($id, $dataUpdate);
            }
        }
        echo "<script>
        alert('Data berhasil ditambah');
        window.location='" . base_url('mahasiswa') . "';
        </script>";

    }

    public function update($idmahasiswa)
    {
        $mahasiswa = $this->MahasiswaModel->getByPrimaryKey($idmahasiswa);
        if ($mahasiswa) {
            $data = array(
                "header" => "Mahasiswa",
                "judul" => "Ubah Data Mahasiswa",
                "page" => "content/mahasiswa/v_update_mahasiswa",
                "mhs" => $mahasiswa,
            );
            $this->load->view("layoutuser/mainuser", $data);
        } else {
            echo "<script>
		alert('Data tidak ditemukan');
		window.location='" . base_url('mahasiswa') . "';
		</script>";
        }
    }

    public function proses_update()
    {
        $id = $this->input->post("id");
        $mahasiswa = array(
            "nim" => $this->input->post("nim"),
            "nama" => $this->input->post("nama"),
            "jk" => $this->input->post("jk"),
            "alamat" => $this->input->post("alamat"),
            "tgl_lahir" => $this->input->post("tgl_lahir"),
            "email" => $this->input->post("email"),
            "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
        );
        $this->MahasiswaModel->update($id, $mahasiswa);
        echo "<script>
				alert('Data berhasil diupdate');
				window.location='" . base_url('mahasiswa') . "';
				</script>";

    }

    public function proses_hapus()
    {
        $id = $this->input->post("id");
        if ($this->MahasiswaModel->delete($id)) {
            echo "<script>
        alert('Data berhasil dihapus');
        window.location='" . base_url('mahasiswa') . "';
        </script>";
        } else {
            echo "<script>
        alert('Data gagak dihapus');
        window.location='" . base_url('mahasiswa') . "';
        </script>";
        }
    }

    public function uploadGambar($field)
    {
        $config = array(
            "upload_path" => "upload/images/",
            "allowed_types" => "jpg|jpeg|png",
            "max_size" => "5000",
            "remove_space" => true,
            "encrypt_name" => true,
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