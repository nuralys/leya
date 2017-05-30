<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление презентации</h2>
	</div>
<?php 
echo $this->Form->create('Presentation', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('mypdf', array('label' => 'PDF файл:', 'type' => 'file'));
echo $this->Form->input('youtube', array('label' => 'Видео:'));
echo $this->Form->end('Создать');
?>
</div>