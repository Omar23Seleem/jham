<div class="page-content">
    <div class="da-contact" id="">
        <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
            <div class="container">
                <div class="card py-4 px-4">
                    <div class="h4 pb-4 text-center">Sign Up</div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6 col-md-auto col-sm-12 mb-3">
                            <div class="da-contact-message">
                                <span id="success_message"></span>
                                <form id="signup_form" method="POST">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label>Select User Type</label>
                                            <select class="custom-select" name="role" id="role" >
                                              <option value="4">Applicant</option>
                                              <option value="3">Employer</option>
                                            </select>
                                            <span id="role_error"></span>
                                        </div>
                                        
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" />
                                            <div class="email_check"></div>
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
                                    <div class="form-group">
                                        <?php 
                                            $this->load->helper('string');
                                                     $token = random_string('alnum',5);
                                        ?>
                                        <input type="hidden" class="form-control" name="confirm_code" id="confirm_code" value="<?php echo $token?>" >
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary" id="signup_submit" type="submit">Register</button>
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
</div>

<script>
    $(function() {
        $('#signup_form').on('submit',function(e){
            e.preventDefault();

            $.ajax({
                url: "<?php echo site_url(); ?>/FrontPage/saveAccount",
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function(){
                    $('#signup_submit').attr('disabled', 'disabled');
                },
                success: function(data){
                    if(data.error){
                        if (data.role_error != '') {
                            $('#role_error').html(data.role);
                        }else{
                            $('#role_error').html();
                        } 
                        if (data.email_error != '') {
                            $('#email_error').html(data.email);
                        }else{
                            $('#email_error').html();
                        }   
                        if (data.password_error != '') {
                            $('#password_error').html(data.password);
                        }else{
                            $('#password_error').html();
                        } 
                        if (data.c_password_error != '') {
                            $('#c_password_error').html(data.password_confirm);
                        }else{
                            $('#c_password_error').html();
                        } 
                    }
                    if (data.success) {
                        

                          $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('FrontPage/send_confirm'); ?>',
                            data: $('#signup_form').serialize(),
                            success: function(data){
                              Swal.fire({
                                position: 'center',
                                title: 'Successfuly Register!',
                                animation: true,
                                customClass: {
                                  popup: 'animated tada'
                                }
                              })
                               window.setTimeout(function() {
                                 window.location.href = '/jham/index.php/FrontPage/Dashboard';
                            }, 5000);
                            }
                          })
                        
                    }
                    $('#signup_submit').attr('disabled', false);
                }
            })
        });
        $('#email').change(function(){
           var email = $('#email').val();
           if(email != ''){
            $.ajax({
             url: "<?php echo site_url(); ?>/Authentication/checkEmail",
             method: "POST",
             data: {email:email},
             success: function(data){
              if (data == 1) {
                $('#signup_submit').prop('disabled', true);
                $('.email_check').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> This Email is already taken</span></label>');
              }else{
                $('#signup_submit').prop('disabled', false);
                $('.email_check').html('<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Email is available</span></label>');
              }
             }
            });
           }
        });
    });
</script>