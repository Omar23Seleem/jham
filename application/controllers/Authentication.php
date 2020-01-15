<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
        parent::__construct();

    }
    public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
	public function Login()
	{
		if ($this->checkDeny()) {
			echo 2;
		}else{
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$login = $this->LoginModel->Login($email, $password);
			if ($login) {
				$this->last_login();
				echo 1;
			}else{
				echo 'error';
			}
		}
		
	}
	public function last_login()
	{
		$data = array(
		     'last_login'	=> date('m-d-y'),
		);   
		$this->db->where('email', $this->input->post('email'));
		$update = $this->db->update('user_account', $data);
	}
	public function checkEmail()
	{
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('user_account');
		if($query->num_rows()>0){
			
		  echo $query->num_rows();
		}
		else {
		   echo $query->num_rows();
		}
	}
	public function checkDeny()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('denied', 1);
		$query = $this->db->get('user_account');
		if($query->num_rows()>0){
			
		  return true;
		}
		else {
		   return false;
		}
	}
	public function update_pass(){
		$data = array(
		     'token'	=> '',
		     'password'	=> md5($this->input->post('password')),
		);   
		$this->db->where('token', $this->input->post('token'));
		$update = $this->db->update('user_account', $data);
		if ($update) {
			echo 1;
		}else{
			echo 0;
		}       
	}
	public function update_confirm(){
		$this->db->where('confirm_code', $this->input->post('confirm_code'));
		$query = $this->db->get('user_account');
		if($query->num_rows()>0){
			
		  	$data = array(
		     	'confirm'	=> 1,
			);   
				$this->db->where('confirm_code', $this->input->post('confirm_code'));
				$update = $this->db->update('user_account', $data );
			
			if ($update) {
				$this->session->set_userdata('confirm', '1');
				echo 1;
			}else{
				echo 0;
			}
		}
		else {
		   echo 0;
		}
		       
	}
	public function send_mail()
	{
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'pesoalbay@gmail.com',
		    'smtp_pass' => 'jhamalbay',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from('pesoalbay@gmail.com', 'myname');
	    $this->email->to('test@yopmail.com'); 

	    $this->email->subject('Email Testasdasdasd');
	    $this->email->message('Testing the email class.');  

	    if ($this->email->send()) {
	    	echo 'sent';
	    }

	    echo $this->email->print_debugger();
	
	}
	public function send_token()
	{
		$data = array(
		     'token'	=> $this->input->post('token'),
		);   
		$this->db->where('email', $this->input->post('email'));
		$update = $this->db->update('user_account', $data);
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'pesoalbay@gmail.com',
		    'smtp_pass' => 'jhamalbay',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from('pesoalbay@gmail.com', 'PESO');
	    $this->email->to($this->input->post('email')); 
	    $token = $this->input->post('token');
	    $this->email->subject('Password Reset');
	    $this->email->message('please use this token '.$token);  

	    if ($this->email->send()) {
	    	echo 'sent';
	    }

	    echo $this->email->print_debugger();
	
	}
	public function delete($id){
		$delete =  $this->db->delete('user_account', array('user_id' => $id));
		if ($delete) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function delete_c(){
		$NewDate=Date('Y-m-d', strtotime("-3 days"));
		$delete =  $this->db->delete('user_account', array('date' => $NewDate));
		if ($delete) {
			echo 1;
		}else{
			echo 0;
		}
	}

}

