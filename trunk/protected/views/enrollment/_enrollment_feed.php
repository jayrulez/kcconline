<?php
	
?>
<div class="feed-container">
	<div class="feed-user-image">	
		<?php echo CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$feedData['enrolledBy']->image_url,'*',array('height'=>'52px','width'=>'52px'));?>
		<?php  echo '<span class="feed-username-spn">'.$feedData['enrolledBy']->first_name.' '.$feedData['enrolledBy']->last_name.'</span>';?>
		<?php
			$date = new DateTime($feedData['enrollment']->datetime_created); 
			echo '&nbsp&nbsp&nbsp&nbsp'.$date->format('d M Y  g:i a');
		?>
	</div>
	<div class="feed-body">
		<p>
			<?php echo '<span class="feed-text-spn">Enrolled'.' '/*. CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$feedData['user']->image_url,'*',array('height'=>'52px','width'=>'52px')).' '*/.CHtml::link($feedData['user']->fullname,strtr('/profile/id/{id}',array('{id}'=>$feedData['user']->uid))).' in '.$feedData['course']->name.' ('.strtoupper($feedData['course']->course_code).').</span>';?>
		</p>
	</div>
</div>