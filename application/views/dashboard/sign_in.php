<h2>
	<a href="<?= URL::dashboard('sign_in') ?>">Sign in</a>
</h2>

<form method="post">

	<? if (!empty($errors)): ?>

		<div class="error_message">
			There were one or more errors
		</div>

	<? endif ?>

	<input name="csrf_token" type="hidden" value="<?= Security::token() ?>">

	<div>

		<p><label>Password <input name="password" type="password"></label></p>

	</div>

	<div>

		<button>
			Sign in
		</button>

	</div>

</form>