<div class="page-content">
  <div class="da-contact" id="">
    <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
      <div class="container">
        <div class="card py-4 px-4">
        	<div class="row justify-content-center">
        		<div class="col-md-6">
        			<h4>Forgot Password</h4>
		        	<form id="forgot_pass" role="form">  
		            <div class="modal-body">
		              <div class="form-group">
		                <input type="text" class="form-control" name="email" id="login_email" placeholder="Email">
		              </div>
		              <div class="form-group">
		              	<?php 
		              		$this->load->helper('string');
							         $token = random_string('alnum',20);
		              	?>
		                <input type="hidden" class="form-control" name="token" id="token" value="<?php echo $token?>" >
		              </div>
		            </div>
		            <div class="modal-footer">
		              <button class="btn btn-primary block" id="send_submit" type="submit">Send</button>
		              <br>
		            </div>
		          </form>
		       	</div>
        	</div>
        	
        </div>
      </div>
    </div>
  </div>
</div>

<script>
        $(function() {
            $('#send_submit').click(function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('Authentication/send_token'); ?>',
                    data: $('#forgot_pass').serialize(),
                    success: function(data){
                       
                            Swal.fire({
                              position: 'top',
                              title: 'Sent! Please check your Email!',
                              animation: true,
                              customClass: {
                                popup: 'animated tada'
                              }
                            })
                            window.setTimeout(function() {
                                 window.location.href = '/jham/index.php';
                            }, 2000);
                           
                       
                    }
                })
            })
        });
    </script>