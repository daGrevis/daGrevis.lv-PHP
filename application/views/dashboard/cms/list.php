<h2>
	<a href="<?= URL::dashboard() ?>">Dashboard</a>
	— <a href="<?= URL::dashboard('cms') ?>">CMS</a>
</h2>

<? if ($pages): ?>

	<ul>

		<? foreach ($pages as $page): ?>

			<li>
				<a href="<?= URL::site('dashboard/cms/edit/'.$page->id) ?>">
					<?= HTML::chars($page->title) ?>
				</a>
			</li>

		<? endforeach ?>

	</ul>

<? else: ?>

	<p>No results</p>

<? endif ?>