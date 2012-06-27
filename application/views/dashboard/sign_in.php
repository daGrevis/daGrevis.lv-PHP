<h2>
	<a href="<?php echo URL::dashboard('sign_in') ?>">Sign in</a>
</h2>

<form method="post">

	<?php if (!empty($errors)): ?>

		<div class="error_message">
			There were one or more errors
		</div>

	<?php endif ?>

	<input name="csrf_token" type="hidden" value="<?php echo Security::token() ?>">

	<div>

		<p><label>Password <input name="password" type="password"></label></p>

	</div>

	<div>

		<button>
			Sign in
		</button>

	</div>

</form>
