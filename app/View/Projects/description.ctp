<div class="content-compani-top">
	<div class="title">
		<?=__('О комплексе')?>
	</div>
	<?php echo $data['Project']['body'] ?>
</div>
<div class="content-compani-bottom">
	<div class="title title-pre">
		<?=__('Преимущества')?>
	</div>
	<ul class="pre-icon-list">
	<?php foreach($data['Advantage'] as $item): ?>
		<li>
			<div class="pre-item">
				<div class="pre-item__img">
				<img src="/img/advantages/thumbs/<?=$item['img']?>">
				</div>
				<div class="pre-item__title">
					<?=$item['title']?>
				</div>
				<p>
				<?=$item['body']?></p>
			</div>
		</li>
		<?php endforeach ?>
	</ul>
</div>