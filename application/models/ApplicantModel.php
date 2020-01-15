<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantModel extends CI_Model {
// save account
	public function save_personal($data){
		$insert = $this->db->insert('applicant_personal', $data);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
	public function update_personal($data){
		$this->db->where('applicant_id', $this->session->userdata('user_id'));
		$update = $this->db->update('applicant_personal', $data);
			if ($update) {
				return "success";
			}else{
				return false;
			}
	}

	public function save_employer($data){
		$insert = $this->db->insert('employer_data', $data);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
	public function save_resume($data1){
		$insert = $this->db->insert('resume', $data1);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
	public function save_pic($data1){
		$insert = $this->db->insert('app_picture', $data1);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
			
}