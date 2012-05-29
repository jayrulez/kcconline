<div id="pagelet_search_results_area">
	<div>
		<?php
			foreach($categories as $category)
			{
				$this->renderPartial('category_result', array('category'=>$category));
			} 
		?>
	</div>
</div>

