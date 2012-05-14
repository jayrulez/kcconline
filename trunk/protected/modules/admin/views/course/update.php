<?php
$this->pageTitle=Yii::t('application', 'Update Course');
?>
<div class="action" id="admin-course-update">
	<div class="section">
		<div class="section-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>