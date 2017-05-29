<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление отзыва</h2>
	</div>
<?php 
echo $this->Form->create('Review', array('type' => 'file'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('name', array('label' => 'ФИО:'));
echo $this->Form->input('position', array('label' => 'Должность:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>