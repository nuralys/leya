<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование категории</h2>
	</div>
<?php 
echo $this->Form->create('Category', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'):
	echo $this->Form->input('img', array('label' => 'Логотип:', 'type' => 'file'));
endif;
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
?>
	<div class="edit_bot">
		<div class="bot_r">
			<?php echo $this->Form->end('Редактировать'); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>