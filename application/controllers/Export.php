<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends CI_Controller {
  // construct
    public function __construct() {
        parent::__construct();
    // load model
        $this->load->model('Export_model');
    }    
   // export xlsx|xls file
    public function index() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data | TechArise';
        $data['employeeInfo'] = $this->export->hired();
    // load view file for output
        $this->load->view('export/index', $data);
    }
  // create xlsx
    public function export_csv(){ 
        // file name 
        $filename = 'users_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
       // get data 
        $usersData = $this->Export_model->getUserDetails();
        // file creation 
        $file = fopen('php://output','w');
        $header = array('first name','last name','midle name','suffix','date of birth','age','sex','place of birth','civil status','citizenship','height','weight','landline','mobile phone 1','mobile phone 2','street','barangay','municipality','province','street permanent','barangay permanent','municipality  permanent','province permanent','disability','other_disability','employment','employment','emp_status','looking_work','looking_work_status','willing_work','when_work','four_ps','four_ps_number','ofw','work_back','date'); 
        fputcsv($file, $header);
        foreach ($usersData as $key=>$line){ 
            fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
    }
    public function export_emp_csv(){ 
        // file name 
        $filename = 'emp_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
       // get data 
        $usersData = $this->Export_model->getempDetails();
        // file creation 
        $file = fopen('php://output','w');
        $header = array('emp_name','emp_acronym','emp_tax','emp_type','emp_force','emp_line_bus','emp_address','emp_barangay','emp_city','emp_province','emp_cont_title','emp_cont_person','emp_cont_position','emp_cont_tel','emp_cont_mobile','emp_cont_fax','emp_cont_email'); 
        fputcsv($file, $header);
        foreach ($usersData as $key=>$line){ 
            fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
    }
    public function export_hired_csv(){ 
        // file name 
        $filename = 'hired_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
       // get data 
        $usersData = $this->Export_model->getHired();
        // file creation 
        $file = fopen('php://output','w');
        $header = array('emp_name', 'fname', 'mname', 'lname', 'suffix', 'job_title', 'job_specialization', 'date_hired'); 
        fputcsv($file, $header);
        foreach ($usersData as $key=>$line){ 
            fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
    }
    
}
?>