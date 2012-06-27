<h2>
	<a href="<?php echo URL::dashboard() ?>">Dashboard</a>
	— <a href="<?php echo URL::dashboard('cms') ?>">CMS</a>
</h2>

<?php if ($pages): ?>

	<ul>

		<?php foreach ($pages as $page): ?>

			<li>
				<a href="<?php echo URL::site('dashboard/cms/edit/'.$page->id) ?>">
					<?php echo HTML::chars($page->title) ?>
				</a>
			</li>

		<?php endforeach ?>

	</ul>

<?php else: ?>

	<p>No results</p>

<?php endif ?>
