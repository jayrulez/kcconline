<?php
$this->pageTitle=Yii::t('application', 'Change Password');
?>
<div class="action" id="settings-changePassword">
	<div class="section">
		<div class="section-content">
			<div class="form-container">
				<?php echo CHtml::beginForm(array('/settings/changePassword'),'post',array('class'=>'wf')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::t('application', 'Change Password'); ?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($form); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($form,'currentPassword'); ?>
							<?php echo CHtml::activePasswordField($form,'currentPassword'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($form,'newPassword'); ?>
							<?php echo CHtml::activePasswordField($form,'newPassword'); ?>
						</div>
						<div class="row bottom clearfix">
							<?php echo CHtml::activeLabel($form,'confirmNewPassword'); ?>
							<?php echo CHtml::activePasswordField($form,'confirmNewPassword'); ?>
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
