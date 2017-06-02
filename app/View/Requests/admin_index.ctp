<!--на русском</a> | <a href="/admin/news/add?lang=kz">Добавить на казахском</a>-->
<br>
<table>
<th>ID</th><th>Проект</th><th>Имя</th><th>Телефон</th><th>E-mail</th><th>Текст</th><th>Действия</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td><?= $item['Request']['id']; ?></td>
	<td><?= $item['Request']['project']; ?></td>
	<td>
		<?= $item['Request']['fio']; ?>
	</td>
	<td><?= $item['Request']['phone']; ?></td>
	<td><?= $item['Request']['email']; ?></td>
	<td><?= $item['Request']['body']; ?></td>
	 <td>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Request']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
