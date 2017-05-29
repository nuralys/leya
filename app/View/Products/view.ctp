<div class="ov">
	<aside class="production-aside">
		<div class="production-aside__inner">
		<?php foreach($aside as $item): ?>
			<a class="aside-heading" href="/<?=$lang?>category/<?=$item['Category']['id']?>"><?=$item['Category']['title']?></a>
			<?php if($item['Product']): ?>
			<ul class="cultrure-list">
				<?php foreach($item['Product'] as $i): ?>
				<li class="cultrure-list__li">
				<?php //debug($i);				?>

					<a href="/<?=$lang?>product/<?=$i['id']?>"><?=$i['title']?></a>
				</li>	
				<?php endforeach ?>
			</ul>
			<?php endif ?>
		<?php endforeach ?>
		</div>
	</aside>
	<h1><?=$data['Product']['title']; ?></h1>
	<?=$data['Product']['body']; ?>
	<img src="/img/product/thumbs/<?=$data['Product']['img']?>">
	
</div>