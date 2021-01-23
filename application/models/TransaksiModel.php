
<?php

class TransaksiModel extends CI_Model {
    var $table = "softskill";
    var $primaryKey = "id_softskill";
    var $table1 = "mahasiswa";
    var $primaryKey1 = "id_mahasiswa";

    public function getAll()
	{
		$this->db->select('*, mahasiswa.nama as cusnama, users.nama_user as usname,
		softskill.total_poin as softpoin');
		$this->db->from('softskill');
		$this->db->join('mahasiswa', 'softskill.id_mahasiswa = mahasiswa.id', 'left');
		$this->db->join('users', 'softskill.id_user = users.user_id', 'left');
		$this->db->order_by('date');
		$query = $this->db->get()->result();
		return $query;
	}
	
	public function getDataTransaksi(){
		
	}
    
    public function cetak($tgl1, $tgl2)

	{
		$this->db->select('*, mahasiswa.nama as cusnama');
		$this->db->from('softskill');
		$this->db->join('mahasiswa', 'softskill.id_mahasiswa = mahasiswa.id', 'left');
		$this->db->where('date >=', $tgl1);
		$this->db->where('date <=', $tgl2);
		$query = $this->db->get()->result();
		return $query;
    }
    
    function get_transaksi_detail($id_softskill = null)
	{
        $this->db->select('*, perolehan.nama_perolehan as nm_per,jenis.nama_jenis as namjes, softskill.date as softdate, 
        perolehan.poin as perpoin, tingkat.nama_tingkat as ting');
		$this->db->from('detail_transaksi');
		$this->db->join('perolehan', 'detail_transaksi.id_perolehan = perolehan.id_perolehan');
		$this->db->join('softskill', 'softskill.p_id = detail_transaksi.id_softskill');
		if ($id_softskill != null) {
			$this->db->where('detail_transaksi.id_softskill', $id_softskill);
		}
		$query = $this->db->get();
		return $query;
    }
    
    public function getAllDetail($id = null)
	{
		$this->db->select('mahasiswa.nim, mahasiswa.nama, perolehan.nama_perolehan, perolehan.poin');
		$this->db->from('detail_transaksi');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = stock.id_barang');
		$this->db->join('supplier', 'supplier.id = stock.supplier_id', 'left');
		if ($id != null) {
			$this->db->where('id_barang', $id);
		}
		$query =  $this->db->get();
		return $query;
	}

    
}

