<?php
/**
 * Description of Export Model
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export_model extends CI_Model {
    // get employee list
    function getUserDetails(){
 		$response = array();
		$this->db->select('fname,lname,mname,suffix,dbirth,age,sex,pbirth,civil,citizenship,height,weight,phone,mphone1,mphone2,street,barangay,municipality,province,street_p,barangay_p,municipality_p,province_p,disability,other_disability,employment,employment,emp_status,looking_work,looking_work_status,willing_work,when_work,four_ps,four_ps_number,ofw,work_back,date');
		$this->db->like('date', $this->input->post('year').'-'.$this->input->post('month'), 'after');
		$q = $this->db->get('applicant_personal');
		$response = $q->result_array();
	 	return $response;
	}
	function getempDetails(){
 		$response = array();
		$this->db->select('emp_name,emp_acronym,emp_tax,emp_type,emp_force,emp_line_bus,emp_address,emp_barangay,emp_city,emp_province,emp_cont_title,emp_cont_person,emp_cont_position,emp_cont_tel,emp_cont_mobile,emp_cont_fax,emp_cont_email');
		$q = $this->db->get('employer_data');
		$response = $q->result_array();
	 	return $response;
	}
	function getHired(){
		$this->db->select ( 'employer_data.emp_name, applicant_personal.fname , applicant_personal.mname, applicant_personal.lname, applicant_personal.suffix, job_post.job_title, job_post.job_specialization, applied_job.date_hired' ); 
		$this->db->from ( 'applied_job' );
		$this->db->join ( 'job_post', 'job_post.job_id = applied_job.app_job_id' , 'left' );
		$this->db->join ( 'applicant_personal', 'applicant_personal.applicant_id = applied_job.app_user_id' , 'left' );
		$this->db->join ( 'employer_data', 'employer_data.emp_user_id = job_post.emp_user_id' , 'left' );
		$this->db->where('app_status', 1);
		$query = $this->db->get ();
		$response = $query->result_array();
	 	return $response;
	}
}
?>