<article>

	<h2>
		Preview: &laquo;<?php echo HTML::chars($article->title) ?>&raquo;
	</h2>

	<section>

		<div class="meta">
			<abbr title="<?php echo date('d/m/y, G:i:s', $article->created) ?>"><?php echo date('j', $article->created) ?>. <?php echo Date::$months[date('n', $article->created)] ?>, <?php echo date('o', $article->created) ?>. gads</abbr>

			<?php /*

			<span class="pipe">|</span>
			<a href="#" class="comments"><span>0</span> komentāri</a> un <a href="#" class="reactions"><span>0</span> prieciņi</a>

			*/ ?>
		</div>

	</section>

	<section>

		<?php echo Darkmown::parse($article->content) ?>

	</section>

</article>
