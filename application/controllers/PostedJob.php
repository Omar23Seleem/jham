<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostedJob extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PostedJobModel','PostedJob');
	}

	public function ajax_list()
	{
		$list = $this->PostedJob->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $PostedJob) {
			$no++;
			$row = array();
			// $row[] = $accounts->id;
			$row[] = $PostedJob->job_title;
			$row[] = $PostedJob->emp_name;
			$row[] = $PostedJob->job_location;
			//add html for action <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_accounts('."'".$accounts->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			$row[] = '
				  <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="View" onclick="view('."'".$PostedJob->job_id."'".')">Details</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->PostedJob->count_all(),
						"recordsFiltered" => $this->PostedJob->count_filtered(),
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
	public function exp_date(){
		$data = array(
			'expirry_date' => $this->input->post('expirry_date'),
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

