<h2>
	<a href="<?php echo URL::dashboard() ?>">Dashboard</a>
	— <a href="<?php echo URL::current() ?>">List</a>
</h2>

<?php if (count($articles)): ?>

	<table>

		<tr>
			<th></th>
			<th>Title</th>
			<th>Created</th>
			<th>Last updated</th>
			<th>Is published</th>
			<th></th>
		</tr>

		<?php foreach ($articles as $article): ?>

			<tr>
				<td>
					#<?php echo $article->id ?>
				</td>
				<td class="title">
					<a href="<?php echo URL::site('dashboard/blog/article/'.$article->id) ?>">
						<?php echo HTML::chars(Text::limit_chars($article->title, 40, '...')) ?>
					</a>
				</td>
				<td>
					<?php echo date(Date::DATE_FORMAT.', '.DATE::TIME_FORMAT, $article->created) ?>
				</td>
				<td>
					<?php echo $article->last_updated ? date(Date::DATE_FORMAT.', '.DATE::TIME_FORMAT, $article->last_updated) : 'N/A' ?>
				</td>
				<td>
					<?php echo $article->is_published ? 'True' : 'False' ?>
				</td>
				<td>
					<a href="<?php echo URL::site('dashboard/blog/delete/'.$article->id.'/'.Security::token()) ?>" class="delete_article">[x]</a>
				</th>
			</tr>

		<?php endforeach ?>

	</table>

<?php else: ?>

	<p>No articles</p>

<?php endif ?>
