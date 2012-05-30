<?php
$this->pageTitle=Yii::t('application', 'Course');
?>
<div class="header">
	<div class="title">
		<?php
			 $detailImage = CHtml::image(Yii::app()->baseUrl.'/images/course/default.png','*',array('height'=>'24px','width'=>'24px'));
			 //echo CHtml::link($detailImage,array(strtr('/gradedwork/studentview?id={id}',array('{id}'=>$gradedWork->user_id))),array('class'=>'uiImageBlockImage uiImageBlockSmallImage lfloat'));
			 echo $detailImage.'&nbsp'. CHtml::link($model->name.' ('.$model->course_code.')',array(strtr('/admin/course/view?id={id}',array('{id}'=>$model->course_code))));
		?>
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
					array('label'=>'Category','type'=>'raw','value'=>html_entity_decode(CHtml::link($model->category->name,array(strtr('/admin/course/categories?id={id}',array('{id}'=>$model->category->uid)))))),
					'description',		
				),
			)); ?>
		</div>
		<div>
			
		</div>
	</div>
</div>
	