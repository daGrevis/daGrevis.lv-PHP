<ul id="pagination">

	<? if ($first_page !== false): ?>

		<li class="previous">
			<a href="<?= HTML::chars($page->url($previous_page)) ?>">
				&laquo;
			</a>
		</li>

	<? endif ?>

	<? for ($i = 1; $i <= $total_pages; $i++): ?>

		<li <?= $i == $current_page ? 'class="active"' : '' ?>>
			<a href="<?= HTML::chars($page->url($i)) ?>">
				<?= $i ?>
			</a>
		</li>

	<? endfor ?>

	<? if ($next_page !== false): ?>

		<li class="next">
			<a href="<?= HTML::chars($page->url($next_page)) ?>">
				&raquo;
			</a>
		</li>
	
	<? endif ?>
</ul>
