<a href="/admin/constructions/add">Добавить материал</a>
<!-- <a href="/admin/articles">Новости</a> -->
<!--на русском</a> | <a href="/admin/constructions/add?lang=kz">Добавить на казахском</a>-->
<br>
<table>
<th>Название</th><th>Редактировать</th><th>Удаление</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td>
	<?=$item['Construction']['name']?>
	</td>
	<td>
	<a href="/admin/constructions/edit/<?=$item['Construction']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/constructions/edit/<?=$item['Construction']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/constructions/edit/<?=$item['Construction']['id']?>?lang=en"> eng</a></td>
	 <td>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Construction']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
