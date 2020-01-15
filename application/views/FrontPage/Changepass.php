<div class="page-content">
  <div class="da-contact" id="">
    <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
      <div class="container">
        <div class="card py-4 px-4">
        	<div class="row justify-content-center">
        		<div class="col-md-8">
        			<h4>Change Password</h4>
        			<form id="change_pass" method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" />
                                <span id="email_error"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Token</label>
                                <input class="form-control" type="email" name="token" id="token" placeholder="Token" />
                                <span id="email_error"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Input password" />
                                <span id="password_error"></span>
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Password Confirm</label>
                                <input class="form-control" type="password" name="password_confirm" id="password_confirm" placeholder="Confirm Password" />
                                <span id="c_password_error"></span>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" id="change_submit" type="submit">Save</button>
                            </div>
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
            $('#change_submit').click(function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('Authentication/update_pass'); ?>',
                    data: $('#change_pass').serialize(),
                    success: function(data){
                        if (data == 1) {
                            Swal.fire({
                              position: 'top',
                              type: 'success',
                              title: 'Successfuly Change You can Login with new Password',
                              showConfirmButton: false,
                            })
                            window.setTimeout(function() {
                                 window.location.href = '/jham/index.php/Dashboard';
                            }, 2000);
                           
                        }else{
                            Swal.fire({
                              position: 'top',
                              title: 'Fail to change, Incorrect Token/Password!',
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