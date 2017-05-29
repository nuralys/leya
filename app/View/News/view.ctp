<ul class="breadcrumbs">
	<li><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
	<li><a href="/<?=$lang?>news"><?=__('Новости')?></a></li>
	<li><?=$post['News']['title'] ?></li>
</ul>
<div class="title">
	<?=$post['News']['title'] ?>
</div>	
<div class="about-content">
	<div class="about-img">
	<?php if(!empty($post['News']['img'])): ?>
		<img src="/img/news/<?=$post['News']['img']?>" width="450x";>
		<?php endif ?>
	</div>
	<?=$post['News']['body'] ?>
</div>