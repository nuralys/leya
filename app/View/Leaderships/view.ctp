<div class="content-top">	
	<a class="back-link" href="/<?=$lang?>leaderships">
		Возврат к списку
	</a>
	<div class="min-title">
		<?php echo $data['Leadership']['title'] ?>
	</div>
	<div class="min-title">
		<img src="/img/leaderships/thumbs/<?php echo $data['Leadership']['img'] ?>">
	</div>
</div>
<div class="content-middle">
	<?php echo $data['Leadership']['body'] ?>
</div>