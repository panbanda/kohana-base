<?php if ($messages !== NULL): ?>

<div class="message <?php echo $class; ?>">
	<ul>
		<?php foreach ($messages as $message) echo '<li>' . $message . '</li>';	?>
	</ul>
</div>

<?php endif; ?>