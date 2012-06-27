<h2>
	<a href="<?php echo URL::dashboard() ?>">Dashboard</a>
</h2>

<p>Ja tu esi piedzēries — labāk te neko neraksti! ;D</p>

<h3>Blog</h3>

<ul>
	<li><a href="<?php echo URL::dashboard('blog') ?>">List</a></li>
	<li><a href="<?php echo URL::dashboard('blog/article') ?>">Article</a></li>
</ul>

<h3>Finman</h3>

<ul>
	<li><a href="<?php echo URL::dashboard('finman') ?>">List fo items</a></li>
	<li><a href="<?php echo URL::dashboard('finman/add_item') ?>">Add item</a></li>
	<li><a href="<?php echo URL::dashboard('finman/add_category') ?>">Add category</a></li>
</ul>

<br />
<p><a href="<?php echo URL::dashboard('sign_out') ?>">Sign out</a></p>
