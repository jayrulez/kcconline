<?php
$this->pageTitle=Yii::t('application', 'Course Category');
?>
<div class="header">
	<div class="title">
		<?php
			 $detailImage = CHtml::image(Yii::app()->baseUrl.'/images/course/default.png','*',array('height'=>'24px','width'=>'24px'));
			 //echo CHtml::link($detailImage,array(strtr('/gradedwork/studentview?id={id}',array('{id}'=>$gradedWork->user_id))),array('class'=>'uiImageBlockImage uiImageBlockSmallImage lfloat'));
			 echo $detailImage.'&nbsp'. CHtml::link($model->name,array(strtr('/course/categories?code={code}',array('{code}'=>$model->uid))));
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
					'name',
					'description',
					array('label'=>'Available Courses','type'=>'raw','value'=>($model->courseCount>0)?html_entity_decode(CHtml::link($model->courseCount.' Courses available',array())):'None'),
				),
			)); ?>
		</div>
		<div>
			
		</div>
	</div>
</div>
	