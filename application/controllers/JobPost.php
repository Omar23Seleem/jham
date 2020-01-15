<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobPost extends CI_Controller {

	public function create_job()
	{
		$date = new DateTime('now');
		$date->modify('+2 month'); // or you can use '-90 day' for deduct
		$date = $date->format('Y-m-d');
		$create_job = array(
			'job_title' => $this->input->post('job_title'),
			'job_description' => $this->input->post('job_description'),
			'job_location' => $this->input->post('job_location'),
			'job_specialization' => $this->input->post('job_specialization'),
			'job_salary' => $this->input->post('job_salary'),
			'job_salary_type' => $this->input->post('job_salary_type'),
			'job_slot' => $this->input->post('job_slot'),
			'job_exp' => $this->input->post('job_exp'),
			'job_shift' => $this->input->post('job_shift'),
			'job_type' => $this->input->post('job_type'),
			'emp_user_id' => $this->session->userdata('user_id'),
			'job_date_create' => date('Y-m-d'),
			'expirry_date' => $date,
			'job_edu_lvl' => $this->input->post('job_edu_lvl'),
		);
		$insert = $this->JobPostModel->add_job($create_job);
		$this->save_century_skill();
		if ($insert) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function save_century_skill()
	{
		$inovation = $this->input->post('inovation');
		$team_work = $this->input->post('team_work');
		$multitasking = $this->input->post('multitasking');
		$work_ethics = $this->input->post('work_ethics');
		$self_motivation = $this->input->post('self_motivation');
		$creative_problem = $this->input->post('creative_problem');
		$problem_solving = $this->input->post('problem_solving');
		$critical_thinking = $this->input->post('critical_thinking');
		$decision_making = $this->input->post('decision_making');
		$strees_tolerance = $this->input->post('strees_tolerance');
		$planing = $this->input->post('planing');
		$perceptiveness = $this->input->post('perceptiveness');
		$english_funtional = $this->input->post('english_funtional');
		$english_comp = $this->input->post('english_comp');
		$math_functional = $this->input->post('math_functional');
		$data = array(
			'job_post_id' => $this->db->insert_id(),
			'inovation' => isset($inovation) ? $inovation : "0",
			'team_work' => isset($team_work) ? $team_work : "0",
			'multitasking' => isset($multitasking) ? $multitasking : "0",
			'work_ethics' => isset($work_ethics) ? $work_ethics : "0",
			'self_motivation' => isset($self_motivation) ? $self_motivation : "0",
			'creative_problem' => isset($creative_problem) ? $creative_problem : "0",
			'problem_solving' => isset($problem_solving) ? $problem_solving : "0",
			'critical_thinking' => isset($critical_thinking) ? $critical_thinking : "0",
			'decision_making' => isset($decision_making) ? $decision_making : "0",
			'strees_tolerance' => isset($strees_tolerance) ? $strees_tolerance : "0",
			'planing' => isset($planing) ? $planing : "0",
			'perceptiveness' => isset($perceptiveness) ? $perceptiveness : "0",
			'english_funtional' => isset($english_funtional) ? $english_funtional : "0",
			'english_comp' => isset($english_comp) ? $english_comp : "0",
			'math_functional' => isset($math_functional) ? $math_functional : "0",

		);
		$insert = $this->db->insert('job_skill', $data);
	}
	public function applyJob()
	{
		$apply_job = array(
			'app_job_id' => $this->input->post('job_id'),
			'app_user_id' => $this->input->post('app_user_id'),
			'app_date' => date("d-m-y"),
		);
		$insert = $this->JobPostModel->apply_job($apply_job);
		if ($insert) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function wishJob()
	{
		$wish_job = array(
			'job_id' => $this->input->post('job_id'),
			'app_user_id' => $this->input->post('app_user_id'),
			'date' => date("d-m-y"),
		);
		$insert = $this->JobPostModel->wish_job($wish_job);
		if ($insert) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function do_upload(){
        $config = array(
			'upload_path' => "./upload/jobfair/",
			'allowed_types' => "jpeg|jpg|png",
			'overwrite' => TRUE,
			'max_size' => "5000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "0",
			'max_width' => "0",
			'encrypt_name' => TRUE,
				);
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
	        $data = array('upload_data' => $this->upload->data());
	        $data1 = array(
	        'file' => $data['upload_data']['file_name'],
	        'slot' => $this->input->post('jf_slot'),
	        'type' => $this->input->post('type'),
	        'jf_title' => $this->input->post('jf_title'),
	        'venue' => $this->input->post('jf_venue'),
	        'jf_description' => $this->input->post('jf_description'),
	        'active' => '1',
	        'date' => $this->input->post('date'),
	        );  
	        $result= $this->JobPostModel->save_job_fair($data1);
	        if ($result == TRUE) {
	            echo "true";
	        }else{
	        	echo "false";
	        }
        }else{
			$error = array('error' => $this->upload->display_errors());
        }

     }
    public function job_fair_edit()
	{
		$data = array(
		     'jf_title'	=> $this->input->post('jf_title'),
		     'date'	=> $this->input->post('date'),
		     'slot'	=> $this->input->post('jf_slot'),
		     'venue'	=> $this->input->post('jf_venue'),
		     'jf_description'	=> $this->input->post('jf_description'),
		);   
		$this->db->where('jf_id', $this->input->post('jf_id'));
		$update = $this->db->update('job_fair', $data);
		if ($update) {
			echo 1;
		}else{
			echo 0;
		}       
	}
	public function job_fair_slot()
	{
		$data = array(
		     'slot'	=> $this->input->post('slot'),
		);   
		$this->db->where('jf_id', $this->input->post('jf_id'));
		$update = $this->db->update('job_fair', $data);      
	}
	public function send_reserve()
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
	    $this->email->to($this->session->userdata('email')); 
	    $resv_id = $this->input->post('resv_id');
	    $this->email->subject('JOB fair reservation');
	    $this->email->message('Present this Reserveation ID on the venue '.$resv_id);  

	    if ($this->email->send()) {
	    	echo 'sent';
	    }

	    echo $this->email->print_debugger();
	
	}
	public function reserve()
	{
		$this->job_fair_slot();
		$this->send_reserve();
		$data = array(
			'jf_id' => $this->input->post('jf_id'),
			'resv_id' => $this->input->post('resv_id'),
			'app_user_id' => $this->input->post('resv_id'),
		);
		$insert = $this->db->insert('reservation', $data);
		if ($insert) {
			echo 1;
		}else{
			echo 0;
		}
	}
	 public function latest_post(){
	    $this->db->order_by('job_id', 'desc');
	    $this->db->where('job_status', 1);
	    $this->db->where('job_slot >', 0);
	    $this->db->limit(3);
	    $query = $this->db->get('job_post');
		$rows = $query->result ();

		$data = '<div class="row">';
		foreach ($rows as $row) {
			$date = date('Y-m-d');
		    $now = strtotime($date);
		    $exp = strtotime($row->expirry_date);
		    if ($now < $exp) {
				$data .= '<div class="col-md-4">
					<div class="card" style="padding: 40px 0; background-color: #6c757d1a;">
						<h4>'.$row->job_title.'</h4>
						<p>'.$row->job_location.'</p>
						<a clas="btn btn-primary" href="'.site_url().'/FrontPage/job/'.$row->job_id.'">Read More >></a>
					</div>
				</div>';
			}
			
		}
		$data .= '</div>';
		echo json_encode($data);
	}
}
