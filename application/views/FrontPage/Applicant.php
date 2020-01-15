<div class="page-content">
    <div class="da-contact" id="">
        <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
            <div class="container">
                <div class="card py-4 px-4">
                    <div class="row">
                        <div class="table-bordered " style="width: 100%;">
                            <table class="table">
                               <tr>
                                   <th align="center" style="text-align: center;">
                                       <h5>NSRP From 1.REV 3</h5>
                                   </th>
                                   <th>
                                       <div class="text-center">
                                            <p>Republic of the Philippines</p>
                                            <p>Department of Labor and Employment</p>
                                            <p><strong>National Skill Registration Program</strong></p>
                                            <h5>Registration Form</h5>
                                        </div>
                                   </th>
                               </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row form-applicant">
                        <form id="form_applicant" method="post">
                        <div class="col-12">
                            <div class="card pad-15 mbt-15">
                                <h5>I. Personal Information</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input name="lname" id="lname" type="text" class="form-control" placeholder="Last name" required>
                                    </div>
                                    <div class="col-md-3">
                                         <label>First Name <span class="required">*</span></label>
                                        <input name="fname" id="fname" type="text" class="form-control" placeholder="First name" required> 
                                    </div>
                                    <div class="col-md-3">
                                         <label>Middle Name <span class="required">*</span></label>
                                        <input name="mname" id="mname" type="text" class="form-control" placeholder="Midle Name" required>
                                    </div>
                                    <div class="col-md-3">
                                         <label>Suffix</label>
                                        <input name="suffix" id="suffix" type="text" class="form-control" placeholder="Suffix (Sr., Jr.)">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label>Date of Birth <span class="required">*</span></label>
                                        <input name="dbirth" id="dbirth" type="text" class="form-control" placeholder="Date of Birth" required>
                                    </div>
                                    <div class="col">
                                         <label>Age <span class="required">*</span></label>
                                        <input name="age" id="age" type="text" class="form-control" placeholder="Age" required>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Sex <span class="required">*</span></label>
                                                    <select name="sex" id="sex" class="custom-select" id="inputGroupSelect04">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Place of Birth <span class="required">*</span></label>
                                                <input name="pbirth" id="pbirth" type="text" class="form-control" placeholder="Place of Birth" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Civil Status <span class="required">*</span></label>
                                                    <select name="civil" id="civil" class="custom-select" id="inputGroupSelect04">
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
                                                <input name="citizenship" id="citizenship" type="text" class="form-control" placeholder="Citizenship" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Height(cm)</label>
                                                <input name="height" id="height" type="text" class="form-contro number" placeholder="Height" >
                                            </div>
                                            <div class="col">
                                                <label>Weight(kg)</label>
                                                <input name="weight" id="weight" type="text" class="form-control number" placeholder="Weight" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Landline Number</label>
                                                <input name="phone" id="phone" type="number" class="form-control" placeholder="Landline Number">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label>Mobile Number <span class="required">*</span></label>
                                                <input name="mphone1" id="mphone1" type="text" class="phone form-control" placeholder="+63__________" required>
                                                <br>
                                                <input name="mphone2" id="mphone2" type="text" class="phone form-control" placeholder="+63__________">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label>Present Address <span class="required">*</span></label>
                                        <div class="form-row">
                                            
                                            <div class="col-md-12">
                                                <label>Province <span class="required">*</span></label>
                                                    <select name="province" id="province" class="custom-select" id="inputGroupSelect04" required>
                                                        <option value=">">Select Province</option>
                                                        <?php 
                                                            $query = $this->db->get('province');
                                                            $province = $query->result ();
                                                        ?>
                                                        <?php foreach ($province as $row): ?>
                                                            <option value="<?php echo $row->province_id ?>"><?php echo $row->province_name ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Municipality <span class="required">*</span></label>
                                                    <select name="municipality" id="municipality" class="custom-select" id="inputGroupSelect04">
                                                        < <option value=""></option>
                                                    </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >Barangay <span class="required">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" name="barangay" id="barangay" aria-describedby="basic-addon3" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">House No./Street Village <span class="required">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" name="street" id="street" aria-describedby="basic-addon3" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <label>Permanent Address <span class="required">*</span></label>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                             <div class="col-md-12">
                                                <label>Province <span class="required">*</span></label>
                                                    <select name="province_p" id="province_p" class="custom-select" id="inputGroupSelect04" required>
                                                        <option value=">">Select Province</option>
                                                        <?php 
                                                            $query = $this->db->get('province');
                                                            $province = $query->result ();
                                                        ?>
                                                        <?php foreach ($province as $row): ?>
                                                            <option value="<?php echo $row->province_id ?>"><?php echo $row->province_name ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Municipality <span class="required">*</span></label>
                                                    <select name="municipality_p" id="municipality_p" class="custom-select" id="inputGroupSelect04">
                                                        < <option value=""></option>
                                                    </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">Barangay <span class="required">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" name="barangay_p" id="barangay_p" aria-describedby="basic-addon3" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">House No./Street Village <span class="required">*</span></span>
                                                </div>
                                                <input type="text" class="form-control" name="street_p" id="street_p" aria-describedby="basic-addon3" required>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- ///row -->     
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Disability <span class="required">*</span></label>
                                            <select class="custom-select" name="disability" id="disability" required="">
                                                <option value="0">None</option>
                                                <option value="Visual">Visual</option>
                                                <option value="Hearing">Hearing</option>
                                                <option value="Speech">Speech</option>
                                                <option value="Physical">Physical</option>
                                                <option value="Other">Other</option>
                                            </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>If Other Specify</label>
                                         <input name="other_disability" id="other_disability" value=" " type="text" class="form-control" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Employment Status</label>
                                            <select class="custom-select" name="employment" id="employment">
                                                <option value="Employed">Employed</option>
                                                <option value="Upemployed">Upemployed</option>
                                            </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Type</label>
                                        <select class="custom-select" name="emp_status" id="emp_status_e">
                                            <option value="Wage Employed">Wage Employed</option>
                                            <option value="Self Employed">Self Employed</option>
                                        </select>

                                        <select class="custom-select" name="emp_status" id="emp_status_u" disabled="disabled" style="display: none;">
                                            <option value="New Entrat/Fresh Graduate">New Entrat/Fresh Graduate</option>
                                            <option value="Finished Contract">Finished Contract</option>
                                             <option value="Resigned">Resigned</option>
                                             <option value=""></option>
                                             <option value="Retired">Retired</option>
                                             <option value="Terminated/Laidoff(local)">Terminated/Laidoff(local)</option>
                                              <option value="Terminated/Laidoff(abroad)">Terminated/Laidoff(abroad)</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label>Are you actively looking for work? <span class="required">*</span></label>
                                        <select class="custom-select" name="looking_work" id="looking_work">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                         <label>If Yes, How long have you been looking for work? <span class="required">*</span></label>
                                         <input name="looking_work_status" id="looking_work_status" type="number" class="form-control" placeholder="Type in year eg: 1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label>Willing to work immediatele? <span class="required">*</span></label>
                                        <select name="willing_work" id="willing_work" class="custom-select" >
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                         <label>If No, when? <span class="required">*</span></label>
                                         <input name="when_work" id="when_work" name="fname" id="fname" type="text" class="date2 form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label>Are you a 4Ps Beneficiary? <span class="required">*</span></label>
                                        <select class="custom-select" name="4ps" id="4ps">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                         <label>If Yes, Household ID No. <span class="required">*</span></label>
                                         <input name="4ps_number" id="4ps_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <label>Are you an OFW? <span class="required">*</span></label>
                                        <select class="custom-select" name="ofw" id="ofw">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                         <label>Are you considering comming back to the Philippines to work? </label>
                                        <select class="custom-select" name="work_back" id="work_back" required>
                                            <option value=" "></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part1 -------------------------------------- -->
                            <div class="card pad-15 mbt-15">
                                <h5>II. Job Preference</h5>
                                <br>
                                <h5>Preferred Occupation adn Industry </h5>
                                <br>
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <label>Occupation(e.g clerk, call center agent, saleslady) <span class="required">*</span></label>
                                        <input name="occupation1" id="occupation1" type="text" class="form-control" placeholder="" required>
                                        <input name="occupation2" id="occupation1" type="text" class="form-control" placeholder="">
                                        <input name="occupation3" id="occupation1" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Industry(e.g IT-BPM, Construction, Manufacturing) <span class="required">*</span></label>
                                        <input name="industry1" id="industry1" type="text" class="form-control" placeholder="" required>
                                        <input name="industry2" id="industry1" type="text" class="form-control" placeholder="">
                                        <input name="industry3" id="industry1" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label >Salary Expectaion (PHP)</label>
                                        <input name="salary_expect" id="money" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!-- end Part2 -------------------------------------- -->
                            <div class="card pad-15 mbt-15">
                                <h5>III. Educational Background</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Currently in School? <span class="required">*</span></label>
                                        <select class="custom-select" name="currently_school" id="currently_school">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Highest Educational Level <span class="required">*</span></label>
                                        <select class="custom-select" name="edu_level" id="educ_level">
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
                                <div class="form-row">
                                    <div class="col-md-12 edbg">
                                        <br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Year Graduated/Last Attend(mm-yy) <span class="required">*</span></span>
                                            </div>
                                            <input type="text" class="form-control date2" name="edu_year" id="edu_year" aria-describedby="basic-addon3" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">School/University <span class="required">*</span></span>
                                            </div>
                                            <input type="text" class="form-control" name="edu_school" id="ed_school" aria-describedby="basic-addon3" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Course/Program <span class="required">*</span></span>
                                            </div>
                                            <input type="text" class="form-control" name="edu_course" id="ed_course" aria-describedby="basic-addon3" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Award/Honor Received <span class="required">*</span></span>
                                            </div>
                                            <input type="text" class="form-control" name="edu_award" id="ed_award" aria-describedby="basic-addon3" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part3 -------------------------------------- -->
                            <div class="card pad-15 mbt-15">
                                <h5>IV. Technical/Vocational and Other Training</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Currently in Training?</label>
                                        <select class="custom-select" name="tec_cur_training" id="tec_training">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead class="thead-dark">
                                                <tr>
                                                  <th scope="col">Training</th>
                                                  <th scope="col">Duration of Course</th>
                                                  <th scope="col">Traning Institution</th>
                                                  <th scope="col">Certificate Received</th>
                                                  <th scope="col">Completed</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                    for($i = 1; $i <= 3; $i++ ){
                                                ?>
                                                <tr>
                                                  <th><input name="tec_training<?php echo $i?>" id="tec_training" type="text" class="form-control" placeholder=""></th>
                                                  <td><input name="tec_duration<?php echo $i?>" id="tec_duration" type="text" class="form-control" placeholder=""></td>
                                                  <td><input name="tec_insti<?php echo $i?>" id="tec_insti" type="text" class="form-control" placeholder=""></td>
                                                  <td><input name="tec_cert<?php echo $i?>" id="tec_cert" type="text" class="form-control" placeholder=""></td>
                                                  <td>
                                                    <select class="custom-select" name="tec_complete<?php echo $i?>" id="">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                  </td>
                                                </tr>
                                                <?php }?>
                                                <input type="hidden" name="count_tech" value="<?php echo $i-1 ?>">
                                                
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end Part4-------------------------------------- -->
                            <div class="card pad-15 mbt-15">
                                <h5>V. Elegibility</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead class="thead-dark">
                                                <tr>
                                                  <th scope="col">Carrer Service/Board/BAR</th>
                                                  <th scope="col">License Number</th>
                                                  <th scope="col">Expiry Date</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                    for($i = 1; $i <= 2; $i++ ){
                                                ?>
                                                <tr>
                                                  <th><input name="el_carrer<?php echo $i?>" id="el_carrer" type="text" class="form-control" placeholder=""></th>
                                                  <td><input name="el_license<?php echo $i?>" id="el_license" type="text" class="form-control" placeholder=""></td>
                                                  <td><input name="el_expiry<?php echo $i?>" id="el_expiry" type="text" class="date3 form-control" placeholder=""></td>
                                                </tr>
                                                <?php }?>
                                                 <input type="hidden" name="count_el" value="<?php echo $i-1 ?>">
                                                
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12"><h5>Language Profeciency Certification</h5></div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="EILTS" id="EILTS" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Internation English Language Testing System (EILTS)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="TOEFL" id="TOEFL" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Test English as Foriegn Language (TOEFL)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="TOCFL" id="TOCFL" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Test Chinese as Foreign Language (TOCFL)</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="JLPT" id="JLPT" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Japanese Language Profiency Test (JLPT)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="TOPIC" id="TOPIC" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Test of Profeciency in Korea (TOPIC)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="lang_other" id="lang_other" value="0">
                                            <label class="form-check-label" for="inlineCheckbox1">Othes: Please Specify <span><input type="text" id="other_specify"  name="other_specify"></span></label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Validity Date</span>
                                        </div>
                                        <input type="text" class="form-control date3" name="validity_date" id="validity_date" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5>Dialect Spoken</h5>
                                        <div class="form-check form-check-inline dialect">
                                            <input class="form-check-input" type="checkbox" name="tagalog" id="Tagalog" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Tagalog </label>
                                            <input class="form-check-input" type="checkbox" name="ilocano" id="Ilocano" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Ilocano </label>
                                            <input class="form-check-input" type="checkbox" name="ilongo" id="Ilongo" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Ilongo </label>
                                            <input class="form-check-input" type="checkbox" name="bikol" id="Bikol" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Bikol </label>
                                            <input class="form-check-input" type="checkbox" name="other_dialect" id="Others" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Others </label>
                                            <input  class="form-other" type="text" name="dialect_others" id="dialect_others" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Part5-------------------------------------- -->
                            <div class="card pad-15 mbt-15">
                                <h5>VI. Work Experince (Limit the occupation for the last 10 years. Start with the most recent Employment)</h5>
                                <br>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead class="thead-dark">
                                                <tr>
                                                  <th scope="col">Name of Office/Company</th>
                                                  <th scope="col">Address</th>
                                                  <th scope="col">Position Held</th>
                                                  <th scope="col">Inclusive Dates</th>
                                                  <th scope="col">Status of Appointment</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                    for($i = 1; $i <= 3; $i++ ){
                                                ?>
                                                <tr>
                                                  <th><input name="work_company<?php echo $i?>" id="tec_trainings" type="text" class="form-control" placeholder=""></th>
                                                  <td><input name="work_address<?php echo $i?>" id="tec_duration" type="text" class="form-control" placeholder=""></td>
                                                  <td><input name="work_position<?php echo $i?>" id="tec_insti" type="text" class="form-control" placeholder=""></td>
                                                  <td><input name="work_date<?php echo $i?>" id="tec_cert" type="text" class="daterange form-control" placeholder=""></td>
                                                  <td><input name="work_status<?php echo $i?>" id="tec_comp" type="text" class="form-control" placeholder=""></td>
                                                </tr>
                                                <?php }?>
                                                 <input type="hidden" name="count_work" value="<?php echo $i-1 ?>">
                                                
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end Part6-------------------------------------- -->
                            <div class="card pad-15 mbt-15">
                                <div class="form-row skills" id="cent-skill">
                                    <div class="col-12"><h5>VII. 21st Century Skills -  (5) skills you posses (self-assesment) - <span style="color:red" id="req">(5) skill is Required</span></h5>
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
                            <!-- end Part7-------------------------------------- -->
                            <div class="card pad-15 mbt-15">
                                <div class="form-row skills">
                                    <div class="col-12"><h5>VIII. Technical Skills Acquired Without Formal Training</h5><br></div>
                                    <br>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="carpentry" id="carpentry" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Carpentry</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="masonry" id="masonry" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Masonry</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="welding" id="welding" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Welding</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="auto_mechanic" id="work_ethics" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Auto Mechanic</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="plumbing" id="plumbing" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Plumbing</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="driving" id="driving" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Driving</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="gardening" id="gardening" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Gardening</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="tailoring" id="tailoring" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Tailoring</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="photography" id="photography" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Photography</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="hairdressing" id="hairdressing" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Hairdressing</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="cook" id="cook" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Cook</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="baking" id="baking" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">Baking</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Others</span>
                                            </div>
                                            <input type="text" class="form-control" name="other_tech" id="other_tech" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end Part8-------------------------------------- -->
                        <div class="row">
                            <div class="col-md-4">
                                <br>
                                <button class="btn btn-primary btn-block" type="submit" id="submit_id" disabled="disabled">Submit</button>
                              </div>
                        </div> 
                        </form>
                    </div><!-- // row form -->
                </div><!-- //end --> 
            </div>
        </div>
    </div>
</div>


<script>
    $(function(){
        $('#form_applicant').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '<?php echo site_url('Applicant/save_personal_info'); ?>',
                type: "post",
                data: $('#form_applicant').serialize(),
                success: function(data){
                    if (data == 1) {
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Wait for activation, SMS will be sent',
                          showConfirmButton: false,
                        })
                        window.setTimeout(function() {
                             window.location.href = '/jham/index.php';
                        }, 4000);
                       
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
    $(function(){
      var calculateAge = function(time){
        var months = Math.round(time/(24*60*60*1000*30));
        //alert(months);
        var years = parseInt(months / 12);
        //alert(years);
        months = months % 12;
        return years ;
      };

      $('input[name="dbirth"]').change(function(){
           var birthDate = new Date($(this).val()).getTime();
           var presentDate = new Date().getTime();
           //alert(birthDate);
           //alert(presentDate);
           var age = presentDate - birthDate;
           $('input[name="age"]').val(calculateAge(age));
      });
    });
    $(function(){
        // var $target = $('#CD_Supplr');
        $('#address-check').change(function(){
            if ($('#address-check').prop('checked')) {
                $('#street_p').val($('#street').val());
                $('#barangay_p').val($('#barangay').val());
                $('#municipality_p').val($('#municipality').val());
                $('#province_p').val($('#province').val());
            }else{
                $('#street_p').val('');
                $('#barangay_p').val('');
                $('#municipality_p').val('');
                $('#province_p').val('');
            }
        });
        $('#disability').change(function(){
            if ($('#disability').val() == 'Other') {
                $('#other_disability').removeAttr('readonly');
            }
        });

        $('#employment').change(function(){
            if ($('#employment').val() == 'Upemployed') {
                $('#emp_status_u').removeAttr('disabled').show();
                $('#emp_status_e').attr('disabled','disabled').hide();
            }else{
                 $('#emp_status_e').removeAttr('disabled').show();
                $('#emp_status_u').attr('disabled','disabled').hide();   
            }
        });
        $('input[type="checkbox"]').on('change', function(){
            $(this).val(this.checked ? 1 : 0);
        });

        $('#province').change(function() {
            var id = $(this).val();
            $.ajax({
                url : "<?php echo site_url('Applicant/get_city/')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                   $('#municipality').html(data);
                },
                errorz: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });

        });
        $('#province_p').change(function() {
            var id = $(this).val();
            $.ajax({
                url : "<?php echo site_url('Applicant/get_city/')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                   $('#municipality_p').html(data);
                },
                errorz: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });

        });
        

        
    });
    

    $('#general i .counter').text(' ');

        var fnUpdateCount = function() {
            var generallen = $("#cent-skill input[type='checkbox']:checked").length;
            console.log(generallen,$("#general i .counter") )
            if (generallen > 0) {
                $("#general #c_skill").val(generallen);
                if (generallen == 5) {
                    $("#submit_id").removeAttr("disabled");
                     $("#req").html('');
                }else{
                    $("#req").html('(5) skill is Required ');
                    $("#submit_id").attr("disabled", true);
                }
            } else {
                $("#general c_skill").val('');
            }
        };

        $("#cent-skill input:checkbox").on("change", function() {
            fnUpdateCount();
        });

    
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