<?php if (count($articles)): ?>

	<?php foreach ($articles as $article): ?>

		<article>

			<h2>

				<a href="<?php echo URL::site('article/'.$article->id.'/'.$article->slug) ?>">

					<?php echo HTML::chars($article->title) ?>

				</a>

			</h2>

			<section>

				<div class="meta">
					<abbr title="<?php echo date(DateTime::ATOM, $article->created) ?>"><?php echo date('j', $article->created) ?>. <?php echo Date::$months[date('n', $article->created)] ?>, <?php echo date('o', $article->created) ?>. gads</abbr>

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

	<?php endforeach ?>

	<?php echo $pagination ?>

<?php else: ?>

	No articles

<?php endif ?>
