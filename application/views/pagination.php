<ul id="pagination">

	<?php if ($first_page !== false): ?>

		<li class="previous">
			<a href="<?php echo HTML::chars($page->url($previous_page)) ?>">
				&laquo;
			</a>
		</li>

	<?php endif ?>

	<?php for ($i = 1; $i <= $total_pages; $i++): ?>

		<li <?php echo $i == $current_page ? 'class="active"' : '' ?>>
			<a href="<?php echo HTML::chars($page->url($i)) ?>">
				<?php echo $i ?>
			</a>
		</li>

	<?php endfor ?>

	<?php if ($next_page !== false): ?>

		<li class="next">
			<a href="<?php echo HTML::chars($page->url($next_page)) ?>">
				&raquo;
			</a>
		</li>

	<?php endif ?>
</ul>

<div class="clearer"></div>
