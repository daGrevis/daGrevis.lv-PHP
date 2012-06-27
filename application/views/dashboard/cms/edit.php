<h2>
	<a href="<?php echo URL::dashboard() ?>">Dashboard</a>
	— <a href="<?php echo URL::dashboard('cms') ?>">CMS</a>
</h2>

<form action="<?php echo URL::current() ?>" method="post">

	<?php echo Form::token() ?>

	<div>

		<label>Title <input name="title" value="<?php echo HTML::chars($page->title) ?>" /></label>

	</div>

	<div>

		<textarea name="content" cols="100" rows="25"><?php echo HTML::chars($page->content) ?></textarea>

	</div>

	<div>

		<button>
			<?php echo !$page->loaded() ? 'Create page' : 'Update page' ?>
		</button>

	</div>

</form>
