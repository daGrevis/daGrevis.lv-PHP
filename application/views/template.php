<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8" />

		<meta name="keywords" content="daGrevis, daGrevis.lv, blogs, portfolio" />
		<meta name="description" content="Blogs par mani un lietām ap mani." />
		
		<link rel="stylesheet" href="<?= URL::stylesheet('common.css') ?>">

		<? if (!empty($stylesheets)): ?>

			<? foreach ($stylesheets as $stylesheet): ?>

				<link rel="stylesheet" href="<?= URL::stylesheet($stylesheet.'.css') ?>">
				<script src="<?= URL::stylesheet($stylesheet.'.css') ?>"></script>

			<? endforeach ?>

		<? endif ?>

		<script src="<?= URL::script('common.js') ?>"></script>

		<title><?= !empty($title) ? $title.' | ' : '' ?>daGrevis.lv</title>

	</head>
	<body>

		<h1><a href="<?= URL::site('') ?>">daGrevis.lv</a></h1>

		<?= $body ?>

		<? if (A1::signed_in()): ?>

			<div id="to_dashboard">

				<a href="<?= URL::dashboard() ?>">To Dashboard</a>

			</div>

		<? endif ?>

		<div id="footer">
			Visas tiesības ir aizsargātas un satura pārpublicēšana ir aizliegta.
		</div>
		
		<? if (Kohana::is_development()): ?>

			<? ProfilerToolbar::render(true) ?>

		<? endif ?>

		<script src="<?= URL::script('google_analytics.js') ?>"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

		<? if (!empty($scripts)): ?>

			<? foreach ($scripts as $script): ?>

				<script src="<?= URL::script($script.'.js') ?>"></script>

			<? endforeach ?>

		<? endif ?>

	</body>
</html>