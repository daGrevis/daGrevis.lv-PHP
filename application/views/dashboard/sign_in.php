<form method="post">

	<? if (!empty($errors)): ?>

		<div class="error_message">
			There were one or more errors
		</div>

	<? endif ?>

	<input name="csrf_token" type="hidden" value="<?= Security::token() ?>">

	<div>

		<label>Password <input name="password" type="password"></label>

	</div>

	<div>

		<button>
			Sign in
		</button>

	</div>

</form>