<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
// save account
	public function Login($email, $password){
		$result = $this->db->get_where('user_account', array('email' => $email, 'password' => $password));
			if ($result->num_rows() > 0) {
				$row = $result->row();
				$this->session->set_userdata(array(
				 	 'user_id' => $row->user_id,
					 'email' => $row->email,
					 'is_logged_in' => true,
					 'role' => $row->role,
					 'activate' => $row->activate,
					 'confirm' => $row->confirm,
					 'confirm_code' => $row->confirm_code,
		 	 	));
		 	 	return 1;
			}else{
				return false;
			}
	}
}