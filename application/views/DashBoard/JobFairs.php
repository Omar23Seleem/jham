
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Job Fair</h5>
        </div>
        <div class="card-body">
          <div class="row">
              <?php
              $this->db->where('jf_id', $jf_id);
                  $query = $this->db->get ('reservation');
                  $job = $query->result ();
                ?>
                <br>
                <hr>
                <div class="table-responsive">
                  <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search for names..">
                  <br>
                  <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Reservatio ID</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($job as $row): ?>
                      <?php
                        $this->db->where('applicant_id', $row->app_user_id);
                        $app = $this->db->get ('applicant_personal');
                        $info = $app->row();
                      ?>
                      <tr>
                        <td><?php echo $info->fname.' '.$info->mname.'. '.$info->lname ?></td>
                        <td><?php echo $row->resv_id ?></td>
                      </tr>
                    <?php endforeach ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          <div class="container">
            
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>