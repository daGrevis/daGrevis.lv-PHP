<h2>
	<a href="<?= URL::dashboard() ?>">Dashboard</a>
	— <a href="<?= URL::dashboard('blog') ?>">Blog</a>
</h2>

<form method="post">

	<? if (!empty($errors)): ?>

		<div class="error_message">
			There were one or more errors
		</div>

	<? endif ?>

	<? if (!empty($success)): ?>

		<div class="success_message">
			Article has been saved
		</div>

	<? endif ?>

	<input name="csrf_token" type="hidden" value="<?= Security::token() ?>">

	<div>

		<label>Title <input name="title" value="<?= HTML::chars($article->title) ?>"></label>

	</div>

	<div>

		<label>Slug <input name="slug" value="<?= HTML::chars($article->slug) ?>"> <span class="tip">(leave blank for auto-generation)</span></label>

	</div>

	<div>

		<textarea name="content"><?= HTML::chars($article->content) ?></textarea>

	</div>

	<div>

		<input type="hidden" name="show_time_of_last_edit" value="0" />
		<label>
			<input type="checkbox" name="show_time_of_last_edit" <?= $article->show_time_of_last_edit === NULL || $article->show_time_of_last_edit ? 'checked="checked"' : '' ?> />
			Show time of last edit
		</label>

	</div>

	<div>

		<input type="hidden" name="is_published" value="0" />
		<label>
			<input type="checkbox" name="is_published" <?= $article->is_published === NULL || $article->is_published ? 'checked="checked"' : '' ?> />
			Is published
		</label>

	</div>

	<div>

		<button>
			<?= ($article->loaded()) ? 'Save article' : 'Add article' ?>
		</button>

		<? if ($article->loaded()): ?>

			<a href="<?= URL::site('dashboard/blog/delete/'.$article->id.'/'.Security::token()) ?>" class="delete_article">[x]</a>

		<? endif ?>

	</div>

</form>