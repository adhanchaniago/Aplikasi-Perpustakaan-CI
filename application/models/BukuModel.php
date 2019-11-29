<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuModel extends CI_Model {
	protected $tabel='buku';
	protected $primary='id_buku';

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
		$this->db->select('RIGHT(buku.id_buku,2) as kode', FALSE );
		$this->db->order_by('id_buku', 'desc');
		$this->db->limit(1);

		$query=$this->db->get('buku');
		if ($query->num_rows()<>0) {
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode, 2,"0",STR_PAD_LEFT);
		$kodejadi="B0".$kodemax;
		return $kodejadi;
	}
	public function cari($berdasarkan,$cari)
	{
		$this->db->from($this->tabel);
		$this->db->select('id_buku,judul,pengarang,penerbit,jumlah_buku');

		switch ($berdasarkan) {
			case '':
				$this->db->like('id_buku',$cari);
				$this->db->or_like('judul',$cari);
				$this->db->or_like('pengarang',$cari);
				$this->db->or_like('penerbit',$cari);
				$this->db->or_like('jumlah_buku',$cari);
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
		$this->db->where('id_buku', $id);
		$query=$this->db->get($this->tabel);
		return $query->row();
	}
	public function update($id,$data)
	{
		$this->db->where('id_buku', $id);
		$this->db->update($this->tabel, $data);
	}
	public function delete($id)
	{
		$this->db->where('id_buku', $id);
		$this->db->delete($this->tabel);
	}
	

}

/* End of file BukuModel.php */
/* Location: ./application/models/BukuModel.php */