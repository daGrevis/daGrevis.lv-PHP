<h2>
	<a href="<?= URL::dashboard() ?>">Dashboard</a>
</h2>

<p>Ja tu esi piedzēries — labāk te neko neraksti! ;D</p>

<h3>Blog</h3>

<ul>
	<li><a href="<?php echo URL::dashboard('blog') ?>">List</a></li>
	<li><a href="<?php echo URL::dashboard('blog/article') ?>">Article</a></li>
</ul>

<a href="<?= URL::dashboard('sign_out') ?>">Sign out</a>