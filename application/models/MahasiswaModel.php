<?php


class MahasiswaModel extends CI_Model
{
	var $table = "mahasiswa";
	var $primaryKey = "id_mahasiswa";

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function insertGetId($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function getAll()
	{
		//hanya mengembalikan data yang is_active = 1
		// $this->db->where("is_active", 1);
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}


	public function delete($id){
		return $this->db->where(array("id_mahasiswa" => $id))->delete($this->table);
	}

}
