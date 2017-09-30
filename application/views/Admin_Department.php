<div class="docu col-sm-9 pull-right text-center">
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php 
		foreach($collegefull as $cl){
			echo'
			<a href="'.base_url('AdminOffices/manage_colleges').'" class="btn btn-link pull-left" style="text-decoration: none; color: black;">
			<span class="glyphicon glyphicon-circle-arrow-left">
		</span>&nbsp </a>
		'.$cl['collegefull'].'<a href="'.base_url('AdminOffices/add_department/'.$cl['college_acronym'].'').'" class="btn btn-link pull-right" style="text-decoration: none; color: black;">
			<span class="glyphicon glyphicon-plus-sign"></span>&nbspAdd Department </a>
			';
		}?>
		</div>
		<div class="panel-body">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<?php
					foreach($departments as $d){
						$dept= str_replace(' ','-',$d['department']);
						echo'
						<div class="panel-heading">
							<h4 class="panel-title">
									<a class="text-center">'.$d['department'].'</a>
									<a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#'.$dept.'"> <span class="glyphicon glyphicon-edit"></span> </a>
									<a class="pull-right" href="'.base_url('AdminOffices/remove_department/'.$d['department'].'/'.$d['dept_idno'].'').'"> <span class="glyphicon glyphicon-remove-sign" style="color: black"></span> </a>
							</h4>
						</div>
						<div class="panel-collapse collapse" id="'.$dept.'">
							<div class="panel-body">
								<form action="'.base_url('AdminOffices/Update_Department').'" method="POST">
								<label>College:</label>
								<input type="text" name="college_acronym" class="form-control" value="'.$d['college_acronym'].'" readonly/>
								<label>Department:</label>
								<input type="text" name="department" class="form-control" value="'.$d['department'].'" />
								<input type="submit" value="Save" class="btn btn-info" />
								</form>
							</div>
						</div>'
						;
					}
					?>
				</div>
			</div>
		</div>	

	</div>
