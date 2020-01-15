
<div class="page-content">
    <div>
      <?php
      $job = $this->db->get_where('job_fair', 
        array(
          'active' => 1,
        ));
            $jobfair = $job->result();
      ?>
      <?php if ($job->num_rows() > 0): ?>
        <div class="da-section da-brand bg-secondary">
          <div class=" text-center text-white">
            <div class="carousel slide pb-5" id="da-brand-carouselIndicator" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php for ($i=1 ; $job->num_rows() >= $i; $i++ ){
                  $data = $i -1;
                  echo '<li data-target="#da-brand-carouselIndicator" data-slide-to="'.$data.'"></li>';
                }?>
<!--                 <li data-target="#da-brand-carouselIndicator" data-slide-to="0"></li>
                <li data-target="#da-brand-carouselIndicator" data-slide-to="1"></li>
                <li data-target="#da-brand-carouselIndicator" data-slide-to="2"></li> -->
              </ol>
              <div class="carousel-inner">
                <?php $row_number = 1 ?>
                <?php foreach ($jobfair as $row): ?>
                  
                  <?php if ($row_number == 1){
                   ?>
                    <div class="carousel-item active" style="height: 680px;min-height: 600px;">
                      <img src="<?php echo base_url('/upload/jobfair/'.$row->file)?>" style="height: 100%">
                    </div>
                   <?php
                  }else{
                    ?>
                    <div onclick="location.href='<?php echo site_url(); ?>/FrontPage/JobFair/<?php echo $row->jf_id ?>';" class="carousel-item " style="height: 680px;min-height: 600px;">
                      <img src="<?php echo base_url('/upload/jobfair/'.$row->file)?>" style="height: 100%">
                    </div>
                   <?php
                  } ?>
                 
                    
                  
                  <?php $row_number = $row_number + 1 ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
        
    </div>
    
    <div class="da-section">
      <div class="container da-company-brand py-5">
        <div class="h3 pb-3 text-uppercase text-center" data-aos="fade-up">Latest Job Post</div>
        <p class="pb-3 text-center" data-aos="fade-up">-------------</p>
          <div id="latest_job" class="text-center"></div>
          <div class="text-center" style="margin-top: 30px">
            <a class="btn btn-primary" href="<?php echo site_url(); ?>/FrontPage/JobSearch">More Jobs</a>
          </div>
      </div>
    </div>
    <div class="da-section">
      <div class="container da-company-brand py-5">
        <div class="h3 pb-3 text-uppercase text-center" data-aos="fade-up">How it Works?</div>
        <p class="pb-3 text-center" data-aos="fade-up">-------------</p>
        <div class="row">
          <div class="col-md-3 text-center"><img class="img-fluid" src="<?php echo base_url(); ?>/assets/images/signup.png" alt="Company Image 1"/><h5>Register an account</h5></div>
          <div class="col-md-3 text-center"><img class="img-fluid" src="<?php echo base_url(); ?>/assets/images/approval.png" alt="Company Image 2"/><h5>Wait for aprroval</h5></div>
          <div class="col-md-3 text-center"><img class="img-fluid" src="<?php echo base_url(); ?>/assets/images/cprofile.png" alt="Company Image 3"/><h5>Apply for a Job</h5></div>
          <div class="col-md-3 text-center"><img class="img-fluid" src="<?php echo base_url(); ?>/assets/images/apply1.png" alt="Company Image 4"/><h5>Get Hired</h5></div>
        </div>
      </div>
    </div>
</div>
<script>
    $(function() {
        $.ajax({
        url : "<?php echo site_url('JobPost/latest_post')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $('#latest_job').html(data);           
           console.log(data);
        },
        errorz: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
      });
    });
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