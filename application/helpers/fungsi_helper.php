<?php


function getJenisKelaminLengkap($jk){
    return ($jk == "L") ? "Laki-laki" : "Perempuan";
}


function getLevel($level){
    return ($level = "1") ? "Admin" : "Mahasiswa";
}


function check_already_login(){
    $$ci = $get_instance();
    $user_session = $ci->session->userdata('userid');
    if($user_session){
        redirect('Dashboard');
    }else{
        redirect('auth');
    }
}


function check_not_login(){
    $ci = $get_instance();
    $user_session = $ci->session->userdata('userid');
    if(!$user_session){
        redirect('auth');

    }
}



function check_admin(){
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login1()->role_user != 'admin'){
        redirect('dashboard/blocked');
        die();
    }
    }

