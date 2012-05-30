
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
						<a href="">Mona Chippy</a>
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
										echo CHtml::link('Libra Horoscope',array());
									?>
								</strong> 
							</div>
							<span class="caption">Your Daily Libra Horoscope has been delivered.</span>
							<div class="mts uiAttachmentDesc translationEligibleUserAttachmentMessage" >
								If you are not single, your significant other may be feeling a bit lonely and sorry for themselves, and you can help with a little tender loving care....
								<div>
									<div class="fsm fwn fcg">View Your Full Horoscope: 
										<span class="uiAttachmentDetails"><a>Click here</a></span>
									</div>
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

