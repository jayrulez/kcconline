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
							<?php echo CHtml::link(Yii::t('application', 'Admin'), array('/admin')); ?>
						</div>
						<div class="global-utils clearfix">
							<div class="global-nav">
								<ul>
									<li><?php echo CHtml::link(Yii::t('application', 'Home'), Yii::app()->homeUrl); ?></li>
									<li><?php echo CHtml::link(Yii::t('application', 'Access Control'), array('/rbam')); ?></li>
									<li>
										<a><?php echo Yii::t('application', 'Courses'); ?></a>
										<ul>
											<li><?php echo CHtml::link(Yii::t('application', 'Manage Courses'), array('/admin/course')); ?></li>
										</ul>
									</li>
									<li>
										<a><?php echo Yii::t('application', 'Users'); ?></a>
										<ul>
											<li><?php echo CHtml::link(Yii::t('application', 'Manage Users'), array('/admin/user/index')); ?></li>
										</ul>
									</li>
								</ul>
							</div>
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
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
