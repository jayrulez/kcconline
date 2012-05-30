<li class="uiUnifiedStory uiStreamStory genericStreamStory uiStreamBoulderHighlight aid_124361237591258 uiListItem uiListLight uiListVerticalItemBorder" style="opacity: 1;"> 
		<div class="storyContent">
			<div class="UIImageBlock clearfix">
				<?php 
					echo CHtml::link(
								CHtml::image(Yii::app()->baseUrl.'/images/profile/'.$gradedWork->createdBy->image_url,'*',array('class'=>'uiProfilePhoto profilePic uiProfilePhotoLarge img')),
							array(strtr('/profile?id={id}',array('{id}'=>$gradedWork->createdBy->uid))),array('class'=>'actorPhoto UIImageBlock_Image UIImageBlock_MED_Imag'));
				?>
				<div class="storyInnerContent UIImageBlock_Content UIImageBlock_MED_Content">
					<div class="mainWrapper">
						
						<div class="actorDescription actorName">
							<h6 class="uiStreamMessage uiStreamHeadline">
								<?php
									echo CHtml::link($gradedWork->createdBy->first_name.' '.$gradedWork->createdBy->last_name,array(strtr('/profile?id={id}',array('{id}'=>$gradedWork->createdBy->uid))));
								?>
							</h6>
						</div>
						
						<h6 class="uiStreamMessage"> 
							<span class="messageBody" ></span>
						</h6><div class="mvm uiStreamAttachments clearfix fbMainStreamAttachment">
						<div class="UIImageBlock clearfix">
							<a class="external UIImageBlock_Image UIImageBlock_MED_Image" >
								<img class="img" alt="">
							</a>
								<div class="UIImageBlock_Content UIImageBlock_MED_Content fsm fwn fcg">
									<div class="uiAttachmentTitle">
										<strong>
											<?php 
												echo CHtml::link($gradedWork->title,array(strtr('/gradedwork/view?id={id}',array('{id}'=>$gradedWork->uid))));
											?>
										</strong> 
									</div>
									<span class="caption"></span>
									<div class="mts uiAttachmentDesc translationEligibleUserAttachmentMessage" >
										<div>
											<div class="fsm fwn fcg">
												<?php 
													echo 'Course: '.CHtml::link($gradedWork->courseGradedWork->course->name,array(strtr('/course/view?course={code}',array('{code}'=>$gradedWork->courseGradedWork->course->course_code))));
												?>
											</div>
											<div class="">
												<strong>
												<?php 
													echo $gradedWork->workType->name;
												?>
												</strong>
											</div>
											<div><span class="uiAttachmentDetails"><?php echo CHtml::link('View Details',array(strtr('/gradedwork/view?id={id}',array('{id}'=>$gradedWork->uid))));?></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="UIImageBlock clearfix uiStreamFooter">
							<img class="UIImageBlock_Image UIImageBlock_ICON_Image img" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
</li>