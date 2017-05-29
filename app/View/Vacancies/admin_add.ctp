<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление вакансии</h2>
	</div>
<?php 
echo $this->Form->create('Vacancy', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Наименование отдела:'));
echo $this->Form->input('position', array('label' => 'Наименование должности:'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>