<?php


class PerolehanModel extends CI_Model
{
	var $table = "perolehan";
	var $primaryKey = "id_perolehan";

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
		$sql = "select p.id_perolehan,p.nama_perolehan,p.poin, t.nama_tingkat
				from perolehan p inner join tingkat t
				on p.tingkat_id = t.tingkat_id";
		return $this->db->query($sql)->result();
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
		return $this->db->where(array("id_perolehan" => $id))->delete($this->table);
	}
	public function getByTingkat($id){
		$this->db->where('tingkat_id', $id);
		$result = $this->db->get('perolehan')->result();
		return $result;
	}

}
