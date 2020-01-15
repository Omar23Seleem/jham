<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalEmp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ApprovalEmpModel','ApprovalEmp');
	}

	public function ajax_list()
	{
		$list = $this->ApprovalEmp->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $ApprovalEmp) {
			$no++;
			if ($ApprovalEmp->role == 4) {
				$type = 'Applicant';
			}else{
				$type = 'Employer';
			}
			$row = array();
			// $row[] = $accounts->id;
			$row[] = $ApprovalEmp->email;
			$row[] = $type;
			//add html for action <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_accounts('."'".$accounts->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			$row[] = '
				  <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="View" onclick="view('."'".$ApprovalEmp->user_id."'".')">View/Activate</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->ApprovalEmp->count_all(),
						"recordsFiltered" => $this->ApprovalEmp->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function activate(){
		$data = array(
			'activate' => 1,
			'denied' => 0,
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
		 $this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        
        // **********************************Text Message*************************************
        $from = 'PESO';
        $to = $this->input->post('phone');
        $message = array(
            'text' => 'Hi This is PESO, Account has been Denied Thank you!',
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        echo "<h1>Text Message</h1>";
		$query = $this->db->update('user_account', $data);
		if ($query) {
		return 1;
		}else{
			return false;
		}
		return $query;
	}
	public function get_employer_data($id){
		$this->db->where('emp_user_id', $id);
		$query = $this->db->get('employer_data');
		if($query->num_rows() > 0){
		$row = $query->row();

		$data =
			'<div class="card py-4 px-4">
        	<div class="table-responsive table-bordered ">
	            <table class="table">
	               <tr>
	                   <th align="center" style="text-align: center;">
	                       <h5>NSRP From 2</h5>
	                       <h6>July 2017</h6>
	                   </th>
	                   <th>
	                       <div class="text-center">
	                            <p>Republic of the Philippines</p>
	                            <p>Department of Labor and Employment</p>
	                            <p><strong>National Skill Registration Program</strong></p>
	                            <h5>Registration Form</h5>
	                        </div>
	                   </th>
	               </tr>
	            </table>
	        </div>
	        <br>
        	<form id="nsfr_emp" method="post">
		        <div class="row form-applicant">    
	                <div class="col-12">
	                    <div class="card pad-15">
	                        <h5>I. Establishment Details</h5>
	                        <br>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Etablisment Name</label>
	                                <input class="form-control" value="'.$row->emp_name.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Acronym/Abbreviation</label>
	                               <input class="form-control" value="'.$row->emp_acronym.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Tax Identification Number</label>
	                                <input class="form-control" value="'.$row->emp_tax.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Employer Type</label>
	                                <input class="form-control" value="'.$row->emp_type.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Total Work Force</label>
	                                <input class="form-control" value="'.$row->emp_force.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Line of Business/Industry (check BIR 2303)</label>
	                                <input class="form-control" value="'.$row->emp_line_bus.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Address</label>
	                                <input class="form-control" value="'.$row->emp_address.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Barangay</label>
	                                <input class="form-control" value="'.$row->emp_barangay.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>City/Municipality</label>
	                                <input class="form-control" value="'.$row->emp_city.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Province</label>
	                                <input class="form-control" value="'.$row->emp_province.'">
	                            </div>
	                        </div>
	                    </div>
	                    <br>
	                    <div class="card pad-15">
	                        <h5>I. Establishment Contact Details</h5>
	                        <br>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Title</label>
	                               <input class="form-control" value="'.$row->emp_cont_title.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Contact Person (Full Name)</label>
	                                <input class="form-control" value="'.$row->emp_cont_person.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Position</label>
	                                <input class="form-control" value="'.$row->emp_cont_position.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Telephone</label>
	                                <input class="form-control" value="'.$row->emp_cont_tel.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Mobile No.</label>
	                                <input class="form-control" value="'.$row->emp_cont_mobile.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Fax No.</label>
	                                <input class="form-control" value="'.$row->emp_cont_fax.'">
	                            </div>
	                        </div>
	                        <div class="form-row">
	                            <div class="col">
	                                <label>Email Address</label>
	                                <input class="form-control" value="'.$row->emp_cont_email.'">
	                            </div>
	                        </div>
	                        
	                    </div>
	                </div>
	    		</div>
    		</form>
    		<form id="send">
                    <input type="hidden" name="phone" value="'.$row->emp_cont_mobile.'">
                  </form>
        </div>'
		;
	}else{
		$data = '<h3>NSRP Not found or empty!</h3>';
	}

		echo json_encode($data);
	}
}

