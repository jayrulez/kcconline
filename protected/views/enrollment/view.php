<?php ?>
<div class="action" id="action-status-view">
	<div class="section">
		<div class="section-content">
		<?php 
			$this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						'enrollment_id',
						array('type'=>'html','value'=>'CHtml::image(Yii::app()->baseUrl."/images/profile/".$model->user->image_url,"*",array("height"=>"96","height"=>"96"))'),
						array('label'=>'Student ID','value'=>$model->user->uid),
						array('label'=>'Student Name','value'=>$model->user->fullName),
						array('label'=>'Course Code','value'=>$model->course->course_code),
						array('label'=>'Course Name','value'=>$model->course->name),
						array('label'=>'Start Date','value'=>$model->enrollment->enroll_startdatetime),
						array('label'=>'End Date','value'=>$model->enrollment->enroll_enddatetime),
					),
			)); 
		?>
		</div>
	</div>
</div>