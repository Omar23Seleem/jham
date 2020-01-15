
<?php

class Post_filter_model extends CI_Model
{
 function fetch_filter_type($type)
 {
  $this->db->distinct();
  $this->db->select($type);
  $this->db->from('job_post');
  return $this->db->get();
 }

 function make_query($minimum_salary, $maximum_salary, $job_location, $job_specialization, $search)
 {
  $query = "
  SELECT * FROM job_post 
  WHERE job_status = '1'
  AND job_slot >= '1'
  AND denied = '0'";
  if(isset($search) && !empty($search) )
  {
   $query .= "
    AND job_title LIKE '%".$search."%'
   ";
  }
  if(isset($job_location) && !empty($job_location) )
  {
   $query .= "
    AND job_location ='".$job_location."'
   ";
  }
  if(isset($job_specialization) && !empty($job_specialization) )
  {
   $query .= "
    AND job_specialization ='".$job_specialization."'
   ";
  }
  if(isset($minimum_salary, $maximum_salary) && !empty($minimum_salary) &&  !empty($maximum_salary))
  {
   $query .= "
    AND job_salary BETWEEN '".$minimum_salary."' AND '".$maximum_salary."'
   ";
  }
  return $query;
 }

 function count_all($minimum_salary, $maximum_salary, $job_location, $job_specialization, $search)
 {
  $query = $this->make_query($minimum_salary, $maximum_salary, $job_location, $job_specialization, $search);
  $data = $this->db->query($query);
  return $data->num_rows();
 }

 function fetch_data($limit, $start, $minimum_salary, $maximum_salary, $job_location, $job_specialization, $search)
 {
  $query = $this->make_query($minimum_salary, $maximum_salary, $job_location, $job_specialization, $search);

  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
    
   {
    $date = date('Y-m-d');
    $now = strtotime($date);
    $exp = strtotime($row['expirry_date']);
     if ($now < $exp) {
         
        $empolyer = $this->db->get_where('employer_data', array('emp_user_id' => $row['emp_user_id']));
        $emp = $empolyer->row();
        $output .= '
        <div class="col-md-12">
         <div class="job-container">
          <p ><strong><a href="job/'.$row['job_id'].'">'. $row['job_title'] .'</a></strong></p>
          <p >'. $emp->emp_name .'</p>
          <p >Salary: '. $row['job_salary'] .'</p>
          <p>Location : '. $row['job_location'].'<br />
          Specialization : '. $row['job_specialization'] .'</p>
          <br>
          <a href="job/'.$row['job_id'].'">Read More >></a>
         </div>
        </div>
        ';
      }
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }
}

?>
