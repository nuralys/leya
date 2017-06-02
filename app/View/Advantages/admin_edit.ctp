<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование преимущества</h2>
	</div>
<?php 
	echo $this->Form->create('Advantage', array('type' => 'file'));
	echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('body', array('label' => 'Текст:'));
	echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
	?>
	<div class="input select">
<label for="AdvantageProjectId">Проекты:</label>
	<select required name="data[Advantage][project_id]" id="AdvantageProjectId">
		<option value="">Выберите категорию</option>
		<?php foreach($projects as $key => $value): ?>
			<option value="<?=$key?>" <?= ($data['Advantage']['project_id'] == $key)? 'selected' : '' ?>><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
	<?php
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
 ?>
</div>