<div class="prezent-content-container">
	<ul class="breadcrumbs">
		<li><a href="/<?=$lang?>"><?=('Главная')?></a></li>
		<li> <?=('Презентация проектов')?></li>
	</ul>
	<div class="title">
		Презентации проектов
	</div>	
	<ul class="prezent-video">
	<?php foreach($data as $item): ?>
		<li> 
			<div class="prezent-card">
				<div class="prezent-card__img-box">
					<img src="/img/presentations/thumbs/<?=$item['Presentation']['img']?>">
				</div>
				<div class="prezent-card__bottom">
					<div class="prezent-card__name">
						<?=$item['Presentation']['title']?>
					</div>	
					<?php if(!empty($item['Presentation']['mypdf'])): ?>
					<a href="/files/presentations/<?=$item['Presentation']['mypdf']?>" target="_blank" class="button-second">
					посмотреть</a>
				<?php endif ?>
				</div>
			</div>	
		</li>
		<?php endforeach ?>
	</ul>
</div>  

<div class="prezent-content-container">
	<div class="title">
		Видео проектов
	</div>	
	<ul class="prezent-video">
	<?php foreach($data as $item): ?>
		<li> 
			<div class="prezent-card">
				<div class="prezent-card__img-box">
					<img src="/img/presentations/thumbs/<?=$item['Presentation']['img']?>">
				</div>
				<div class="prezent-card__bottom">
					<div class="prezent-card__name">
						<?=$item['Presentation']['title']?>
					</div>	
					<?php if(!empty($item['Presentation']['mypdf'])): ?>
					<a href="/files/presentations/<?=$item['Presentation']['mypdf']?>" target="_blank" class="button-second">
					посмотреть</a>
				<?php endif ?>
				</div>
			</div>	
		</li>
		<?php endforeach ?>
	</ul>
</div>  
