<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Job Post</h5>
        </div>
        <div class="card-body">
          <form id="job_form">
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
                    <option value="">Select Location</option>
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
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>Salary</label>
                  <input type="number" name="job_salary" id="job_salary" class="form-control" placeholder="Salary" maxlength="10">
                </div>
              </div>
              <!-- <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                </div>
              </div> -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Job Description</label>
                  <textarea name="job_description" id="job_description" rows="4" cols="80" class="form-control" placeholder="JOB description"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <button class="btn btn-primary btn-block" id="job_form_submit">Post This Job</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


