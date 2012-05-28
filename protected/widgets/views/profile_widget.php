<div class="photo">
	<?php echo CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$model->image_url,'*', array(
		'width'=>'120px',
		'height'=>'120px',
	)); ?>
</div>
<div class="name">
	<span><?php echo $model->fullname; ?></span>
	<?php if(Yii::app()->getUser()->getId() == $model->uid): ?>
	<div><?php echo CHtml::link('Edit Profile', array()); ?></div>
	<?php endif; ?>
</div>
<?php if(Yii::app()->getUser()->getId() == $model->uid): ?>
<hr/>
<div class="mailbox">
	<h3>Mailbox</h3>
	<ul>
		<li><?php echo CHtml::link('Compose', array()); ?></li>
		<li><?php echo CHtml::link('Inbox(0)', array()); ?></li>
		<li><?php echo CHtml::link('Sent', array()); ?></li>
	</ul>
</div>
<?php endif; ?>
