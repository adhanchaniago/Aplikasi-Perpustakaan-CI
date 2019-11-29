<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model {

	public function semua($offset=0,$order_column='',$order_type='asc'){

        if(empty($order_column) || empty($order_type))
            $this->db->order_by('id_pinjam','asc');
        else
            $this->db->order_by($order_column,$order_type);
     
        return $this->db->get('laporan',$offset)->result();
    }

    public function jumlah(){
        return $this->db->count_all('laporan');
    }

    public function All()
    {
        return $this->db->get('laporan')->result();
    }
    public function rangetgl($tgl_aw,$tgl_ah)
    {
    	$this->db->where('tgl_pinjam BETWEEN "'.date('Y-m-d',strtotime($tgl_aw)).'" and "'.date('Y-m-d',strtotime($tgl_ah)).'"');//belum selesai
        //return $this->db->get_compiled_select('laporan');
        return $this->db->get('laporan')->result();
    }

    public function detailLaporan($id) //menampilkan riwayat transaksi dari si $id
    {
        $this->db->where('id_pinjam',$id);
        return $this->db->get('laporan')->row();
    }

}

/* End of file LaporanModel.php */
/* Location: ./application/models/LaporanModel.php */