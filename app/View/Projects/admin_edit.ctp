<?php  if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>

<ul>
<li><a href="/admin/blocks/list/<?=$this->request->params['pass'][0]?>">Список блоков</a></li>
<li><a href="/admin/blocks/add/<?=$this->request->params['pass'][0]?>">Добавить блок</a></li>
	<li><a href="/admin/plans/list/<?=$this->request->params['pass'][0]?>">Список планировок</a></li>
	<li><a href="/admin/plans/add/<?=$this->request->params['pass'][0]?>">Добавить планировоку</a></li>
</ul>

<?php endif ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование проекта</h2>
	</div>
<?php
echo $this->Form->create('Project', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));?>

<?

echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('location', array('label' => 'Месторасположение:'));
if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'){
	echo $this->Form->input('map', array('label' => 'Карта:'));
}
echo $this->Form->input('technologies', array('label' => 'Технологии:'));
?>
<?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
<?php 
echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
echo $this->Form->input('address', array('label' => 'Адрес:'));
echo $this->Form->input('klass', array('label' => 'Класс:'));
echo $this->Form->input('naruzhnaya_otdelka', array('label' => 'Наружная отделка:'));
echo $this->Form->input('karkas', array('label' => 'Каркас:'));
echo $this->Form->input('okna', array('label' => 'Окна:'));
echo $this->Form->input('inzhenernye_seti', array('label' => 'Инженерные сети:'));
?>
<?php endif ?>
<div class="edit_bot">
	<div class="bot_r">
	<?
	
	echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
	echo $this->Form->input('description', array('label' => 'Описание:'));
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>