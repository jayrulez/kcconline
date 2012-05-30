<?php
$this->pageTitle=Yii::t('application', 'Courses');
?>
<div class="action" id="site-index">
	<div class="section">
		<?php $this->renderPartial('//misc/section_header',array('headerTitle'=>'Enrolled Courses','headerImage'=> CHtml::image(Yii::app()->baseUrl.'/images/course/default.png','*',array('height'=>'24px','width'=>'24px'))))?>
		<div class="section-content">
			<div id="pagelet_search_results_area">
				<div>
					<?php
						foreach($enrolledRecords as $enrolledRecord)
						{
							$this->renderPartial('_course_result', array('course'=>$enrolledRecord->course));
						} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>