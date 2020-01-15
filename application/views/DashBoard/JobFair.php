
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full">
    <div class="modal-content modal-popup">
      <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
      <div class="text-center modal-title">Recruitment</div>        
      <div class="da-contact-message">
        <div class="container">
        <form id="job_form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12 pl-1">
              <div class="form-group">
                <label>Type</label>
                <select name="type" id="type" class="form-control" required>
                  <option value="Job Fair">Job Fair</option>
                  <option value="Recruitment">Recruitment</option>
                </select>
              </div>
            </div>
            <div class="col-md-12 pl-1">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="jf_title" id="jf_title" required>
                <input type="hidden" class="form-control" placeholder="Title" name="jf_id" id="jf_id">
              </div>
            </div>
          </div>
          <div class="row">
           
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Venue</label>
                <input type="text" class="form-control" placeholder="Venue" name="jf_venue" id="jf_venue" required>
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>End Date</label>
                <input type="text" class="form-control date5" placeholder="Date" name="date" id="date5" required>
              </div>
            </div>
             <div class="col-md-4 pr-1" id="slots_view">
              <div class="form-group">
                <label>Slot</label>
                <input type="number" name="jf_slot" id="jf_slot" class="form-control" placeholder="Slot" maxlength="10" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Job Fair Description</label>
                <textarea name="jf_description" id="text-editor" class="form-control" placeholder="JOB FAIR description"></textarea>
              </div>
            </div>
          </div>
          <div class="row img-upload">
           <div class="control-group form-group">
                  <div class="controls">
                      <label>Upload Banner:</label>
                      <input name="file" type="file"  id="image_file" required>
                      <p class="help-block"></p>
                  </div>
           </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" id="sub">Post This </button>
              <button type="submit" class="btn btn-primary" id="update" style="display: none;" onclick="save()">Update This </button>
              <br>
            </div>
          </div>
        </form>
        <div class="row">
            <div class="col-md-12">
             
              <br>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Recruitment</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <button type="submit" class="btn btn-primary" onclick="add()">Add</button>
              <?php
                  $this->db->where('jf_id !=', 1);
                  $query = $this->db->get ('job_fair');
                  $job = $query->result ();
                ?>
                <br>
                <hr>
                <div class="table-responsive">
                  <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Type</th>
                      <th>Slots</th>
                      <th>Venue</th>
                      <th>Date</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($job as $row): ?>
                      <tr>
                        <td> <a href="<?php echo site_url()?>/Dashboard/JobFairs/<?php echo $row->jf_id?>"> <?php echo $row->jf_title ?></a> </td>
                        <td><?php echo $row->type ?></td>
                        <td><?php echo $row->slot ?></td>
                        <td><?php echo $row->venue ?></td>
                        <td><?php echo $row->date ?></td>
                        <td><a class="btn btn-primary" href="<?php echo site_url()?>/Dashboard/UpdateJobFair/<?php echo $row->jf_id ?>">Edit</a></td>
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

  $(document).ready(function() {
    $('#job_form').submit(function(e){
      e.preventDefault(); 
      tinyMCE.triggerSave();
           $.ajax({
               url:'<?php echo site_url('JobPost/do_upload'); ?>',
               type:"post",
               data:new FormData(this),
               processData:false,
               contentType:false,
               cache:false,
               async:false,
                success: function(data){
                  $('#job_form')[0].reset();
                 Swal.fire({
                      position: 'center',
                      type: 'success',
                      title: 'Successfuly Save',
                      showConfirmButton: false,
                      timer: 2000
                    })
                 location.reload();
             }
           });
      });  
    $('#type').on('change', function() {
      if ( this.value == 'Job Fair')
      {
        $("#slots_view").show();
      }
      else
      {
        $("#slots_view").hide();
      }
    });
  });

  function edit(id){
    $('#add').modal('show');
    $('#update').show();
    $('#sub').hide();
    $('.img-upload').hide();

      $.ajax({
        url : "<?php echo site_url('JobPost/job_fair_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           $('#jf_id').val(id);
           $('#jf_title').val(data.jf_title);
           $('#jf_slot').val(data.slot);
           $('#jf_venue').val(data.venue);
           $('#date').val(data.date);
           // $('#text-editor_ifr').html(data.jf_description);
           tinyMCE.get('text-editor').setContent(data.jf_description);
           // $('#jf_title').val(data.jf_title);

           console.log(data)
        },
        errorz: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
  }
   function add(){
      $('#add').modal('show');
      $('.modal-title').text('Add Job Fair');
      $('#sub').show();
      $('#update').hide();
      save_method = 'add';
  }
  function save(){
      $('#update').click(function(e){
      e.preventDefault(); 
      tinyMCE.triggerSave();
           $.ajax({
               url:'<?php echo site_url('JobPost/update_job_fair'); ?>',
               type:"post",
               data:new FormData(this),
               processData:false,
               contentType:false,
               cache:false,
               async:false,
                success: function(data){
                  $('#job_form')[0].reset();
                 Swal.fire({
                      position: 'center',
                      type: 'success',
                      title: 'Successfuly Save',
                      showConfirmButton: false,
                      timer: 2000
                    })
             }
           });
      });  
  }

</script>

