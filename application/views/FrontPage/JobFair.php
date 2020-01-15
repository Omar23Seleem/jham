<?php
      $job = $this->db->get_where('job_fair', 
        array(
          'jf_id' => $jf,
        ));
            $row = $job->row();
      ?>
<div class="page-content">
  <div class="da-contact" id="">
    <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
      <div class="container">
        <div class="card py-4 px-4">
        	<img src="<?php echo base_url('/upload/jobfair/'.$row->file)?>" style="height: auto; width: 100%;">
        	<br>
        	<div class="card text-center pad-15">
        		<h3><?php echo $row->jf_title ?></h3>
            <?php if ($row->type == 'Job Fair'): ?>
              <h1>SLOT/S AVAILABLE : <?php echo $row->slot ?>
            <?php endif ?>
        		
             <?php 
                $this->db->where('jf_id', $row->jf_id);
                $this->db->where('app_user_id', $this->session->userdata('user_id'));
                $query = $this->db->get('reservation');
              ?>
              <?php if ($this->session->userdata('role') == 4): ?>
              <?php if ($query->num_rows() < 1): ?>
                <form id="res_form" role="form">  
                  <?php
                    $this->load->helper('string');
                    $token = random_string('alnum',10);  
                  ?>
                    <div class="form-group">
                      <input type="hidden" name="jf_id" value="<?php echo $row->jf_id ?>">
                      <input type="hidden" class="form-control" name="slot" value="<?php echo $row->slot - 1 ?>">
                      <input type="hidden" name="resv_id" value="<?php echo $this->session->userdata('user_id').'-'.$token ?>">
                      <input type="hidden" name="app_user_id" value="<?php echo $this->session->userdata('user_id') ?>">
                    </div>
                    <div class="container">
                       <button class="btn btn-primary block" id="res_submit" type="submit">Reserve for a Slot</button>             
                    </div>
                </form>
              <?php endif ?>
              <?php endif ?>
            
            </h1>
            <?php if ($row->type == 'Job Fair'): ?>
              <p><?php echo $row->date ?></p>
              <?php else: ?>
                <p>Recruitment Ends until <?php echo $row->date ?></p>
            <?php endif ?>
        		
        		<p><?php echo $row->venue ?></p>
            <div class="text-left"><?php echo $row->jf_description ?></div>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    $('#res_submit').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo site_url('JobPost/reserve')?>/",
                type: "post",
                data: $('#res_form').serialize(),
                success: function(data){
                    if (data == 1) {
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Successfuly Reserved! please check you email for you reservaid ID',
                          showConfirmButton: false,
                          timer: 2000
                        })
                        window.setTimeout(function() {
                             location.reload();
                        }, 2000);
                       
                    }else{
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Successfuly Reserved! please check you email for you reservaid ID',
                          showConfirmButton: false,
                          timer: 2000
                        })
                        window.setTimeout(function() {
                             location.reload();
                        }, 2000);
                    }
                }
            })
        });
  })
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