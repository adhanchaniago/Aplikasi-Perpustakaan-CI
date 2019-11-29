<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	//private $limit=10;
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('BukuModel');
		$this->load->helper(array('form','url','html','cookie'));
		$this->load->library(array('session','form_validation','pagination'));
		$level=$this->session->userdata('level');
		if (!($level==1 OR $level==2)) {
			show_404();
		}
	}
	public function index($offset=0,$order_column='id_buku',$order_type='asc')
	{
		if ($this->session->has_userdata('login')==TRUE) {

		if(empty($offset)) $offset=0;
		if(empty($order_column)) $order_column='id_buku';
		if(empty($order_type)) $order_type='asc';

		$rows=$this->BukuModel->tampil($offset,$order_column,$order_type);
		$title="DATA BUKU";
		$main_view='buku/tabel';
		$this->load->view('page',compact('main_view','title','rows'));	
		}else{

			$this->session->set_flashdata('pesan', 'Login Dulu');
			redirect('login','refresh');
		}
	}
	public function cari()
	{
		$cariberdasarkan=$this->input->post('select_cari');
		$yangdicari=$this->input->post('tcari');
		
		$rows=$this->BukuModel->cari($cariberdasarkan,$yangdicari);
		$title="DATA BUKU";
		$main_view='buku/tabel';
		$pagination=$this->_pagination('buku/index/');
		$this->load->view('page',compact('main_view','title','rows','pagination'));	
	}
	public function add()
	{
		$title="Data Buku/Create";
		$main_view='buku/addForm';
		$id_buku=$this->BukuModel->autoid();
		$this->_set_rules();

		if ($this->form_validation->run()==TRUE) {
			/*$gambar=$this->_upGambar();*/
			$data=[
				'id_buku'=>$this->input->post('tId'),
				'judul'=>$this->input->post('tJudul'),
				'pengarang'=>$this->input->post('tPengarang'),
				'penerbit'=>$this->input->post('tPenerbit'),
				'jumlah_buku'=>$this->input->post('tJumlah'),
				
			];
		$this->BukuModel->tambahdata($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan...');
		redirect('Buku','refresh');
		}else{
			$this->load->view('page',compact('main_view','title','id_buku'));
		}

	}
	public function edit($id)
	{
		$id=$this->uri->segment(3);
		$title="Data Buku/Update/".$id;
		$main_view='Buku/formEdit';
		$row=$this->BukuModel->view($id);
		//print_r($row);

		$this->_set_rules();
		if ($this->form_validation->run()==TRUE) {
			$data=[
				'id_buku'=>$this->input->post('tId'),
				'judul'=>$this->input->post('tJudul'),
				'pengarang'=>$this->input->post('tPengarang'),
				'penerbit'=>$this->input->post('tPenerbit'),
				'jumlah_buku'=>$this->input->post('tJumlah'),
				
			];
		$this->BukuModel->update($id,$data);
		$this->session->set_flashdata('pesan','Data '.$id.' Telah Diperbaharui');
		redirect('Buku','refresh');		
		}else{
			$this->load->view('page',compact('main_view','row','title'));
		}
	}

	public function delete()
	{
		$id=$this->uri->segment(3);
		
		$row=$this->BukuModel->delete($id);
		$this->session->set_flashdata('pesan', 'Data '.$id.' Telah Dihapus');
		redirect('Buku','refresh');

	}












	public function _set_rules()
	{
		$pesan_error=[
			'required'=>'<span style="color:red;">Data Wajib di Isi</span>',
			'numeric'=>'<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
		];
		$this->form_validation->set_rules('tJudul', 'Judul', 'required',$pesan_error);
		$this->form_validation->set_rules('tPengarang', 'Pengarang', 'required',$pesan_error);
		$this->form_validation->set_rules('tPenerbit', 'Penerbit', 'required',$pesan_error);
		$this->form_validation->set_rules('tJumlah', 'Jumlah', 'required',$pesan_error);
	}
	public function _pagination($uerl)
	{	
		$config['base_url'] =site_url($uerl);
		$config['total_rows'] = $this->BukuModel->jumlah();
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

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */