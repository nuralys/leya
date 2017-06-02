<a href="/admin/reports/add">Добавить материал</a><br>
<table>
<th>Изображение</th><th>Проект</th><th>Редактировать</th><th>Удаление</th>
	<?php foreach ($data as $item) : ?>

	<tr>
	<td><img src="/img/reports/thumbs/<?=$item['Report']['img']?>"></td>
		<td><?=$item['Construction']['title']?></td> 
		<td><a href="/admin/reports/edit/<?=$item['Report']['id']?>?lang=ru"> рус</a> | 
		<a href="/admin/reports/edit/<?=$item['Report']['id']?>?lang=en"> eng</a></td>
		<td><?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Report']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>
	</tr>
	<?php endforeach; ?>
</table>