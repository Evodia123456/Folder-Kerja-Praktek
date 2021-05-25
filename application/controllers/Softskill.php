<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Softskill extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("SoftskillModel");
        $this->load->model("JenisModel");
        $this->load->model("TingkatModel");
        $this->load->model("PerolehanModel");
        isLogin();
    }

    public function index()
    {
        //1. Ambil data dari model
        //        $softskillList = $this->SoftskillModel->getAll();
        $nimSession = $this->session->userdata('nim');
        $idSession = $this->session->userdata('idMhs');
        $softskillList = $this->SoftskillModel->getSoftskil($nimSession, $idSession);
        //2. Kirimkan data ke view
        $data = array(
            "softskillList" => $softskillList,
            "title" => "Softskill",
            "header" => "Data softskill",
            "list" => "list Softskill",
            "page" => "content/softskill/list",
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

        $softskill = array(
            $jenis = $this->input->post('jenis'),
            $tingkat = $this->input->post('tingkat'),
            $perolehan = $this->input->post('perolehan'),
            $nama_kegiatan = $this->input->post('nama'),
            $tanggal = $this->input->post('tgl_kegiatan'),
            $gambar = $this->input->post("gambar", true),
        );
        $softskill = array(
            "id_jenis" => $jenis,
            "tingkat" => $tingkat,
            "id_perolehan" => $perolehan,
            "nm_kegiatan" => $nama_kegiatan,
            "tgl_kegiatan" => $tanggal,
            "gambar" => $this->uploadGambar($gambar),
            "mahasiswa" => $this->session->userdata('idMhs'),
        );
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
        $jenis = $this->JenisModel->getAll();
        $tingkat = $this->TingkatModel->getAll();
        $perolehan = $this->PerolehanModel->getAll();
        $softs = $this->SoftskillModel->getByPrimaryKey($id);
        $data = array(
            "title" => " Softskill",
            "list" => "list Softskill",
            "page" => "content/softskill/v_form_ubah",
            "header" => "Tambah Data Softskill",
            "jenis" => $jenis,
            "tingkat" => $tingkat,
            "softs" => $softs,
            "perolehan" => $perolehan,

        );
        return $this->load->view("layoutuser/mainuser", $data);
    }
    public function prosesEdit()
    {
        $id = $this->input->post('id');
        $softskill = array(
            $jenis = $this->input->post('jenis'),
            $tingkat = $this->input->post('tingkat'),
            $perolehan = $this->input->post('perolehan'),
            $nama_kegiatan = $this->input->post('nama'),
            $tanggal = $this->input->post('tanggal'),
            $gambar = $this->input->post('gambar'),
        );
        $softskill = array(
            "id_jenis" => $jenis,
            "tingkat" => $tingkat,
            "id_perolehan" => $perolehan,
            "nm_kegiatan" => $nama_kegiatan,
            "tgl_kegiatan" => $tanggal,
            "ipk" => $this->input->post('ipk'),
            "mahasiswa" => $this->session->userdata('idMhs'),
        );
        $softs = $this->SoftskillModel->getByPrimaryKey($id);
        if ($softs->gambar != null) {
            $target_file = 'upload/images/' . $softs->gambar;
            unlink($target_file);
        }
        if($softs > 0 ){
            $this->SoftskillModel->update($id, $softskill);
            $uploadGambar = $this->uploadGambar("gambar");
            if ($uploadGambar["result"] == "success") {
                $dataGambar = array(
                    "gambar" => $uploadGambar["file"]["file_name"],
                );
                $this->SoftskillModel->update($id, $dataGambar);
            }
        }
        redirect("softskill");
    }

    public function prosesTambah()
    {
        $softskill = array(
            "id_jenis" => $this->input->post('jenis'),
            "tingkat" => $this->input->post('tingkat'),
            "id_perolehan" => $this->input->post('perolehan'),
            "nm_kegiatan" => $this->input->post('nama'),
            "tgl_kegiatan" =>$this->input->post('tanggal'),
            "ipk" => $this->input->post('ipk'),
            "mahasiswa" => $this->session->userdata('idMhs'),
        );
        $id = $this->SoftskillModel->insertGetId($softskill);
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

    

    public function getDataSoftskill()
    {
        $daftarSoftSkill = $this->SoftskillModel->getDaftarSoftskil();
        $data = array(
            "header" => " Daftar Softskill",
            "judul" => "softskill",
            "page" => "content/softskill/v_list_transaksi",
            "daftarSoftskil" => $daftarSoftSkill,
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
            "tambahan" => $dataDetail,
        );
        $this->load->view('layoutuser/mainuser', $data);
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
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['softskill'] = $this->SoftskillModel->getSoftskil($this->softskill)->result();

        $this->load->view('laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Softskill.pdf", array('Attachment =>0'));

    }
    function print() {
        $this->load->library('pdfgenerator');
        $daftarSoftSkill = $this->SoftskillModel->getDaftarSoftskil();
        $data = array(
            "header" => " Daftar Softskill",
            "judul" => "softskill",
            "daftarSoftskil" => $daftarSoftSkill,
        );
        $html = $this->load->view('content/softskill/laporan', $data, true);

        $this->pdfgenerator->generate($html, 'contoh');
    }

    public function export()
    {
        $semua_pengguna = $this->SoftskillModel->getDaftarSoftskil();
        $spreadsheet = new Spreadsheet;
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'NIM Mahasiswa')
            ->setCellValue('C1', 'Nama Mahasiswa')
            ->setCellValue('D1', 'Total Poin');

        $kolom = 2;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->nim)
                ->setCellValue('C' . $kolom, $pengguna->nama)
                ->setCellValue('D' . $kolom, $pengguna->total);

            $kolom++;
            $nomor++;

        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Latihan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}
