<?php if ($current_page <= 8): ?>
<?php $start = 1; $end = min(10, $total_pages); ?>
<?php elseif ($current_page >= ($total_pages - 8)): ?>
<?php $start = max(1, $total_pages - 9); $end = $total_pages; ?>
<?php else: ?>
<?php $start = $current_page - 5; $end = $current_page + 4; ?>
<?php endif ?>

<p class="pagination">
	<a href="<?php echo $page->url($previous_page) ?>">&laquo; <?php echo __('Previous') ?></a>

	<?php if ($current_page > 8 AND $total_pages > 12): ?>
	<a href="<?php echo $page->url(1) ?>">1</a>
	...
	<?php endif ?>

	<?php for ($i = $start; $i <= $end; $i++): ?>

		<?php if ($i == $current_page): ?>
			<a href="<?php echo $page->url($i) ?>" class="selected"><?php echo $i ?></a>
		<?php else: ?>
			<a href="<?php echo $page->url($i) ?>"><?php echo $i ?></a>
		<?php endif ?>
	
	<?php endfor ?>

	<?php if ($current_page < ($total_pages - 8) AND $total_pages > 12): ?>
	...
	<a href="<?php echo $page->url($total_pages) ?>"><?php echo $total_pages ?></a>
	<?php endif ?>

	<a href="<?php echo $page->url($next_page) ?>"><?php echo __('Next') ?> &raquo;</a>
</p>