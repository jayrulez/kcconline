			<div class="form-container">	
				<?php echo CHtml::beginForm('','post',array('class'=>'wf')); ?>
					<!--<div class="header">
						<div class="title">
						</div>
					</div>-->
					<?php echo CHtml::errorSummary($model); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($model,'user_id'); ?>
							<?php echo CHtml::activeTextField($model,'user_id'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'first_name'); ?>
							<?php echo CHtml::activeTextField($model,'first_name'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'middle_name'); ?>
							<?php echo CHtml::activeTextField($model,'middle_name'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'last_name'); ?>
							<?php echo CHtml::activeTextField($model,'last_name'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'dob'); ?>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model'=>$model,
								'attribute'=>'dob',
								'options'=>array(
									'showAnim'=>'fold',
									'changeYear'=>true,
									'changeMonth'=>true,
									'dateFormat'=>'yy-mm-dd',
									'yearRange'=>'1950:2000',
								),
								'htmlOptions'=>array(
									'style'=>'height:20px;'
								),
							));
							?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'email_address'); ?>
							<?php echo CHtml::activeTextField($model,'email_address'); ?>
						</div>
						<?php if($model->getIsNewRecord()): ?>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'password'); ?>
							<?php echo CHtml::activePasswordField($model,'password'); ?>
						</div>
						<?php endif; ?>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'phone1'); ?>
							<?php echo CHtml::activeTextField($model,'phone1'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'phone2'); ?>
							<?php echo CHtml::activeTextField($model,'phone2'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'image_url'); ?>
							<?php echo CHtml::activeTextField($model,'image_url'); ?>
						</div>
						<div class="row inline bottom clearfix">
							<?php echo CHtml::activeCheckBox($model,'active'); ?>
							<?php echo CHtml::activeLabel($model,'active'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>