<?php if ($items): ?>

	<table>

		<tr>
			<th></th>
			<th>Title</th>
			<th>Price</th>
			<th>Category</th>
		</tr>

		<? foreach ($items as $item): ?>

			<tr>
				<td>
					#<?= $item->id ?>
				</td>
				<td class="title">
					<?= HTML::chars(Text::limit_chars($item->title, 40, '...')) ?>
				</td>
				<td>
					<?= Num::format($item->price / 100, 2) ?> Ls
				</td>
				<td>
					<?= $item->category ?>
				</td>
			</tr>
			
		<?php endforeach ?>

	</table>

<?php else: ?>

	No items

<?php endif ?>

<ul>
	<li><a href="<?= URL::dashboard('finman/add_item') ?>">Add item</a></li>
	<li><a href="<?= URL::dashboard('finman/add_category') ?>">Add category</a></li>
</ul>