<?php
/*$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->uid)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->uid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);*/
?>

<h1>View User #<?php echo $model->uid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'uid',
		'user_id',
		'first_name',
		'middle_name',
		'last_name',
		'dob',
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
	),
)); ?>
