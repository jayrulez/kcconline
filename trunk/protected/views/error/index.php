<?php
$this->pageTitle=Yii::t('application', 'Error');
?>

<div class="action" id="error-index">
	<div class="section">
		<div class="section-header">
			<div class="title"><?php echo Yii::t('application', 'Error {code}', array('{code}'=>$code)); ?></div>
		</div>
		<div class="section-content">
			<div class="error"><?php echo CHtml::encode($message); ?></div>
		</div>
		<div class="section-footer">
		</div>
	</div>
</div>
