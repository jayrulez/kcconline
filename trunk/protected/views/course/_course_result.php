
		<div class="mbm detailedsearch_result">
			<div class="clearfix uiImageBlock">
				<a class="uiImageBlockImage uiImageBlockSmallImage lfloat" href="">
					<?php echo CHtml::image(Yii::app()->baseUrl.'/images/course/default.png','*',array('height'=>'50px','width'=>'50px'));?>
				</a>
				<div class="clearfix uiImageBlockContent uiImageBlockSmallContent">
					<a class="rfloat uiButton" href="#">
						<span class="uiButtonText"><!--Join Group--></span>
					</a>
					<div class="pls">
						<div class="instant_search_title fsl fwb fcb">
							<?php
								 echo CHtml::link($course->name,array(strtr('/course/view?code={code}',array('{code}'=>$course->course_code))));
							
								$course = Course::model()->with(array('instructorCount','studentCount'))->findByPk($course->course_code);
							?>
						</div>
						<div class="fsm fwn fcg"></div>
						<div>
							<div class="mts detailedsearch_actions fsm fwn fcg">
								<?php 
									if($course->instructorCount > 0)
									{
										echo CHtml::link($course->instructorCount.' '.'Instructors',array());
									}
									else
									{
										echo "No Instructors";
									}
								?>
							</div>
							<div class="mts detailedsearch_actions fsm fwn fcg">
								<?php 
									if($course->instructorCount > 0)
									{
										echo CHtml::link($course->studentCount.' '.'Students',array());
									}
									else
									{
										echo "No Students";
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>