<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление плана</h2>
	</div>
<?php 
// debug($data);
// die;
echo $this->Form->create('Plan', array('type' => 'file'));
?>
<div class="input select">
<label for="PlanProjectId">Проекты:</label>
	<select required name="data[Plan][project_id]" id="PlanProjectId">
		<option value="">Выберите проект</option>
		<?php foreach($projects as $key => $value): ?>
			<option value="<?=$key?>"><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('floor', array('label' => 'Этаж:'));
echo $this->Form->input('rooms', array('label' => 'Комнатность:'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('square', array('label' => 'м²:'));
?>
<div class="input select">
<label for="PlanProjectId">Вид плана:</label>
	<select required name="data[Plan][project_id]" id="PlanProjectId">
		<option value="1">План этажа</option>
		<option value="0">План квартиры</option>
	</select>
</div>
<?
echo $this->Form->end('Создать');
?>
</div>