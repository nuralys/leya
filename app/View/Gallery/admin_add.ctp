<div class="admin_add gall_add">
	<div class="ad_up">
		<h2>Добавление материала</h2>
	</div>
<?php 
echo $this->Form->create('Gallery', array('type' => 'file'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
?>
<div class="input select">
<label for="GalleryProjectId">Проекты:</label>
	<select required name="data[Gallery][project_id]" id="GalleryProjectId">
		<option value="">Выберите проект</option>
		<?php foreach($projects as $key => $value): ?>
			<option value="<?=$key?>"><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->end('Создать');
?>

</div>