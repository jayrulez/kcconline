<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'graded-work-createGradedWork-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datetime_created'); ?>
		<?php echo $form->textField($model,'datetime_created'); ?>
		<?php echo $form->error($model,'datetime_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_raw_grade'); ?>
		<?php echo $form->textField($model,'max_raw_grade'); ?>
		<?php echo $form->error($model,'max_raw_grade'); ?>
	</div>

	<div class="row clearfix">
		<?php echo $form->labelEx($model,'coursePublished'); ?>
		<?php echo $form->checkBox($model,'coursePublished', array('')); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->