<a href="/admin/articles/add">Добавить новость</a>
<!--на русском</a> | <a href="/admin/articles/add?lang=kz">Добавить на казахском</a>-->
<br>
<table>
<th>Проекты</th><th>Дата</th><th>Редактировать</th><th>Удаление</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td>
<?php echo $item['Construction']['name'] ?>
	</td>
	<td><?php echo $this->Time->format($item['Article']['date'], '%d.%m.%Y', 'invalid'); ?></td>
	<td>
	<a href="/admin/articles/edit/<?=$item['Article']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/articles/edit/<?=$item['Article']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/articles/edit/<?=$item['Article']['id']?>?lang=en"> eng</a></td>
	 <td>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Article']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
