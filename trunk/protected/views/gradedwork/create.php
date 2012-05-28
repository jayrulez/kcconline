<?php
$this->pageTitle=Yii::t('application', 'Graded Work');
?>
<div class="action" id="admin-user-create">
	<div class="section">
		<div class="section-content">
<?php echo $this->renderPartial('_form', array('model'=>$model,'courseGradedWork'=>$model->courseGradedWork,'createdBy'=>$model->createdBy)); ?>
		</div>
	</div>
</div>
