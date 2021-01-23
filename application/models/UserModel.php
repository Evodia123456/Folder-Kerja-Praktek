<?php

class UserModel extends CI_Model {

    var $table = "users";
    var $primaryKey = "id_user";

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function getAll() {
        $this->db->where("is_active", 1);
        return $this->db->get($this->table)->result();
    }

    public function getByPrimaryKey($id) {
        $this->db->where($this->primaryKey, $id);
        return $this->db->get($this->table)->row();
    }

    public function updates($id, $data) {
        return $this->db->where('id_user', $id)->update($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, array("is_active" => 0));
    }

    public function get_where($where) {
        return $this->db->where($where)->get($this->table);
    }

	public function joinMahasiswa()
	{
		$query = "select m.nim, m.nama, m.jk,m.alamat, u.email_user, m.gambar
		from mahasiswa as m join users as u on u.mahasiswa = m.id_mahasiswa";
		return $this->db->query($query)->result();

	}

}
