<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobPostModel extends CI_Model {
// save account
	public function add_job($create_job){
		$insert = $this->db->insert('job_post', $create_job);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
	public function apply_job($apply_job){
		$insert = $this->db->insert('applied_job', $apply_job);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
	public function wish_job($wish_job){
		$insert = $this->db->insert('wish_list', $wish_job);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
	public function save_job_fair($data1){
		$insert = $this->db->insert('job_fair', $data1);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
	public function update_job_fair($data1){
		$this->db->where('jf_id',$this->input->post('jf_id'));
		$insert = $this->db->update('job_fair', $data1);
			if ($insert) {
				return "success";
			}else{
				return false;
			}
	}
}