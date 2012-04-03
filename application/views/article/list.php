<? if (count($articles)): ?>

	<? foreach ($articles as $article): ?>

		<h3>
			<a href="<?= URL::site('article/'.$article->id.'/'.$article->slug) ?>">

				<? echo HTML::chars($article->title) ?>

			</a>
		</h3>

		<?= Text::markdown($article->content) ?>

	<? endforeach ?>

<? else: ?>

	No articles

<? endif ?>