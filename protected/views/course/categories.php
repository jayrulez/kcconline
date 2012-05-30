<?php
$this->pageTitle=Yii::t('application', 'Course Categories');
?>
<div class="action" id="site-index">
	<div class="section">
		<?php $this->renderPartial('//misc/section_header',array('headerTitle'=>'Categories','headerImage'=>CHtml::image(Yii::app()->baseUrl.'/images/category/default.png','*',array('height'=>'24px','width'=>'24px'))))?>
		<div class="section-content">
			<div id="pagelet_search_results_area">
				<div>
					<?php
						foreach($categories as $category)
						{
							$this->renderPartial('_category_result', array('category'=>$category));
						} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>