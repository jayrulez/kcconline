<?php
$this->pageTitle=Yii::t('application', 'Graded Work');
?>
<div class="action" id="site-index">
	<div class="section">
		<?php $this->renderPartial('//misc/section_header',array('headerTitle'=>'Graded Work','headerImage'=> CHtml::image(Yii::app()->baseUrl.'/images/gradedwork/default_small.png','*',array('height'=>'24px','width'=>'24px'))))?>
		<div class="section-content">
			<div id="pagelet_search_results_area">
				<div>
					<ul>
					<?php
						if(Yii::app()->getUser()->hasRole('teacher'))
						{
							foreach($gradedWorks as $gradedWork)
							{
								$this->renderPartial('_teacher_gradedwork_feed_result', array('gradedWork'=>$gradedWork));
							} 
						}
						else if(Yii::app()->getUser()->hasRole('student'))
						{
							foreach($gradedWorks as $gradedWork)
							{
								$this->renderPartial('_student_gradedwork_feed_result', array('gradedWork'=>$gradedWork));
							} 
						}
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
