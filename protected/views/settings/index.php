<?php
$this->pageTitle=Yii::t('application', 'Settings');
?>
<div class="action" id="settings-index">	
	<div class="section">
		<div class="section-header clearfix">
			<div></div>
			<div>
				<?php echo CHtml::ajaxLink('Edit Email Address', Yii::app()->createUrl('/settings/changeEmailAddress'), array(
					'replace'=>'#changeEmailAddressBlock',
				)); ?>
			</div>
		</div>
		<div class="section-content" id="changeEmailAddressBlock"></div>
	</div>
	
	<div class="section">
		<div class="section-header clearfix">
			<div class=""></div>
			<div class="">
				<?php echo CHtml::ajaxLink('Edit Password', Yii::app()->createUrl('/settings/changePassword'), array(
					'replace'=>'#changePasswordBlock',
				)); ?>
			</div>
		</div>
		<div class="section-content" id="changePasswordBlock"></div>
	</div>
</div>
