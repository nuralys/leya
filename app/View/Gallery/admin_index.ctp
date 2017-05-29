<a href="/admin/gallery/add">Добавить</a><br>
<table>
<th>ID</th><th>Изображение</th><th>Проект</th><th>Действия</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td><?= $item['Gallery']['id']; ?></td>
	<td>
		<img src="/img/gallery/thumbs/<?=$item['Gallery']['img']?>">
	</td>
	
	<td>
	
		<?= $item['Project']['title']; ?>
	
	 </td>
	 <td><a href="/admin/gallery/edit/<?=$item['Gallery']['id']?>?lang=ru">Редактировать</a> |
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Gallery']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
