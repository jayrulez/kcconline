<?php
$this->pageTitle=Yii::t('application', 'Enroll Student');
?>
<div class="action" id="enroll-student">
	<div class="section">
		<div class="section-content">
			<div class="form-container">	
				<?php echo CHtml::beginForm('','post',array('class'=>'wf','enctype'=>'multipart/form-data')); ?>
					<div class="header">
						<div class="title">
							<?php echo Yii::t('application', 'Enroll Student');?>
						</div>
					</div>
					<?php echo CHtml::errorSummary($enrollmentModel); ?>
					<?php echo CHtml::errorSummary($userCourseEnrollmentModel); ?>
					<fieldset class="top">
						<div class="row top clearfix">
							<?php echo CHtml::activeLabel($userCourseEnrollmentModel,'user_id'); ?>
							<?php echo CHtml::activeTextField($userCourseEnrollmentModel,'user_id'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($userCourseEnrollmentModel,'course_code'); ?>
							<?php echo CHtml::activeTextField($userCourseEnrollmentModel,'course_code'); ?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($enrollmentModel,'enroll_startdatetime'); ?>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model'=>$enrollmentModel,
								'attribute'=>'enroll_startdatetime',
								'options'=>array(
									'showAnim'=>'fold',
									'changeYear'=>true,
									'changeMonth'=>true,
									'dateFormat'=>'yy-mm-dd',
									'yearRange'=>'1950:2020',
								),
								'htmlOptions'=>array(
									'style'=>'height:20px;'
								),
							));
							?>
						</div>
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($enrollmentModel,'enroll_enddatetime'); ?>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model'=>$enrollmentModel,
								'attribute'=>'enroll_enddatetime',
								'options'=>array(
									'showAnim'=>'fold',
									'changeYear'=>true,
									'changeMonth'=>true,
									'dateFormat'=>'yy-mm-dd',
									'yearRange'=>'1950:2020',
								),
								'htmlOptions'=>array(
									'style'=>'height:20px;'
								),
							));
							?>
						</div>
	
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($courseModel,'enrollment_key'); ?>
							<?php echo CHtml::activePasswordField($courseModel,'enrollment_key'); ?>
						</div> 
			
						<div class="row clearfix">
							
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton($enrollmentModel->isNewRecord ? 'Enroll' : 'Save'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>
