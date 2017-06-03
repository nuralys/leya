<table>
<th>ID</th><th>Наименование отдела/должности</th><th>Телефон</th><th>Email</th><th>Резюме</th><th>Действия</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td><?= $item['Resume']['id']; ?></td>
	<td>
		<?=$item['Resume']['vacancy']?>
	</td>
	
	<td><?= $item['Resume']['phone']; ?></td>
	<td><?= $item['Resume']['email']; ?></td>
	<td>
	<?php if(isset($item['Resume']['file']) && !empty($item['Resume']['file'])): ?>
	<a href="/files/resumes/<?= $item['Resume']['file']; ?>" download>скачать резюме</a>
<?php endif ?>
	</td>
	 <td>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Resume']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
