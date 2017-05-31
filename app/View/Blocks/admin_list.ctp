<a href="/admin/blocks/add/<?=$this->request->params['pass'][0]?>">Добавить</a><br>
<table>
<th>ID</th><th>Проект</th><th>Блок</th><th>Действия</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td><?= $item['Block']['id']; ?></td>
	<td>
		<?=$item['Project']['title']?>
	</td>
	
	<td>
	
		<?= $item['Block']['title']; ?>
	
	 </td>
	
	 <td><a href="/admin/partners/edit/<?=$item['Block']['id']?>?lang=ru">Редактировать</a> |
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Block']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
