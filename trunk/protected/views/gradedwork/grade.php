<?php
$this->pageTitle=Yii::t('application', 'Student Graded Work');
?>
<div class="header">
	<div class="title">
		<?php 
			$detailImage = CHtml::image(Yii::app()->baseUrl.'/images/gradedwork/default_medium.png','*',array('height'=>'24px','width'=>'24px'));
			
			echo $detailImage.'&nbsp'. CHtml::link($model->gradedWork->title.' ('.$model->gradedWork->workType->name.' Grade Report)',array(strtr('/gradedwork/view?id={id}',array('{id}'=>$model->graded_work_id))));
		?>
	</div>
</div>
<div class="action" id="admin-course-view">
	<div class="section">
		<div class="section-content">
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					array('type'=>'raw','value'=>html_entity_decode(CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$model->student->image_url,'*',array('height'=>'64px','width'=>'64px')),array(strtr('/profile?id={id}',array('{id}'=>$model->student->uid)))))),
					array('label'=>'Student ID','value'=>$model->student->uid),
					array('label'=>'Student Name','type'=>'raw','value'=>html_entity_decode(CHtml::link($model->student->fullName,array(strtr('/profile?id={id}',array('{id}'=>$model->student->uid)))))),
					array('label'=>'Type','value'=>$model->gradedWork->workType->name),
					array('label'=>'Course','type'=>'raw','value'=>html_entity_decode(CHtml::link($model->gradedWork->courseGradedWork->course->name.' ('.$model->gradedWork->courseGradedWork->course->course_code.')',array(strtr('/course/view?code={code}',array('{code}'=>$model->gradedWork->courseGradedWork->course->course_code)))))),
					array('label'=>'Created By','value'=>$model->gradedWork->createdBy->getFullName()),
					array('label'=>'Work Description','value'=>$model->gradedWork->description),
					array('label'=>'Work Created on','value'=>$model->gradedWork->datetime_created),
					array('label'=>'Total Marks','value'=>(empty($model->max_raw_grade)?'Not Specified':$model->max_raw_grade)),
					array('label'=>'Grade Status','value'=>$model->graded_status),
					array('value'=>''),
					array('type'=>'raw','value'=>html_entity_decode(CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/gradedwork/grade.png',array(strtr('/gradedwork/graded?id={id}',array('{id}'=>$model->graded_work_id))),array('height'=>'48px','width'=>'48px','title'=>'Grade '.$model->student->first_name.'\'s'.' '.$model->gradedWork->workType->name)),array()))),
				),
			)); ?>
		</div>
		<div>
			<?php ?>
		</div>
	</div>
</div>

<?php
$this->pageTitle=Yii::t('application', 'Update User');
?>
<div class="header">
	<div class="title">
		<?php 
			$detailImage = CHtml::image(Yii::app()->baseUrl.'/images/gradedwork/default_medium.png','*',array('height'=>'24px','width'=>'24px'));
			
			echo $detailImage.'&nbsp'. CHtml::link($model->gradedWork->title.' ('.$model->gradedWork->workType->name.' Grade Report)',array(strtr('/gradedwork/view?id={id}',array('{id}'=>$model->graded_work_id))));
		?>
	</div>
</div>
<div class="action" id="admin-user-update">
	<div class="section">
		<div class="section-content">
			<?php echo $this->renderPartial('_grade_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>