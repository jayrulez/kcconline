
		<div class="mbm detailedsearch_result">
			<div class="clearfix uiImageBlock">
					<?php 
						//<a class="uiImageBlockImage uiImageBlockSmallImage lfloat" href="<?php echo strtr('/gradedwork/view?id={id}',array('{id}'=>$gradedWork->graded_work_id)); ">
						$detailImage = CHtml::image(Yii::app()->baseUrl.'/images/gradedwork/default_medium.png','*',array('height'=>'50px','width'=>'50px'));
						
						echo CHtml::link($detailImage,array(strtr('/gradedwork/studentview?id={id}',array('{id}'=>$gradedWork->user_id))),array('class'=>'uiImageBlockImage uiImageBlockSmallImage lfloat'));
					?>
				<div class="clearfix uiImageBlockContent uiImageBlockSmallContent">
					<a class="rfloat uiButton" href="#">
						<span class="uiButtonText">
						<?php
							echo "here"; 
						?>
						</span>
					</a>
					<div class="pls">
						<div class="instant_search_title fsl fwb fcb">
							<?php echo CHtml::link($gradedWork->gradedWork->title,array(strtr('/gradedwork/view?id={id}',array('{id}'=>$gradedWork->graded_work_id))));?>
							<?php 
								//$course = Course::model()->with(array('instructorCount','studentCount'))->findByPk($course->course_code);
							?>
						</div>
						<div class="fsm fwn fcg"></div>
						<div>
							<div class="mts detailedsearch_actions fsm fwn fcg">
								<?php echo 'Type: '.$gradedWork->gradedWork->workType->name; ?>
							</div>
							<div class="mts detailedsearch_actions fsm fwn fcg">
								<?php echo 'Grade Status: '.$gradedWork->graded_status; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
