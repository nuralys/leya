<div class="sibe-bar project-side-bar">
	<div class="sibe-bar__title">
		<?=__('Ход строительства')?>
	</div>
</div>
<div class="content-container ">
	<ul class="project-list">
		<?php foreach($data as $item): ?>
		<li>
			<div class="project-item">
				<img src="/img/constructions/thumbs/<?=$item['Construction']['img']?>">
				<div class="project-item__hover">
					<div class="project-item__hover-conatiner">
						<div class="project-item__hover--title">
							<?=$item['Construction']['title']?>
						</div>
						<div class="project-item__hover--text">
							<p>
							<?= $this->Text->truncate(strip_tags($item['Construction']['body']), 90, array('ellipsis' => '...', 'exact' => true)) ?></p>
						</div>
						<a  href="/constructions/view/1" class="project-item--button">
							Узнать подробнее
						</a>
					</div>
				</div>	
			</div>
		</li>
	<?php endforeach ?>
	</ul>
</div>