<!--
SYAHRUL
XII RPL 1
12 - Januari - 2019
-->


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	//private $limit=7;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('TransaksiModel');
		$this->load->helper(array('form','url','html','cookie','date'));
		$this->load->library(array('session','form_validation'));
		$level=$this->session->userdata('level');
		if (!($level==1 OR $level==2)) {
			show_404();
		}
	}
	public function index($offset=0,$order_column='id_anggota',$order_type='asc')
	{
		if ($this->session->has_userdata('login')==TRUE) {
		
		if(empty($offset)) $offset=0;
		if(empty($order_column)) $order_column='id_anggota';
		if(empty($order_type)) $order_type='asc';

		$rows=$this->TransaksiModel->tampil($offset,$order_column,$order_type);
		$title="PINJAM BUKU";
		$main_view='transaksi/tabel';
		$this->load->view('page',compact('main_view','title','rows'));	
		}else{

			$this->session->set_flashdata('pesan', 'Login Dulu');
			redirect('login','refresh');
		}
	}
	public function riwayat()
	{
		$id=$this->uri->segment(3);
		$hasil = $this->TransaksiModel->dataTransaksi($id)->result();
		$jumlahhasil = $this->TransaksiModel->dataTransaksi($id)->num_rows();
		if ($jumlahhasil !== 0) {
			$pesan="Jumlah Riwayat Peminjaman : ".$jumlahhasil;
		}else{
			$pesan="Transaksi Peminjaman <b>Tidak Ada</b>";
		}
		$bio=$this->TransaksiModel->view($id);
		set_cookie('biodata',$id,30000);
		$title='Riwayat Peminjaman/'.$bio->nm_anggota;
		$main_view='transaksi/tabelriwayat';
		$this->load->view('page',compact('main_view','title','hasil','pesan','bio'));	

	}
	public function pinjam()
	{
		$id=$this->uri->segment(3);
		$bio=$this->TransaksiModel->view($id);
		$data=$this->TransaksiModel->dataBuku()->result();
		$title='Data Stok Buku Tersedia';
		$main_view='transaksi/tabelbuku';
		$this->load->view('page',compact('main_view','title','data','bio'));
	}
	public function detail()
	{
		$id=$this->uri->segment(3);
		$id_pinjam=$this->TransaksiModel->autoid();
		$idpelanggan=get_cookie('biodata');
		$bio=$this->TransaksiModel->view($idpelanggan);
		$detail=$this->TransaksiModel->detailBuku($id)->row();
		$title='Transaksi/'.$bio->nm_anggota.'/Peminjaman';
		$main_view='transaksi/detailPinjam';
		$this->_set_rules();
		if($this->form_validation->run()==TRUE) {
			$idpelanggan=get_cookie('biodata');
			if (isset($idpelanggan)) {
				$data=[
					'id_pinjam'=>$this->input->post('tkodeT'),
					'id_buku'=>$this->input->post('tkode'),
					'id_anggota'=>$idpelanggan,
					'tgl_pinjam'=>$this->input->post('tglpi'),
					'tgl_kembali'=>'NULL',
					'jumlah_pinjam'=>'1',
					'kembali'=>'OUT',
				];
				$this->TransaksiModel->simpan($data);
				$this->TransaksiModel->updateJumlahBuku($this->input->post('tkode'));
				$this->session->set_flashdata('pesan','transaksi berhasil');
				redirect('transaksi','refresh');
			}else{
				$this->session->set_flashdata('pesan', 'waktu transaksi habis...silahkan ulangi lagi');
				redirect('transaksi','refresh');
			}
		}else{
			// /print_r($title);
			$this->load->view('page',compact('main_view','title','detail','bio','id_pinjam'));
		}
	}
	public function pulang($id)
	{
		$data=$this->TransaksiModel->viewTransaksi($id);
		$bukuid=$this->TransaksiModel->detailBuku($data->id_buku)->row();
		$idpelanggan=get_cookie('biodata');
		$bio=$this->TransaksiModel->view($idpelanggan);
		$title='Transaksi/'.$bio->nm_anggota.'/Pemulangan';
		$main_view='transaksi/detailPulang';
		$this->_set_rules_pulang();
		if($this->form_validation->run()==TRUE) {
			$idpelanggan=get_cookie('biodata');
			if (isset($idpelanggan)) {
				$data=[
					'tgl_kembali'=>$this->input->post('tglpu'),
					'kembali'=>'IN',
				];
				$this->TransaksiModel->updatedata($data,$this->input->post('tkode'));
				$this->TransaksiModel->updateJumlahBuku1($this->input->post('tkdbuku'));
				$this->session->set_flashdata('pesan', 'Pemulangan Buku Berhasil');
				redirect('transaksi','refresh');
			}else{
				$this->session->set_flashdata('pesan','waktu transaksi habis...');
				redirect('transaksi','refresh');		
			}
		}else{
			$this->load->view('page',compact('main_view','title','data','bio','bukuid'));
		}

	}
	public function logout()
	{
		$status=array('id','login','status');
		$this->session->unset_userdata($status);
		$this->session->set_flashdata('pesan','Thank');
		redirect('login','refresh');
			
	}



	public function _set_rules()
	{
		$pesan_error=[
			'required'=>'<span style="color:red;">Data Wajib di Isi</span>',
			'numeric'=>'<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
		];
		$this->form_validation->set_rules('tkode', 'KODE BUKU', 'callback_valid_jumlah_buku',$pesan_error);
		$this->form_validation->set_rules('tglpi', 'TANGGAL PINJAM', 'required',$pesan_error);


	}
	public function _set_rules_pulang()
	{
		$pesan_error=[
			'required'=>'<span style="color:red;">Data Wajib di Isi</span>',
			'numeric'=>'<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
		];
		$this->form_validation->set_rules('tglpu', 'TANGGAL PULANG', 'required',$pesan_error);
	

	}
	public function valid_jumlah_buku($idbuku)
	{
		$row=$this->TransaksiModel->jumlahbuku($idbuku);
		$jumlah=$row->jumlah_buku;
		if ($jumlah>1) {
			return TRUE;
		}else{
			$this->form_validation->set_message('valid_jumlah_buku', 'Stok Buku Minimum, Silahkan Coba Sepeda Yang Lain');
			return FALSE;
		}
	}


	public function _pagination($uerl)
	{	
		$config['base_url'] =site_url($uerl);
		$config['total_rows'] = $this->TransaksiModel->jumlah();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<p class="pagination">';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['num_tag_open'] = '&nbsp;';
		$config['num_tag_close'] = '&nbsp;';
		
		$this->pagination->initialize($config);
		
		return $this->pagination->create_links();
	}
}
/*<!--
SYAHRUL
XII RPL 1
12 - Januari - 2019
-->*/
/* End of file Peminjam.php */
/* Location: ./application/controllers/Peminjam.php */
