<?php
$this->pageTitle=Yii::t('application', 'Graded Work');
?>
<div class="action" id="site-index">
	<div class="section">
		<?php $this->renderPartial('//misc/section_header',array('headerTitle'=>$sectionTitle,'headerImage'=> CHtml::image(Yii::app()->baseUrl.'/images/gradedwork/default_small.png','*',array('height'=>'24px','width'=>'24px'))))?>
		<div class="section-content">
			<div id="pagelet_search_results_area">
				<div>
					<?php
						foreach($studentGradedWorks as $studentGradedWork)
						{
							$this->renderPartial('_student_graded_work_result', array('gradedWork'=>$studentGradedWork));	
						} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>