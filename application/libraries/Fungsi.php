<?php

class Fungsi{
    protected $ci;
    function __construct(){
        $this->ci = &get_instance();
    }

    function user_login(){
        $this->ci->load->model('ModelUser');
        $id_user = $this->ci->session->userdata('iduser');
        $user_data = $this->ci->ModelUser->get($id_user)->row();
        return $user_data;
    }


function user_login1(){
    $this->ci->load->model('UserModel');
    $id_user = $this->ci->session->userdata('id_user_kip');
    $user_data = $this->ci->UserModel->getByPrimaryKey($id_user);
    return $user_data;
    

}


}