<?php //debug($data); ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование материала</h2>
	</div>
<?php 

echo $this->Form->create('Article', array('type' => 'file'));
?>
<div class="input select">
<label for="ArticleConstructionId">Проект:</label>
	<select required name="data[Article][construction_id]" id="ArticleConstructionId">
		<option value="">Выберите проект</option>
		<?php foreach($constructions as $key => $value): ?>
			<option value="<?=$key?>" <?= ($data['Article']['construction_id'] == $key)? 'selected' : '' ?>><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
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