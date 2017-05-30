<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление новости</h2>
	</div>
<?php 
echo $this->Form->create('Article', array('type' => 'file'));
?>
<div class="input select">
<label for="ArticleConstructionId">Проекты:</label>
	<select required name="data[Article][construction_id]" id="ArticleConstructionId">
		<option value="">Выберите дом</option>
		<?php foreach($constructions as $key => $value): ?>
			<option value="<?=$key?>"><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
<?
echo $this->Form->input('date', array('label' => 'Дата:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>