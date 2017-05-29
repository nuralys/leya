<div class="ov">
	<aside class="production-aside">
		<div class="production-aside__inner">
		<?php foreach($aside as $item): ?>
			<a class="aside-heading" href="/<?=$lang?>category/<?=$item['Category']['id']?>"><?=$item['Category']['title']?></a>
			<?php if(!empty($item['Product'])): ?>
			<ul class="cultrure-list">
				<?php foreach($item['Product'] as $i): ?>
				<li class="cultrure-list__li">
					<a href="/<?=$lang?>product/<?=$i['id'] ?>"><?=$i['title'] ?></a>
				</li>	
				<?php endforeach ?>
			</ul>
			<?php endif ?>
		<?php endforeach ?>
		</div>
	</aside>
	<div class="cultrure-part">
		<div class="h-heading">
				<h1 class="h-heading__text">Продукция</h1>
		</div>
		<ul class="culture-ul">
			<?php foreach($data as $item): ?>
			<li class="culture-ul__row">
				<figure class="row-figure">
						<img src="/img/category/thumbs/<?=$item['Category']['img']?>" >
				</figure>
				<div class="row-des">
					<a class="row-des__heading" href="#">
						<?=$item['Category']['title'] ?>
					</a>
					<p class="row-des__text"><?= $this->Text->truncate(strip_tags($item['Category']['body']), 193, array('ellipsis' => '...', 'exact' => true)) ?></p>
					<a class="btn" href="/category/<?=$item['Category']['id']?>">Подробнее</a>
				</div>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>
<div class="partners">
	<div class="h-heading">
		<h4 class="h-heading__text">Наши партнеры</h4>
	</div>
	<div class="partners-slider">
		<div class="partner-slide">
			<img class="partner-slide__img" src="img/partner1.jpg">
		</div>
		<div class="partner-slide">
			<img class="partner-slide__img" src="img/partner2.jpg">
		</div>
		<div class="partner-slide">
			<img class="partner-slide__img" src="img/partner3.jpg">
		</div>
		<div class="partner-slide">
			<img class="partner-slide__img" src="img/partner1.jpg">
		</div>
		<div class="partner-slide">
			<img class="partner-slide__img" src="img/partner2.jpg">
		</div>
		<div class="partner-slide">
			<img class="partner-slide__img" src="img/partner3.jpg">
		</div>
		<div class="partner-slide">
			<img class="partner-slide__img" src="img/partner1.jpg">
		</div>
	</div>
</div>