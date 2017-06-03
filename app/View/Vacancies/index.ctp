<div class="content-title">
	<?=__("Вакансии")?>
</div>
<div class="vacancy-content">
	<div class="vacancy-content__table">
		<table>
			<tr>
				<th>
					№	
				</th>
				<th>
					<?=__('Наименование отдела')?>
				</th>
				<th>
					<?=__('Наименование должности')?>
				</th>
				<th>
				</th>
			</tr>
			<?php $count=1; ?>
			<?php foreach($data as $item): ?>
			<tr>
				<td>
					<?=$count?>
				</td>
				<td>
					<?=$item['Vacancy']['title'] ?>
				</td>
				<td>
				<a href="/<?=$lang?>vacancies/view/<?=$item['Vacancy']['id'] ?>" class="add-resume"><?=$item['Vacancy']['position'] ?></a>
				</td>
				<td>
				<a href="/<?=$lang?>vacancies/send/<?=$item['Vacancy']['id'] ?>" class="add-resume"><?=__('Подать резюме')?></a>
				</td>
			</tr>
			<?php $count = $count+1; ?>
			<?php endforeach ?>
		</table>
	</div>
</div>