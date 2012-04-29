<h2>
	<a href="<?= URL::dashboard() ?>">Dashboard</a>
	— <a href="<?= URL::dashboard('cms') ?>">CMS</a>
</h2>

<form action="<?= URL::current() ?>" method="post">

	<?= Form::token() ?>

	<div>

		<label>Title <input name="title" value="<?= HTML::chars($page->title) ?>" /></label>

	</div>

	<div>

		<textarea name="content" cols="100" rows="25"><?= HTML::chars($page->content) ?></textarea>

	</div>

	<div>

		<button>
			<?= !$page->loaded() ? 'Create page' : 'Update page' ?>
		</button>

	</div>

</form>