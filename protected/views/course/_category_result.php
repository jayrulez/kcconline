		<div class="mbm detailedsearch_result">
			<div class="clearfix uiImageBlock">
				<a class="uiImageBlockImage uiImageBlockSmallImage lfloat" href="">
					<?php echo CHtml::image(Yii::app()->baseUrl.'/images/category/default.png','*');?>
				</a>
				<div class="clearfix uiImageBlockContent uiImageBlockSmallContent">
					<a class="rfloat uiButton" href="#">
						<span class="uiButtonText"><!--Join Group--></span>
					</a>
					<div class="pls">
						<div class="instant_search_title fsl fwb fcb">
							<a href=""><?php echo $category->name?></a>
						</div>
						<div class="fsm fwn fcg"></div>
						<div>
							<div class="mts detailedsearch_actions fsm fwn fcg">
								<a href="#">
									<?php echo ($category->courseCount>0)? $category->courseCount." courses available":"no course available"?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>