
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Admin Account</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <form id="signup_form" method="POST">
                <input type="hidden" name="role" value="2">
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
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" id="signup_submit" type="submit">Register</button>
                    </div>
                </div>
              </form>
            </div>
            <div class="col-md-8">
              <div class="table-responsive">
                  <br>
                  <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $this->db->where('role', 2);
                        $user = $this->db->get ('user_account');
                        $info = $user->result();
                      ?>
                    <?php foreach ($info as $row): ?>
                      
                      <tr>
                        <td><?php echo $row->email ?></td>
                        <td><button type="button" class="btn btn-danger" onclick="delete_user(<?php echo $row->user_id ?>)">Delete</button></td>
                      </tr>
                    <?php endforeach ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
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
                         Swal.fire({
                              position: 'top-end',
                              type: 'success',
                              title: 'Successfuly Register!',
                              showConfirmButton: false,
                            })
                            window.setTimeout(function() {
                                 location.reload();
                            }, 2000);
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
                $('.email_check').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> This Email is already ristered</span></label>');
              }else{
                $('#signup_submit').prop('disabled', false);
                $('.email_check').html('<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Email is available</span></label>');
              }
             }
            });
           }
        });
});
 function delete_user(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            $.ajax({
              type: 'POST',
              url: '<?php echo site_url('Authentication/delete/'); ?>'+ id,
              data: $('#activate').serialize(),
              success: function(data){
                Swal.fire({
                  position: 'center',
                  title: 'Successfuly Deleted!',
                  animation: true,
                  customClass: {
                    popup: 'animated tada'
                  }
                })
                window.setTimeout(function() {
                       location.reload();
                  }, 2000);
              }
            })
          )
        }
      })
      }
</script>