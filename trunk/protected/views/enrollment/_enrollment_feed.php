<?php
	$profileImage = CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$feedData['enrolledBy']->image_url,'*',array('height'=>'52px','width'=>'52px'));
	
	$profileUrl = '/profile?id={id}';
	$profileUrl = strtr($profileUrl,array('{id}'=>Yii::app()->getUser()->getId()));
	
	//echo CHtml::link($profileImage, array($profileUrl)); 
?>
<div class="feed-container">
	<div class="feed-user-image">	
		<?php echo CHtml::link($profileImage, array($profileUrl));?>
		<?php echo '<span class="feed-username-spn">'.CHtml::link($feedData['enrolledBy']->first_name.' '.$feedData['enrolledBy']->last_name,array($profileUrl)).'</span>';?>
		<?php
			$date = new DateTime($feedData['enrollment']->datetime_created); 
			echo '&nbsp&nbsp&nbsp&nbsp'.$date->format('d M Y  g:i a');
		?>
	</div>
	<div class="feed-body">
		<p>
			<?php echo '<span class="feed-text-spn">Enrolled'.' '/*. CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$feedData['user']->image_url,'*',array('height'=>'52px','width'=>'52px')).' '*/.CHtml::link($feedData['user']->fullname,array($profileUrl)).' in '.$feedData['course']->name.' ('.strtoupper($feedData['course']->course_code).').</span>';?>
		</p>
	</div>
</div>