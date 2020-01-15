<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">EMPLOYER REPORTS</h5>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row">
             <!--  Filter -->
            </div>
            <div class="row">
             
                <br>
                <hr>
                <div class="table-responsive">
                  <input type="button" onclick="tableToExcel('table_wrapper', 'W3C Example Table')" value="Export to Excel">
                   <?php
                      $query = $this->db->get ('employer_data');
                      $app = $query->result ();
                    ?>
                  <table class="table table-striped" id='table_wrapper'>
                  <thead>
                    <tr>
                      <th>Employer</th>
                      <th>Total Job Post</th>
                      <th>Total Applied</th>
                      <th>Total Hired</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($app as $row): ?>
                      <?php
                        $jobpost = $this->db->get_where('job_post', array('emp_user_id' => $row->emp_user_id));
                        $job = $jobpost->row();
                      ?>
                      <?php if ($jobpost->num_rows() > 0): ?>
                        <tr>
                          <td><?php echo $row->emp_name ?></td>
                          <td><?php echo $jobpost->num_rows(); ?></td>
                          <td><?php echo $this->db->get_where('applied_job', array('app_job_id' => $job->job_id))->num_rows() ?></td>
                          <td><?php echo $this->db->get_where('applied_job', array('app_job_id' => $job->job_id, 'app_status' => 1))->num_rows() ?></td>
                        </tr>
                      <?php endif ?>
                      
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
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

