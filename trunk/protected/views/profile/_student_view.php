<?php
$this->pageTitle=Yii::t('application', 'Profile');
?>
<div class="header">
	<div class="title">
		<?php echo '<span id="profile-title">'.$model->getFullName().'</span>'.' <span id="profile-role-title">'.(strcasecmp($model->uid,Yii::app()->getUser()->getId())==0)?'':'('.$roleName.')'; echo '</span>';?>
	</div>
</div>
<div class="action" id="admin-user-view">
	<div class="section">
		<div class="section-content">
			<?php
				$dob = new DateTime($model->dob);
				$datetime_created = new DateTime($model->datetime_created);
				$last_action  = new DateTime($model->last_action);
				
				if(strcasecmp($model->uid,Yii::app()->getUser()->getId())==0)
				{
					 $this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'attributes'=>array(
							array('label'=>'Profile Photo','type'=>'raw','value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$model->image_url,'*',array('height'=>'180px','width'=>'180px')))),
							'uid',
							'first_name',
							'middle_name',
							'last_name',
							array('label'=>'Date of Birth','value'=>$dob->format('d M Y')),
							'email_address',
							'phone1',
							'phone2',
							array('label'=>'Member Since','value'=>$datetime_created->format('d M Y')),
							array('label'=>'Last Active','value'=>$last_action->format('d M Y g:i a')),
							array('label'=>'Last Modified','value'=>$last_modified->format('d M Y g:i a')),
						),
					)); 
				}
				else if(strcasecmp($roleName,"student")==0)
				{
					$this->widget('zii.widgets.CDetailView', array(
							'data'=>$model,
							'attributes'=>array(
									array('label'=>'Profile Photo','type'=>'raw','value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$model->image_url,'*',array('height'=>'180px','width'=>'180px')))),
									'uid',
									'first_name',
									'last_name',
									'email_address',
									array('label'=>'Member Since','value'=>$datetime_created->format('d M Y')),
									array('label'=>'Last Active','value'=>$last_action->format('d M Y')),
							),
					));					
				}
				else if(strcasecmp($roleName,"teacher")==0)
				{
					$this->widget('zii.widgets.CDetailView', array(
							'data'=>$model,
							'attributes'=>array(
									array('label'=>'Profile Photo','type'=>'raw','value'=>html_entity_decode(CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$model->image_url,'*',array('height'=>'180px','width'=>'180px')))),
									'uid',
									'first_name',
									'last_name',
									'email_address',
									array('label'=>'Member Since','value'=>$datetime_created->format('d M Y')),
									array('label'=>'Last Active','value'=>$last_action->format('d M Y')),
							),
					));
				}				
			?>
		</div>
	</div>
</div>
