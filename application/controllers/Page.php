<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	if ($this->session->userdata('login')!==TRUE) {
			redirect('login','refresh');
		}
	}
	public function index()
	{
		$level=$this->session->userdata('level');
		if ($level==1) {
			redirect('home','refresh');//admin
		}elseif ($level==2) {
			redirect('home','refresh');//operator
		}else{
			$this->logout();
		}
		/*elseif ($level==3) {
			redirect('laporan','refresh');//owner
		}elseif ($level==4) {
			redirect('gallery','refresh');//user
		}*/

	}
	public function logout()
	{
		$status=array('nama','login','level','nama_level');
		$this->session->unset_userdata($status);
		redirect('login','refresh');		
	}
}
/* End of file Page.php */
/* Location: ./application/controllers/Page.php */