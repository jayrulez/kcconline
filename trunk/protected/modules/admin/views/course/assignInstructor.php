<?php
?>
			<div class="header">
				<div class="title">
					<?php echo 'Course -> '.strtoupper($model->course_code).'  '.'Assign Instructor';?>
				</div>
			</div>
			<div class="form-container">	
				<?php echo CHtml::beginForm('','post',array('class'=>'wf','enctype'=>'multipart/form-data')); ?>
					<?php echo CHtml::errorSummary($model); ?>
					<fieldset class="top">
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'course_code'); ?>
							<?php echo CHtml::activeTextField($model,'course_code'); ?>
						</div>

						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'user_id'); ?>
							<?php echo CHtml::activeTextField($model,'user_id'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton('Assign'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>