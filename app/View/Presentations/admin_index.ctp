<a href="/admin/presentations/add">Добавить презентацию</a>
<!--на русском</a> | <a href="/admin/presentations/add?lang=kz">Добавить на казахском</a>-->
<br>
<table>
<th>Название</th><th>Редактировать</th><th>Удаление</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td>
	<?php  foreach($item['titleTranslation'] as $title): ?>
		<?= $title['locale'] .': '. $title['content']; ?><br>
	<?php endforeach; ?>
	</td>
	<td>
	<a href="/admin/presentations/edit/<?=$item['Presentation']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/presentations/edit/<?=$item['Presentation']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/presentations/edit/<?=$item['Presentation']['id']?>?lang=en"> eng</a></td>
	 <td>
<div class="presentations_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Presentation']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
