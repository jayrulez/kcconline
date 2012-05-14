<?php
$this->pageTitle=Yii::t('application', 'Manage Users');

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<div class="action" id="admin-user-update">
	<div class="section">
		<div class="section-content">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'user-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					'user_id',
					'first_name',
					'middle_name',
					'last_name',
					'dob',
					/*
					'email_address',
					'password',
					'phone1',
					'phone2',
					'active',
					'deleted',
					'datetime_created',
					'last_action',
					'last_modified',
					'image_url',
					*/
					array(
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
		</div>
	</div>
</div>

