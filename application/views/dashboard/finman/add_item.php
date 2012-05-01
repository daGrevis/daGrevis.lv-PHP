<form action="<?= URL::current() ?>" method="post">

	<div>

		<label>

			Title
			<input type="text" name="title" />

		</label>

	</div>

	<div>

		<label>

			Category
			<select name="category_id">

				<?php foreach ($categories as $category): ?>

					<option value="<?= $category['id'] ?>">
						<?= $category['title'] ?>
					</option>

				<?php endforeach ?>

			</select>

		</label>

	</div>

	<div>

		<textarea name="description" cols="100" rows="10"></textarea>

	</div>

	<div>

		<label>

			Price
			<input type="text" name="price" /> Ls

		</label>

	</div>

	<div>

		<label>

			Count
			<input type="text" name="count" value="1" /> x

		</label>

	</div>

	<div>

		<button>Add item</button>

	</div>

</form>