<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

	public function save_personal_info()
	{

		
		$province = $this->db->get_where('province', array('province_id' =>  $this->input->post('province')))->row()->province_name;
		$province_p = $this->db->get_where('province', array('province_id' => $this->input->post('province_p')))->row()->province_name;

		$data = array(
			'applicant_id' => $this->session->userdata('user_id'),
			'lname' => $this->input->post('lname'),
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'suffix' => $this->input->post('suffix'),
			'dbirth' => $this->input->post('dbirth'),
			'age' => $this->input->post('age'),
			'sex' => $this->input->post('sex'),
			'pbirth' => $this->input->post('pbirth'),
			'civil' => $this->input->post('civil'),
			'citizenship' => $this->input->post('citizenship'),
			'height' => $this->input->post('height'),
			'weight' => $this->input->post('weight'),
			'phone' => $this->input->post('phone'),
			'mphone1' => $this->input->post('mphone1'),
			'mphone2' => $this->input->post('mphone2'),
			'street' => $this->input->post('street'),
			'barangay' => $this->input->post('barangay'),
			'municipality' => $this->input->post('municipality'),
			'province' => $province,
			'street_p' => $this->input->post('street_p'),
			'barangay_p' => $this->input->post('barangay_p'),
			'municipality_p' => $this->input->post('municipality_p'),
			'province_p' => $province_p,
			'disability' => $this->input->post('disability'),
			'other_disability' => $this->input->post('other_disability'),
			'employment' => $this->input->post('employment'),
			'emp_status' => $this->input->post('emp_status'),
			'looking_work' => $this->input->post('looking_work'),
			'looking_work_status' => $this->input->post('looking_work_status'),
			'willing_work' => $this->input->post('willing_work'),
			'when_work' => $this->input->post('when_work'),
			'four_ps' => $this->input->post('4ps'),
			'four_ps_number' => $this->input->post('4ps_number'),
			'ofw' => $this->input->post('ofw'),
			'work_back' => $this->input->post('work_back'),
			'date' => date('Y-m-d'),

		);
		$insert = $this->ApplicantModel->save_personal($data);
		$this->save_job_preference();
		$this->save_edu_background();
		$this->save_language();
		$this->save_dialect();
		$this->save_century_skill();
		$this->save_tech_skill();
		$this->save_training();
		$this->save_elegibility();
		$this->save_work_exp();
		
		if ($insert) {
			echo 1;
			$this->logout();
		}else{
			echo 0;
		}

	}
	public function update_personal_info()
	{
		$data = array(
			'applicant_id' => $this->session->userdata('user_id'),
			'lname' => $this->input->post('lname'),
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'suffix' => $this->input->post('suffix'),
			'dbirth' => $this->input->post('dbirth'),
			'age' => $this->input->post('age'),
			'sex' => $this->input->post('sex'),
			'pbirth' => $this->input->post('pbirth'),
			'civil' => $this->input->post('civil'),
			'citizenship' => $this->input->post('citizenship'),
			'height' => $this->input->post('height'),
			'weight' => $this->input->post('weight'),
			'phone' => $this->input->post('phone'),
			'mphone1' => $this->input->post('mphone1'),
			'mphone2' => $this->input->post('mphone2'),
			'street' => $this->input->post('street'),
			'barangay' => $this->input->post('barangay'),
			'municipality' => $this->input->post('municipality'),
			'province' => $this->input->post('province'),
			'street_p' => $this->input->post('street_p'),
			'barangay_p' => $this->input->post('barangay_p'),
			'municipality_p' => $this->input->post('municipality_p'),
			'province_p' => $this->input->post('province_p'),
			'disability' => $this->input->post('disability'),
			'other_disability' => $this->input->post('other_disability'),
			'employment' => $this->input->post('employment'),
			'emp_status' => $this->input->post('emp_status'),
			'looking_work' => $this->input->post('looking_work'),
			'looking_work_status' => $this->input->post('looking_work_status'),
			'willing_work' => $this->input->post('willing_work'),
			'when_work' => $this->input->post('when_work'),
			'four_ps' => $this->input->post('4ps'),
			'four_ps_number' => $this->input->post('4ps_number'),
			'ofw' => $this->input->post('ofw'),
			'work_back' => $this->input->post('work_back'),

		);
		$update = $this->ApplicantModel->update_personal($data);
		
		if ($update) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
	public function save_job_preference()
	{
		$data = array(
			'app_user_id' => $this->session->userdata('user_id'),
			'occupation1' => $this->input->post('occupation1'),
			'occupation2' => $this->input->post('occupation2'),
			'occupation3' => $this->input->post('occupation3'),
			'industry1' => $this->input->post('industry1'),
			'industry2' => $this->input->post('industry2'),
			'industry3' => $this->input->post('industry3'),
			'salary_expect' => $this->input->post('salary_expect'),
		);
		$insert = $this->db->insert('job_preference', $data);
	}
	public function save_edu_background()
	{
		$data = array(
			'app_user_id' => $this->session->userdata('user_id'),
			'currently_school' => $this->input->post('currently_school'),
			'edu_level' => $this->input->post('edu_level'),
			'edu_year' => $this->input->post('edu_year'),
			'edu_school' => $this->input->post('edu_school'),
			'edu_course' => $this->input->post('edu_course'),
			'edu_award' => $this->input->post('edu_award'),			
		);
		$insert = $this->db->insert('edu_background', $data);
	}
	public function save_language()
	{
		$EILTS = $this->input->post('EILTS');
		$TOEFL = $this->input->post('TOEFL');
		$TOCFL = $this->input->post('TOCFL');
		$JLPT = $this->input->post('JLPT');
		$TOPIC = $this->input->post('TOPIC');
		$lang_other = $this->input->post('lang_other');
		$data = array(
			'app_user_id' => $this->session->userdata('user_id'),
			'EILTS' => isset($EILTS) ? $EILTS : "0",
			'TOEFL' => isset($TOEFL) ? $TOEFL : "0",
			'TOCFL' => isset($TOCFL) ? $TOCFL : "0",
			'JLPT' => isset($JLPT) ? $JLPT : "0",
			'TOPIC' => isset($TOPIC) ? $TOPIC : "0",
			'lang_other' => isset($lang_other) ? $lang_other : "0",
			'other_specify' => $this->input->post('other_specify'),
			'validity_date' => $this->input->post('validity_date'),
		);
		$insert = $this->db->insert('languages', $data);
	}
	public function save_dialect()
	{
		$tagalog = $this->input->post('tagalog');
		$ilocano = $this->input->post('ilocano');
		$ilongo = $this->input->post('ilongo');
		$bikol = $this->input->post('bikol');
		$other_dialect = $this->input->post('other_dialect');
		$data = array(
			'app_user_id' => $this->session->userdata('user_id'),
			'tagalog' => isset($tagalog) ? $tagalog : "0",
			'ilocano' => isset($ilocano) ? $ilocano : "0",
			'ilongo' => isset($ilongo) ? $ilongo : "0",
			'bikol' => isset($bikol) ? $bikol : "0",
			'others' => isset($other_dialect) ? $other_dialect : "0",
			'dialect_others' => $this->input->post('dialect_others'),
		);
		$insert = $this->db->insert('dialect', $data);
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
			'app_user_id' => $this->session->userdata('user_id'),
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
		$insert = $this->db->insert('century_skill', $data);
	}
	public function save_tech_skill()
	{
		$carpentry = $this->input->post('carpentry');
		$masonry = $this->input->post('masonry');
		$welding = $this->input->post('welding');
		$auto_mechanic = $this->input->post('auto_mechanic');
		$plumbing = $this->input->post('plumbing');
		$driving = $this->input->post('driving');
		$gardening = $this->input->post('gardening');
		$tailoring = $this->input->post('tailoring');
		$photography = $this->input->post('photography');
		$hairdressing = $this->input->post('hairdressing');
		$cook = $this->input->post('cook');
		$baking = $this->input->post('baking');
		$other_dialect = $this->input->post('other_dialect');
		$data = array(
			'app_user_id' => $this->session->userdata('user_id'),
			'carpentry' => isset($carpentry) ? $carpentry : "0",
			'masonry' => isset($masonry) ? $masonry : "0",
			'welding' => isset($welding) ? $welding : "0",
			'auto_mechanic' => isset($auto_mechanic) ? $auto_mechanic : "0",
			'plumbing' => isset($plumbing) ? $plumbing : "0",
			'driving' => isset($driving) ? $driving : "0",
			'gardening' => isset($gardening) ? $gardening : "0",
			'tailoring' => isset($tailoring) ? $tailoring : "0",
			'photography' => isset($photography) ? $photography : "0",
			'hairdressing' => isset($hairdressing) ? $hairdressing : "0",
			'cook' => isset($cook) ? $cook : "0",
			'baking' => isset($baking) ? $baking : "0",
			'other_tech' => $this->input->post('other_tech'),
		);
		$insert = $this->db->insert('tech_skill', $data);
	}
	public function save_training(){
		$data = array(
		   array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'tec_training'	=> $this->input->post('tec_training1'),
		     'tec_duration'	=> $this->input->post('tec_duration1'),
		     'tec_insti' 	=> $this->input->post('tec_insti1'),
		     'tec_cert'		=> $this->input->post('tec_cert1'),
		     'tec_complete' => $this->input->post('tec_complete1'),
		   ),
		   array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'tec_training'	=> $this->input->post('tec_training2'),
		     'tec_duration'	=> $this->input->post('tec_duration2'),
		     'tec_insti' 	=> $this->input->post('tec_insti2'),
		     'tec_cert'		=> $this->input->post('tec_cert2'),
		     'tec_complete' => $this->input->post('tec_complete2'),
		   ),
		   array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'tec_training'	=> $this->input->post('tec_training3'),
		     'tec_duration'	=> $this->input->post('tec_duration3'),
		     'tec_insti' 	=> $this->input->post('tec_insti3'),
		     'tec_cert'		=> $this->input->post('tec_cert3'),
		     'tec_complete' => $this->input->post('tec_complete3'),
		   )
		);
		$insert = $this->db->insert_batch('tec_training', $data);
		            
	}
	public function save_elegibility(){
		$data = array(
		   array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'el_carrer'	=> $this->input->post('el_carrer1'),
		     'el_license'	=> $this->input->post('el_license1'),
		     'el_expiry' 	=> $this->input->post('el_ex1piry1'),
		   ),
		   array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'el_carrer'	=> $this->input->post('el_carrer2'),
		     'el_license'	=> $this->input->post('el_license2'),
		     'el_expiry' 	=> $this->input->post('el_ex1piry2'),
		   ),
		);
		$insert = $this->db->insert_batch('elegibility', $data);
		            
	}
	public function save_work_exp(){
		$data = array(
		   array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'work_company'	=> $this->input->post('work_company1'),
		     'work_address'	=> $this->input->post('work_address1'),
		     'work_position' 	=> $this->input->post('work_position1'),
		     'work_date'		=> $this->input->post('work_date1'),
		     'work_status' => $this->input->post('work_status1'),
		   ),
		   array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'work_company'	=> $this->input->post('work_company2'),
		     'work_address'	=> $this->input->post('work_address2'),
		     'work_position' 	=> $this->input->post('work_position2'),
		     'work_date'		=> $this->input->post('work_date2'),
		     'work_status' => $this->input->post('work_status2'),
		   ),
		   array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'work_company'	=> $this->input->post('work_company3'),
		     'work_address'	=> $this->input->post('work_address3'),
		     'work_position' 	=> $this->input->post('work_position3'),
		     'work_date'		=> $this->input->post('work_date3'),
		     'work_status' => $this->input->post('work_status3'),
		   )
		);
		$insert = $this->db->insert_batch('work_exp', $data);
		            
	}

	public function save_awork_exp(){
		$data = array(
		     'app_user_id' 	=> $this->session->userdata('user_id'),
		     'work_company'	=> $this->input->post('work_company'),
		     'work_address'	=> $this->input->post('work_address'),
		     'work_position'=> $this->input->post('work_position'),
		     'work_date'	=> $this->input->post('work_date'),
		     'work_status' 	=> $this->input->post('work_status'),
		);
		$insert = $this->db->insert('work_exp', $data);
		if ($insert) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function update_work_exp(){
		$data = array(
		     'work_company'	=> $this->input->post('work_company'),
		     'work_address'	=> $this->input->post('work_address'),
		     'work_position' 	=> $this->input->post('work_position'),
		     'work_date'		=> $this->input->post('work_date'),
		     'work_status' => $this->input->post('work_status'),
		);   
		$this->db->where('work_exp_id', $this->input->post('work_exp_id'));
		$update = $this->db->update('work_exp', $data);
		if ($update) {
			echo 1;
		}else{
			echo 0;
		}       
	}
	public function get_work_exp($id){
		$this->db->where('work_exp_id', $id);
		$query = $this->db->get('work_exp');	
		$data = $query->result();
		echo json_encode($data);
	}
	public function work_delete($id){
		$delete =  $this->db->delete('work_exp', array('work_exp_id' => $id));
		if ($delete) {
			echo 1;
		}else{
			echo 0;
		}
	}


	public function save_employer_info()
	{
		$data = array(
			'emp_user_id' => $this->session->userdata('user_id'),
			'emp_name' => $this->input->post('emp_name'),
			'emp_acronym' => $this->input->post('emp_acronym'),
			'emp_tax' => $this->input->post('emp_tax'),
			'emp_type' => $this->input->post('emp_type'),
			'emp_force' => $this->input->post('emp_force'),
			'emp_line_bus' => $this->input->post('emp_line_bus'),
			'emp_address' => $this->input->post('emp_address'),
			'emp_barangay' => $this->input->post('emp_barangay'),
			'emp_city' => $this->input->post('emp_city'),
			'emp_province' => $this->input->post('emp_province'),
			'emp_cont_title' => $this->input->post('emp_cont_title'),
			'emp_cont_person' => $this->input->post('emp_cont_person'),
			'emp_cont_position' => $this->input->post('emp_cont_position'),
			'emp_cont_tel' => $this->input->post('emp_cont_tel'),
			'emp_cont_mobile' => $this->input->post('emp_cont_mobile'),
			'emp_cont_fax' => $this->input->post('emp_cont_fax'),
			'emp_cont_email' => $this->input->post('emp_cont_email'),
			'date' => date('Y-m-d'),
		);
		$insert = $this->ApplicantModel->save_employer($data);
		if ($insert) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function checkName()
	{
		$this->db->where('emp_name', $this->input->post('emp_name'));
		$query = $this->db->get('employer_data');
		if($query->num_rows()>0){
			
		  echo $query->num_rows();
		}
		else {
		   echo $query->num_rows();
		}
	}
	public function do_upload(){
        $config = array(
			'upload_path' => "./upload/resume/",
			'allowed_types' => "pdf",
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
	        'user_id' => $this->session->userdata('user_id'),
	        );  
	        $result= $this->ApplicantModel->save_resume($data1);
	        if ($result == TRUE) {
	            echo "true";
	        }else{
	        	echo "false";
	        }
        }else{
			$error = array('error' => $this->upload->display_errors());
        }

     }
     public function do_upload_pic(){
        $config = array(
			'upload_path' => "./upload/resume/",
			'allowed_types' => "jpeg|jpg|png|gif",
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
	        'app_user_id' => $this->session->userdata('user_id'),
	        );  
	        $result= $this->ApplicantModel->save_pic($data1);
	        if ($result == TRUE) {
	            echo "true";
	        }else{
	        	echo "false";
	        }
        }else{
			$error = array('error' => $this->upload->display_errors());
        }

     }
	public function get_resume($user_id){
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('resume');
		if($query->num_rows() > 0){
		$row = $query->row();

		$data = '<div>
					<a href="../../upload/resume/'.$row->file.'">Full View</a>
				    <object data="../../upload/resume/'.$row->file.'" type="application/pdf" width="100%" height="auto" style="min-height: 500px;">
				        alt : <a href="../../upload/resume/'.$row->file.'">data</a>
				    </object>
				</div>';
		
		}else{
			$data = '<h3>No Resume found!</h3>';
		}
		echo json_encode($data);
	}
	public function resume_delete($id){
		$delete =  $this->db->delete('resume', array('user_id' => $id));
		if ($delete) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function pic_delete($id){
		$delete =  $this->db->delete('app_picture', array('app_user_id' => $id));
		if ($delete) {
			echo 1;
		}else{
			echo 0;
		}
	}
	public function send(){
		$data = array(
		     'app_status'	=> 3,
		);
		$this->db->where('app_user_id', $this->input->post('user_id'));
  		$query = $this->db->update('applied_job', $data);
        $this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        
        // **********************************Text Message*************************************
        $from = 'PESO';
        $to = $this->input->post('phone');
        $message = array(
            'text' => 'Hi This is PESO, your application was approve for the postion of  '.$this->input->post('position').' in  '.$this->input->post('company').'. '.$this->input->post('message').' Thank you!',
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        echo "<h1>Text Message</h1>";
        // $this->nexmo->d_print($response);
        // echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";
    }
    public function send_denied(){
    	$data = array(
		     'app_status'	=> 2,
		);
		$this->db->where('app_user_id', $this->input->post('user_id'));
  		$query = $this->db->update('applied_job', $data);
        $this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        
        // **********************************Text Message*************************************
        $from = 'PESO';
        $to = $this->input->post('phone');
        $message = array(
            'text' => 'Hi This is PESO, sorry your application was Denied for the postion of  '.$this->input->post('position').' in  '.$this->input->post('company').'. '.$this->input->post('message').' Thank you!',
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        echo "<h1>Text Message</h1>";
        // $this->nexmo->d_print($response);
        // echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";
    }
    public function send_hire(){
    	$data = array(
		     'app_status'	=> 1,
		     'date_hired' => date('Y-m-d'),
		);
		$this->db->where('app_user_id', $this->input->post('user_id'));
  		$query = $this->db->update('applied_job', $data);

  		$data2 = array(
		     'job_slot' =>  $this->input->post('slot'),
		);
		$this->db->where('job_id', $this->input->post('job_id'));
  		$query = $this->db->update('job_post', $data2);

        $this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');
        
        // // **********************************Text Message*************************************
        // $from = 'PESO';
        // $to = $this->input->post('phone');
        // $message = array(
        //     'text' => 'Hi This is PESO, You are Hired for the postion of  '.$this->input->post('position').' in  '.$this->input->post('company').'. '.$this->input->post('message').' Thank you!',
        // );
        // $response = $this->nexmo->send_message($from, $to, $message);
        // echo "<h1>Text Message</h1>";
        // $this->nexmo->d_print($response);
        // echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";
    }
    public function get_city($id){
		$this->db->where('province_id', $id);
		$query = $this->db->get('city_municipality');
		if($query->num_rows() > 0){
			$data = '';
		$rows = $query->result();
		 foreach ($rows as $row){
		 	$data .= ' <option value="'.$row->city_municipality_name.'">'.$row->city_municipality_name.'</option>';
		 }
		}else{
			$data .= ' <option value=""></option>';
		}
		echo json_encode($data);
	}
    public function get_app_info($id){
		$this->db->select ( '*' ); 
	    $this->db->from ( 'applicant_personal' );
	    $this->db->join ( 'resume', 'resume.user_id = applicant_personal.applicant_id' , 'left' );
	    $this->db->where('applicant_id', $id);
	    $query = $this->db->get ();
		$row = $query->row ();

		$data = '<ul class="nav nav-tabs" id="myTab" role="tablist">
		          <li class="nav-item">
		            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Resume</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profiles" role="tab" aria-controls="profiles" aria-selected="false">Pesonal Info</a>
		          </li>
		        </ul>
		        <div class="tab-content" id="myTabContent">
		          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">';
		          if ($row->file != '') {
		          	$data .= '<div>
						<a href="../../../upload/resume/'.$row->file.'">Full View</a>
					    <object data="../../../upload/resume/'.$row->file.'" type="application/pdf" width="100%" height="auto" style="min-height: 500px;">
					        alt : <a href="../../../upload/resume/'.$row->file.'">data</a>
					    </object>
					</div>';
		          }else{
		          	$data .= '<p>No Resume Uploaded! </p>';
		          }
		            

		$data .= '</div>
		          <div class="tab-pane fade" id="profiles" role="tabpanel" aria-labelledby="profile-tab">
		            <div class=" ">
						<div class="row">
							<label class="col-sm-3 control-label  c-text-left">Name</label>
							<div class="col-sm-9">
								<label class="c-text-left" >'.$row->fname.' '.$row->mname.'. '.$row->lname.'</label>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label  c-text-left">Contact Number</label>
							<div class="col-sm-9">
								<label class="c-text-left" >'.$row->mphone1.'</label>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label  c-text-left">Gender</label>
							<div class="col-sm-9">
								<label class="c-text-left" >'.$row->sex.'</label>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label  c-text-left" >Civil Status</label>
							<div class="col-sm-9">
								<label class="c-text-left" >'.$row->civil.'</label>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label  c-text-left" >Date of Birth</label>
							<div class="col-sm-9">
								<label class="c-text-left" >'.$row->dbirth.'</label>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label  c-text-left" >Nationality</label>
							<div class="col-sm-9">
								<label class="c-text-left" >'.$row->citizenship.'</label>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-3 control-label  c-text-left" >Permanent Resident</label>
							<div class="col-sm-9">
								<label class=" c-text-left" >'.$row->street_p.', '.$row->barangay_p.', '.$row->municipality_p.', '.$row->province_p.', </label>
							</div>
						</div>
					</div>
		          </div>
		        </div>
		        <div>
			        <form id="send">
			          <input type="hidden" name="phone" id="phone" value="'.$row->mphone1.'">
			          <input type="hidden" name="user_id" id="user_id" value="'.$row->applicant_id.'">
			        </form>
			      </div>';

		echo json_encode($data);
	}

}