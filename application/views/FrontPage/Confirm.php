<div class="page-content">
  <div class="da-contact" id="">
    <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
      <div class="container">
        <div class="card py-4 px-4">
        	<div class="row justify-content-center">
        		<div class="col-md-6">
        			<h4>Enter Email Confimation Code</h4>
		        	<form id="confirm" role="form">  
		            <div class="modal-body">
		              <div class="form-group">
		                <input type="text" class="form-control" name="confirm_code" id="confirm_code" placeholder="Confirmation code">
		              </div>
		            </div>
		            <div class="modal-footer">
		              <button class="btn btn-primary block" id="send_submit" type="submit">Submit</button>
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
                    url: '<?php echo site_url('Authentication/update_confirm'); ?>',
                    data: $('#confirm').serialize(),
                    success: function(data){
                        if (data == 1) {
                            Swal.fire({
                              position: 'top',
                              type: 'success',
                              title: 'Email Successfuly Confirm',
                              showConfirmButton: false,
                            })
                            window.setTimeout(function() {
                                 window.location.href = '/jham/index.php/';
                            }, 2000);
                           
                        }else{
                            Swal.fire({
                              position: 'top',
                              title: 'Fail to Confirm',
                              animation: true,
                              customClass: {
                                popup: 'animated tada'
                              }
                            })
                        }
                    }
                })
            })
        });
    </script>