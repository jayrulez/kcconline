<?php
$this->pageTitle=Yii::t('application', 'Create User');
?>
<div class="action" id="admin-user-create">
	<div class="section">
		<div class="section-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>

