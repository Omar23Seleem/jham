<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Applicant REPORTS</h5>
        </div>
        <div class="card-body">
          <div class="">
            <div class="row">
             <!--  Filter -->
            </div>
            <div class="row">
              
                <br>
                <hr>
                <div class="table table-responsive">
                  <div class="row">
                    
                    <div class="col-md-4">
                      <?php echo  $this->input->post('year').'-'.$this->input->post('month') ?>
                    </div>
                    <div class="col-md-6">
                      <form id='filter' method="POST">
                      <div class="row" style="margin-right: 20px;">
                        <select class="col-md-4 form-control" name="month" />
                          <option value="">Select Month</option> 
                          <option value="01">January</option>      
                          <option value="02">February</option>      
                          <option value="03">March</option>      
                          <option value="04">April</option>      
                          <option value="05">May</option>      
                          <option value="06">June</option>      
                          <option value="07">July</option>      
                          <option value="08">August</option>      
                          <option value="09">September</option>      
                          <option value="10">October</option>      
                          <option value="11">November</option>      
                          <option value="12">December</option>      
                        </select> 
                      <?php
                      $currently_selected = date('Y'); 
                      $earliest_year = 2018; 
                      $latest_year = date('Y'); 
                      print '<select class="col-md-4 form-control" name="year"><option value="">Select Year</option> ';
                      foreach ( range( $latest_year, $earliest_year ) as $i ) {
                        print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                      }
                      print '</select>';
                      ?>
                      <div class="col-md-4"><button class="btn btn-primary" id="signup_submit" type="submit">filter</button></div>
                      </form>
                      </div>
                    </div>
                  
                  <div class="col-md-2"><input type="button" onclick="tableToExcel('table_wrapper', 'W3C Example Table')" value="Export to Excel"></div>
                  </div>
                  <?php
                    $this->db->select ( '*' ); 
                    $this->db->from ( 'applicant_personal' );
                    if ($this->input->post('year') != '') {
                      $this->db->like('date', $this->input->post('year').'-'.$this->input->post('month'), 'after');
                    }
                     
                    $query = $this->db->get ();
                    $app = $query->result ();
                  ?>
                  <table class="table table-striped" id='table_wrapper'>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Date Birth</th>
                      <th>Age</th>
                      <th>Sex</th>
                      <th>Place Birth</th>
                      <th>Civil Status</th>
                      <th>Citezenship</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Phone</th>
                      <th>Mobile #</th>
                      <th>Mobile #</th>
                      <th>Present Address</th>
                      <th>Permanent Address</th>
                      <th>Disability</th>
                      <th>Employment</th>
                      <th>Employment Status</th>
                      <th>Looking for Work</th>
                      <th>Looking for Work Status</th>
                      <th>Willing to Work</th>
                      <th>When to work</th>
                      <th>4ps</th>
                      <th>4ps #</th>
                      <th>OFW</th>
                      <th>Willing to Work Back</th>
                      <th>Date of Application</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($app as $row): ?>
                      <tr>
                        <td><?php echo $row->lname.', '.$row->fname.' '.$row->mname.' '.$row->suffix ?></td>
                        <td><?php echo $row->dbirth ?></td>
                        <td><?php echo $row->age ?></td>
                        <td><?php echo $row->sex ?></td>
                        <td><?php echo $row->pbirth ?></td>
                        <td><?php echo $row->civil ?></td>
                        <td><?php echo $row->citizenship ?></td>
                        <td><?php echo $row->height ?></td>
                        <td><?php echo $row->weight ?></td>
                        <td><?php echo $row->phone ?></td>
                        <td><?php echo $row->mphone1 ?></td>
                        <td><?php echo $row->mphone2 ?></td>
                        <td><?php echo $row->street.' '.$row->barangay.' '.$row->municipality.' '.$row->province ?></td>
                        <td><?php echo $row->street_p.' '.$row->barangay_p.' '.$row->municipality_p.' '.$row->province_p ?></td>
                        <td><?php echo $row->disability ?></td>
                        <td><?php echo $row->employment ?></td>
                        <td><?php echo $row->emp_status ?></td>
                        <td><?php echo $row->looking_work ?></td>
                        <td><?php echo $row->looking_work_status ?></td>
                        <td><?php echo $row->willing_work ?></td>
                        <td><?php echo $row->when_work ?></td>
                        <td><?php echo $row->four_ps ?></td>
                        <td><?php echo $row->four_ps_number ?></td>
                        <td><?php echo $row->ofw ?></td>
                        <td><?php echo $row->work_back ?></td>
                        <td><?php echo $row->date ?></td>
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
<style type="text/css">
.table thead th, td {
    white-space: nowrap;
}
</style>
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

