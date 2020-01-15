<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeniedAccountEmp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DeniedAccountEmpModel','DeniedAccountEmp');
	}

	public function ajax_list()
	{
		$list = $this->DeniedAccountEmp->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $DeniedAccountEmp) {
			$no++;
			if ($DeniedAccountEmp->role == 4) {
				$type = 'Applicant';
			}else{
				$type = 'Employer';
			}
			$row = array();
			// $row[] = $accounts->id;
			$row[] = $DeniedAccountEmp->email;
			$row[] = $type;
			//add html for action <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_accounts('."'".$accounts->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			$row[] = '
				  <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="View" onclick="view('."'".$DeniedAccountEmp->user_id."'".')">Action</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->DeniedAccountEmp->count_all(),
						"recordsFiltered" => $this->DeniedAccountEmp->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function activate(){
		$data = array(
			'activate' => 1,
			);
		$this->db->where('user_id', $this->input->post('app_id'));
		$query = $this->db->update('user_account', $data);
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
		$this->db->where('user_id', $this->input->post('app_id'));
		$query = $this->db->update('user_account', $data);
		if ($query) {
		return 1;
		}else{
			return false;
		}
		return $query;
	}
	public function get_applicant_data($id){
		$this->db->where('applicant_id', $id);
		$query = $this->db->get('applicant_personal');

		$data = $query->result();

		echo json_encode($data);
	}
}

