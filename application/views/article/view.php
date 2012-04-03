<h2>
	<a href="<?= URL::site('article/'.$article->id.'/'.$article->slug) ?>">

		<?= HTML::chars($article->title) ?>

	</a>
</h2>

<?= Text::markdown($article->content) ?>

<span class="date_or_time">

	Created: <?= date(Date::DATE_FORMAT.', '.Date::TIME_FORMAT, $article->created) ?>

	<? if ($article->show_time_of_last_edit && !empty($article->last_updated)): ?>

		<br />

		Last updated: <?= date(Date::DATE_FORMAT.', '.Date::TIME_FORMAT, $article->last_updated) ?>

	<? endif ?>

</span>