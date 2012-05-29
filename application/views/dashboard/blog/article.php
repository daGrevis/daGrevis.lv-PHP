<h2>
	<a href="<?= URL::dashboard() ?>">Dashboard</a>
	— <a href="<?= URL::current() ?>">Article</a>
</h2>

<form method="post">

	<? if (!empty($errors)): ?>

		<div class="error_message">
			<p>There were one or more errors</p>
		</div>

	<? endif ?>

	<? if (!empty($success)): ?>

		<div class="success_message">
			<p>Article has been saved</p>
		</div>

	<? endif ?>

	<input name="csrf_token" type="hidden" value="<?= Security::token() ?>">

	<div>

		<p><label>Title <input name="title" value="<?= HTML::chars($article->title) ?>"></label></p>

	</div>

	<div>

		<p><label>Slug <input name="slug" value="<?= HTML::chars($article->slug) ?>"> <span class="tip">(leave blank for auto-generation)</span></label></p>

	</div>

	<div>

		<textarea name="content"><?= HTML::chars($article->content) ?></textarea>

	</div>

	<div>

		<p>
			<input type="hidden" name="show_time_of_last_edit" value="0" />
			<label>
				<input type="checkbox" name="show_time_of_last_edit" <?= $article->show_time_of_last_edit === NULL || $article->show_time_of_last_edit ? 'checked="checked"' : '' ?> />
				Show time of last edit
			</label>
		</p>

	</div>

	<div>

		<p>
			<input type="hidden" name="is_published" value="0" />
			<label>
				<input type="checkbox" name="is_published" <?= $article->is_published === NULL || $article->is_published ? 'checked="checked"' : '' ?> />
				Is published
			</label>
		</p>

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