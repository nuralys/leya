<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление проекта</h2>
	</div>
<?php 
echo $this->Form->create('Project', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('location', array('label' => 'Месторасположение:'));
echo $this->Form->input('map', array('label' => 'Карта:'));
echo $this->Form->input('technologies', array('label' => 'Технологии:'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Мета описание:'));
echo $this->Form->end('Создать');
?>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>