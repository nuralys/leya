<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование отзыва</h2>
	</div>
<?php
echo $this->Form->create('Review', array('type' => 'file'));
echo $this->Form->input('name', array('label' => 'ФИО:'));
echo $this->Form->input('position', array('label' => 'Должность:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('active', array('label' => 'Опубликовано:', 'type' => 'checkbox'));
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