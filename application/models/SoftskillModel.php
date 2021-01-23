<?php

class SoftSkillModel extends CI_Model
{
	var $table = "softskill";
	var $primaryKey = "id_softskill";

	public function insertData($data)
	{
		return $this->db->insert($this->table, $data);
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

	public function updateData($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function deleteData($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}
	private function _uploadImage(){
	$config['upload_path']          = './upload/product/';
    $config['allowed_types']        = '1-2|jpg|png';
    $config['file_name']            = $this->id_softskill;
    $config['overwrite']			= true;
	$config['max_size']             = 1024;
	
	$this->load->library('upload', $config);
	if ($this->upload->do_upload('image')){
		return $this->_upload->data("file_name");
	}

	return "1-2.jpg";


	}


	public function joinTabel($nim, $id)
	{
		$query = "select s.id_softskill ,p.nama_perolehan as perolehan, s.nm_kegiatan, 
       					j.nama_jenis as id_jenis, t.nama_tingkat  as tingkat
				from softskill as s join jenis as j on j.jenis_id = s.id_jenis  
				join tingkat as t on t.tingkat_id = s.tingkat
				join perolehan as p on p.id_perolehan = s.id_perolehan	
				join  mahasiswa as m on m.id_mahasiswa = s.mahasiswa
				join users  as u on u.mahasiswa = m.id_mahasiswa
				where  m.nim =$nim and u.mahasiswa = $id";
		return $this->db->query($query)->result();


	}

	public function getDaftarSoftskil()
	{
		$query = "select m.nim ,s.mahasiswa ,m.nama, sum(p.poin) as total from mahasiswa as m 
 				join softskill as s  on s.mahasiswa = m.id_mahasiswa
				join perolehan as p on p.id_perolehan = s.id_perolehan	
 				group by m.id_mahasiswa";
		return $this->db->query($query)->result();

	}

	public function getDetailSoftSkill($id)
	{
		$query = "select m.nama,s.mahasiswa, p.nama_perolehan as perolehan, s.nm_kegiatan, s.tgl_kegiatan, s.gambar,p.poin,
       					j.nama_jenis as id_jenis, t.nama_tingkat  as tingkat
				from softskill as s join jenis as j on j.jenis_id = s.id_jenis  
				join tingkat as t on t.tingkat_id = s.tingkat
				join perolehan as p on p.id_perolehan = s.id_perolehan	
				join  mahasiswa as m on m.id_mahasiswa = s.mahasiswa
				join users  as u on u.mahasiswa = m.id_mahasiswa 
				where s.mahasiswa = $id";
		return $this->db->query($query)->result();
	}

	public function getNimNama($id)
	{
		$query = "select sum(p.poin) as poin, m.nim ,s.mahasiswa ,m.nama from mahasiswa as m 
 				join softskill as s  on s.mahasiswa = m.id_mahasiswa
				join perolehan as p on p.id_perolehan = s.id_perolehan
				where s.mahasiswa = $id
 				group by m.id_mahasiswa";
		return $this->db->query($query)->result();
	}


}

