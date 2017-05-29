<div class="cr ov">
	<div class="ov">
		<div class="h-heading">
					<h1><?=$post['News']['title'] ?></h1>
			</div>			
		<div class="news-content">
		<?php if(!empty($post['News']['img'])): ?>
			<img src="/img/news/<?=$post['News']['img']?>" width="450x";>
		<?php endif ?>
			<?=$post['News']['body'] ?>
		</div>				
	</div>
</div>