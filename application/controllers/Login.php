<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/jakarta");
        $this->load->model(array('LoginModel'));
    }

    public function index()
    {
        $this->load->view("layout/login");
    }

    // Proses Saat Login

    public function login()
    {
        $email = trim($this->input->post('email_user'));
        $password = $this->input->post('password_user');
        $dosen = $this->LoginModel->getLoginUser($email, $password);
        $query = $this->LoginModel->getLoginMhs($email, $password);
        if ($query == null && $dosen == null) {
            $message = array(
                'header' => 'Gagal Masuk!',
                'message' => 'Mohon Masukan Email dan Password yang Tepat',
                'color' => 'warning',
            );
            $this->session->set_flashdata('message', $message);
            redirect('login');
        } else {
            if ($query !== false) {
                $dataSession = array(
                    "idMhs" => $query->id_mahasiswa,
                    "nim" => $query->nim,
                    "nama" => $query->nama,
                    "email" => $query->email,
                    "jk" => $query->jk,
                    "is_login_kip" => true,
                    "is_mhs" => true,
                );
            } else if ($dosen !== false) {
                $dataSession = array(
                    "id" => $dosen->id_user,
                    "nama" => $dosen->nama_user,
                    "email" => $dosen->email_user,
                    "role" => $dosen->role_user,
                    "is_login_kip" => true,
                    "is_dosen" => true,
                );
            }
            $this->session->set_userdata($dataSession);
            redirect("dashboard");
        }
    }

 
  

    public function saveNewPassword()
    {
        $password = $this->input->post("password");
        $idUser = $this->session->userdata("id_user_kip");

        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'first_login' => "0",
        );

        $this->load->model("UserModel");
        $this->UserModel->update($idUser, $data);
        $user = $this->UserModel->getByPrimaryKey($idUser);
        $dataSession = array(
            "id_user_kip" => $user->id_user,
            "nama_user_kip" => $user->nama_user,
            "role_user_kip" => $user->role_user,
            "is_login_kip" => true,
        );
        $this->session->set_userdata($dataSession);
        redirect('dashboard');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}