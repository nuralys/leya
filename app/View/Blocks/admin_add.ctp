<ul>
	<li><a href="/admin/blocks/list/<?=$this->request->params['pass'][0]?>">Список блоков</a></li>
	<li><a href="/admin/plans/list/<?=$this->request->params['pass'][0]?>">Список планировок</a></li>
	<li><a href="/admin/plans/add/<?=$this->request->params['pass'][0]?>">Добавить планировоку</a></li>
</ul>

<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление блока</h2>
	</div>
<?php 
echo $this->Form->create('Block');
echo $this->Form->input('title', array('label' => 'Название:'));
?>
<input type="hidden" name="data[Block][project_id]" id="BlockProjectId" value="<?=$this->request->params['pass'][0]?>">
<?
echo $this->Form->end('Создать');
?>
</div>