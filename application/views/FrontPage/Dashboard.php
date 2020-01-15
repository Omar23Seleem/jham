<div class="page-content">
	<div class="da-contact" id="">
		<div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
			<div class="container">
				<div class="card py-4 px-4">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="company-profile-tab" data-toggle="pill" href="#company-profile" role="tab" aria-controls="company-profile" aria-selected="true">Company Profile</a>
						</li>
						<?php
								$user = $this->db->get_where('user_account', array('user_id' => $this->session->userdata('user_id'), 'activate' => 1));
								$u = $user->row();
						?>
						<?php if ($user->num_rows() > 0): ?>
							<li class="nav-item">
								<a class="nav-link" id="add-job-tab" data-toggle="pill" href="#add-job" role="tab" aria-controls="add-job" aria-selected="false">Create Job</a>
							</li>
						<?php endif ?>
						
						<li class="nav-item">
							<a class="nav-link" id="job_post-tab" data-toggle="pill" href="#job_post" role="tab" aria-controls="job_post" aria-selected="false">Job Posted</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="company-profile" role="tabpanel" aria-labelledby="company-profile-tab">
							<div class="card-body">
								<?php
								$resume = $this->db->get_where('company_logo', array('emp_user_id' => $this->session->userdata('user_id')));
								$logo = $resume->row();
								 if ($resume->num_rows() <= 0): ?>
									<form enctype="multipart/form-data" id="submit">
						               <div class="control-group form-group">
					                        <div class="controls">
					                            <label>Upload Logo:</label>
					                            <input name="file" type="file"  id="image_file" required>
					                            <p class="help-block"></p>
					                        </div>
						               </div>
						               <button type="submit" class="btn btn-primary" id="sub">Upload</button>
						               <br><br>
						               
						           </form>
						        <?php else: ?>
						           	<div class="text-center"> 
						           		<div class="text-center">
						           			<img src="../../upload/logo/<?php echo $logo->file ?>" style="max-width: 200px;">
						           			<br>
						           		</div>
								 		<button class="btn btn-danger" onclick="delete_logo(<?php echo $this->session->userdata('user_id') ?>)">Delete and Replace Logo</button>
								 	</div>
								<?php endif ?>
								<form id="company"  method="POST">
									<div class="row">
										<?php
											$have = $this->db->get_where('company_profile', array('emp_user_id' => $this->session->userdata('user_id'))); 
											$com = $have->row();
										?>
										<?php if ($have->num_rows() > 0): ?>
											<div class="col-md-12">
												<div class="form-group">
													<label>Company Description</label>
													 <textarea name="com_description" id="text-editor2"><?php echo $com->com_description ?></textarea>
												</div>
											</div>
										<?php else: ?>
											<div class="col-md-12">
												<div class="form-group">
													<label>Company Description</label>
													 <textarea name="com_description" id="text-editor2"></textarea>
												</div>
											</div>
										<?php endif ?>
										
									</div>
									<input type="hidden" name="emp_user_id" value="<?php echo $this->session->userdata('user_id') ?>">
									<div class="row">
											<div class="col-md-4">
												<button class="btn btn-primary btn-block" id="job_company" type="submit">Save</button>
											</div>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="add-job" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="card-body">
								<form id="job_form"  method="POST">
									<div class="row">
										<div class="col-md-5 pr-1">
											<div class="form-group">
												<label>Job Title</label>
												<input type="text" name="job_title" id="job_title" class="form-control" placeholder="Job Title" required>
											</div>
										</div>
											<div class="col-md-3 pl-1">
												<div class="form-group">
													<label>Specializations</label>
													<select name="job_specialization" id="job_specialization" class="form-control" required>
														<option value="">Select Specializations</option>
														<optgroup class="optgroup" label="Accounting/Finance">
															<option value="Audit and Taxation" class="opt-indent">Audit and Taxation</option>
															<option value="Banking/Financial" class="opt-indent">Banking/Financial</option>
															<option value="Corporate Finance/Investment" class="opt-indent">Corporate Finance/Investment</option>
															<option value="General/Cost Accounting" class="opt-indent">General/Cost Accounting</option>
														</optgroup>
														<optgroup class="optgroup" label="Admin/Human Resources">
															<option value="Clerical/Administrative" class="opt-indent">Clerical/Administrative</option>
															<option value="Human Resources" class="opt-indent">Human Resources</option>
															<option value="Secretarial" class="opt-indent">Secretarial</option>
															<option value="Top Management" class="opt-indent">Top Management</option>
														</optgroup>
														<optgroup class="optgroup" label="Arts/Media/Communications">
															<option value="Advertising" class="opt-indent">Advertising</option>
															<option value="Arts/Creative Design" class="opt-indent">Arts/Creative Design</option>
															<option value="Entertainment" class="opt-indent">Entertainment</option>
															<option value="Public Relations" class="opt-indent">Public Relations</option>
														</optgroup>
														<optgroup class="optgroup" label="Building/Construction">
															<option value="Architect/Interior Design" class="opt-indent">Architect/Interior Design</option>
															<option value="Civil Engineering/Construction" class="opt-indent">Civil Engineering/Construction</option>
															<option value="Property/Real Estate" class="opt-indent">Property/Real Estate</option>
															<option value="Quantity Surveying" class="opt-indent">Quantity Surveying</option>
														</optgroup>
														<optgroup class="optgroup" label="Computer/Information Technology">
															<option value="IT - Hardware" class="opt-indent">IT - Hardware</option>
															<option value="IT - Network/Sys/DB Admin" class="opt-indent">IT - Network/Sys/DB Admin</option>
															<option value="IT - Software" class="opt-indent">IT - Software</option>
														</optgroup>
														<optgroup class="optgroup" label="Education/Training">
															<option value="Education" class="opt-indent">Education</option>
															<option value="Training and Dev." class="opt-indent">Training and Dev.</option>
														</optgroup>
														<optgroup class="optgroup" label="Engineering">
															<option value="Chemical Engineering" class="opt-indent">Chemical Engineering</option>
															<option value="Electrical Engineering" class="opt-indent">Electrical Engineering</option>
															<option value="Electronics Engineering" class="opt-indent">Electronics Engineering</option>
															<option value="Environmental Engineering" class="opt-indent">Environmental Engineering</option>
															<option value="Industrial Engineering" class="opt-indent">Industrial Engineering</option>
															<option value="Mechanical/Automotive Engineering" class="opt-indent">Mechanical/Automotive Engineering</option>
															<option value="Oil/Gas Engineering" class="opt-indent">Oil/Gas Engineering</option>
															<option value="Other Engineering" class="opt-indent">Other Engineering</option>
														</optgroup>
														<optgroup class="optgroup" label="Healthcare">
															<option value="Doctor/Diagnosis" class="opt-indent">Doctor/Diagnosis</option>
															<option value="Pharmacy" class="opt-indent">Pharmacy</option>
															<option value="Nurse/Medical Support" class="opt-indent">Nurse/Medical Support</option>
														</optgroup>
														<optgroup class="optgroup" label="Hotel/Restaurant">
															<option value="Food/Beverage/Restaurant" class="opt-indent">Food/Beverage/Restaurant</option>
															<option value="Hotel/Tourism" class="opt-indent">Hotel/Tourism</option>
														</optgroup>
														<optgroup class="optgroup" label="Manufacturing">
															<option value="Maintenance" class="opt-indent">Maintenance</option>
															<option value="Manufacturing" class="opt-indent">Manufacturing</option>
															<option value="Process Design and Control" class="opt-indent">Process Design and Control</option>
															<option value="Purchasing/Material Mgmt" class="opt-indent">Purchasing/Material Mgmt</option>
															<option value="Quality Assurance" class="opt-indent">Quality Assurance</option>
														</optgroup>
														<optgroup class="optgroup" label="Sales/Marketing">
															<option value="Digital Marketing" class="opt-indent">Digital Marketing</option>
															<option value="Sales - Corporate" class="opt-indent">Sales - Corporate</option>
															<option value="E-commerce" class="opt-indent">E-commerce</option>
															<option value="Marketing/Business Dev" class="opt-indent">Marketing/Business Dev</option>
															<option value="Merchandising" class="opt-indent">Merchandising</option>
															<option value="Retail Sales" class="opt-indent">Retail Sales</option>
															<option value="Sales - Eng/Tech/IT" class="opt-indent">Sales - Eng/Tech/IT</option>
															<option value="Sales - Financial Services" class="opt-indent">Sales - Financial Services</option>
															<option value="Telesales/Telemarketing" class="opt-indent">Telesales/Telemarketing</option>
														</optgroup>
														<optgroup class="optgroup" label="Sciences">
															<option value="Actuarial/Statistics" class="opt-indent">Actuarial/Statistics</option>
															<option value="Agriculture" class="opt-indent">Agriculture</option>
															<option value="Aviation" class="opt-indent">Aviation</option>
															<option value="Biomedical" class="opt-indent">Biomedical</option>
															<option value="Biotechnology" class="opt-indent">Biotechnology</option>
															<option value="Chemistry" class="opt-indent">Chemistry</option>
															<option value="Food Tech/Nutritionist" class="opt-indent">Food Tech/Nutritionist</option>
															<option value="Geology/Geophysics" class="opt-indent">Geology/Geophysics</option>
															<option value="Science and Technology" class="opt-indent">Science and Technology</option>
														</optgroup>
														<optgroup class="optgroup" label="Services">
															<option value="Security/Armed Forces" class="opt-indent">Security/Armed Forces</option>
															<option value="Customer Service" class="opt-indent">Customer Service</option>
															<option value="Logistics/Supply Chain" class="opt-indent">Logistics/Supply Chain</option>
															<option value="Law/Legal Services" class="opt-indent">Law/Legal Services</option>
															<option value="Personal Care" class="opt-indent">Personal Care</option>
															<option value="Social Services" class="opt-indent">Social Services</option>
															<option value="Tech and Helpdesk Support" class="opt-indent">Tech and Helpdesk Support</option>
														</optgroup>
														<optgroup class="optgroup" label="Others">
															<option value="General Work" class="opt-indent">General Work</option>
															<option value="Journalist/Editors" class="opt-indent">Journalist/Editors</option>
															<option value="Publishing" class="opt-indent">Publishing</option>
															<option value="Others" class="opt-indent">Others</option>
														</optgroup>
													</select>
												</div>
											</div>
											<div class="col-md-4 pl-1">
												<div class="form-group">
													<label for="">Locations</label>
													<select name="job_location" id="job_location" class="form-control" required>
														<option value="Legazpi City" class="opt-indent">Legazpi City</option>
														<optgroup label="Philippines">
															<option value="Armm" class="opt-indent">Armm</option>
															<option value="Bicol Region" class="opt-indent">Bicol Region</option>
															<option value="C.A.R" class="opt-indent">C.A.R</option>
															<option value="Cagayan Valley" class="opt-indent">Cagayan Valley</option>
															<option value="Calabarzon and Mimaropa" class="opt-indent">Calabarzon and Mimaropa</option>
															<option value="Caraga" class="opt-indent">Caraga</option>
															<option value="Central Luzon" class="opt-indent">Central Luzon</option>
															<option value="Central Visayas" class="opt-indent">Central Visayas</option>
															<option value="Davao" class="opt-indent">Davao</option>
															<option value="Eastern Visayas" class="opt-indent">Eastern Visayas</option>
															<option value="Ilocos Region" class="opt-indent">Ilocos Region</option>
															<option value="National Capital Reg" class="opt-indent">National Capital Reg</option>
															<option value="Northern Mindanao" class="opt-indent">Northern Mindanao</option>
															<option value="Soccskargen" class="opt-indent">Soccskargen</option>
															<option value="Western Visayas" class="opt-indent">Western Visayas</option>
															<option value="Zamboanga" class="opt-indent">Zamboanga</option>
														</optgroup>
														<optgroup label="Overseas">
															<option value="China" class="opt-indent">China</option>
															<option value="Hong Kong" class="opt-indent">Hong Kong</option>
															<option value="India" class="opt-indent">India</option>
															<option value="Indonesia" class="opt-indent">Indonesia</option>
															<option value="Japan" class="opt-indent">Japan</option>
															<option value="Malaysia" class="opt-indent">Malaysia</option>
															<option value="Singapore" class="opt-indent">Singapore</option>
															<option value="Thailand" class="opt-indent">Thailand</option>
															<option value="Vietnam" class="opt-indent">Vietnam</option>
														</optgroup>
														<optgroup label="Other Work Locations">
															<option value="Africa" class="opt-indent">Africa</option>
															<option value="Asia - Middle East" class="opt-indent">Asia - Middle East</option>
															<option value="Asia - Others" class="opt-indent">Asia - Others</option>
															<option value="Australia and New Zealand" class="opt-indent">Australia and New Zealand</option>
															<option value="Europe" class="opt-indent">Europe</option>
															<option value="North America" class="opt-indent">North America</option>
															<option value="South America" class="opt-indent">South America</option>
														</optgroup>
													</select>
												</div>
											</div>
									</div>
									<div class="row">
										<div class="col-md-4 pr-1">
											<div class="form-group">
												<label>Salary</label>
												<input type="number" name="job_salary" id="job_salary" class="form-control" placeholder="Salary" maxlength="10">
											</div>
										</div>
										<div class="col-md-4 pr-1">
											<div class="form-group">
												<label>Salary Type</label>
												<select name="job_salary_type" id="job_salary_type" class="form-control" required>
													<option value="Nogtiable">Nogtiable</option>
													<option value="Non-Nogtiable">Non-Nogtiable</option>
												</select>
											</div>
										</div>
										<div class="col-md-4 pr-1">
											<div class="form-group">
												<label>Slots</label>
												<input type="number" name="job_slot" id="job_slot" class="form-control" placeholder="Slot" maxlength="10" required="required">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 pr-1">
											<div class="form-group">
												<label>Year Experience</label>
												<input type="number" name="job_exp" id="job_exp" class="form-control" placeholder="Year" maxlength="10">
											</div>
										</div>
										<div class="col-md-4 pr-1">
											<div class="form-group">
												<label>Job Type</label>
												<select name="job_type" id="job_type" class="form-control" required>
													<option value="Full-Time">Full-Time</option>
													<option value="Part-Time">Part-Time</option>
												</select>
											</div>
										</div>
										<div class="col-md-4 pr-1">
											<div class="form-group">
												<label>Shift Time</label>
												<select name="job_shift" id="job_shift" class="form-control" required>
													<option value="Morning">Morning</option>
													<option value="Night">Night</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
	                                        <label>Highest Educational Level Requirement <span class="required">*</span></label>
	                                        <select class="custom-select" name="job_edu_lvl" id="job_edu_lvl">
	                                            <option value="No Formal Education">No Formal Education</option>
	                                            <option value="Elementary Level">Elementary Level</option>
	                                            <option value="Elementary Graduate">Elementary Graduate</option>
	                                            <option value="High School Level">High School Level</option>
	                                            <option value="High School Graduate">High School Graduate</option>
	                                            <option value="College Level">College Level</option>
	                                            <option value="College Graduate">College Graduate</option>
	                                            <option value="Technical-vocational Graduate">Technical-vocational Graduate</option>
	                                            <option value="Post Graduate">Post Graduate</option>
	                                        </select>
	                                    </div>
									</div>
									<div class="row">
										 <div class="card pad-15 mbt-15">
			                                <div class="form-row skills" id="cent-skill">
			                                    <div class="col-12"><h5>VII. 21st Century Skills Should Have - <span style="color:red" id="req">maximum of 5 </span></h5>
			                                        <br></div>
			                                     
			                            
			                                    <br>
			                                    <div class="col-md-4">
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="inovation" id="inovation" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Inovation</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="team_work" id="team_work" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Team Work</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="multitasking" id="multitasking" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Multitasking</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="work_ethics" id="work_ethics" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Work Ethics</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="self_motivation" id="self_motivation" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Self Motivation</label>
			                                        </div>
			                                    </div>
			                                    <div class="col-md-4">
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="creative_problem" id="creative_problem" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Creative Problem Solving</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="problem_solving" id="problem_solving" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Problem Solving</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="critical_thinking" id="critical_thinking" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Critical Thinking</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="decision_making" id="decision_making" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Decision Making</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="strees_tolerance" id="strees_tolerance" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Stress Tolerance</label>
			                                        </div>
			                                    </div>
			                                    <div class="col-md-4">
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="planing" id="planing" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">PLaning and Organizing</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="perceptiveness" id="perceptiveness" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Social Perceptiveness</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="english_funtional" id="english_funtional" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">English Functional Skills</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="english_comp" id="english_comp" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">English Comprehension</label>
			                                        </div>
			                                        <div class="form-check ">
			                                            <input class="form-check-input" type="checkbox" name="math_functional" id="math_functional" value="">
			                                            <label class="form-check-label" for="inlineCheckbox1">Math Functional Skill</label>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Job Description</label>
												 <textarea name="job_description" id="text-editor"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
											<div class="col-md-4">
												<button class="btn btn-primary btn-block" id="job_form_submit" type="submit" disabled="disabled">Post This Job</button>
											</div>
									</div>
								</form>
							</div>
						</div>						
						<div class="tab-pane fade" id="job_post" role="tabpanel" aria-labelledby="job_post-tab">
							<?php 
								$job_list = $this->db->get_where('job_post', array('emp_user_id' => $this->session->userdata('user_id')));
			  					$job = $job_list->result();
							?>
							<div class="table-responsive">
							  	<table class="table table-striped">
								  <thead>
								    <tr>
								      <th scope="Job">Job Title</th>
								      <th>Job Specialization</th>
								      <th>Slots</th>
								      <th>Status</th>
								      <th>Epiry Date</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php foreach ($job as $row): ?>
								  		<?php
								  			if ($row->job_status == 1) {
								  				$status = 'Active';
								  			}elseif($row->job_status == 2){
								  				$status = 'Declined';
								  			}else{
								  				$status = 'Pending';
								  			}
								  		?>
								  		<tr>
									  		<td><a href="<?php echo site_url()?>/FrontPage/job/<?php echo $row->job_id ?>"><?php echo $row->job_title ?></a></td>
									  		<td><?php echo $row->job_specialization ?></td>
									  		<td><?php echo $row->job_slot ?></td>
									  		<td><?php echo $status ?></td>
									  		<td><?php echo $row->expirry_date ?></td>
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
<?php
	$check = $this->db->get_where('employer_data', array('emp_user_id' => $this->session->userdata('user_id')));
     		if ($check->num_rows() == 0) {
     			
 ?>

<script>
  $(document).ready(function(){
    Swal.fire({
	  position: 'center',
	  type: 'info',
	  title: 'Fill up first the NSRP Form, to Continue to your Account',
	  showConfirmButton: false,
	})
	window.setTimeout(function() {
         window.location.href = '/jham/index.php/Frontpage/employer';
    }, 4000);
  });
</script>
 <?php
     		}
?>

<script>
  $(function (){
    $('#job_form_submit').click(function(e) {
          e.preventDefault();
          tinyMCE.triggerSave();
          $.ajax({
              type: 'POST',
              url: '<?php echo site_url('JobPost/create_job'); ?>',
              data: $('#job_form').serialize(),
              success: function(data){
                  if (data == 1) {
                     Swal.fire({
                              position: 'center',
                              title: 'Your JOB post will be pending until revisions is done!',
                              animation: true,
                              customClass: {
                                popup: 'animated tada'
                              }
                            })
                      $('#job_form').trigger("reset");
                  }else{
                      alert('Error Occur');
                  }
              }
          })
      });

    $('#job_company').click(function(e) {
          e.preventDefault();
          tinyMCE.triggerSave();
          $.ajax({
              type: 'POST',
              url: '<?php echo site_url('EmpAccount/com_des'); ?>',
              data: $('#company').serialize(),
              success: function(data){
                  if (data == 1) {
                     Swal.fire({
                              position: 'center',
                              title: 'Successfuly Save!',
                              animation: true,
                              customClass: {
                                popup: 'animated tada'
                              }
                            })
                  }else{
                      alert('Error Occur');
                  }
              }
          })
      });

    $('#submit').submit(function(e){
	    e.preventDefault(); 
	         $.ajax({
	             url:'<?php echo site_url('EmpAccount/do_upload'); ?>',
	             type:"post",
	             data:new FormData(this),
	             processData:false,
	             contentType:false,
	             cache:false,
	             async:false,
	              success: function(data){
	                   Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Successfuly Save',
                          showConfirmButton: false,
                          timer: 2000
                        })
                        window.setTimeout(function() {
                             location.reload();
                        }, 2000);
	           }
	         });
	    });  

     $('input[type="checkbox"]').on('change', function(){
            $(this).val(this.checked ? 1 : 0);
        });
    $('#general i .counter').text(' ');

        var fnUpdateCount = function() {
            var generallen = $("#cent-skill input[type='checkbox']:checked").length;
            console.log(generallen,$("#general i .counter") )
            if (generallen > 0) {
                $("#general #c_skill").val(generallen);
                if (generallen == '' ) {
                    $("#job_form_submit").attr("disabled");
                     $("#req").html('Required');
                }
                if (generallen <= 5 ) {
                    $("#job_form_submit").removeAttr("disabled");
                     $("#req").html('');
                }else{
                    $("#req").html('maximum of 5 ');
                    $("#job_form_submit").attr("disabled", true);
                }
            } else {
                $("#general c_skill").val('');
            }
        };

        $("#cent-skill input:checkbox").on("change", function() {
            fnUpdateCount();
        });


  });
  function delete_logo(id){
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
			        url: '<?php echo site_url('EmpAccount/logo_delete/'); ?>'+ id,
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

<?php if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('confirm') == 0): ?>

    <script type="text/javascript">
         $(function() {
               Swal.fire({
                  position: 'top',
                  type: 'success',
                  title: 'Email Confirmation Required',
                  showConfirmButton: false,
                })
                window.setTimeout(function() {
                     window.location.href = '/jham/index.php/Frontpage/Confirm';
                }, 2000);
        });
    </script>

<?php endif ?>