<?php

class Login extends CI_Controller
{

    function __construct()
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
    public function verify()
    {
        $email = trim($this->input->post('email_user'));
        $password = $this->input->post('password_user');
        $query = $this->LoginModel->getByEmailAndPassword($email, $password);
        if ($query == null) {
            $message = array(
                'header' => 'Gagal Masuk!',
                'message' => 'Mohon Masukan Email dan Password yang Tepat',
                'color' => 'warning'
            );
            $this->session->set_flashdata('message', $message);
            redirect('login');
        } else {
            // Apa yang mau dikirimkan melalui session
            if ($query->role_user == 'mahasiswa') {
                $dataSession = array(
                    "id" => $query->id_user,
                    "idMhs" => $query->id_mahasiswa,
                    "nim" => $query->nim,
                    "nama" => $query->nama,
                    "email" => $query->email_user,
                    "jk" => $query->jk,
                    "role" => $query->role_user,
                    "is_login_pwl" => true,
                );
            } else {
                $dataSession = array(
                    "id" => $query->id_user,
                    "nama" => $query->nama_user,
                    "email" => $query->email_user,
                    "role" => $query->role_user,
                    "is_login_pwl" => true,
                );
            }
            $this->session->set_userdata($dataSession);
            redirect("dashboard");
        }
    }

    public function login()
    {
        $email = trim($this->input->post('email_user'));
        $password = $this->input->post('password_user');
        $dosen = $this->LoginModel->getLoginUser($email, $password);
        $query = $this->LoginModel->getLogin($email, $password);
        if ($query == null) {
            $message = array(
                'header' => 'Gagal Masuk!',
                'message' => 'Mohon Masukan Email dan Password yang Tepat',
                'color' => 'warning'
            );
            $this->session->set_flashdata('message', $message);
            redirect('login');
        } else {
            if ($dosen) {
                $dataSession = array(
                    "idMhs" => $query->id_mahasiswa,
                    "nim" => $query->nim,
                    "nama" => $query->nama,
                    "email" => $query->email_user,
                    "jk" => $query->jk,
                    "is_login_pwl" => true,
                );
            } elseif ($query) {
                $dataSession = array(
                    "id" => $query->id_user,
                    "nama" => $query->nama_user,
                    "email" => $query->email_user,
                    "role" => $query->role_user,
                    "is_login_pwl" => true,
                );
            }
            $this->session->set_userdata($dataSession);
            redirect("dashboard");
        }
    }

//     public function verify() {
//         $email = trim($this->input->post('email_user'));
//         $password = $this->input->post('password_user');
//         $query = $this->LoginModel->check($email, $password);
// //        var_dump($query);
// //        die();
//         if (!$query) {
//             $message = array(
//                 'header' => 'Gagal Masuk!',
//                 'message' => 'Mohon Masukan Email dan Password yang Tepat',
//                 'color' => 'warning'
//             );
//             $this->session->set_flashdata('message', $message);
//             redirect('login');
//         } else {
//             $userData = array(
//                 "id_user_pwl" => $query->id_user,
//                 "nama_user_pwl" => $query->nama_user,
//                 "role_user_pwl" => $query->role_user,
//                 "is_login_pwl" => true
//             );
//             $this->session->set_userdata($userData);
//             if ($this->session->userdata("role_user_pwl") === 'admin') {
//                 redirect('dashboard');
//             } else if ($this->session->userdata("role_user_pwl") === 'mahasiswa') {
//                 redirect('Dashboard2');
// //            } else if ($this->session->userdata("role_user") === 'mahasiswas') {
// //                redirect('dashboard');
// //            } else if ($this->session->userdata("role_user") === '4') {
// //                redirect('mahasiswa');
//             } else {
//                 redirect('a');
//             }
//         }
//     }

    // public function cekLogin() {
    //     $email = $this->input->post("email_user");
    //     $password = $this->input->post("password_user");
    //     $this->load->model("LoginModel");
    //     $user = $this->LoginModel->cekUser($email, $password);

    //     if (!$user) {
    //         redirect("login");
    //     } else {
    //         if ($user->is_active == "0") {
    //             redirect("login");
    //         }
    //         //
    //         if ($user->first_login == "1") {
    //             $this->session->set_userdata(array("id_user_pwl" => $user->id_user));
    //             redirect("login/firstLogin");
    //         }
    //         $dataSession = array(
    //             "id_user_pwl" => $user->id_user,
    //             "nama_user_pwl" => $user->nama_user,
    //             "role_user_pwl" => $user->role_user,
    //             "is_login_pwl" => true
    //         );

    //         $this->session->set_userdata($dataSession);
    //         redirect("dashboard");
    //     }
    // }

// public function cekLogin(){
//     $email = $this->input->post('email');
//     $password = $this->input->post("password");
//     $this->load->model("LoginModel");
//     $user = $this->LoginModel->cekUser($email, $password);
//     if(!$user){
//         redirect("login");
//     }else{
//         if ($user->is_active == "0") {
//             redirect("login");
//         }
//         //
//         if ($user->first_login == "1") {
//             $this->session->set_userdata(array("user_id_kip" => $user->user_id));
//             redirect("login/firstLogin");
//         }
//     $dataSession = array(
//     "user_id_kip"   => $user->user_id,
//     "nama_user_kip" => $user->nama_user,
//     "role_user_kip" =>$user->role_user,
//     "is_login_kip"  =>true
// );
//     $this->session->set_userdata($dataSession);
//     redirect("dashboard");
//     // if($this->session->userdata("role_user") === "mahasiswa"){
//     //     redirect("prestasi");
//     // }else if($this->session->userdata("role_user") === "admin"){
//     // redirect("dashboard");
//     // }
//     }
// }

    public function firstLogin()
    {
        $idUser = $this->session->userdata("id_user_kip");
        if ($idUser = null) {
            redirect("login/logout");
        }
        $this->load->view("layout/first_login");
    }

    public function saveNewPassword()
    {
        $password = $this->input->post("password");
        $idUser = $this->session->userdata("id_user_kip");

        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'first_login' => "0"
        );

        $this->load->model("UserModel");
        $this->UserModel->update($idUser, $data);
        $user = $this->UserModel->getByPrimaryKey($idUser);
        $dataSession = array(
            "id_user_kip" => $user->id_user,
            "nama_user_kip" => $user->nama_user,
            "role_user_kip" => $user->role_user,
            "is_login_kip" => true
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
