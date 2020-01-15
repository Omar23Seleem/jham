<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeniedJob extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DeniedJobModel','DeniedJob');
	}

	public function ajax_list()
	{
		$list = $this->DeniedJob->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $DeniedJob) {
			$no++;
			$row = array();
			// $row[] = $accounts->id;
			$row[] = $DeniedJob->job_title;
			$row[] = $DeniedJob->emp_name;
			$row[] = $DeniedJob->job_location;
			//add html for action <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_accounts('."'".$accounts->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			// $row[] = '
			// 	  <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="View" onclick="view('."'".$DeniedJob->job_id."'".')">View/Activate</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->DeniedJob->count_all(),
						"recordsFiltered" => $this->DeniedJob->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function activate(){
		$data = array(
			'job_status' => 1,
			);
		$this->db->where('job_id', $this->input->post('job_id'));
		$query = $this->db->update('job_post', $data);
		if ($query) {
		return 1;
		}else{
			return false;
		}
		return $query;
	}
	public function deny(){
		$data = array(
			'denied' => 1,
			);
		$this->db->where('job_id', $this->input->post('job_id'));
		$query = $this->db->update('job_post', $data);
		if ($query) {
		return 1;
		}else{
			return false;
		}
		return $query;
	}
	public function get_job_data($id){
		$this->db->where('job_id', $id);
		$query = $this->db->get('job_post');
		$row = $query->row();
		$com = $this->db->get_where('employer_data', array('emp_user_id' => $row->emp_user_id ))->row()->emp_name;
		$data = 
		'<div class="row">
        		<div class="col-md-7 job-border">
        		<div class="card pad-15">
        			<h5>'.$row->job_title.'</h5>
        			<h6>'.$com.'</h6>
        			<p><i>'.$row->job_location.'</i></p>
        			<br>
        			<div>'.$row->job_description.'</div>
        		</div>
        		</div>
        		<div class="col-5 job-border" >
    	 			<div class="card pad-15">
    	 				<i> Year Experince</i>
    	 				<p>'.$row->job_exp.'</p>
    	 				<i> Type</i>
    	 				<p>'.$row->job_type.'</p>
    	 				<i> Shift</i>
    	 				<p>'.$row->job_shift.'</p>
    	 				<i> Salary</i>
    	 				<p>'.$row->job_salary.' -- '.$row->job_salary_type.'</p>
    	 				<i> Slots Available</i>
    	 				<p>'.$row->job_slot.'</p>
    	 			</div>
    	 		</div>
        	</div>'
		;

		echo json_encode($data);
	}
}

