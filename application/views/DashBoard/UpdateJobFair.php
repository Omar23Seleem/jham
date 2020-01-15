<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Update Job Post</h5>
        </div>
        <div class="card-body">
          <?php 
            $this->db->where('jf_id', $id);
            $query = $this->db->get('job_fair');
            $data = $query->row();
          ?>
          <form id="job_form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12 pl-1">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="jf_title" id="jf_title" value="<?php echo $data->jf_title ?>">
                <input type="hidden" class="form-control" placeholder="Title" name="jf_id" id="jf_id" value="<?php echo $data->jf_id ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Slot</label>
                <input type="number" name="jf_slot" id="jf_slot" class="form-control" placeholder="Slot" maxlength="10" value="<?php echo $data->slot ?>">
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Venue</label>
                <input type="text" class="form-control" placeholder="Venue" name="jf_venue" id="jf_venue" value="<?php echo $data->venue ?>">
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Date</label>
                <input type="text" class="form-control" placeholder="Date" name="date" id="date" value="<?php echo $data->date ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Job Fair Description</label>
                <textarea name="jf_description" id="text-editor" class="form-control" placeholder="JOB FAIR description"><?php echo $data->jf_description ?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" id="sub">Update</button>
              <br>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#sub').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo site_url('JobPost/job_fair_edit')?>/",
                type: "post",
                data: $('#job_form').serialize(),
                success: function(data){
                    if (data == 1) {
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Successfuly Uppdate',
                          showConfirmButton: false,
                          timer: 2000
                        })
                        window.setTimeout(function() {
                             $("#mydiv").load(location.href + " #mydiv");
                             $('#add_work').modal('hide');
                        }, 2000);
                       
                    }else{
                        Swal.fire({
                          position: 'center',
                          title: 'Fail save',
                          animation: true,
                          customClass: {
                            popup: 'animated tada'
                          }
                        })
                    }
                }
            })
        });
  })
</script>
