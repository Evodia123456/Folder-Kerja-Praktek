<?php

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        isLogin();
    
    }

    public function index()
    {
        $listUser = $this->UserModel->getAll();
        $data = array(
            "header" => "User",
            "page" => "content/user/v_list_user",
            "users" => $listUser,
        );
        $this->load->view('layoutuser/mainuser', $data);
    }

    public function add()
    {
        if ($this->input->post("submit")) {

            $data = array(
                "id_user" => $this->input->post("id_user"),
                "nama_user" => $this->input->post("nama_user"),
                "email_user" => $this->input->post("email_user"),
                "password_user" => password_hash($this->input->post("password_user"), PASSWORD_DEFAULT),
                "role_user" => $this->input->post("role_user"),
                "first_login" => "0",
                "is_active" => "1",

            );
            $query = $this->UserModel->insert($data);
            if ($query) {
                $message = array('message' => "Anda berhasil menambah data Akun", 'color' => "info");
            } else {
                $message = array('message' => "Anda berhasil menambah data Akun", 'color' => "info");
            }
            $this->session->set_flashdata('message', $message);
            redirect('users');
        } else {
            $data["page"] = "content/user/v_form_user";
            $data["title"] = "Tambah User";
            $this->load->view('layoutuser/mainuser', $data);
        }
    }

    public function tambah()
    {
        $data = array(
            "header" => "User",
            "page" => "content/user/v_form_user",
        );
        $this->load->view('layoutuser/mainuser', $data);
    }

    public function proses_simpan()
    {
        $user = $this->input->post();
        $passwordRandom = randomPassword();
        $user["password_user"] = password_hash($passwordRandom, PASSWORD_DEFAULT);
        $user["is_active"] = 1;
        $user["first_login"] = 1;
        $this->UserModel->insert($user);
        $user["password_generated"] = $passwordRandom;
        sendEmail("Register", $user, "register");
        redirect("users");
    }

    public function reset_password()
    {
        //1. ambil parameter form
        $idUser = $this->input->post("id_user");
        //2. buat objek user
        $user = $this->UserModel->getByPrimaryKey($idUser);
        //3. buat random password
        $passwordRandom = randomPassword();
        //4. set random password ke objek user
        $user = (array) $user;
        $user["password_user"] = password_hash($passwordRandom, PASSWORD_DEFAULT);
        $user["first_login"] = 1;
        //5. simpan user
        $this->UserModel->update($idUser, $user);
        $user["password_generated"] = $passwordRandom;
        echo sendEmail("Reset Password", $user, "register");
    }

    public function update($id = 0)
    {
        if ($this->input->post("submit")) {
            $id = $this->input->post('id_user');
            $data = array(
//                "id_user" => $this->input->post("id_user"),
                "nama_user" => $this->input->post("nama_user"),
                "email_user" => $this->input->post("email_user"),
                "role_user" => $this->input->post("role_user"),
                "is_active" => "1",

            );
            $query = $this->UserModel->updates($id, $data);
            if ($query) {
                $message = array('message' => "Anda berhasil mengubah data User", 'color' => "info");
            } else {
                $message = array('message' => "Anda berhasil mengubah data User", 'color' => "info");
            }
            $this->session->set_flashdata('message', $message);
            redirect('users');
        } else {
            //tidak ada data yang dikirim
            $data["page"] = "content/user/v_update_user";
            $data["title"] = "Ubah Data User";
            $fakultas = $this->UserModel->get_where(array("id_user" => $id))->result();
            $data["user"] = $fakultas[0];
            $this->load->view('layoutuser/mainuser', $data);
        }
    }

    public function profile()
    {
//        $listUser = $this->UserModel->getAll();
        $data = array(
            "header" => "Profile User",
            "page" => "content/user/v_list_user",
//            "users" => $listUser
        );
//        $this->load->view('layoutuser/mainuser', $data);

    }

}