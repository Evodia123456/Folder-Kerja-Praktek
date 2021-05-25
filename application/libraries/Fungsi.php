<?php

class Fungsi
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function user_login()
    {
        $this->ci->load->model('ModelUser');
        $id_user = $this->ci->session->userdata('iduser');
        $user_data = $this->ci->ModelUser->get($id_user)->row();
        return $user_data;
    }

    public function user_login1()
    {
        $this->ci->load->model('LoginModel');
        $id_user = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->LoginModel->getByPrimaryKey($id_user);
        return $user_data;
    }

    public function check_admin()
    {
        $ci = &get_instance();
        $ci->load->library('fungsi');
        if ($ci->fungsi->user_login1()->role_user != 'admin') {
            redirect('dashboard/blocked');
            die();
        }
    }

}
