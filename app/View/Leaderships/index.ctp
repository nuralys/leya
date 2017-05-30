<div class="content-title">
<?=__('Руководство')?>
</div>	
	<ul class="rukovodstvo-list">
	<?php foreach($data as $item): ?>
	<li>
		<div class="rukovodstvo-item">
			<div class="rukovodstvo-item__img">
				<img src="/img/leaderships/thumbs/<?=$item['Leadership']['img'] ?>">
			</div>	
			<div class="rukovodstvo-item__content">
				<div class="rukovodstvo-name">
					<?=$item['Leadership']['title'] ?>
				</div>
				<div class="rukovodstvo-dolzhnost">
					<?=$item['Leadership']['position'] ?>
				</div>	
				<p>
					<?= $this->Text->truncate(strip_tags($item['Leadership']['body']), 740, array('ellipsis' => '...', 'exact' => true)) ?>
				</p>
				<a href="/<?=$lang?>leaderships/view/<?=$item['Leadership']['id'] ?>" class="button-second">
				<?=__('Подробнее')?></a>
			</div>
		</div>	
	</li>
	<?php endforeach ?>
</ul>