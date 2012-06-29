<article>

	<h2>
		<a href="<?php echo URL::site('article/'.$article->id.'/'.HTML::chars($article->slug)) ?>">

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

	<section id="article_links">

		<p>Raksta links <input type="text" value="<?php echo URL::site('article/'.$article->id.'/'.HTML::chars($article->slug), 'http') ?>" readonly="readonly" /></p>

		<?php if ($article->tweet_id): ?>

			<p>

				Tvīta links <input type="text" value="http://twitter.com/daGrevis_lv/status/<?php echo HTML::chars($article->tweet_id) ?>" readonly="readonly" />

				<a href="http://twitter.com/daGrevis_lv/status/<?php echo HTML::chars($article->tweet_id) ?>" target="_blank" id="loop" ><span></span></a>

			</p>

		<?php endif ?>

	</section>

</article>
