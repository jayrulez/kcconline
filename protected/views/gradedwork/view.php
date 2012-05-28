<?php
$this->pageTitle=Yii::t('application', 'Graded Work');
?>
<div class="header">
	<div class="title">
		<?php echo $model->title;?>
	</div>
</div>
<div class="action" id="admin-course-view">
	<div class="section">
		<div class="section-content">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'uid',
					'title',
					array('label'=>'Type','value'=>$model->workType->name),
					array('label'=>'Course','value'=>$model->courseGradedWork->course->name.' ('.$model->courseGradedWork->course->course_code.')'),
					array('label'=>'Created By','value'=>$model->createdBy->getFullName()),
					'description',
					'datetime_created'
				),
			)); ?>
		</div>
		<div>
			<?php //echo CHtml::link('Assign Instructor',array('assignInstructor','id'=>$model->course_code))?><?php //echo CHtml::link('View Instructors',array('instructors','id'=>$model->course_code))?>
		</div>
	</div>
</div>
	