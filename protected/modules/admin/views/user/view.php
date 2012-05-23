<?php
$this->pageTitle=Yii::t('application', 'View User');
?>
<div class="action" id="admin-user-view">
	<div class="section">
		<div class="section-content">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'user_id',
					'first_name',
					'middle_name',
					'last_name',
					'dob',
					'email_address',
					'phone1',
					'phone2',
					'active',
					'deleted',
					'datetime_created',
					'last_action',
					'last_modified',
					'image_url',
				),
			)); ?>
		</div>
	</div>
</div>
