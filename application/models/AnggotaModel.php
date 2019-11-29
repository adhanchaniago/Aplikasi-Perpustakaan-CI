<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaModel extends CI_Model {

	protected $tabel='anggota';
	protected $primary='id_anggota';

	public function tampil($offset=0,$order_column='',$order_type='asc') {
		if (empty($order_column) || empty($order_type))
			$this->db->order_by($this->primary,'asc');
		else
			$this->db->order_by($order_column,$order_type);

		return $this->db->get($this->tabel,$offset)->result();
	}
	public function jumlah()
	{
		return $this->db->count_all($this->tabel);
	}
	public function autoid()
	{
		$this->db->select('RIGHT(anggota.id_anggota,2) as kode', FALSE );
		$this->db->order_by('id_anggota', 'desc');
		$this->db->limit(1);

		$query=$this->db->get('anggota');
		if ($query->num_rows()<>0) {
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode, 2,"0",STR_PAD_LEFT);
		$kodejadi="A0".$kodemax;
		return $kodejadi;
	}
	public function cari($berdasarkan,$cari)
	{
		$this->db->from($this->tabel);
		$this->db->select('id_anggota,nm_anggota,alamat,ttl_anggota,status');

		switch ($berdasarkan) {
			case '':
				$this->db->like('id_anggota',$cari);
				$this->db->or_like('nm_anggota',$cari);
				$this->db->or_like('alamat',$cari);
				$this->db->or_like('ttl_anggota',$cari);
				$this->db->or_like('status',$cari);
				break;
			default:
				$this->db->like($berdasarkan,$cari);
				break;
		}
		$query=$this->db->get()->result();
		return $query;
	}	

	public function tambahdata($data)
	{
		$this->db->insert($this->tabel, $data);
	}
	public function view($id)
	{
		$this->db->where('id_anggota', $id);
		$query=$this->db->get($this->tabel);
		return $query->row();
	}
	public function update($id,$data)
	{
		$this->db->where('id_anggota', $id);
		$this->db->update($this->tabel, $data);
	}
	public function delete($id)
	{
		$this->db->where('id_anggota', $id);
		$this->db->delete($this->tabel);
	}

}

/* End of file AnggotaModel.php */
/* Location: ./application/models/AnggotaModel.php */