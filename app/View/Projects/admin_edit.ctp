<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование новости</h2>
	</div>
<?php
echo $this->Form->create('Project', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));?>

<?

echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('location', array('label' => 'Месторасположение:'));
if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'){
	echo $this->Form->input('map', array('label' => 'Карта:'));
}
echo $this->Form->input('technologies', array('label' => 'Технологии:'));
?>
<?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
<?php 
echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
?>
<?php endif ?>
<div class="edit_bot">
	<div class="bot_r">
	<?
	
	echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
	echo $this->Form->input('description', array('label' => 'Описание:'));
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>