<!--
SYAHRUL
XII RPL 1
12 - Januari - 2019
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

	protected $tabel='Buku';
	protected $primary='id_buku';


	public function tampil($offset=0,$order_column='',$order_type='asc') {
		
		/*
		tampil data biasa
		$query=$this->db->get($this->tabel);
		return $query->result();*/
		if (empty($order_column) || empty($order_type))
			$this->db->order_by($this->primary,'asc');
		else
			$this->db->order_by($order_column,$order_type);

		return $this->db->get('anggota',$offset)->result();
	}
	public function view($id)
	{
		$this->db->where('id_anggota', $id);
		return $this->db->get('anggota')->row();
	}
	public function dataTransaksi($id)
	{
		$this->db->select('meminjam.id_pinjam,buku.judul,meminjam.tgl_pinjam,meminjam.tgl_kembali,meminjam.jumlah_pinjam,meminjam.kembali');
		$this->db->from('meminjam');
		$this->db->where('anggota.id_anggota', $id);		
		$this->db->join('anggota', 'meminjam.id_anggota = anggota.id_anggota');
		$this->db->join('buku', 'meminjam.id_buku = buku.id_buku');

		return $this->db->get();
	}
	public function dataBuku()
	{
		return $this->db->get('buku');
	}
	public function detailBuku($id)
	{
		$this->db->where('id_buku', $id);
		return $this->db->get('buku');
	}
	public function simpan($data)
	{
		$this->db->insert('meminjam',$data);
	}
	public function updateJumlahBuku($idbuku)
	{
		$row=$this->jumlahbuku($idbuku);
		$data=['jumlah_buku'=>$row->jumlah_buku-1];
		$this->db->where('id_buku', $idbuku);
		$this->db->update('buku', $data);
	}
	public function updateJumlahBuku1($idbuku)
	{
		$row=$this->jumlahbuku($idbuku);
		$data=['jumlah_buku'=>$row->jumlah_buku+1];
		$this->db->where('id_buku', $idbuku);
		$this->db->update('buku', $data);
	}
	public function jumlahbuku($idbuku)
	{
		$this->db->select('jumlah_buku');
		$this->db->where('id_buku', $idbuku);
		$query=$this->db->get('buku')->row();
		return $query;
	}
	public function viewTransaksi($id)
	{
		$this->db->where('id_pinjam', $id);
		return $this->db->get('meminjam')->row();

	}
	public function updatedata($data,$id)
	{
		$this->db->update('meminjam', $data,array('id_pinjam'=>$id));
	}
	
	public function jumlah()
	{
		return $this->db->count_all($this->tabel);
	}
	public function autoid()
	{
		$this->db->select('RIGHT(meminjam.id_pinjam,4) as kode', FALSE );
		$this->db->order_by('id_pinjam', 'desc');
		$this->db->limit(1);

		$query=$this->db->get('meminjam');
		if ($query->num_rows()<>0) {
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode, 4,"0",STR_PAD_LEFT);
		$kodejadi="ODJ-9921-".$kodemax;
		return $kodejadi;
	}

}
/*<!--
SYAHRUL
XII RPL 1
12 - Januari - 2019
-->*/
/* End of file PeminjamModel.php */
/* Location: ./application/models/PeminjamModel.php */