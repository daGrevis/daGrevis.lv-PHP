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
					<?php echo date('d/m/y, G:i:s', $article->created) ?>
				</td>
				<td>
					<?php echo $article->last_updated ? date('d/m/y, G:i:s', $article->last_updated) : 'N/A' ?>
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

	<?php echo $pagination ?>

<?php else: ?>

	<p>No articles</p>

<?php endif ?>

<p><a href="<?php echo URL::dashboard('blog/article') ?>">New article</a></p>
