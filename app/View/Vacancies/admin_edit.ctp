<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование вакансии</h2>
	</div>
<?php
echo $this->Form->create('Vacancy', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Наименование отдела:'));
echo $this->Form->input('position', array('label' => 'Наименование должности:'));
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