<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignupModel extends CI_Model {
// save account
	public function saveAccount(){
		$data = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'role' => $this->input->post('role'),
			'confirm_code' => $this->input->post('confirm_code'),
			'confirm' => 0,
			'date' => date('Y-m-d'),
			);		
			$insert = $this->db->insert('user_account', $data);
			if($insert){
				$this->session->set_userdata(array(
				 	 'user_id' => $this->db->insert_id(),
					 'email' => $this->input->post('email'),
					 'is_logged_in' => true,
					 'role' => $this->input->post('role'),
					 'confirm' => 0,
					 'confirm_code' => $this->input->post('confirm_code'),
		 	 	));
		 	 	$config = Array(
				    'protocol' => 'smtp',
				    'smtp_host' => 'ssl://smtp.googlemail.com',
				    'smtp_port' => 465,
				    'smtp_user' => 'pesoalbay@gmail.com',
				    'smtp_pass' => 'jhamalbay',
				    'mailtype'  => 'html', 
				    'charset'   => 'iso-8859-1'
				);
				
			}
				
	}
}