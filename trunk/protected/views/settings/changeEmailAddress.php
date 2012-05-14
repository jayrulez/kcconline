<?php
$this->pageTitle=Yii::t('application', 'Change Email Address');
?>
<div class="action" id="settings-emailAddress">
	<div class="section">
		<div class="section-content">
			<div class="form-container">
				<?php echo CHtml::beginForm(array('/settings/changeEmailAddress'),'post',array('class'=>'wf')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::t('application', 'Change Email Address'); ?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($form); ?>
					<fieldset class="top">
						<div class="row top bottom clearfix">
							<?php echo CHtml::activeLabel($form,'emailAddress'); ?>
							<?php echo CHtml::activeTextField($form,'emailAddress'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton(Yii::t('application', 'Save Changes')); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>
