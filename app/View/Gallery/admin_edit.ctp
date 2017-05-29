<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование изображения</h2>
	</div>
<?php 
	echo $this->Form->create('Gallery', array('type' => 'file'));
	
	echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
	?>
	<div class="input select">
<label for="GalleryProjectId">Проекты:</label>
	<select required name="data[Gallery][project_id]" id="GalleryProjectId">
		<option value="">Выберите категорию</option>
		<?php foreach($projects as $key => $value): ?>
			<option value="<?=$key?>" <?= ($data['Gallery']['project_id'] == $key)? 'selected' : '' ?>><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
	<?php
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
 ?>
</div>