<article>

	<h2>
		Preview: &laquo;<?php echo HTML::chars($article->title) ?>&raquo;
	</h2>

	<section>

		<div class="meta">
			<abbr title="<?php echo date(DateTime::ATOM, $article->created) ?>"><?php echo date('j', $article->created) ?>. <?php echo Date::$months[date('n', $article->created)] ?>, <?php echo date('o', $article->created) ?>. gads</abbr>

		</div>

	</section>

	<section>

		<?php echo Darkmown::parse($article->content) ?>

	</section>

</article>
