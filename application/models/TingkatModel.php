<?php


class TingkatModel extends CI_Model
{
	var $table = "tingkat";
	var $primaryKey = "tingkat_id";

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
	public function getByJenis($id)
	{
		$this->db->where('jenis_id', $id);
		$result = $this->db->get('tingkat')->result();
		return $result;
	}

	public function delete($id)
	{
		return $this->db->where(array("tingkat_id" => $id))->delete($this->table);
	}
	public function getTingkt()
	{
		$query = "select nama_tingkat, nama_jenis, tingkat_id
		 from tingkat inner join jenis on tingkat.jenis_id = jenis.jenis_id";
		return	$this->db->query($query)->result();
	}
}
