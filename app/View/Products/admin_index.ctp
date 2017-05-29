<a href="/admin/products/add">Добавить материал</a><br>
<table>
<th>Название</th><th>Редактировать</th><th>Удаление</th>
	<?php foreach ($data as $item) : ?>
	<tr>
		<td><?php  foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?></td> 
		<td><a href="/admin/products/edit/<?=$item['Product']['id']?>?lang=ru"> рус</a> | 
		<a href="/admin/products/edit/<?=$item['Product']['id']?>?lang=en"> eng</a></td>
		<td><?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Product']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>
	</tr>
	<?php endforeach; ?>
</table>