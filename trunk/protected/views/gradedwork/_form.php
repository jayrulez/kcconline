
			<div class="header">
			<div class="title">
					<?php
						echo (strcasecmp($model->scenario,'create')==0)?'Create Graded Work':'Edit Graded Work';
					?>
				</div>
			</div>
			<div class="form-container">	
				<?php echo CHtml::beginForm('','post',array('class'=>'wf')); ?>
					<?php echo CHtml::errorSummary($model); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($model,'title'); ?>
							<?php echo CHtml::activeTextField($model,'title'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'type'); ?>
							<?php echo CHtml::activeDropDownList($model,'type', CHtml::listData(GradedWorkType::model()->findAll(), 'uid', 'name'), array('prompt'=>null)); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($courseGradedWork,'course_code',array('label'=>'Course')); ?>
							<?php echo CHtml::activeDropDownList($courseGradedWork,'course_code', CHtml::listData(Course::model()->findAll(), 'course_code', 'name'), array('prompt'=>null)); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'description'); ?>
							<?php echo CHtml::activeTextArea($model,'description', array('rows'=>5,'cols'=>40)); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'coursePublished'); ?>
							<?php echo CHtml::activeCheckBox($model,'coursePublished', array('')); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton((strcasecmp($model->scenario,'create')==0) ? 'Create' : 'Save'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>