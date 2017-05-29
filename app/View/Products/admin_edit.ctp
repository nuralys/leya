<?php //debug($data); ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование материала</h2>
	</div>
<?php 

echo $this->Form->create('Product', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));?>
<div class="input select">
<label for="ProductCategoryId">Категории:</label>
	<select required name="data[Product][category_id]" id="ProductCategoryId">
		<option value="">Выберите категорию</option>
		<?php foreach($categories as $key => $value): ?>
			<option value="<?=$key?>" <?= ($data['Product']['category_id'] == $key)? 'selected' : '' ?>><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
?>
<div class="edit_bot">
	<div class="bot_r">
	<?
	
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>