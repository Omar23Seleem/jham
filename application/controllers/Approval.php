<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ApprovalModel','Approval');
	}

	public function ajax_list()
	{
		$list = $this->Approval->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Approval) {
			$no++;
			if ($Approval->role == 4) {
				$type = 'Applicant';
			}else{
				$type = 'Employer';
			}
			$row = array();
			// $row[] = $accounts->id;
			$row[] = $Approval->email;
			$row[] = $type;
			//add html for action <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="Edit" onclick="edit_accounts('."'".$accounts->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			$row[] = '
				  <a class="btn btn-sm btn-primary crud" href="javascript:void()" title="View" onclick="view('."'".$Approval->user_id."'".')">View/Activate</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Approval->count_all(),
						"recordsFiltered" => $this->Approval->count_filtered(),
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

	public function get_applicant_data($id){
		$this->db->where('applicant_id', $id);
		$query = $this->db->get('applicant_personal');
		if($query->num_rows() > 0){
		$row = $query->row();

		$data ='  
        
        <div class="row">
                        <div class="table-responsive table-bordered ">
                            <table class="table">
                               <tr>
                                   <th align="center" style="text-align: center;">
                                       <h5>NSRP From 1.REV 3</h5>
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
                    </div>';
		$data .='
		 <div class="row form-applicant">
                        <form id="form_applicant" method="post">
                        <div class="col-12">
                            <div class="card pad-15 mbt-15">
                                <h5>I. Personal Information</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label>Last Name</label>
                                        <input name="lname" id="lname" type="text" class="form-control"  value='.$row->lname.'>
                                    </div>
                                    <div class="col-md-3">
                                         <label>First Name</label>
                                        <input name="fname" id="fname" type="text" class="form-control" value='.$row->fname.'>
                                    </div>
                                    <div class="col-md-3">
                                         <label>Middle Name</label>
                                        <input name="mname" id="mname" type="text" class="form-control" value='.$row->mname.'>
                                    </div>
                                    <div class="col-md-3">
                                         <label>Suffix</label>
                                        <input name="suffix" id="suffix" type="text" class="form-control" value='.$row->suffix.'>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label>Date of Birth</label>
                                        <input name="dbirth" id="dbirth" type="text" class="form-control" value='.$row->dbirth.'>
                                    </div>
                                    <div class="col">
                                         <label>Age</label>
                                        <input name="age" id="age" type="text" class="form-control" value='.$row->age.'>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Sex</label>
                                                     <input name="age" id="age" type="text" class="form-control" value='.$row->sex.'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Place of Birth</label>
                                                <input name="pbirth" id="pbirth" type="text" class="form-control" value='.$row->pbirth.'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Civil Status</label>
                                                     <input name="pbirth" id="pbirth" type="text" class="form-control" value='.$row->civil.'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Citizenship</label>
                                                <input name="citizenship" id="citizenship" type="text" class="form-control" value='.$row->citizenship.'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Height</label>
                                                <input name="height" id="height" type="text" class="form-control" value='.$row->height.'>
                                            </div>
                                            <div class="col">
                                                <label>Weight</label>
                                                <input name="weight" id="weight" type="text" class="form-control" value='.$row->weight.'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Landline Number</label>
                                                <input name="phone" id="phone" type="text" class="form-control" value='.$row->phone.'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-6">
                                                <label>Mobile Number</label>
                                                <input name="mphone1" id="mphone1" type="text" class="form-control" value='.$row->mphone1.'>
                                            </div>
                                            <div class="col-6">
                                                <label>Mobile Number 2</label>
                                                <input name="mphone2" id="mphone2" type="text" class="form-control" value='.$row->mphone2.'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label>Present Address</label>
                                        <div class="form-row">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">House No./Street Village</span>
                                                </div>
                                                <input type="text" class="form-control" name="street" id="street" aria-describedby="basic-addon3" value='.$row->street.'>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >Barangay</span>
                                                </div>
                                                <input type="text" class="form-control" name="barangay" id="barangay" aria-describedby="basic-addon3" value='.$row->barangay.'>
                                            </div>
                                             <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"  >Municipality/City</span>
                                                </div>
                                                <input type="text" class="form-control" name="municipality" id="municipality" aria-describedby="basic-addon3" value='.$row->municipality.'>
                                            </div>
                                             <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">Province</span>
                                                </div>
                                                <input type="text" class="form-control" name="province" id="province" aria-describedby="basic-addon3" value='.$row->province.'>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-4">
                                                <label>Permanent Address</label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">House No./Street Village</span>
                                                </div>
                                                <input type="text" class="form-control" name="street_p" id="street_p" aria-describedby="basic-addon3" value='.$row->street_p.'>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">Barangay</span>
                                                </div>
                                                <input type="text" class="form-control" name="barangay_p" id="barangay_p" aria-describedby="basic-addon3" value='.$row->barangay_p.'>
                                            </div>
                                             <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">Municipality/City</span>
                                                </div>
                                                <input type="text" class="form-control" name="municipality_p" id="municipality_p" aria-describedby="basic-addon3" value='.$row->municipality_p.'>
                                            </div>
                                             <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">Province</span>
                                                </div>
                                                <input type="text" class="form-control" name="province_p" id="province_p" aria-describedby="basic-addon3" value='.$row->province_p.'>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- ///row -->     
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Disability</label>
                                            <input type="text" class="form-control" value='.$row->other_disability.'>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Employment Status</label>
                                            <input type="text" class="form-control" value='.$row->employment.'>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Type</label>
                                        <input type="text" class="form-control" value='.$row->emp_status.'>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label>Are you actively looking for work?</label>
                                        <input type="text" class="form-control" value='.$row->looking_work.'>
                                    </div>
                                    <div class="col-md-6">
                                         <label>If Yes, How long have you been looking for work?</label>
                                         <input type="text" class="form-control" value='.$row->looking_work_status	.'>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label>Willing to work immediatele?</label>
                                        <input type="text" class="form-control" value='.$row->willing_work.'>
                                    </div>
                                    <div class="col-md-6">
                                         <label>If No, when?</label>
                                         <input type="text" class="form-control" value='.$row->when_work.'>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label>Are you a 4Ps Beneficiary?</label>
                                        <input type="text" class="form-control" value='.$row->four_ps.'>
                                    </div>
                                    <div class="col-md-6">
                                         <label>If Yes, Household ID No.</label>
                                         <input type="text" class="form-control" value='.$row->four_ps_number.'>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label>Are you an OFW?</label>
                                        <input type="text" class="form-control" value='.$row->ofw.'>
                                    </div>
                                    <div class="col-md-6">
                                         <label>Are you considering comming back to the Philippines to work?</label>
                                        <input type="text" class="form-control" value='.$row->work_back.'>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part1 -------------------------------------- -->';
                        $this->db->where('app_user_id', $id);
                        $query = $this->db->get('job_preference');
                        $prep = $query->row();
                        $data .='<div class="card pad-15 mbt-15">
                                <h5>II. Job Preference</h5>
                                <br>
                                <h5>Preferred Occupation adn Industry</h5>
                                <br>
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <label>Occupation(e.g clerk, call center agent, saleslady)</label>
                                        <input type="text" class="form-control" value='.$prep->occupation1.'>
                                        <input type="text" class="form-control" value='.$prep->occupation2.'>
                                        <input type="text" class="form-control" value='.$prep->occupation3.'>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Industry(e.g IT-BPM, Construction, Manufacturing)</label>
                                        <input type="text" class="form-control" value='.$prep->industry1.'>
                                        <input type="text" class="form-control" value='.$prep->industry2.'>
                                        <input type="text" class="form-control" value='.$prep->industry3.'>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label >Salary Expectaion (PHP)</label>
                                         <input type="text" class="form-control" value='.$prep->salary_expect.'>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part2 -------------------------------------- -->';
                        $this->db->where('app_user_id', $id);
                        $query = $this->db->get('edu_background');
                        $edu = $query->row();
                        $data .= '<div class="card pad-15 mbt-15">
                                <h5>III. Educational Background</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Currently in School?</label>
                                        <input type="text" class="form-control" value='.$edu->currently_school.'>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Highest Educational Level</label>
                                        <input type="text" class="form-control" value='.$edu->edu_level.'>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 edbg">
                                        <br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Year Graduated/Last Attend(mm-yy)</span>
                                            </div>
                                            <input type="text" class="form-control" value="'.$edu->edu_year.'" aria-describedby="basic-addon3">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">School/University</span>
                                            </div>
                                            <input type="text" class="form-control" value="'.$edu->edu_school.'" aria-describedby="basic-addon3">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Course/Program</span>
                                            </div>
                                            <input type="text" class="form-control" value="'.$edu->edu_course.'" aria-describedby="basic-addon3">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Award/Honor Received</span>
                                            </div>
                                            <input type="text" class="form-control" value="'.$edu->edu_award.'" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part3 -------------------------------------- -->';
                        $this->db->where('app_user_id', $id);
                        $query = $this->db->get('tec_training');
                        $train = $query->result();
                        $data .= '<div class="card pad-15 mbt-15">
                                <h5>IV. Technical/Vocational and Other Training</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead class="thead-dark">
                                                <tr>
                                                  <th scope="col">Training</th>
                                                  <th scope="col">Duration of Course</th>
                                                  <th scope="col">Traning Institution</th>
                                                  <th scope="col">Certificate Received</th>
                                                  <th scope="col">Completed</th>
                                                </tr>
                                              </thead>
                                              <tbody>';
                                                foreach ($train as $tr) {
                                                    $data .= '<tr>
                                                      <th><input value="'.$tr->tec_training.'"  class="form-control" placeholder=""></th>
                                                      <td><input value="'.$tr->tec_duration.'"  class="form-control" placeholder=""></td>
                                                      <td><input value="'.$tr->tec_insti.'"  class="form-control" placeholder=""></td>
                                                      <td><input value="'.$tr->tec_cert.'"  class="form-control" placeholder=""></td>
                                                      <td><input value="'.$tr->tec_complete.'"  class="form-control" placeholder=""></td>
                                                    </tr>';
                                                }

                                               
                                                
                                              $data .='</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end Part4-------------------------------------- -->';
                        $this->db->where('app_user_id', $id);
                        $query = $this->db->get('elegibility');
                        $el = $query->result();
                        $data .= '<div class="card pad-15 mbt-15">
                                <h5>V. Elegibility</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead class="thead-dark">
                                                <tr>
                                                  <th scope="col">Carrer Service/Board/BAR</th>
                                                  <th scope="col">License Number</th>
                                                  <th scope="col">Expiry Date</th>
                                                </tr>
                                              </thead>
                                              <tbody>';
                                                foreach ($el as $eli) {
                                                   $data .= '<tr>
                                                              <th><input type="text" class="form-control" value='.$eli->el_carrer.'></th>
                                                              <td><input type="text" class="form-control" value='.$eli->el_license.'></td>
                                                              <td><input type="text" class="form-control" value='.$eli->el_expiry.'></td>
                                                            </tr>';
                                  
                                                }
                                                
                                              $data .= '</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>';
                                $this->db->where('app_user_id', $id);
                                $query = $this->db->get('languages');
                                $lang = $query->row();
                                $check = 'checked';
                                $false = '';
                                $data .='<div class="form-row">
                                    <div class="col-12"><h5>Language Profeciency Certification</h5></div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="EILTS" '.($lang->EILTS > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Internation English Language Testing System (EILTS)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="TOEFL" '.($lang->TOEFL > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Test English as Foriegn Language (TOEFL)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="TOCFL" '.($lang->TOCFL > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Test Chinese as Foreign Language (TOCFL)</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="JLPT" '.($lang->JLPT > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Japanese Language Profiency Test (JLPT)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="TOPIC" '.($lang->TOPIC > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Test of Profeciency in Korea (TOPIC)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="lang_other" '.($lang->lang_other > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Othes: Please Specify <span><input type="text" id="other_specify"  value="'.$lang->other_specify.'"></span></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Validity Date</span>
                                        </div>
                                        <input type="text" class="form-control" value="'.$lang->validity_date.'" aria-describedby="basic-addon3">
                                    </div>
                                </div>';
                                $this->db->where('app_user_id', $id);
                                $query = $this->db->get('dialect');
                                $dia = $query->row();
                                $check = 'checked';
                                $false = '';
                                $data .='<div class="form-row">
                                    <div class="col-md-12">
                                        <h5>Dialect Spoken</h5>
                                        <div class="form-check form-check-inline dialect">
                                            <input class="form-check-input" type="checkbox" name="tagalog" '.($dia->tagalog > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Tagalog </label>
                                            <input class="form-check-input" type="checkbox" name="ilocano" '.($dia->ilocano > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Ilocano </label>
                                            <input class="form-check-input" type="checkbox" name="ilongo" '.($dia->ilongo > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Ilongo </label>
                                            <input class="form-check-input" type="checkbox" name="bikol" '.($dia->bikol > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Bikol </label>
                                            <input class="form-check-input" type="checkbox" name="other_dialect" '.($dia->others > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Others </label>
                                            <input  class="form-other" type="text" name="dialect_others" value='.$dia->dialect_others.'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part5-------------------------------------- -->';
                            $this->db->where('app_user_id', $id);
                            $this->db->limit(3);
                            $query = $this->db->get('work_exp');
                            $work = $query->result();
                            $data .='<div class="card pad-15 mbt-15">
                                <h5>VI. Work Experince (Limit the occupation for the last 10 years. Start with the most recent Employment)</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead class="thead-dark">
                                                <tr>
                                                  <th scope="col">Name of Office/Company</th>
                                                  <th scope="col">Address</th>
                                                  <th scope="col">Position Held</th>
                                                  <th scope="col">Inclusive Dates</th>
                                                  <th scope="col">Status of Appointment</th>
                                                </tr>
                                              </thead>
                                              <tbody>';
                                                foreach ($work as $wrk) {
                                                $data .='<tr>
                                                  <th><input value="'.$wrk->work_company.'" id="tec_trainings" type="text" class="form-control" placeholder=""></th>
                                                  <td><input value="'.$wrk->work_address.'" id="tec_duration" type="text" class="form-control" placeholder=""></td>
                                                  <td><input value="'.$wrk->work_position.'" id="tec_insti" type="text" class="form-control" placeholder=""></td>
                                                  <td><input value="'.$wrk->work_date.'" id="tec_cert" type="text" class="form-control" placeholder=""></td>
                                                  <td><input value="'.$wrk->work_status.'" id="tec_comp" type="text" class="form-control" placeholder=""></td>
                                                </tr>';
                                                }
                                                 
                                              $data .= '</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end Part6-------------------------------------- -->';
                            $this->db->where('app_user_id', $id);
                            $query = $this->db->get('century_skill');
                            $cen = $query->row();
                            $check = 'checked';
                            $false = '';
                            $data .='<div class="card pad-15 mbt-15">
                                <div class="form-row skills">
                                    <div class="col-12"><h5>VII. 21st Century Skills - Check five(5) skills you posses (self-assesment)</h5><br></div>
                                    <br>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="inovation" '.($cen->inovation > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Inovation</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="team_work" '.($cen->team_work > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Team Work</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="multitasking" '.($cen->multitasking > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Multitasking</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="work_ethics" '.($cen->work_ethics > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Work Ethics</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="self_motivation" '.($cen->self_motivation > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Self Motivation</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="creative_problem" '.($cen->creative_problem > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Creative Problem Solving</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="problem_solving" '.($cen->problem_solving > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Problem Solving</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="critical_thinking" '.($cen->critical_thinking > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Critical Thinking</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="decision_making" '.($cen->decision_making > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Decision Making</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="strees_tolerance" '.($cen->strees_tolerance > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Stress Tolerance</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="planing" '.($cen->planing > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">PLaning and Organizing</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="perceptiveness" '.($cen->perceptiveness > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Social Perceptiveness</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="english_funtional" '.($cen->english_funtional > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">English Functional Skills</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="english_comp" '.($cen->english_comp > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">English Comprehension</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="math_functional" '.($cen->math_functional > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Math Functional Skill</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part7-------------------------------------- -->';
                            $this->db->where('app_user_id', $id);
                            $query = $this->db->get('tech_skill');
                            $tec = $query->row();
                            $check = 'checked';
                            $false = '';
                            $data .='<div class="card pad-15 mbt-15">
                                <div class="form-row skills">
                                    <div class="col-12"><h5>VIII. Technical Skills Acquired Without Formal Training</h5><br></div>
                                    <br>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="carpentry" '.($tec->carpentry > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Carpentry</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="masonry" '.($tec->masonry > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Masonry</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="welding" '.($tec->welding > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Welding</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="auto_mechanic" '.($tec->auto_mechanic > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Auto Mechanic</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="plumbing" '.($tec->plumbing > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Plumbing</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="driving" '.($tec->driving > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Driving</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="gardening" '.($tec->gardening > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Gardening</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="tailoring" '.($tec->tailoring > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Tailoring</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="photography" '.($tec->photography > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Photography</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="hairdressing" '.($tec->hairdressing > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Hairdressing</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="cook" '.($tec->cook > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Cook</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="baking" '.($tec->baking > 0 ? $check : false).'>
                                            <label class="form-check-label" for="inlineCheckbox1">Baking</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Others</span>
                                            </div>
                                            <input type="text" class="form-control"  value="'.$tec->other_tech.'" id="other_tech" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part7-------------------------------------- -->
                        </form>
                    </div><!-- // row form -->
                    <form id="send">
                    <input type="hidden" name="phone" value="'.$row->mphone1.'">
                  </form>'
		;
	}else{
		$data = '<h3>NSRP Not found or empty!</h3>';
	}

		echo json_encode($data);
	}
}

