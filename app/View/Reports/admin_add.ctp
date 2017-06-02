<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление материала</h2>
	</div>
<?php 
echo $this->Form->create('Report', array('type' => 'file'));
?>
<div class="input select">
<label for="ReportConstructionId">Проект:</label>
	<select required name="data[Report][construction_id]" id="ReportConstructionId">
		<option value="">Выберите проект</option>
		<?php foreach($constructions as $key => $value): ?>
			<option value="<?=$key?>"><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('date', array('label' => 'Дата:'));
echo $this->Form->input('body', array('label' => 'Текст:'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->end('Создать');
?>
</div>