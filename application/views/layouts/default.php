<!doctype html>
<head>
	<meta charset="utf-8">

	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
	     More info: h5bp.com/b/378 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title></title>
	<meta name="description" content="">

	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
		
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