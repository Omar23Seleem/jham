<div class="modal fade" id="add_work" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content modal-popup">
	    <!-- <a href="#" class="close-link"><i class="icon_close_alt2"></i></a> -->
	    <div class="text-center modal-title">Add Work Experience</div>        
	    <div class="da-contact-message">
	      <form id="work_form" role="form">  
	        <div class="modal-body">
	          <div class="form-group">
	          	<label>Company</label>
	          	<input type="hidden" name="work_exp_id" id="work_exp_id" value="">
	            <input type="text" class="form-control" name="work_company" id="work_company" >
	          </div>
	          <div class="form-group">
	          	<label>Company Address</label>
	            <input type="text" class="form-control" name="work_address" id="work_address" >
	          </div>
	          <div class="form-group">
	          	<label>Work Position</label>
	            <input type="text" class="form-control" name="work_position" id="work_position" >
	          </div>
	          <div class="form-group">
	          	<label>Inclusive Date</label>
	            <input type="text" class="form-control" name="work_date" id="work_date" >
	          </div>
	          <div class="form-group">
	          	<label>Work Status</label>
	            <input type="text" class="form-control" name="work_status" id="work_status" >
	          </div>
	         </div> 
	        <div class="modal-footer">
	          <button class="btn btn-primary block" id="work_submit" type="submit">Save</button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
</div>
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-full">
	  <div class="modal-content modal-popup">
	    <!-- <a href="#" class="close-link"><i class="icon_close_alt2"></i></a> -->
	    <div class="text-center modal-title">Personal Info</div>        
	    <div class="da-contact-message">
	      <form id="form_applicant" method="post">
	      	<?php 
	      			$profile = $this->db->get_where('applicant_personal', array('applicant_id' => $this->session->userdata('user_id')));
			  		$datas = $profile->row();
	      	?>
	      	<?php if ($profile->num_rows() > 0): ?>
	      		
	      	
            <div class="col-12">
                <div class="card pad-15 mbt-15">
                    <div class="form-row">
                        <div class="col-md-3">
                            <label>Last Name</label>
                            <input name="lname" id="lname" type="text" class="form-control" placeholder="Last name" required value="<?php echo $datas->lname?>">
                        </div>
                        <div class="col-md-3">
                             <label>First Name</label>
                            <input name="fname" id="fname" type="text" class="form-control" placeholder="First name" required value="<?php echo $datas->fname?>"> 
                        </div>
                        <div class="col-md-3">
                             <label>Middle Name</label>
                            <input name="mname" id="mname" type="text" class="form-control" placeholder="Midle Name" required value="<?php echo $datas->mname?>">
                        </div>
                        <div class="col-md-3">
                             <label>Suffix</label>
                            <input name="suffix" id="suffix" type="text" class="form-control" placeholder="Suffix (Sr., Jr.)" value="<?php echo $datas->suffix?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label>Date of Birth</label>
                            <input name="dbirth" id="dbirth" type="text" class="form-control" placeholder="Date of Birth" required value="<?php echo $datas->dbirth?>">
                        </div>
                        <div class="col">
                             <label>Age</label>
                            <input name="age" id="age" type="text" class="form-control" placeholder="Age" required value="<?php echo $datas->age?>">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="col">
                                    <label>Sex</label>
                                        <select name="sex" id="sex" class="custom-select" id="inputGroupSelect04">
                                        	<option value="<?php echo $datas->sex ?>"><?php echo $datas->sex ?></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Place of Birth</label>
                                    <input name="pbirth" id="pbirth" type="text" class="form-control" placeholder="Place of Birth" required value="<?php echo $datas->pbirth?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Civil Status</label>
                                        <select name="civil" id="civil" class="custom-select" id="inputGroupSelect04">
                                        	<option value="<?php echo $datas->civil?>"><?php echo $datas->civil?></option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                            <option value="Seperated">Seperated</option>
                                            <option value="Other">Other</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Citizenship</label>
                                    <input name="citizenship" id="citizenship" type="text" class="form-control" placeholder="Citizenship" required value="<?php echo $datas->citizenship?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Height(cm)</label>
                                    <input name="height" id="height" type="text" class="form-contro number" placeholder="Height" required value="<?php echo $datas->height?>">
                                </div>
                                <div class="col">
                                    <label>Weight(kg)</label>
                                    <input name="weight" id="weight" type="text" class="form-control number" placeholder="Weight" required value="<?php echo $datas->weight?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Landline Number</label>
                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Landline Number" value="<?php echo $datas->phone?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label>Mobile Number</label>
                                    <input name="mphone1" id="mphone1" type="text" class="phone form-control" placeholder="+63__________" required value="<?php echo $datas->mphone1?>">
                                    <br>
                                    <input name="mphone2" id="mphone2" type="text" class="phone form-control" placeholder="+63__________" value="<?php echo $datas->mphone2?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <label>Present Address</label>
                            <div class="form-row">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">House No./Street Village</span>
                                    </div>
                                    <input type="text" class="form-control" name="street" id="street" aria-describedby="basic-addon3" required value="<?php echo $datas->street?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >Barangay</span>
                                    </div>
                                    <input type="text" class="form-control" name="barangay" id="barangay" aria-describedby="basic-addon3" required value="<?php echo $datas->barangay?>">
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"  >Municipality/City</span>
                                    </div>
                                    <input type="text" class="form-control" name="municipality" id="municipality" aria-describedby="basic-addon3" required value="<?php echo $datas->municipality?>">
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Province</span>
                                    </div>
                                    <input type="text" class="form-control" name="province" id="province" aria-describedby="basic-addon3" required value="<?php echo $datas->province?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-4">
                                    <label>Permanent Address</label>
                                </div>
                                <div class="col-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="address-check" id="address-check" value="" >
                                        <label class="form-check-label" for="inlineCheckbox1">Check if same as Present address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">House No./Street Village</span>
                                    </div>
                                    <input type="text" class="form-control" name="street_p" id="street_p" aria-describedby="basic-addon3" required value="<?php echo $datas->street_p?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Barangay</span>
                                    </div>
                                    <input type="text" class="form-control" name="barangay_p" id="barangay_p" aria-describedby="basic-addon3" required value="<?php echo $datas->barangay_p?>">
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Municipality/City</span>
                                    </div>
                                    <input type="text" class="form-control" name="municipality_p" id="municipality_p" aria-describedby="basic-addon3" required value="<?php echo $datas->municipality_p?>">
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Province</span>
                                    </div>
                                    <input type="text" class="form-control" name="province_p" id="province_p" aria-describedby="basic-addon3" required value="<?php echo $datas->province_p?>">
                                </div>
                            </div>
                            
                        </div> 
                         	<div class="row">
	                            <div class="col-md-12">
	                                <br>
	                                <button class="btn btn-primary btn-block" type="submit" id="">Submit</button>
	                            </div>
	                        </div>
                        </div>
                    </div> <!-- ///row -->     
                </div>
            </div>
            <?php endif ?>
            </form>
	    </div>
	  </div>
	</div>
</div>
<div class="page-content">
  <div class="da-contact" id="">
    <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
      <div class="container">
        <div class="card py-4 px-4 data_app">
        	<div class="row">
        		<?php
			  		$profile = $this->db->get_where('applicant_personal', array('applicant_id' => $this->session->userdata('user_id')));
			  		$data = $profile->row();
			  		$work = $this->db->get_where('work_exp', array('app_user_id' => $this->session->userdata('user_id')));
			  		$data_work = $work->result();
			  		$cen = $this->db->get_where('century_skill', array('app_user_id' => $this->session->userdata('user_id')));
			  		$data_cen = $cen->result();
			  		$tech = $this->db->get_where('tech_skill', array('app_user_id' => $this->session->userdata('user_id')));
			  		$data_tech = $tech->result();
			  		$my_pic = $this->db->get_where('app_picture', array('app_user_id' => $this->session->userdata('user_id')));
					$pic = $my_pic->row();
			  	?>
				<div class="col-md-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
							<?php if ($my_pic->num_rows() <= 0): ?>
								<img class="tab-pic" src="<?php echo base_url(); ?>/assets/images/profile.png"><span style="margin-left: 35px;"><?php echo $data->fname ?> Profile </span>
							<?php else: ?>
								<img class="tab-pic"  src="../../upload/resume/<?php echo $pic->file ?>"><span style="margin-left: 35px;"><?php echo $data->fname ?> Profile </span>
							<?php endif ?>
							
						</a>
						<a class="nav-link" id="v-pills-job-tab" data-toggle="pill" href="#v-pills-job" role="tab" aria-controls="v-pills-job" aria-selected="false">Applied Job</a>
						<a class="nav-link" id="v-pills-wish-tab" data-toggle="pill" href="#v-pills-wish" role="tab" aria-controls="v-pills-wish" aria-selected="false">Wish List</a>
						<a class="nav-link" id="v-pills-work-tab" data-toggle="pill" href="#v-pills-work" role="tab" aria-controls="v-pills-work" aria-selected="false">Work Experience</a>
						<a class="nav-link" id="v-pills-skill-tab" data-toggle="pill" href="#v-pills-skill" role="tab" aria-controls="v-pills-skill" aria-selected="false">Skills</a>
						<a class="nav-link" id="v-pills-resume-tab" data-toggle="pill" href="#v-pills-resume" role="tab" aria-controls="v-pills-resume" aria-selected="false">Resume</a>
					</div>
				</div>
				<div class="col-md-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<div class="col-md-4 profile-pic-section" style="text-align: center;">
									<?php
										
										 if ($my_pic->num_rows() <= 0): ?>
											<form enctype="multipart/form-data" id="profPic">
								               <div class="control-group form-group">
							                        <div class="controls">
							                            <label>Upload Picture:</label>
							                            <input name="file" type="file"  id="image_file" required>
							                            <p class="help-block"></p>
							                        </div>
								               </div>
								               <button type="submit" class="btn btn-primary" id="sub_pic">Upload</button>
								               <br><br>
								               
								           </form>
								        <?php else: ?>
								        	<div class="profile-pic" id="candidate_profile_picture">
												<img class="profile-pic img-fluid" src="../../upload/resume/<?php echo $pic->file ?>">
												
											</div>
											<button class="btn btn-danger btn-xs" onclick="delete_pic(<?php echo $this->session->userdata('user_id') ?>)">Delete Picture</button>
								           	
										<?php endif ?>
								</div>
								<div class="col-md-8">
									<div class="row">

										<div class="col-12 candidate-name"><?php echo $data->fname. ' ' .$data->mname . '. ' .$data->lname. '. ' .$data->suffix ?></div>
										<div class="col-12 highest-information">
											Contact Information
										</div>
										<div class="col-12 visible-sm visible-md visible-lg summary-list-item">
											<span class="nowrap">
												<span class="icon-phone"></span> <?php echo $data->mphone1 ?> &nbsp; 
											</span>| 
											<span class="nowrap">
												<span class="icon-envelope"></span> <?php echo $this->session->userdata('email') ?> &nbsp;
											</span> |
											<span class="nowrap">
												<span class="icon-location"></span> <?php echo $data->street. ', ' .$data->barangay . ', ' .$data->municipality. ', ' .$data->province ?>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="card other-info">
								<hr>
								<div class="col-12">
									<div class=" ">
										<div class="row">
											<label class="col-sm-3 control-label  c-text-left">Gender</label>
											<div class="col-sm-9">
												<label class="c-text-left" ><?php echo $data->sex ?></label>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3 control-label  c-text-left" >Civil Status</label>
											<div class="col-sm-9">
												<label class="c-text-left" ><?php echo $data->civil ?></label>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3 control-label  c-text-left" >Date of Birth</label>
											<div class="col-sm-9">
												<label class="c-text-left" ><?php echo $data->dbirth ?></label>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3 control-label  c-text-left" >Nationality</label>
											<div class="col-sm-9">
												<label class="c-text-left" ><?php echo $data->citizenship ?></label>
											</div>
										</div>
										<div class="row">
											<label class="col-sm-3 control-label  c-text-left" >Permanent Resident</label>
											<div class="col-sm-9">
												<label class=" c-text-left" ><?php echo $data->street_p. ', ' .$data->barangay_p . ', ' .$data->municipality_p. ', ' .$data->province_p ?></label>
											</div>
										</div>
									</div>
									<button class="btn btn-primary btn-xs" onclick="info()">Edit Information</button>
									<br>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-job" role="tabpanel" aria-labelledby="v-pills-job-tab">
							<?php
						  	 	$this->db->select ( '*' ); 
							    $this->db->from ( 'applied_job' );
							    $this->db->join ( 'job_post', 'job_post.job_id = applied_job.app_job_id' , 'left' );
							    $this->db->join ( 'employer_data', 'employer_data.emp_user_id = job_post.emp_user_id' , 'left' );
							    $this->db->where('app_user_id', $this->session->userdata('user_id'));
							    $query = $this->db->get ();
			   					$app = $query->result ();
						  	?>
						  	<br>
						  	<hr>
						  	<div class="table-responsive">
							  	<table class="table table-striped">
								  <thead>
								    <tr>
								      <th scope="Job">Job Title</th>
								      <th>Job Employer</th>
								      <th>Job Location</th>
								      <th>Status</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php foreach ($app as $row): ?>
								  		<?php
								  			if ($row->app_status == 1) {
								  				$status = 'Hired';
								  			}elseif($row->app_status == 2){
								  				$status = 'Declined';
							  				}elseif($row->app_status == 3){
							  					$status = 'On Process';
								  			
								  			}else{
								  				$status = 'Pending';
								  			}
								  		?>
								  		<tr>
									  		<td><a href="<?php echo site_url()?>/FrontPage/job/<?php echo $row->job_id ?>"><?php echo $row->job_title ?></a></td>
									  		<td><?php echo $row->emp_name ?></td>
									  		<td><?php echo $row->job_location ?></td>
									  		<td><?php echo $status ?></td>
									  	</tr>
								  	<?php endforeach ?>
								  	
								    
								  </tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-wish" role="tabpanel" aria-labelledby="v-pills-wish-tab">
							<?php
						  	 	$this->db->select ( '*' ); 
							    $this->db->from ( 'wish_list' );
							    $this->db->join ( 'job_post', 'job_post.job_id = wish_list.job_id' , 'left' );
							    $this->db->join ( 'employer_data', 'employer_data.emp_user_id = job_post.emp_user_id' , 'left' );
							    $this->db->where('app_user_id', $this->session->userdata('user_id'));
							    $query = $this->db->get ();
			   					$app = $query->result ();
						  	?>
						  	<br>
						  	<hr>
						  	<div class="table-responsive">
							  	<table class="table table-striped">
								  <thead>
								    <tr>
								      <th scope="Job">Job Title</th>
								      <th>Job Employer</th>
								      <th>Job Location</th>
								      <th>Action</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php foreach ($app as $row): ?>
								  		<tr>
									  		<td><a href="<?php echo site_url()?>/FrontPage/job/<?php echo $row->job_id ?>"><?php echo $row->job_title ?></a></td>
									  		<td><?php echo $row->emp_name ?></td>
									  		<td><?php echo $row->job_location ?></td>
									  		<td><a class="btn btn-primary" href="<?php echo site_url()?>/FrontPage/job/<?php echo $row->job_id ?>">GO TO JOB</a></td>
									  	</tr>
								  	<?php endforeach ?>
								  	
								    
								  </tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-work" role="tabpanel" aria-labelledby="v-pills-work-tab">
							<h5>Work Experience</h5>
							<button class="btn btn-primary float-right" onclick="work_add()">Add Work</button>
							<br>
							<hr>
							<div id="mydiv">
								<?php foreach ($data_work as $row): ?>
									<div class="card">
										<div class="word-exp row">
											<div class="col-md-12">
												<button class="float-right" onclick="work_delete(<?php echo $row->work_exp_id ?>)" ><i class="far fa-trash-alt"></i></button>
												<button class="float-right" onclick="work_edit(<?php echo $row->work_exp_id ?>)"><i class="far fa-edit"></i></button>
											</div>
											<div class="col-md-3">
												<p><?php echo $row->work_date ?></p>
											</div>
											<div class="col-md-9">
												<h6><?php echo $row->work_company ?></h6>
												<div class="row">
													<div class="col-md-3">
														<i>Address</i>
													</div>
													<div class="col-md-9">
														<p><?php echo $row->work_address ?></p>
													</div>
													<div class="col-md-3">
														<i>Postion</i>
													</div>
													<div class="col-md-9">
														<p><?php echo $row->work_position ?></p>
													</div>
													<div class="col-md-3">
														<i>Status</i>
													</div>
													<div class="col-md-9">
														<p><?php echo $row->work_status ?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>
								<?php endforeach ?>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-skill" role="tabpanel" aria-labelledby="v-pills-skill-tab">
							<?php
						  	 	$this->db->select ( '*' ); 
							    $this->db->from ( 'applied_job' );
							    $this->db->join ( 'job_post', 'job_post.job_id = applied_job.app_job_id' , 'left' );
							    $this->db->join ( 'employer_data', 'employer_data.emp_user_id = job_post.emp_user_id' , 'left' );
							    $this->db->where('app_user_id', $this->session->userdata('user_id'));
							    $query = $this->db->get ();
			   					$app = $query->result ();
						  	?>
						  	<br>
						  	<hr>
						  	<div class="row">
						  		<div class="col-md-6">
						  			<h4>21st Century Skills</h4>
						  			<ul>
						  				<?php foreach ($data_cen as $row): ?>
						  					<?php if ($row->inovation  == 1): ?>
						  						<li>Inovation</li>
						  					<?php endif ?>
						  					<?php if ($row->team_work  == 1): ?>
						  						<li>Team Work</li>
						  					<?php endif ?>
						  					<?php if ($row->multitasking  == 1): ?>
						  						<li>Multitasking</li>
						  					<?php endif ?>
						  					<?php if ($row->work_ethics  == 1): ?>
						  						<li>Work Ethics</li>
						  					<?php endif ?>
						  					<?php if ($row->self_motivation  == 1): ?>
						  						<li>Self Motivation</li>
						  					<?php endif ?>
						  					<?php if ($row->creative_problem  == 1): ?>
						  						<li>Creative Problem</li>
						  					<?php endif ?>
						  					<?php if ($row->problem_solving  == 1): ?>
						  						<li>Problem Solving</li>
						  					<?php endif ?>
						  					<?php if ($row->critical_thinking  == 1): ?>
						  						<li>Critical Thinking</li>
						  					<?php endif ?>
						  					<?php if ($row->decision_making  == 1): ?>
						  						<li>Decision Making</li>
						  					<?php endif ?>
						  					<?php if ($row->strees_tolerance  == 1): ?>
						  						<li>Stress Tolerance</li>
						  					<?php endif ?>
						  					<?php if ($row->planing  == 1): ?>
						  						<li>Planing</li>
						  					<?php endif ?>
						  					<?php if ($row->perceptiveness  == 1): ?>
						  						<li>Perceptiveness</li>
						  					<?php endif ?>
						  					<?php if ($row->english_funtional  == 1): ?>
						  						<li>English Functional</li>
						  					<?php endif ?>
						  					<?php if ($row->english_comp  == 1): ?>
						  						<li>English Comprehention</li>
						  					<?php endif ?>
								  			<?php if ($row->math_functional  == 1): ?>
						  						<li>Math Functional</li>
						  					<?php endif ?>
								  		<?php endforeach ?>
						  				
						  			</ul>
						  		</div>
						  		<div class="col-md-6">
						  			<h4>Technical Skills</h4>
						  			<ul>
						  				<?php foreach ($data_tech as $row): ?>
						  					<?php if ($row->carpentry  == 1): ?>
						  						<li>Carpentry</li>
						  					<?php endif ?>
						  					<?php if ($row->masonry  == 1): ?>
						  						<li>Masonry</li>
						  					<?php endif ?>
						  					<?php if ($row->welding  == 1): ?>
						  						<li>Welding</li>
						  					<?php endif ?>
						  					<?php if ($row->auto_mechanic  == 1): ?>
						  						<li>Auto_mechanic</li>
						  					<?php endif ?>
						  					<?php if ($row->plumbing  == 1): ?>
						  						<li>Plumbing</li>
						  					<?php endif ?>
						  					<?php if ($row->driving  == 1): ?>
						  						<li>Driving</li>
						  					<?php endif ?>
						  					<?php if ($row->gardening  == 1): ?>
						  						<li>Gardening</li>
						  					<?php endif ?>
						  					<?php if ($row->tailoring  == 1): ?>
						  						<li>Tailoring</li>
						  					<?php endif ?>
						  					<?php if ($row->photography  == 1): ?>
						  						<li>Photography</li>
						  					<?php endif ?>
						  					<?php if ($row->hairdressing  == 1): ?>
						  						<li>Hairdressing</li>
						  					<?php endif ?>
						  					<?php if ($row->cook  == 1): ?>
						  						<li>Cook</li>
						  					<?php endif ?>
						  					<?php if ($row->baking  == 1): ?>
						  						<li>Baking</li>
						  					<?php endif ?>
						  					<?php if ($row->other_tech): ?>
						  						<li><?php echo $row->other_tech ?></li>
						  					<?php endif ?>
								  		<?php endforeach ?>
						  			</ul>
						  		</div>
						  	</div>
						</div>
						<div class="tab-pane fade" id="v-pills-resume" role="tabpanel" aria-labelledby="v-pills-resume-tab">
							<?php
								$resume = $this->db->get_where('resume', array('user_id' => $this->session->userdata('user_id')));
							 if ($resume->num_rows() <= 0): ?>
								<p class="text-danger">Please upload PDF file only</p>
								<form enctype="multipart/form-data" id="submit">
					               <div class="control-group form-group">
				                        <div class="controls">
				                            <label>Upload Resume:</label>
				                            <input name="file" type="file"  id="image_file" required>
				                            <p class="help-block"></p>
				                        </div>
					               </div>
					               <button type="submit" class="btn btn-primary" id="sub">Submit</button>
					               <br><br>
					               
					           </form>
					        <?php else: ?>
					           	<div>
							 		<button class="btn btn-danger" onclick="delete_resume(<?php echo $this->session->userdata('user_id') ?>)">Delete and Replace Resume</button>
							 	</div>
							<?php endif ?>
							 	
				           		<div id="cont_resume">
				               		<div id="data_resume"></div>
				               </div>
				                
						</div>
					</div>
				</div>
			</div>	
        	
        </div>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
	.modal-backdrop{
		display: none;
	}
</style>
<?php
	$check = $this->db->get_where('applicant_personal', array('applicant_id' => $this->session->userdata('user_id')));
     		if ($check->num_rows() == 0) {
     			
 ?>

<script>
  $(document).ready(function(){
  	$('.data_app').hide();
  	$('#info').hide();
    Swal.fire({
	  position: 'center',
	  type: 'info',
	  title: 'Fill up first the NSRP Form, to Continue to your Account',
	  showConfirmButton: false,
	})
		window.setTimeout(function() {
	         window.location.href = '/jham/index.php/Frontpage/applicant';
	    }, 1000);
  });
</script>
 <?php
     		}
?>
<script>
	$(function(){
		$(function(){
	        $('#form_applicant').submit(function(event) {
	            event.preventDefault();

	            $.ajax({
	                url: '<?php echo site_url('Applicant/update_personal_info'); ?>',
	                type: "post",
	                data: $('#form_applicant').serialize(),
	                success: function(data){
	                    if (data == 1) {
	                        Swal.fire({
	                          position: 'center',
	                          type: 'success',
	                          title: 'Successfuly Save',
	                          showConfirmButton: false,
	                        })
	                        window.setTimeout(function() {
	                             location.reload();
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
	    });
		user_id = "<?php echo $this->session->userdata('user_id')?>";
		$.ajax({
	        url : "<?php echo site_url('Applicant/get_resume')?>/" + user_id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data)
	        {
	            $('#data_resume').html(data);
	        },
	        errorz: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });

		$('#submit').submit(function(e){
	    e.preventDefault(); 
	         $.ajax({
	             url:'<?php echo site_url('applicant/do_upload'); ?>',
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

	    $('#profPic').submit(function(e){
	    e.preventDefault(); 
	         $.ajax({
	             url:'<?php echo site_url('applicant/do_upload_pic'); ?>',
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


	    
        $('#work_submit').click(function(event) {
            event.preventDefault();

            var url;
		    if(save_method == 'add') 
		    {
		        url = "<?php echo site_url('Applicant/save_awork_exp'); ?>";
		    }
		    else
		    {
		      url = "<?php echo site_url('Applicant/update_work_exp'); ?>";
		    }

            $.ajax({
                url: url,
                type: "post",
                data: $('#work_form').serialize(),
                success: function(data){
                    if (data == 1) {
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Successfuly Save',
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
    });
	$('#work_delete').click(function(e) {
		
	})
	function delete_resume(id){
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
			        url: '<?php echo site_url('Applicant/resume_delete/'); ?>'+ id,
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
	  	function delete_pic(id){
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
			        url: '<?php echo site_url('Applicant/pic_delete/'); ?>'+ id,
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


    function work_delete(id){
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
		        url: '<?php echo site_url('Applicant/work_delete/'); ?>'+ id,
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
                     $("#mydiv").load(location.href + " #mydiv");
                     $('#add_work').modal('hide');
                }, 2000);
		        }
		      })
		    )
		  }
		})
  }
  function work_edit(id){
      $('#add_work').modal('show');
      $('.modal-title').text('Edit Work Experience');
      save_method = 'update';
      $.ajax({
        url : "<?php echo site_url('Applicant/get_work_exp/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
        	for($i = 0; data.length > $i; $i++){
        		$('#work_company').val(data[$i].work_company);
	          	$('#work_address').val(data[$i].work_address);
	           	$('#work_position').val(data[$i].work_position);
	           	$('#work_status').val(data[$i].work_status);
	           	$('#work_date').val(data[$i].work_date);
	           	$('#work_exp_id').val(data[$i].work_exp_id);
        	}
           
           console.log(data);
        },
        errorz: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    	});
  }
  function work_add(){
      $('#add_work').modal('show');
      $('.modal-title').text('Add Work Experience');
      save_method = 'add';
      
  }
  function info(){
      $('#info').modal('show');
      save_method = 'add';
      
  }
   function update_work_exp(){
 
    $.ajax({
        url: '<?php echo site_url('Applicant/update_work_exp'); ?>',
        type: "post",
        data: $('#work_form').serialize(),
        success: function(data){
            if (data == 1) {
                Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: 'Successfuly Save',
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