<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontPage extends CI_Controller {

	
	public function index()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Home',
				'footer' => 'FrontPage/Footer',
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function JobSearch()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/JobSearch',
				'footer' => 'FrontPage/Footer',
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function About()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/About',
				'footer' => 'FrontPage/Footer',
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function signup()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/SignUp',
				'footer' => 'FrontPage/Footer',
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function MyAccount()
	{
		if ($this->session->userdata('role') == 3) {
			 redirect('/FrontPage/MyAccount');
			 die();
		}else if($this->session->userdata('is_logged_in') != true) {
			redirect('/');
		}else if($this->session->userdata('role') == 4) {
			$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/MyAccount',
				'footer' => 'FrontPage/Footer',
			);
		$this->load->view('FrontPage/Template', $data);
		}else{
			redirect('/');
		}
		
	}
	public function Dashboard()
	{
		if ($this->session->userdata('role') == 4) {
			 redirect('/FrontPage/MyAccount');
			 die();
		}else if($this->session->userdata('is_logged_in') != true) {
			redirect('/');
		}else if($this->session->userdata('role') == 3) {
			$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Dashboard',
				'footer' => 'FrontPage/Footer',
			);
			$this->load->view('FrontPage/Template', $data);
		}else{
			redirect('/');
		}
		
	}

	public function applicant()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Applicant',
				'footer' => 'FrontPage/Footer',
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function Recomended()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Recomended',
				'footer' => 'FrontPage/Footer',
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function employer()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Employer',
				'footer' => 'FrontPage/Footer',
			);
		$this->load->view('FrontPage/Template', $data);
	}

	public function job($id)
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Job',
				'footer' => 'FrontPage/Footer',
				'job_id' => $id,
			);
		$this->load->view('FrontPage/Template', $data);
	}

	public function ajax_resume()
	{
		if (isset($_FILES["resume"]["name"])){
			$config = array(
				'upload_path' => "./uploads/resume/",
				'allowed_types' => "jpg|pdf|jpeg",
				'overwrite' => TRUE,
				'max_size' => "5000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "0",
				'max_width' => "0",
				'encrypt_name' => TRUE,
				);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('resume')) {
				echo $this->upload->display_errors();
			}else{
				$data = array('upload_data' => $this->upload->data());
				$file = $this->upload->data();
				$data = array( 
					'file' =>  $file['file_name'],
					'user_id' => $this->session->userdata('user_id'),
					);
				$this->db->insert('resume',$data);
			}
		}
	}

	function fetch_data(){
		sleep(1);
		$minimum_salary = $this->input->post('minimum_salary');
		$maximum_salary = $this->input->post('maximum_salary');
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = '#';
		$config['total_rows'] = $this->post_filter_model->count_all($minimum_salary, $maximum_salary);
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='active'><a href='#'>";
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['num_links'] = 3;
		$this->pagination->initialize($config);
			$page = $this->uri->segment(3);
			$start = ($page - 1) * $config['per_page'];
			$output = array(
				'pagination_link'  => $this->pagination->create_links(),
				'job_list'   => $this->post_filter_model->fetch_data($config["per_page"], $start, $minimum_salary, $maximum_salary)
			);
			echo json_encode($output);
	}
	  
	public function saveAccount()
	{
		
		$data = array('success' => false, 'message' => array());
		$this->form_validation->set_rules('role', 'role', 'trim|required|valid_email');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('password_confirm', 'password_confirm', 'trim|required|matches[password]');
		$this->form_validation->set_rules('role', 'role', 'required');
		if ($this->form_validation->run()){

			$array = array(
				'success' => '<div> class="alert alert-success>Success</div>', 
			);
			  
			$this->SignupModel->saveAccount();
		}else{
			$array = array(
				'error' => true ,
				'email' => form_error('role'), 
				'email' => form_error('email'), 
				'password' => form_error('password'), 
				'password_confirm' => form_error('password_confirm'), 
			);
		}
		echo json_encode($array);
	}

	public function send_confirm()
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

		$this->email->from('pesoalbay@gmail.com', 'PESO');
	    $this->email->to($this->input->post('email')); 
	    $token = $this->input->post('token');
	    $c_code = $this->input->post('confirm_code');
	    $this->email->subject('PESO Email Confirmation');
	    $this->email->message('Youre Email hase been used to register on the PESO Website. Confirmation code "'.$c_code.'"');  

	    if ($this->email->send()) {
	    	redirect('');
	    }

	    echo $this->email->print_debugger();
	
	}

	public function Forgot()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Forgotpass',
				'footer' => 'FrontPage/Footer'
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function Confirm()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Confirm',
				'footer' => 'FrontPage/Footer'
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function Changepass()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/Changepass',
				'footer' => 'FrontPage/Footer'
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function JobFair($id)
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/JobFair',
				'footer' => 'FrontPage/Footer',
				'jf' => $id
			);
		$this->load->view('FrontPage/Template', $data);
	}
	public function test()
	{
		$data = array(
				'header' => 'FrontPage/Header',
				'content' => 'FrontPage/test',
				'footer' => 'FrontPage/Footer'
			);
		$this->load->view('FrontPage/Template', $data);
	}

	
}