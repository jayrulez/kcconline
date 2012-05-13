<?php

return CMap::mergeArray(require_once(dirname(__FILE__).'/modules.php'), array(
	// uncomment the following to enable the Gii tool
	'gii'=>array(
		'class'=>'system.gii.GiiModule',
		'password'=>'gii',
	 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
		'ipFilters'=>array('127.0.0.1','::1'),
	),
));