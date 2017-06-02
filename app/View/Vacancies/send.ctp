<div class="vakanci-form-content">
	<a class="back-link" href="/<?=$lang?>vacancies">
		Возврат к списку
	</a>
	<div class="min-title">
		Слесарь по ремонту подвижного состава
	</div>
</div>
	<form>
	<div class="form-item">
		<label for="">
		Вакансия</label>
		<select name="data[Resume][vacancy]">
			<option>
				Выберите вакансию
			</option>
			<?php foreach($data as $item): ?>
				<option value="<?=$item['Vacancy']['id']?>">
					<?= $item['Vacancy']['title'] ." - ". $item['Vacancy']['position']; ?>
				</option>
			<?php endforeach ?>
			
		</select>
	</div>	
	<div class="form-item">
		<label for="">
		ФИО</label>
		<input type="text" placeholder="" name="data[Resume][fio]">
	</div>
	<div class="form-item">
		<label for="">
		Телефон</label>
		<input type="text" placeholder="" name="data[Resume][phone]">
	</div>
	<div class="form-item">
		<label for="">
		E-mail</label>
		<input type="text" placeholder="" name="data[Resume][email]">
	</div>
	<div class="form-item">
		<label for="">
		Прикрепит файл</label>
		<input type="file" placeholder="" name="data[Resume][file]">
	</div>
<div class="content-bottom">
	<button class="button-resume" type="submit">Отправить резюме</button>
	</div>
	</form>