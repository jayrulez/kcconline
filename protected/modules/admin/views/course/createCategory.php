<?php
$this->pageTitle=Yii::t('application', 'Create Category');
?>
<div class="action" id="admin-user-createCategory">
	<div class="section">
		<div class="section-content">
			<div class="form-container">	
				<?php echo CHtml::beginForm('','post',array('class'=>'wf')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::t('application','Create Category');?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($model); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($model,'name'); ?>
							<?php echo CHtml::activeTextField($model,'name'); ?>
						</div>
						<div class="row bottom clearfix">
							<?php echo CHtml::activeLabel($model,'description'); ?>
							<?php echo CHtml::activeTextArea($model,'description', array('rows'=>3,'cols'=>30)); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton('Create'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>

