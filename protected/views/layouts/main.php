<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<script type="text/javascript"></script>
		<link href="<?php echo Yii::app()->getBaseUrl(); ?>/css/common.css" rel="stylesheet" type="text/css" media="all">
		<link href="<?php echo Yii::app()->getBaseUrl(); ?>/css/main.css" rel="stylesheet" type="text/css" media="all">
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(); ?>/css/ie.css" />
		<![endif]-->
		<link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(); ?>/favicon.ico" />
	</head>
	<body>
		<div id="page">
			<div id="header-container">
				<div id="header">
					<div id="header-content" class="clearfix">
						<div class="logo">
							<?php echo CHtml::link(Yii::t('application', 'Home'), Yii::app()->homeUrl); ?>
						</div>
						<div class="global-utils clearfix">
							<?php if(($user = Yii::app()->getUser()->getModel()) !== null): ?>
							<div class="global-nav">
								<ul>
									<?php //echo ;exit; ?>
									<?php if(array_key_exists('teacher', Yii::app()->authManager->getRoles(Yii::app()->getUser()->getId()))||Yii::app()->getUser()->hasRole('student')): ?>
									<li><?php echo CHtml::link(Yii::t('application', 'Activity'), array('/activity')); ?></li>
									<?php endif; ?>
						
									<?php if(array_key_exists('teacher', Yii::app()->authManager->getRoles(Yii::app()->getUser()->getId()))||Yii::app()->getUser()->hasRole('student')): ?>
									<li><?php echo CHtml::link(Yii::t('application', 'Courses'), array('/course')); ?></li>
									<?php endif; ?>
						
									<?php if(array_key_exists('teacher', Yii::app()->authManager->getRoles(Yii::app()->getUser()->getId()))): ?>
									<li><?php echo CHtml::link(Yii::t('application', 'Enrollment'), array('/enrollment')); ?></li>
									<?php endif; ?>
									<li>	

									<?php if(array_key_exists('teacher', Yii::app()->authManager->getRoles(Yii::app()->getUser()->getId()))||Yii::app()->getUser()->hasRole('student')): ?>
									<li><?php echo CHtml::link(Yii::t('application', 'Graded Work'), array('/gradedwork')); ?></li>
									<?php endif; ?>
									<li>
									
									<?php if(array_key_exists('teacher', Yii::app()->authManager->getRoles(Yii::app()->getUser()->getId()))||Yii::app()->getUser()->hasRole('student')): ?>
									<li><?php echo CHtml::link(Yii::t('application', 'Reports'), array('/reports')); ?></li>
									<?php endif; ?>
									<li>
									
									<?php if(array_key_exists('admin', Yii::app()->authManager->getRoles(Yii::app()->getUser()->getId()))): ?>
									<li><?php echo CHtml::link(Yii::t('application', 'Admin'), array('/admin')); ?></li>
									<?php endif; ?>
									<?php if(!Yii::app()->getUser()->getIsGuest()):?>
									<li>
										<a><?php echo Yii::t('application', 'Account'); ?></a>
										<ul>
											<li><?php echo CHtml::link(Yii::t('application', 'Settings'), array('/settings')); ?></li>
											<li><?php echo CHtml::link(Yii::t('application', 'Logout'), Yii::app()->getUser()->logoutUrl); ?></li>
										</ul>
									</li>
									<?php endif;?>
								</ul>
							</div>
							<?php else: ?>
							<div class="global-nav">
								<ul>
									<li><?php echo CHtml::link(Yii::t('application', 'Login'), Yii::app()->getUser()->loginUrl); ?></li>
								</ul>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div id="canvas-container">
				<?php
				if(Layout::hasRegions('sidebar.left','sidebar.right'))
				{
					$tagClass = ' class="sidebars clearfix"';
				}else if(Layout::hasRegions('sidebar.left'))
				{
					$tagClass = ' class="sidebar-left clearfix"';
				}else if(Layout::hasRegions('sidebar.right'))
				{
					$tagClass = ' class="sidebar-right clearfix"';
				}else{
					$tagClass = '';
				}
				?>
				<?php $this->widget('FlashMessengerWidget', array('categories'=>array('success','error','warning'))); ?>
				<div id="canvas"<?php echo $tagClass; ?>>
					<!--if(Layout::hasRegion('sidebar.left'))--><?php if(Layout::hasRegion('sidebar.left')): ?><!--/if-->
					<div id="sidebar-left">
						<div class="sidebar-content">
							<?php Layout::renderRegion('sidebar.left'); ?>
						</div>
					</div>
					<!--endif--><?php endif; ?><!--/endif-->
					<div id="content">
						<?php echo $content; ?>
					</div>
					<!--if(Layout::hasRegion('sidebar.right'))--><?php if(Layout::hasRegion('sidebar.right')): ?><!--/if-->
					<div id="sidebar-right">
						<div class="sidebar-content">					
							<?php Layout::renderRegion('sidebar.right'); ?>
						</div>
					</div>
					<!--endif--><?php endif; ?><!--/endif-->
				</div>
			</div>
			<div id="footer-container">
				<div id="footer">
					<div id="footer-content">
						<div id="contentRule"></div>
						<div class="navigation">
							<a href="" title="About Knox Community College Online">About</a> &middot; 
							<a href="" title="Visit the help center">Help</a> &middot;
							<a href="" title="Visit Knox's Website">Knox Community College</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
