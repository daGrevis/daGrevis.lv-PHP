<article>

	<h2>
		<a href="<?= URL::site('article/'.$article->id.'/'.$article->slug) ?>">

			<?= HTML::chars($article->title) ?>

		</a>
	</h2>

	<section>

		<div class="meta">
			<abbr title="<?= date(DateTime::ATOM, $article->created) ?>"><?= date('j', $article->created) ?>. <?= Date::$months[date('n', $article->created)] ?>, <?= date('o', $article->created) ?>. gads</abbr>
			
			<?php /*

			<span class="pipe">|</span>
			<a href="#" class="comments"><span>0</span> komentāri</a> un <a href="#" class="reactions"><span>0</span> prieciņi</a>

			*/ ?>
		</div>

	</section>

	<section>

		<?= Darkmown::parse($article->content) ?>

	</section>

</article>