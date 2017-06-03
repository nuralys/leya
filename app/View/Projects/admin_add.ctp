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
echo $this->Form->input('address', array('label' => 'Адрес:'));
echo $this->Form->input('klass', array('label' => 'Класс:'));
echo $this->Form->input('naruzhnaya_otdelka', array('label' => 'Наружная отделка:'));
echo $this->Form->input('karkas', array('label' => 'Каркас:'));
echo $this->Form->input('okna', array('label' => 'Окна:'));
echo $this->Form->input('inzhenernye_seti', array('label' => 'Инженерные сети:'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Мета описание:'));
echo $this->Form->end('Создать');
?>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>