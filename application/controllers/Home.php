<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	//$this->load->helper(array('form','url','html','cookie'));
	//$this->load->library(array('session','form_validation','pagination'));
/*	$level=$this->session->userdata('level');
		if (!($level==1 OR $level==2)) {
			show_404();
		}
*/	
	public function index()
	{
		if ($this->session->has_userdata('login')==TRUE) {
		$title="WELCOME TO MY SITE";
		$main_view='admin/dashboard';
		$this->load->view('page',compact('main_view','title'));
		}else{

			$this->session->set_flashdata('pesan', 'Login Dulu');
			redirect('login','refresh');
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */