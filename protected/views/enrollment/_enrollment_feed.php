<?php
	
?>
<div>
	<div>
		<?php echo $feedData['enrollment']->datetime_created;?>
	</div>
	<div>
		<?php echo $feedData['user']->fullname.' was Enrolled in '.$feedData['course']->name.' ('.strtoupper($feedData['course']->course_code).') '.'by '.$feedData['user']->first_name.' '.$feedData['user']->last_name?>
	</div>
</div>