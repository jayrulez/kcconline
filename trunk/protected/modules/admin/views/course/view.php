<?php
$this->pageTitle=Yii::t('application', 'View Course');
?>
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
	</div>
</div>
