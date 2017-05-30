<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование презентации</h2>
	</div>
<?php
echo $this->Form->create('Presentation', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));?>
<?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
<?php 
// echo $this->Form->input('date', array('label' => 'Дата:'));
?>
<?php endif ?>
<?
echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
echo $this->Form->input('mypdf', array('label' => 'PDF файл:', 'type' => 'file'));
echo $this->Form->input('youtube', array('label' => 'Видео:'));
?>
<div class="edit_bot">
	<div class="bot_r">
	<?
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>
</div>