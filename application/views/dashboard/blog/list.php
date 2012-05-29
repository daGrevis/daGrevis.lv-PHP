<h2>
	<a href="<?= URL::dashboard() ?>">Dashboard</a>
	— <a href="<?= URL::current() ?>">List</a>
</h2>

<? if (count($articles)): ?>

	<table>

		<tr>
			<th></th>
			<th>Title</th>
			<th>Created</th>
			<th>Last updated</th>
			<th>Show time of last edit</th>
			<th>Is published</th>
			<th></th>
		</tr>

		<? foreach ($articles as $article): ?>

			<tr>
				<td>
					#<?= $article->id ?>
				</td>
				<td class="title">
					<a href="<?= URL::site('dashboard/blog/article/'.$article->id) ?>">
						<?= HTML::chars(Text::limit_chars($article->title, 40, '...')) ?>
					</a>
				</td>
				<td>
					<?= date(Date::DATE_FORMAT.', '.DATE::TIME_FORMAT, $article->created) ?>
				</td>
				<td>
					<?= $article->last_updated ? date(Date::DATE_FORMAT.', '.DATE::TIME_FORMAT, $article->last_updated) : 'N/A' ?>
				</td>
				<td>
					<?= $article->show_time_of_last_edit ? 'True' : 'False' ?>
				</td>
				<td>
					<?= $article->is_published ? 'True' : 'False' ?>
				</td>
				<td>
					<a href="<?= URL::site('dashboard/blog/delete/'.$article->id.'/'.Security::token()) ?>" class="delete_article">[x]</a>
				</th>
			</tr>
			
		<?php endforeach ?>

	</table>

<? else: ?>

	<p>No articles</p>

<? endif ?>