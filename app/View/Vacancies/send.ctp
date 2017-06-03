<div class="vakanci-form-content">
	<a class="back-link" href="/<?=$lang?>vacancies">
		<?=__('Возврат к списку')?>
	</a>
<!-- 	<div class="min-title">
		Слесарь по ремонту подвижного состава
	</div> -->
</div>
	<form action="/resumes/send" method="POST" enctype="multipart/form-data">
	<div class="form-item">
		<label for="">
		<?=__('Вакансия')?></label>
		<select name="data[Resume][vacancy]">
			<option>
				<?=__('Выберите вакансию')?>
			</option>
			<?php foreach($data as $item): ?>
				<option value="<?= $item['Vacancy']['title'] ." - ". $item['Vacancy']['position']; ?>" <?php if($item['Vacancy']['id'] == $id){echo 'selected';} ?>>
					<?= $item['Vacancy']['title'] ." - ". $item['Vacancy']['position']; ?>
				</option>
			<?php endforeach ?>
			
		</select>
	</div>	
	<div class="form-item">
		<label for="">
		<?=__('ФИО')?></label>
		<input type="text" placeholder="" name="data[Resume][fio]">
	</div>
	<div class="form-item">
		<label for="">
		<?=__('Телефон')?></label>
		<input type="text" placeholder="" name="data[Resume][phone]">
	</div>
	<div class="form-item">
		<label for="">
		E-mail</label>
		<input type="text" placeholder="" name="data[Resume][email]">
	</div>
	<div class="form-item">
		<label for="">
		<?=__('Прикрепите резюме')?></label>
		<input type="file" placeholder="" name="data[Resume][file]">
	</div>
<div class="content-bottom">
	<button class="button-resume" type="submit"><?=__('Отправить резюме')?></button>
	</div>
	</form>