<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Employer REPORTS</h5>
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
                    $this->db->from ( 'employer_data' );
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
                      <th>Acronym</th>
                      <th>TAX</th>
                      <th>Type</th>
                      <th>foreach</th>
                      <th>Line of Business</th>
                      <th>Address</th>
                      <th>Full Address</th>
                      <th>Full Name Employer</th>
                      <th>Position</th>
                      <th>Tel #</th>
                      <th>Mobile #</th>
                      <th>Fax</th>
                      <th>Email</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($app as $row): ?>
                      <tr>
                        <td><?php echo $row->emp_name ?></td>
                        <td><?php echo $row->emp_acronym ?></td>
                        <td><?php echo $row->emp_tax ?></td>
                        <td><?php echo $row->emp_type ?></td>
                        <td><?php echo $row->emp_force ?></td>
                        <td><?php echo $row->emp_line_bus ?></td>
                        <td><?php echo $row->emp_address ?></td>
                        <td><?php echo $row->emp_barangay.' '.$row->emp_city.' '.$row->emp_province ?></td>
                        <td><?php echo $row->emp_cont_title.' '.$row->emp_cont_person ?></td>
                        <td><?php echo $row->emp_cont_position ?></td>
                        <td><?php echo $row->emp_cont_tel ?></td>
                        <td><?php echo $row->emp_cont_mobile ?></td>
                        <td><?php echo $row->emp_cont_fax ?></td>
                        <td><?php echo $row->emp_cont_email ?></td>
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

