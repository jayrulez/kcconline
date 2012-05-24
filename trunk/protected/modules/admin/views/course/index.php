<?php
$this->pageTitle=Yii::t('application', 'Manage Courses');

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

<div class="action" id="admin-course-index">
	<div class="section">
		<div class="section-content">
			<div class="header">
				<div class="title">
					<?php echo Yii::t('application','Courses');?>
				</div>
			</div>
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'course-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					'course_code',
					'name',
					'description',
					'enrollment_key',
					array(
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
		</div>
	</div>
</div>

