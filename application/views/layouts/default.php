<!doctype html>
<head>
		
	<title></title>
		
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
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