<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class AppModel extends CI_Model{

  public function proseslogin($user,$nim,$pass){
      $this->db->where('username',$user);
      $this->db->where('nim',$nim);
      $this->db->where('password',$pass);
      return $this->db->get('user')->row();
  }


}