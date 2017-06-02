<a href="/admin/advantages/add">Добавить</a><br>
<table>
<th>ID</th><th>Название</th><th>Проект</th><th>Действия</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td><?= $item['Advantage']['id']; ?></td>
	<td>
		<?= $item['Advantage']['title']; ?>
	</td>
	
	<td>
	
		<?= $item['Project']['title']; ?>
	
	 </td>
	 <td><a href="/admin/advantages/edit/<?=$item['Advantage']['id']?>?lang=ru">Редактировать</a> |
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Advantage']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
