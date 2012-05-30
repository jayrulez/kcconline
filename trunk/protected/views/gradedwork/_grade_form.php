			<div class="header">
				<div class="title">
					<?php			
						$detailImage = CHtml::image(Yii::app()->baseUrl.'/images/gradedwork/default_medium.png','*',array('height'=>'24px','width'=>'24px'));
			
						echo $detailImage.'&nbsp'. CHtml::link($model->gradedWork->title.' ('.$model->gradedWork->workType->name.' Grade Report)',array(strtr('/gradedwork/view?id={id}',array('{id}'=>$model->graded_work_id))));
					?>
				</div>
			</div>
			<div class="form-container">	
				<?php echo CHtml::beginForm('','post',array('class'=>'wf','enctype'=>'multipart/form-data')); ?>
					<?php echo CHtml::errorSummary($model); ?>
					<?php 
						if(strcasecmp($model->graded_status, 'pending')==0)
						{
							$this->widget('zii.widgets.CDetailView', array(
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
									),
							));
						} 
						else
						{
							$this->widget('zii.widgets.CDetailView', array(
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
											array('label'=>'Raw Grade','value'=>$model->raw_grade),
											array('label'=>'Percentage Grade','value'=>$model->percent_grade),
											//array('label'=>'Letter Grade','value'=>$model->letterGrade->letter),
											array('label'=>'Entry Date','value'=>$model->datetime_entered),
											array('label'=>'Date Graded','value'=>$model->datetime_graded),
											array('label'=>'Graded By', 'type'=>'raw', 'value'=>html_entity_decode(CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$model->gradedBy->image_url,'*',array('height'=>'64px','width'=>'64px')).' '.$model->gradedBy->fullName,array(strtr('/profile?id={id}',array('{id}'=>$model->gradedBy->uid))))),
									),
							)));							
						}
					?>
					<fieldset class="top">
						<div class="row clearfix">
							<?php echo CHtml::activeLabel($model,'_datetime_graded'); ?>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model'=>$model,
								'attribute'=>'datetime_graded',
								'options'=>array(
									'showAnim'=>'fold',
									'changeYear'=>true,
									'changeMonth'=>true,
									'dateFormat'=>'yy-mm-dd',
									'yearRange'=>'1950:2000',
								),
								'htmlOptions'=>array(
									'style'=>'height:20px;'
								),
							));
							?>
						</div>
						<div class="row clearfix">

							<?php echo CHtml::activeLabel($model,'raw_grade'); ?>
							<?php echo CHtml::activeTextField($model,'raw_grade'); ?>
						</div>
					</fieldset>
					<fieldset class="buttons bottom">
						<?php echo CHtml::submitButton('Save'); ?>
					</fieldset>
				<?php echo CHtml::endForm(); ?>
			</div>