<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8" />

		<meta name="keywords" content="daGrevis, daGrevis.lv, blogs, portfolio" />
		<meta name="description" content="Blogs par mani un lietām ap mani." />
		
		<link rel="shortcut icon" href="<?= URL::image('favicon.png') ?>" />

		<link rel="stylesheet" href="<?= URL::stylesheet('normalize-0357529.min.css') ?>" />
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700&amp;subset=latin,latin-ext' />
		<link rel="stylesheet" href="<?= URL::stylesheet('github-modded.css') ?>" />
		<link rel="stylesheet" href="<?= URL::stylesheet('common.css') ?>" />

		<? if (!empty($stylesheets)): ?>

			<? foreach ($stylesheets as $stylesheet): ?>

				<link rel="stylesheet" href="<?= URL::stylesheet($stylesheet.'.css') ?>">

			<? endforeach ?>

		<? endif ?>

		<title><?= !empty($title) ? $title.' | ' : '' ?>daGrevis.lv</title>

	</head>
	<body>
		
		<div id="wrapper">

			<header>

				<a href="<?= URL::site('') ?>">

					<div id="logo"></div>
					<h1>daGrevis.lv</h1>

				</a>

				<h2>«Intelligence is the ability to avoid doing work,<br /> yet getting the work done.» <span>/Linus Torvalds/</span></h2>

			</header>

			<div id="content">

				<?= $body ?>

				<?php /*

				<? if (A1::signed_in()): ?>

					<div id="to_dashboard">

						<a href="<?= URL::dashboard() ?>">To Dashboard</a>

					</div>

				<? endif ?>

				*/ ?>

			</div>

		</div>

		<footer>

			<?php /*

			<nav>

				<ul>

					<li><a href="#">Par mani</a></li>
					<span class="pipe">|</span>
					<li><a href="#">Par lapu</a></li>
					<span class="pipe">|</span>
					<li><a href="#">Jautājumi</a></li>
					<span class="pipe">|</span>
					<li><a href="#">Kontakti</a></li>

				</ul>

			</nav>

			<div id="search">

				<input type="text" placeholder="Meklēt rakstu..." disabled="disabled" />
				<button disabled="disabled">Aiziet</button>

			</div>

			*/ ?>

			<section>

				<p>Satura autors ir Raitis Stengrevics, ja vien nav norādīts citādāk. <strong>Satura pārpublicēšana ir aizliegta.</strong></p>

			</section>

		</footer>

		<script src="<?= URL::script('load-3acd55a.min.js') ?>"></script>

		<script>

			load('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js').onError(function() {

				load('<?= URL::script('jquery-1.7.2.min.js') ?>');

			})
			.then('<?= URL::script('rainbow-1.1.8.min.js') ?>')
			.then('<?= URL::script('common.js') ?>')
			;

		</script>

		<? if (!empty($scripts)): ?>

			<script>

				<? foreach ($scripts as $script): ?>

					load('<?= URL::script($script.'.js') ?>');

				<? endforeach ?>

			</script>

		<? endif ?>

		<? if (Kohana::is_production()): ?>

			<script>

				load('<?= URL::script('google_analytics.js') ?>');

			</script>

		<? endif ?>

		<? if (Kohana::is_development()): ?>

			<?= ProfilerToolbar::render(); ?>

		<? endif ?>

	</body>
</html>
