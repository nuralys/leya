<div class="content-compani-top">
	<div class="title">
		<?=__('Галерея')?>
	</div>
	<ul class="gallery-list">
		<?php foreach($data['Gallery'] as $item): ?>
			
		<li>
			<a href="/img/gallery/<?=$item['img']?>" class="fancybox gallery-item">
				<img src="/img/gallery/thumbs/<?=$item['img']?>">
			</a>	
		</li> 
		<?php endforeach ?>
		
	</ul>
</div>