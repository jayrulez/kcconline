<?php
$this->pageTitle=Yii::t('application', 'Manage Users');

Yii::app()->clientScript->registerScript('search', "
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
");
?>

<div class="action" id="admin-user-update">
	<div class="section">
		<div class="section-content">
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
		</div>
	</div>
	<div class="section">
		<div class="section-content">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'uid',
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

