			<div class="header">
				<div class="title">
					<?php echo $model->isNewRecord ?'Create Course':'Edit Course -> '.strtoupper($model->course_code);?>
				</div>
			</div>
			<div class="form-container">	
				<?php echo CHtml::beginForm('','post',array('class'=>'wf')); ?>
					<?php echo CHtml::errorSummary($model); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($model,'course_code'); ?>
							<?php echo CHtml::activeTextField($model,'course_code'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'category_id'); ?>
							<?php echo CHtml::activeDropDownList($model,'category_id', CHtml::listData(Category::model()->findAll(), 'uid', 'name'), array('prompt'=>null)); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'name'); ?>
							<?php echo CHtml::activeTextField($model,'name'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'description'); ?>
							<?php echo CHtml::activeTextArea($model,'description', array('rows'=>3,'cols'=>30)); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'enrollment_key'); ?>
							<?php echo CHtml::activeTextField($model,'enrollment_key'); ?>
						</div>
						<div class="row inline bottom clearfix">
							<?php echo CHtml::activeCheckBox($model,'key_required'); ?>
							<?php echo CHtml::activeLabel($model,'key_required'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>