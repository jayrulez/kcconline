<?php
$this->pageTitle=Yii::t('application', 'Error');
?>

<div class="action" id="error-index">
	<div class="section">
		<div>
			<div id="error" class="UIMessageBox UIMessageBoxError">
				<h2 class="main_message" id="standard_error"><?php echo Yii::t('application', 'Error {code}', array('{code}'=>$code)); ?></h2>
				<p class="sub_message" id="standard_explanation"><?php echo CHtml::encode($message);?></p>
			</div>
		</div>
	</div>
</div>


