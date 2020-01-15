<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_filter extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('post_filter_model');
 }

 function index()
 {
  $data['job_location'] = $this->product_filter_model->fetch_filter_type('job_location');
  $data['job_specialization'] = $this->product_filter_model->fetch_filter_type('job_specialization');
  $data['search'] = $this->product_filter_model->fetch_filter_type('search');
  $this->load->view('product_filter', $data);
 }

 function fetch_data()
 {
  sleep(1);
  $minimum_salary = $this->input->post('minimum_salary');
  $maximum_salary = $this->input->post('maximum_salary');
  $job_location = $this->input->post('job_location');
  $job_specialization = $this->input->post('job_specialization');
  $search = $this->input->post('search');
  $this->load->library('pagination');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->post_filter_model->count_all($minimum_salary, $maximum_salary, $job_location, $job_specialization, $search);
  $config['per_page'] = 5;
  $config['uri_segment'] = 3;
  $config['use_page_numbers'] = TRUE;
  $config['full_tag_open'] = '<ul class="pagination">';
  $config['full_tag_close'] = '</ul>';
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';
  $config['next_link'] = '&gt;';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['prev_link'] = '&lt;';
  $config['prev_tag_open'] = '<li>';
  $config['prev_tag_close'] = '</li>';
  $config['cur_tag_open'] = "<li class='active'><a href='#'>";
  $config['cur_tag_close'] = '</a></li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';
  $config['num_links'] = 3;
  $this->pagination->initialize($config);
  $page = $this->uri->segment(3);
  $start = ($page - 1) * $config['per_page'];
  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'job_list'   => $this->post_filter_model->fetch_data($config["per_page"], $start, $minimum_salary, $maximum_salary, $job_location, $job_specialization, $search)
  );
  echo json_encode($output);
 }
  
}
?>
