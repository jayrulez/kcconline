<?php
$this->pageTitle=Yii::t('application', 'Add Course');
?>
<div class="action" id="site-login">
	<div class="section">
		<div class="section-content">
			<div class="form-container">
				<?php echo CHtml::beginForm(Yii::app()->getUser()->loginUrl,'post',array('class'=>'wf')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::app()->name.' Add Course'; ?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($form); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($form,'Course Code'); ?>
							<?php echo CHtml::activeTextField($form,'course_code'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($form,'Name'); ?>
							<?php echo CHtml::activePasswordField($form,'name'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($form,'Description'); ?>
							<?php echo CHtml::activePasswordField($form,'description'); ?>
						</div>
						<div class="row inline bottom clearfix">
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton('Add'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>
