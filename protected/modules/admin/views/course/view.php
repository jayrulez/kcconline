<?php
$this->pageTitle=Yii::t('application', 'View Course');
?>
<div class="header">
	<div class="title">
		<?php echo 'Course -> '.strtoupper($model->course_code);?>
	</div>
</div>
<div class="action" id="admin-course-view">
	<div class="section">
		<div class="section-content">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'course_code',
					'name',
					'description',
					'enrollment_key',
				),
			)); ?>
		</div>
		<div>
			<?php echo CHtml::link('Assign Instructor',array('assignInstructor','id'=>$model->course_code))?>|<?php echo CHtml::link('View Instructors',array('instructors','id'=>$model->course_code))?>
		</div>
	</div>
</div>
	