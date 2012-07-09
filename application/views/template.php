<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8" />

		<meta name="keywords" content="daGrevis, daGrevis.lv, blogs, portfolio" />
		<meta name="description" content="Blogs par mani un lietām ap mani." />

		<link rel="shortcut icon" href="<?php echo URL::image('favicon.png') ?>" />

		<link rel="stylesheet" href="<?php echo URL::stylesheet('normalize-0357529.min.css') ?>" />
		<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700&amp;subset=latin,latin-ext' />
		<link rel="stylesheet" href="<?php echo URL::stylesheet('github-modded.css') ?>" />
		<link rel="stylesheet" href="<?php echo URL::stylesheet('common.css') ?>" />

		<?php if (!empty($stylesheets)): ?>

			<?php foreach ($stylesheets as $stylesheet): ?>

				<link rel="stylesheet" href="<?php echo URL::stylesheet($stylesheet.'.css') ?>">

			<?php endforeach ?>

		<?php endif ?>

		<title><?php echo !empty($title) ? $title.' | ' : '' ?>daGrevis.lv</title>

	</head>
	<body>

		<div id="wrapper">

			<ul id="social_icons">

				<li>
					<a href="http://twitter.com/#!/daGrevis" title="Twitter" target="_blank" class="twitter">Twitter</a>
				</li>

				<li>
					<a href="http://facebook.com/daGrevis" title="Facebook" target="_blank" class="facebook">Facebook</a>
				</li>

				<li>
					<a href="http://last.fm/user/daGrevis" title="Last.fm" target="_blank" class="last_fm">Last.fm</a>
				</li>

				<li>
					<a href="http://reddit.com/user/daGrevis/" title="Reddit" target="_blank" class="reddit">Reddit</a>
				</li>

				<li>
					<a href="http://stackoverflow.com/users/458610/dagrevis" title="StackOverflow" target="_blank" class="stackoverflow">StackOverflow</a>
				</li>

				<li>
					<a href="https://github.com/daGrevis" title="GitHub" target="_blank" class="github">GitHub</a>
				</li>

				<li>
					<a href="http://linkedin.com/in/dagrevis" title="LinkedIn" target="_blank" class="linkedin">LinkedIn</a>
				</li>

			</ul>

			<header>

				<a href="<?php echo URL::site('') ?>">

					<div id="logo"></div>
					<h1>daGrevis.lv</h1>

				</a>

				<h2>&laquo;If programming was sex, there would be a lot of<br /> unsatisfied computers.&raquo; <span>/Nikos Maravitsas/</span></h2>

			</header>

			<div id="content">

				<?php echo $body ?>

				<?php /*

				<?php if (A1::signed_in()): ?>

					<div id="to_dashboard">

						<a href="<?php echo URL::dashboard() ?>">To Dashboard</a>

					</div>

				<?php endif ?>

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

		<div id="arrow"></div>

		<script src="<?php echo URL::script('load-3acd55a.min.js') ?>"></script>

		<script>

			load('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js').onError(function() {

				load('<?php echo URL::script('jquery-1.7.2.min.js') ?>');

			})
			.then('<?php echo URL::script('rainbow-1.1.8.min.js') ?>')
			.then('<?php echo URL::script('raphael-2.1.0.min.js') ?>')
			.then('<?php echo URL::script('common.js') ?>')

			<?php if (!empty($scripts)): ?>

				<?php foreach ($scripts as $script): ?>

					.then('<?php echo URL::script($script.'.js') ?>')

				<?php endforeach ?>

				;

			<?php else: ?>

			;

			<?php endif ?>

			<?php if (Kohana::is_production()): ?>

				load('<?php echo URL::script('google_analytics.js') ?>');

			<?php endif ?>

		</script>

		<?php if (Kohana::is_development()): ?>

			<?php echo ProfilerToolbar::render(); ?>

		<?php endif ?>

	</body>
</html>
