<?php if ($items): ?>

	<table>

		<tr>
			<th></th>
			<th>Title</th>
			<th>Price</th>
			<th>Category</th>
		</tr>

		<?php foreach ($items as $item): ?>

			<tr>
				<td>
					#<?php echo $item->id ?>
				</td>
				<td class="title">
					<?php echo HTML::chars(Text::limit_chars($item->title, 40, '...')) ?>
				</td>
				<td>
					<?php echo Num::format($item->price / 100, 2) ?> Ls
				</td>
				<td>
					<?php echo $item->category ?>
				</td>
			</tr>

		<?php endforeach ?>

	</table>

	<?php echo $pagination ?>

<?php else: ?>

	No items

<?php endif ?>

<ul>
	<li><a href="<?php echo URL::dashboard('finman/add_item') ?>">Add item</a></li>
	<li><a href="<?php echo URL::dashboard('finman/add_category') ?>">Add category</a></li>
</ul>
