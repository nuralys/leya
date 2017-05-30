<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование материала</h2>
	</div>
<?php 
echo $this->Form->create('Leadership', array('type' => 'file'));
// echo $this->Form->input('date', array('label' => 'Дата:'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('position', array('label' => 'Ключевые слова:'));
echo $this->Form->input('id');
// echo $this->Form->input('description', array('label' => 'Описание:'));
echo $this->Form->end('Редактировать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>