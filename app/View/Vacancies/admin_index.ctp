<a href="/admin/vacancies/add">Добавить вакансию</a>
<!--на русском</a> | <a href="/admin/vacancies/add?lang=kz">Добавить на казахском</a>-->
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
	<a href="/admin/vacancies/edit/<?=$item['Vacancy']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/vacancies/edit/<?=$item['Vacancy']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/vacancies/edit/<?=$item['Vacancy']['id']?>?lang=en"> eng</a></td>
	 <td>
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Vacancy']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
