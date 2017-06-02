<div class="content-title">
	<?=__('Отзывы')?>
	<a href="#modal1" class="add-review">
		<?=__('Оставить отзыв')?>
	</a>
</div>	
<ul class="reviews-list">
	<?php foreach($data as $item): ?>
	<li>
		<div class="reviews-item">
			<div class="reviews-item__top">
				<div class="reviews-date">
				<?php echo $this->Time->format($item['Review']['created'], '%d.%m.%Y', 'invalid'); ?>
				</div>
				<?php echo $item['Review']['body'] ?>
			</div>
			<div class="reviews-item__bottom">
				
				<div class="reviews-info-chel">
					<div class="reviews-name">	
					<?php echo $item['Review']['name'] ?>
					</div>
					<div class="reviews-prof"><?php echo $item['Review']['position'] ?></div>
				</div>
			</div>
		</div>
	</li>
<?php endforeach ?>
</ul>