<?php if ($items): ?>

	got items, yay

<?php else: ?>

	No items

<?php endif ?>

<ul>
	<li><a href="<?= URL::dashboard('finman/add_item') ?>">Add item</a></li>
	<li><a href="<?= URL::dashboard('finman/add_category') ?>">Add category</a></li>
</ul>