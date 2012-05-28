<?php
$this->pageTitle=Yii::t('application', 'View User');
?>
<div class="header">
	<div class="title">
		<?php echo '<span id="profile-title">'.$model->getFullName().'</span>'.' <span id="profile-role-title">('.$roleName.')</span>';?>
	</div>
</div>
<div class="action" id="admin-user-view">
	<div class="section">
		<div class="section-content">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					array('label'=>'Profile Photo','type'=>'raw','value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$model->image_url,'*',array('height'=>'180px','width'=>'180px')))),
					'uid',
					'first_name',
					'middle_name',
					'last_name',
					'dob',
					'email_address',
					'phone1',
					'phone2',
					array('label'=>'Member Since','value'=>$datetime_created->format('d M Y')),
					array('label'=>'Last Active','value'=>$last_action->format('d M Y')),
				),
			)); ?>
		</div>
	</div>
</div>
