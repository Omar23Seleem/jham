<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppAccount extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AppAccountModel','AppAccount');
	}

	public function ajax_list()
	{
		$list = $this->AppAccount->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $AppAccount) {
			$no++;
			if ($AppAccount->role == 4) {
				$type = 'Applicant';
			}else{
				$type = 'Employer';
			}
			$row = array();
			// $row[] = $accounts->id;
			$row[] = $AppAccount->email;
			$row[] = $type;
			//add html for action <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_accounts('."'".$accounts->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			$row[] = '
				  <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="View" onclick="view('."'".$AppAccount->user_id."'".')">Action</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->AppAccount->count_all(),
						"recordsFiltered" => $this->AppAccount->count_filtered(),
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
		$this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        
        // **********************************Text Message*************************************
        $from = 'PESO';
        $to = $this->input->post('phone');
        $message = array(
            'text' => 'Hi This is PESO, Account has been Activated Thank you!',
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        echo "<h1>Text Message</h1>";
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

