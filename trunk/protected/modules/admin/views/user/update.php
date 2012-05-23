<?php
$this->pageTitle=Yii::t('application', 'Update User');
?>
<div class="action" id="admin-user-update">
	<div class="section">
		<div class="section-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>