<?php
$this->pageTitle=Yii::t('application', 'Graded Work');
?>
<div class="header">
	<div class="title">
		<?php
			$detailImage = CHtml::image(Yii::app()->baseUrl.'/images/gradedwork/default_medium.png','*',array('height'=>'24px','width'=>'24px'));
			//echo CHtml::link($detailImage,array(strtr('/gradedwork/studentview?id={id}',array('{id}'=>$gradedWork->user_id))),array('class'=>'uiImageBlockImage uiImageBlockSmallImage lfloat'));
			echo $detailImage.'&nbsp'. CHtml::link($model->title,array(strtr('/gradedwork/view?id={id}',array('{id}'=>$model->uid))));
		?>
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
					'datetime_created',
					array('label'=>'Total Marks','value'=>(empty($model->max_raw_grade)?'Not Specified':$model->max_raw_grade)),
				
			))); ?>
		</div>
		<div>
			<?php //echo CHtml::link('Assign Instructor',array('assignInstructor','id'=>$model->course_code))?><?php //echo CHtml::link('View Instructors',array('instructors','id'=>$model->course_code))?>
		</div>
	</div>
</div>
	