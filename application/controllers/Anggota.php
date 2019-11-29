<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	//private $limit=10;
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('AnggotaModel');
		$this->load->helper(array('form','url','html','cookie'));
		$this->load->library(array('session','form_validation','pagination'));
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

		$rows=$this->AnggotaModel->tampil($offset,$order_column,$order_type);
		$title="DATA ANGGOTA";
		$main_view='anggota/tabel';
		$this->load->view('page',compact('main_view','title','rows','pagination'));	
		}else{

			$this->session->set_flashdata('pesan', 'Login Dulu');
			redirect('login','refresh');
		}
	}
	public function cari()
	{
		$cariberdasarkan=$this->input->post('select_cari');
		$yangdicari=$this->input->post('tcari');
		
		$rows=$this->AnggotaModel->cari($cariberdasarkan,$yangdicari);
		$title="DATA ANGGOTA";
		$main_view='anggota/tabel';
		$pagination=$this->_pagination('anggota/index/');
		$this->load->view('page',compact('main_view','title','rows','pagination'));	
	}
	public function add()
	{
		$title="Data Anggota/Create";
		$main_view='anggota/addForm';
		$id_anggota=$this->AnggotaModel->autoid();
		$this->_set_rules();

		if ($this->form_validation->run()==TRUE) {
			/*$gambar=$this->_upGambar();*/
			$data=[
				'id_anggota'=>$this->input->post('tId'),
				'nm_anggota'=>$this->input->post('tNama'),
				'alamat'=>$this->input->post('tAlamat'),
				'ttl_anggota'=>$this->input->post('tTtl'),
				'status'=>$this->input->post('tStatus'),
				
			];
		$this->AnggotaModel->tambahdata($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan...');
		redirect('Anggota','refresh');
		}else{
			$this->load->view('page',compact('main_view','title','id_anggota'));
		}

	}
	public function edit($id)
	{
		$id=$this->uri->segment(3);
		$title="Data Anggota/Update/".$id;
		$main_view='Anggota/formEdit';
		$row=$this->AnggotaModel->view($id);
		//print_r($row);

		$this->_set_rules();
		if ($this->form_validation->run()==TRUE) {
			$data=[
				'id_anggota'=>$this->input->post('tId'),
				'nm_anggota'=>$this->input->post('tNama'),
				'alamat'=>$this->input->post('tAlamat'),
				'ttl_anggota'=>$this->input->post('tTtl'),
				'status'=>$this->input->post('tStatus'),
				
			];
		$this->AnggotaModel->update($id,$data);
		$this->session->set_flashdata('pesan','Data '.$id.' Telah Diperbaharui');
		redirect('Anggota','refresh');		
		}else{
			$this->load->view('page',compact('main_view','row','title'));
		}
	}

	public function delete()
	{
		$id=$this->uri->segment(3);
		
		$row=$this->AnggotaModel->delete($id);
		$this->session->set_flashdata('pesan', 'Data '.$id.' Telah Dihapus');
		redirect('Anggota','refresh');

	}












	public function _set_rules()
	{
		$pesan_error=[
			'required'=>'<span style="color:red;">Data Wajib di Isi</span>',
			'numeric'=>'<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
		];
		$this->form_validation->set_rules('tNama', 'Nama', 'required',$pesan_error);
		$this->form_validation->set_rules('tAlamat', 'Alamat', 'required',$pesan_error);
		$this->form_validation->set_rules('tTtl', 'Ttl', 'required',$pesan_error);
		$this->form_validation->set_rules('tStatus', 'Status', 'required',$pesan_error);
	}
	public function _pagination($uerl)
	{	
		$config['base_url'] =site_url($uerl);
		$config['total_rows'] = $this->AnggotaModel->jumlah();
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

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */