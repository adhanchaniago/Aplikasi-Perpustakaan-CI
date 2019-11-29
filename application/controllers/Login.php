<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
		$this->load->database();
		$this->load->library(array('session','form_validation'));
		$this->load->model('LoginModel');
		$this->load->helper(array('form','url','html'));
	}
	public function index()
	{
		if ($this->session->has_userdata('login')!==TRUE) {
			$this->_login();
		}else{
			redirect('page','refresh');
		}
	}
	public function _login()
	{
		$this->_set_rules();
		if ($this->form_validation->run()==TRUE) {
			$use=$this->input->post('txtUser');//login/formlogin.php
			$pas=$this->input->post('txtPass');
		
		if ($this->LoginModel->check_user($use,$pas)) {
			$row=$this->LoginModel->getDataUser($use,$pas);
			$data=[
				'nama'=>$row->nama,
				'login'=>TRUE,
				'level'=>$row->id_level,
				'nama_level'=>$row->nama_level
			];
			//session untuk mengarahkan ke mana login nya
			//jumlah session 4 
			$this->session->set_userdata($data);
			redirect('page','refresh');
		}else{
			$this->session->set_flashdata('pesan','Username atau Password Salah');
			redirect('login','refresh');
		}

		}else{
/*			$main_view='login/formlogin';
			$this->load->view('page',compact('main_view'));	*/
			$this->load->view('login/formlogin');
		}


	}
	public function _set_rules()
	{
		$pesan_error=[
			'required'=>'<span style="color:red;">Data Wajib di Isi</span>',
			'numeric'=>'<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
		];
		$this->form_validation->set_rules('txtUser', 'Username', 'required',$pesan_error);
		$this->form_validation->set_rules('txtPass', 'Password', 'required',$pesan_error);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login_1.php */