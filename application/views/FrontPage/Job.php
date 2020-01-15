<?php
            $data = $this->db->get_where('job_post', array('job_id' => $job_id));
            $jobs = $data->row();
           ?>
<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-full" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Applicants Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="app_data">
        
      </div>
      <div>
        <form id="add_message">
          <br>
          <label>Write a addtional message like date of interview etc..</label>
          <input name="message" id="message" type="text" class="form-control" placeholder="Message">
          <input name="slot" id="slot" type="hidden" class="form-control" value="<?php echo $jobs->job_slot - 1; ?>" >
          <input name="job_id" id="job_id" type="hidden" class="form-control" value="<?php echo $jobs->job_id; ?>" >
          <input name="position" id="position" type="hidden" class="form-control" value="<?php echo $jobs->job_title; ?>" >
          <input name="company" id="company" type="hidden" class="form-control" value="<?php echo $this->db->get_where('employer_data', array('emp_user_id' => $jobs->emp_user_id ))->row()->emp_name; ?>">
        </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="send_accept()">Accept For Interview</button>
        <button type="button" class="btn btn-danger" onclick="send_deny()">Denied</button>
        <button type="button" class="btn btn-warning" onclick="send_hire()">Hired</button>
      </div>
    </div>
  </div>
</div>
<div class="page-content">
  <div class="da-contact" id="">
    <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
      <div class="container">
        <?php if ($this->session->userdata('role') == 3): ?>
          <div class="card py-4 px-4">
            <a href="#applicant" class="btn btn-primary" data-toggle="collapse">Applicant List</a>
            <div id="applicant" class="collapse">
              <div class="card applicant-list">
                <h5 class="text-center">List of Applicants</h5>
                    <div class="table-responsive">
                      <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="Job">Name</th>
                          <th>Contact #</th>
                          <th>Address</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $this->db->select ( '*' ); 
                          $this->db->from ( 'applied_job' );
                          $this->db->join ( 'applicant_personal', 'applicant_personal.applicant_id = applied_job.app_user_id' , 'left' );
                          $this->db->join ( 'job_post', 'job_post.job_id = applied_job.app_job_id' , 'left' );
                          $this->db->where('app_job_id', $job_id);
                          $query = $this->db->get ();
                          $job = $query->result ();
                        ?>
                        <?php if ($query->num_rows() > 0): ?>
                            <?php foreach ($job as $row): ?>
                              <?php
                                if ($row->app_status == 1) {
                                  $status = 'Hired';
                                }elseif($row->app_status == 2){
                                  $status = 'Declined';
                                  }elseif($row->app_status == 3){
                                  $status = 'On Process';
                                }else{
                                  $status = 'Pending';
                                }
                              ?>
                              <tr>
                                <td><?php echo $row->fname ?></td>
                                <td><?php echo $row->mphone1 ?></td>
                                <td><?php echo $row->barangay ?></td>
                                <td><?php echo $status ?></td>
                                <?php if ($row->app_status == 0 || $row->app_status > 2): ?>
                                    <td><button class="btn btn-danger" onclick="applicant(<?php echo $row->app_user_id ?>)">Action</button></td>
                                <?php endif ?>
                                
                              </tr>
                            <?php endforeach ?>
                        <?php else : ?>  
                          <p class="text-center">NO Applicants found!</p>
                        <?php endif ?>
                        
                        
                        
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        <?php endif ?>
        <div class="card py-4 px-4">
        	<?php
        		$data = $this->db->get_where('job_post', array('job_id' => $job_id));
        		$job = $data->row();
        	 ?>
        	 <div class="card container pad-15 job-cont">
        	 	<div class="card pad-15">
                    <div class="row">
                            <div class="col-8">
                	 		<h3><?php echo $job->job_title; ?></h3>
                	 		<h5><?php echo $this->db->get_where('employer_data', array('emp_user_id' => $job->emp_user_id ))->row()->emp_name; ?></h5>
                	 		<p><i class="text-danger fas fa-map-marker-alt fa- fa-fw"></i> <i><?php echo $job->job_location; ?></i></p>
                        </div>
                        <div class="col-4">
                            <div class="text-right">
                                <?php 
                                    $app_id = $this->session->userdata('user_id');
                                    $app = $this->db->get_where('applied_job', array('app_user_id' => $app_id, 'app_job_id' => $job->job_id));
                                    $wish = $this->db->get_where('wish_list', array('app_user_id' => $app_id, 'job_id' => $job->job_id));
                                 ?>
                                <form id="apply">
                                    <input type="hidden" name="job_id" value="<?php echo $job->job_id; ?>">
                                    <input type="hidden" name="app_user_id" value="<?php echo $this->session->userdata('user_id') ?>">
                                </form>
                                <?php if ($app->num_rows() > 0): ?>
                                     <button class="btn btn-danger btn-block" disabled="disabled">Done applied for this Job.</button>
                                <?php elseif ($this->session->userdata('role') == 4 && $this->session->userdata('activate') == 1 ): ?>
                                    <button class="btn btn-warning btn-block" id="apply_now">Apply Now</button>
                                <?php endif ?>
                                <?php if ($wish->num_rows() > 0): ?>
                                    <button class="btn btn-primary btn-block" disabled="disabled">Job is in you're List</button> 
                                <?php elseif($this->session->userdata('role') == 4): ?>
                                    <button class="btn btn-primary btn-block" id="wish_list">Add to Wish List</button> 
                                <?php endif ?>                        
                            </div>
                        </div>
                    </div>
        	 	</div>
        	 	<div class="row">
        	 		<div class="col-md-8 job-border">
        	 			<div class="card pad-15">
        	 				<h2 class="job-ads"><i class="text-primary fas fa-edit fa- fa-fw"></i> JOB DESCRIPTION</h2>
        	 				<p><?php echo $job->job_description; ?></p>
        	 			</div>
                <div class="card pad-15">
                  <h2 class="job-ads"><i class="text-primary fas fa-edit fa- fa-fw"></i> Skills</h2>
                    <?php
                      $this->db->where('job_post_id', $job->job_id);
                      $query = $this->db->get ('job_skill');
                      $skill = $query->result ();
                    ?>
                    <ul>
                    <?php foreach ($skill as $row): ?>
                      <?php if ($row->inovation == 1 ){  echo "<li>Inovation</li>";} ?>
                      <?php if ($row->team_work == 1 ){ echo "<li>Team Work</li>";} ?>
                      <?php if ($row->multitasking == 1 ){ echo "<li>Multitasking</li>";} ?>
                      <?php if ($row->work_ethics == 1 ){ echo "<li>Work Ethics</li>";} ?>
                      <?php if ($row->self_motivation == 1 ){ echo "<li>SelfMotivation</li>";} ?>
                      <?php if ($row->creative_problem == 1 ){ echo "<li>Creative Problem</li>";} ?>
                      <?php if ($row->problem_solving == 1 ){ echo "<li>Problem Solving</li>";} ?>
                      <?php if ($row->critical_thinking == 1 ){ echo "<li>Critical Thinking</li>";} ?>
                      <?php if ($row->decision_making == 1 ){ echo "<li>Decision Making</li>";} ?>
                      <?php if ($row->strees_tolerance == 1 ){ echo "<li>Strees tolerance</li>";} ?>
                      <?php if ($row->planing == 1 ){ echo "<li>Planing</li>";} ?>
                      <?php if ($row->perceptiveness == 1 ){ echo "<li>Perceptiveness</li>";} ?>
                      <?php if ($row->english_funtional == 1 ){ echo "<li>English Funtional</li>";} ?>
                      <?php if ($row->english_comp == 1 ){ echo "<li>English Comp</li>";} ?>
                      <?php if ($row->math_functional == 1 ){ echo "<li>Math Functional</li>";} ?>
                        
                      
                    <?php endforeach ?>
                    </ul>
                </div>
        	 		</div>
        	 		<div class="col-md-4 job-border" >
        	 			<div class="card pad-15">
        	 				<h2 class="job-ads-2"> Year Experince</h2>
        	 				<p><?php echo $job->job_exp; ?></p>
        	 				<h2 class="job-ads-2"> Type</h2>
        	 				<p><?php echo $job->job_type; ?></p>
        	 				<h2 class="job-ads-2"> Shift</h2>
        	 				<p><?php echo $job->job_shift; ?></p>
        	 				<h2 class="job-ads-2"> Salary</h2>
        	 				<p><?php echo $job->job_salary.' ('.$job->job_salary_type.')' ?></p>
        	 				<h2 class="job-ads-2"> Slots Available</h2>
        	 				<p><?php echo $job->job_slot; ?></p>
        	 			</div>

                <div class="card pad-15">
                  <h2 class="job-ads-2"> Company Description</h2>
                  <?php
                    $have = $this->db->get_where('company_profile', array('emp_user_id' => $this->session->userdata('user_id'))); 
                    $com = $have->row();
                    $com_logo = $this->db->get_where('company_logo', array('emp_user_id' => $this->session->userdata('user_id')));
                    $logo = $com_logo->row();
                  ?>
                  <?php if ($com_logo->num_rows() > 0): ?>
                    <div class="text-center">
                      <img src="../../../upload/logo/<?php echo $logo->file ?>" class="img-fluid">
                      <br>
                    </div>
                  <?php endif ?>
                  <br>
                  <?php if ($have->num_rows() > 0): ?>
                    <?php echo $com->com_description ?>
                  <?php endif ?>
                </div>
        	 		</div>

        	 	</div>
        	 </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(function (){
    
    $('#apply_now').click(function(e) {
          e.preventDefault();
          $.ajax({
              type: 'POST',
              url: '<?php echo site_url('JobPost/applyJob'); ?>',
              data: $('#apply').serialize(),
              success: function(data){
                  if (data == 1) {
                     Swal.fire({
                              position: 'center',
                              title: 'Your Application Sent to the Employer!',
                              animation: true,
                              customClass: {
                                popup: 'animated tada'
                              }
                            })
                  }else{
                      alert('Error Occur');
                  }
              }
          })
      })
    $('#wish_list').click(function(e) {
          e.preventDefault();
          $.ajax({
              type: 'POST',
              url: '<?php echo site_url('JobPost/wishJob'); ?>',
              data: $('#apply').serialize(),
              success: function(data){
                  if (data == 1) {
                     Swal.fire({
                              position: 'center',
                              title: 'Job addeded to you wish list!',
                              animation: true,
                              customClass: {
                                popup: 'animated tada'
                              }
                            })
                  }else{
                      alert('Error Occur');
                  }
              }
          })
      })
  });
    function applicant(id){
    $('#profile').modal('show');
    $.ajax({
        url : "<?php echo site_url('Applicant/get_app_info/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          var html ='';
            var i;
            for (i in data) {
             $('#phone').val(data[i].file);
                // $('#resume').html(data[i].file);
            }
          $('#phone').val($().val());
          $('#app_data').html(data);
          // console.log(data);
        },
        errorz: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
      });
    }
    function send_accept(){
      $.ajax({
                url: '<?php echo site_url('Applicant/send'); ?>',
                type: "post",
                data: $('#send, #add_message').serialize(),
                success: function(data){
                 
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Successfuly Accpted and SMS was sent',
                          showConfirmButton: false,
                          timer: 2000
                        })
                        window.setTimeout(function() {
                             $('#add_work').modal('hide');
                             location.reload();
                        }, 2500);
                       
                    
                }
            })
    }
    function send_deny(){
      $.ajax({
                url: '<?php echo site_url('Applicant/send_denied'); ?>',
                type: "post",
                data: $('#send, #add_message').serialize(),
                success: function(data){
                 
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'SMS was sent',
                          showConfirmButton: false,
                          timer: 2000
                        })
                        window.setTimeout(function() {
                             $('#add_work').modal('hide');
                             location.reload();
                        }, 2500);
                       
                    
                }
            })
    }
    function send_hire(){
      $.ajax({
                url: '<?php echo site_url('Applicant/send_hire'); ?>',
                type: "post",
                data: $('#send, #add_message').serialize(),
                success: function(data){
                 
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Hired and SMS was sent',
                          showConfirmButton: false,
                          timer: 2000
                        })
                        window.setTimeout(function() {
                             $('#add_work').modal('hide');
                             location.reload();
                        }, 2500);
                       
                    
                }
            })
    }
</script>
<?php if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('confirm') == 0): ?>

    <script type="text/javascript">
         $(function() {
               Swal.fire({
                  position: 'top',
                  type: 'success',
                  title: 'Email Confirmation Required',
                  showConfirmButton: false,
                })
                window.setTimeout(function() {
                     window.location.href = '/jham/index.php/Frontpage/Confirm';
                }, 2000);
        });
    </script>

<?php endif ?>