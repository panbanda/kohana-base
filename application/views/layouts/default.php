<!doctype html>
	
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo I18n::lang(); ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?php echo I18n::lang(); ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?php echo I18n::lang(); ?>"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo I18n::lang(); ?>"> <!--<![endif]-->

<head>
	
	<title></title>
	
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	
	<link rel="author" href="humans.txt" />
	
	<?php foreach ($scripts as $script): ?>
		<?php echo HTML::script($script); ?>
	<?php endforeach; ?>
	
	<?php foreach ($stylesheets as $style): ?>
		<?php echo HTML::style($style); ?>
	<?php endforeach; ?>
	
</head>

<body>

	<?php echo View::factory('modules/header'); ?>

	<div role="main">
		<?php echo $content; ?>
	</div>

	<?php echo View::factory('modules/footer'); ?>

</body>
</html>