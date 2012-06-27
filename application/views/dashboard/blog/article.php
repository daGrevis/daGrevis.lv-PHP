<h2>
	<a href="<?php echo URL::dashboard() ?>">Dashboard</a>
	— <a href="<?php echo URL::current() ?>">Article</a>
</h2>

<form method="post">

	<?php if (!empty($errors)): ?>

		<div class="error_message">
			<p>There were one or more errors</p>
		</div>

	<?php endif ?>

	<?php if (!empty($success)): ?>

		<div class="success_message">
			<p>Article has been saved</p>
		</div>

	<?php endif ?>

	<input name="csrf_token" type="hidden" value="<?php echo Security::token() ?>">

	<div>

		<p><label>Title <input name="title" value="<?php echo HTML::chars($article->title) ?>"></label></p>

	</div>

	<div>

		<p><label>Slug <input name="slug" value="<?php echo HTML::chars($article->slug) ?>"> <span class="tip">(leave blank for auto-generation)</span></label></p>

	</div>

	<div>

		<textarea name="content"><?php echo HTML::chars($article->content) ?></textarea>

	</div>

	<div>

		<?

		$tags = implode(', ', array_map(function($tag) {

			return $tag->get_title_with_hashtag();

		}, $tags));

		?>

		<p><label>Tags <input name="tags" value="<?php echo HTML::chars($tags) ?>"> <span class="tip">(separate them by spaces)</span></label></p>

	</div>

	<div>

		<p>
			<input type="hidden" name="show_time_of_last_edit" value="0" />
			<label>
				<input type="checkbox" name="show_time_of_last_edit" <?php echo $article->show_time_of_last_edit === NULL || $article->show_time_of_last_edit ? 'checked="checked"' : '' ?> />
				Show time of last edit
			</label>
		</p>

	</div>

	<div>

		<p>
			<input type="hidden" name="is_published" value="0" />
			<label>
				<input type="checkbox" name="is_published" <?php echo $article->is_published === NULL || $article->is_published ? 'checked="checked"' : '' ?> />
				Is published
			</label>
		</p>

	</div>

	<div>

		<button>
			<?php echo ($article->loaded()) ? 'Save article' : 'Add article' ?>
		</button>

		<?php if ($article->loaded()): ?>

			<a href="<?php echo URL::site('dashboard/blog/delete/'.$article->id.'/'.Security::token()) ?>" class="delete_article">[x]</a>

		<?php endif ?>

	</div>

</form>
