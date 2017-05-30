<a href="/admin/plans/add">Добавить</a><br>
<table>
<th>ID</th><th>Проект</th><th>Блок</th><th>Комнатность</th><th>м²</th><th>Действия</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td><?= $item['Plan']['id']; ?></td>
	<td>
		<?=$item['Project']['title']?>
	</td>
	
	<td>
	
		<?= $item['Block']['title']; ?>
	
	 </td>
	 <td>
		<?= $item['Plan']['rooms']; ?>
	 </td>
	 <td>
		<?= $item['Plan']['square']; ?>
	 </td>
	 <td><a href="/admin/partners/edit/<?=$item['Plan']['id']?>?lang=ru">Редактировать</a> |
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Plan']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
