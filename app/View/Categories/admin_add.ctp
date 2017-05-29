<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление категории</h2>
	</div>
<?php 
echo $this->Form->create('Category', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->end('Создать');
?>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>