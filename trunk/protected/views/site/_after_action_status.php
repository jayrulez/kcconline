<?php ?>
<div class="action" id="action-status-view">
	<div class="section">
		<div class="section-content">
		<?php 
			$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>$attributes)); 
		?>
		</div>
	</div>
</div>