<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashBoard extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->is_logged_in();

    }
    function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true || $this->session->userdata('role') > 2){
            redirect('');
            die();
        }
    }

	public function index()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/DashBoard',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Dashboard'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function PostedJob()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/PostedJob',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function Admin()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/addAdmin',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function JobFair()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/JobFair',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Job Post',
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function JobFairs($id)
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/JobFairs',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Job Post',
				'jf_id' => $id,
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function UpdateJobFair($id)
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/UpdateJobFair',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Job Post',
				'id' => $id,
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function AppAccount()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/AppAccount',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Applicants'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function EmpAccount()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/EmpAccount',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Employer'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function Approval()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/Approval',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function ApprovalEmp()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/ApprovalEmp',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function PendingJobPost()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/PendingPost',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Pending Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function DeniedAccount()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/DeniedAccount',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Denied Account'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function DeniedAccountEmp()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/DeniedAccountEmp',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Denied Account'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function DeniedJob()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/DeniedJob',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Denied Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function ReportHired()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/HiredApplicants',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Denied Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function ReportEmployer()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/ReportEmployer',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Denied Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function ReportJobs()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/ReportJobs',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Denied Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function ApplicantInfo()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/ApplicantInfo',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Denied Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
	public function EmployerInfo()
	{
		$data = array(
				'sidebar' => 'DashBoard/Sidebar',
				'header' => 'DashBoard/Header',
				'content' => 'DashBoard/EmployerInfo',
				'footer' => 'DashBoard/Footer',
				'PageTitle' => 'Denied Job Post'
			);
		$this->load->view('DashBoard/Template', $data);
	}
}
