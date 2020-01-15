<div class="page-content">
  <div class="da-contact" id="">
    <div class="da-contact-detail" data-aos="zoom-in" data-aos-duration="1000">
      <div class="container">
        <div class="card py-4 px-4">
        	<div class="h3 pb-3 text-uppercase text-center" data-aos="fade-up">RECOMENDED JOB</div>

        	<?php
              $query = $this->db->get ('job_post');
              $job = $query->result ();
              $counter = 0;
        	?>

        	<?php foreach ($job as $rows): ?>
        		<?php 
        		$date = date('Y-m-d');
			    $now = strtotime($date);
			    $exp = strtotime($rows->expirry_date);
			     if ($now < $exp) {
			         
			        $empolyer = $this->db->get_where('employer_data', array('emp_user_id' => $rows->emp_user_id ));
			        $emp = $empolyer->row();
        		?>
        		<?php
           			$this->db->where('job_post_id', $rows->job_id);
           			$query = $this->db->get ('job_skill');
  					$skill = $query->result ();

           		?>
           		<?php foreach ($skill as $skill): ?>
           			<?php if ($skill->inovation == 1 ){	$inovation = 1; }else{ $inovation = 0;} ?>
           			<?php if ($skill->team_work == 1 ){ $team_work = 1; }else{$team_work = 0;} ?>
           			<?php if ($skill->multitasking == 1 ){ $multitasking = 1; }else{$multitasking = 0;} ?>
           			<?php if ($skill->work_ethics == 1 ){ $work_ethics = 1; }else{$work_ethics = 0;} ?>
           			<?php if ($skill->self_motivation == 1 ){ $self_motivation = 1; }else{$self_motivation = 0;} ?>
           			<?php if ($skill->creative_problem == 1 ){ $creative_problem = 1;} else{$creative_problem = 0;} ?>
           			<?php if ($skill->problem_solving == 1 ){ $problem_solving = 1; }else{$problem_solving = 0;} ?>
           			<?php if ($skill->critical_thinking == 1 ){ $critical_thinking = 1; }else{$critical_thinking = 0;} ?>
           			<?php if ($skill->decision_making == 1 ){ $decision_making = 1; }else{$decision_making = 0;} ?>
           			<?php if ($skill->strees_tolerance == 1 ){ $strees_tolerance = 1; }else{$strees_tolerance = 0;} ?>
           			<?php if ($skill->planing == 1 ){ $planing = 1; }else{$planing = 0;} ?>
           			<?php if ($skill->perceptiveness == 1 ){ $perceptiveness = 1; } else{$perceptiveness = 0;} ?>
           			<?php if ($skill->english_funtional == 1 ){ $english_funtional = 1; }else{$english_funtional = 0;} ?>
           			<?php if ($skill->english_comp == 1 ){ $english_comp = 1; }else{$english_comp = 0;} ?>
           			<?php if ($skill->math_functional == 1 ){ $math_functional = 1; }else{$math_functional = 0;} ?>
           		<?php endforeach ?>

           		<?php
           			$this->db->where('app_user_id', $this->session->userdata('user_id'));
           			$query = $this->db->get ('century_skill');
  					$skills = $query->result ();

           		?>
           		<?php foreach ($skills as $myskill): ?>
           			<?php if ($myskill->inovation == 1 ){	$inovation2 = 1; }else{$inovation2 = 0;} ?>
           			<?php if ($myskill->team_work == 1 ){ $team_work2 = 1; }else{$team_work2 = 0;} ?>
           			<?php if ($myskill->multitasking == 1 ){ $multitasking2 = 1; }else{$multitasking2 = 0;} ?>
           			<?php if ($myskill->work_ethics == 1 ){ $work_ethics2 = 1; }else{$work_ethics2 = 0;} ?>
           			<?php if ($myskill->self_motivation == 1 ){ $self_motivation2 = 1; }else{$self_motivation2 = 0;} ?>
           			<?php if ($myskill->creative_problem == 1 ){ $creative_problem2 = 1; }else{$creative_problem2 = 0;} ?>
           			<?php if ($myskill->problem_solving == 1 ){ $problem_solving2 = 1; }else{$problem_solving2 = 0;} ?>
           			<?php if ($myskill->critical_thinking == 1 ){ $critical_thinking2 = 1; }else{$critical_thinking2 = 0;} ?>
           			<?php if ($myskill->decision_making == 1 ){ $decision_making2 = 1; }else{$decision_making2 = 0;} ?>
           			<?php if ($myskill->strees_tolerance == 1 ){ $strees_tolerance2 = 1; }else{$strees_tolerance2 = 0;} ?>
           			<?php if ($myskill->planing == 1 ){ $planing2 = 1; }else{$planing2 = 0;} ?> 
           			<?php if ($myskill->perceptiveness == 1 ){ $perceptiveness2 = 1; }else{$perceptiveness2 = 0;} ?>
           			<?php if ($myskill->english_funtional == 1 ){ $english_funtional2 = 1; }else{$english_funtional2 = 0;} ?>
           			<?php if ($myskill->english_comp == 1 ){ $english_comp2 = 1; }else{$english_comp2 = 0;} ?>
           			<?php if ($myskill->math_functional == 1 ){ $math_functional2 = 1; }else{$math_functional2 = 0;} ?>
           		<?php endforeach ?>

           		<?php if ($problem_solving2 + $problem_solving == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($team_work + $team_work2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($multitasking + $multitasking2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($work_ethics + $work_ethics2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($self_motivation + $self_motivation2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($creative_problem + $creative_problem2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($inovation + $inovation2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($critical_thinking + $critical_thinking2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($decision_making + $decision_making2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($strees_tolerance + $strees_tolerance2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($planing + $planing2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($perceptiveness + $perceptiveness2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($english_funtional + $english_funtional2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($english_comp + $english_comp2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>
           		<?php if ($math_functional + $math_functional2 == 2): ?>
           			<?php $counter = $counter + 1 ?>
           		<?php endif ?>

           		<?php 
           			$this->db->where('app_user_id', $this->session->userdata('user_id'));
           			$query = $this->db->get ('edu_background');
  					$educ = $query->row()->edu_level;
           		?>

           		<?php if ($counter > 0 && $educ == $rows->job_edu_lvl ): ?>
    			<div class="job-container row">
		          	
			          	<div class="col-md-8">
			          		<p><strong><a href="job/<?php echo $rows->job_id ?>"><?php echo $rows->job_title ?></a></strong></p>
				          	<p><?php echo $emp->emp_name ?></p>
				          	<p>Salary: <?php echo $rows->job_salary ?></p>
				          	<p>Location : <?php echo $rows->job_location ?><br>
				          	Specialization : <?php echo $rows->job_specialization?></p>
			          	</div>
			           	<div class="col-md-4">
			           		<?php
			           			$this->db->where('job_post_id', $rows->job_id);
			           			$query = $this->db->get ('job_skill');
			  					$skill = $query->result ();

			           		?>
			           		<p><strong>Skills</strong></p>
			           		<ul>
			           			
			           		
			           		
			           		<?php foreach ($skill as $row): ?>
			           			<?php if ($row->inovation == 1 ){	 echo "<li>Inovation</li>";} ?>
			           			<?php if ($row->team_work == 1 ){ echo "<li>Team Work</li>";} ?>
			           			<?php if ($row->multitasking == 1 ){ echo "<li>Multitasking</li>";} ?>
			           			<?php if ($row->work_ethics == 1 ){ echo "<li>Work Ethics</li>";} ?>
			           			<?php if ($row->self_motivation == 1 ){ echo "<li>SelfMotivation</li>";} ?>
			           			<?php if ($row->creative_problem == 1 ){ echo "<li>Creative Problem</li>";} ?>
			           			<?php if ($row->problem_solving == 1 ){ echo "<li>Problem Solving</li>";} ?>
			           			<?php if ($row->critical_thinking == 1 ){ echo "<li>Critical Thinking</li>";} ?>
			           			<?php if ($row->decision_making == 1 ){ echo "<li>Decision Making</li>";} ?>
			           			<?php if ($row->strees_tolerance == 1 ){ echo "<li>Strees tolerance</li>";} ?>
			           			<?php if ($row->planing == 1 ){ echo "<li>Planing</li>";} ?>
			           			<?php if ($row->perceptiveness == 1 ){ echo "<li>Perceptiveness</li>";} ?>
			           			<?php if ($row->english_funtional == 1 ){ echo "<li>English Funtional</li>";} ?>
			           			<?php if ($row->english_comp == 1 ){ echo "<li>English Comp</li>";} ?>
			           			<?php if ($row->math_functional == 1 ){ echo "<li>Math Functional</li>";} ?>
			           				
			           			
			           		<?php endforeach ?>
			           		</ul>
			          		<a class="btn btn-primary" href="job/<?php echo $rows->job_id ?>">Read More >></a>
			          	</div>
		         </div>	
		         <?php endif ?>
		     <?php } ?>
        	<?php
        	$counter = 0;
        	 endforeach ?>

        </div>
      </div>
    </div>
  </div>
</div>