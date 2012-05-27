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

<div class="action" id="admin-course-categories">
	<div class="section">
		<div class="section-content">
			<div class="form-container">
				<div class="header">
					<div class="title">
						<?php echo Yii::t('application', 'Categories'); ?>
					</div>
				</div>
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'category-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'columns'=>array(
						'name',
						'description',
						array(
							'class'=>'CButtonColumn',
						),
					),
				)); ?>
			</div>
		</div>
	</div>
</div>

