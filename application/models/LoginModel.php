<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

protected $tabel='tbuser';

	public function check_user($username,$password)
	{
		$pass=md5($password);
		$query= $this->db->get_where($this->tabel,array('username' =>$username ,'password'=>$pass),1,0);

		if ($query->num_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function getDataUser($username,$password)
	{
		$pass=md5($password);
	
		$this->db->select('
			nama,tblevel.id_level,nama_level
			');
		$this->db->from('tbuser');
		$this->db->join('tblevel', 'tblevel.id_level = tbuser.id_level');
		$this->db->where(array('username' =>$username ,'password'=>$pass));
		$query=$this->db->get();
		return $query->row();//1 baris=row, banyak=result
	}
}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */