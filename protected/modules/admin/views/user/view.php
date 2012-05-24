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
					array('label'=>'Profile Photo','type'=>'raw','value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$model->image_url,'*',array('height'=>'120px','width'=>'120px')))),
				),
			)); ?>
		</div>
	</div>
</div>
