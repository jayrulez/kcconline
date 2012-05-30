<?php
$this->pageTitle=Yii::t('application', 'Login');
?>
<div class="action" id="site-login">
	<div class="section">
		<div class="section-content">
			<div class="form-container">
				<?php echo CHtml::beginForm(Yii::app()->getUser()->loginUrl,'post',array('class'=>'wf')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::app()->name.' Login'; ?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($form); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($form,'idNumber'); ?>
							<?php echo CHtml::activeTextField($form,'idNumber'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($form,'password'); ?>
							<?php echo CHtml::activePasswordField($form,'password'); ?>
						</div>
						<div class="row inline bottom clearfix">
							<?php echo CHtml::activeCheckBox($form,'rememberMe'); ?>
							<?php echo CHtml::activeLabel($form,'rememberMe'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton('Login'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>
