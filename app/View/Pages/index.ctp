<div class="about-mini">
	<figure class="about-mini__figure">
			<img src="img/about.png" alt="пшеница" title="пшеница">	
	</figure>
	<div class="about-text">
		<div class="h-heading">
			<h4 class="h-heading__text">О компании</h4>
		</div>
		<p class="about-text__p">
			<?= $this->Text->truncate(strip_tags($main['Page']['body']), 470, array('ellipsis' => '...', 'exact' => true)) ?>
		</p>
		<a class="btn" href="/<?=$lang?>page/about">Подробнее</a>
	</div>	
</div>
<div class="production-main">
		<div class="h-center-heading">
			<h4 class="h-center-heading__text">Наша продукция</h4>
		</div>
		<ul class="production-list">
			<li class="production-list__item wow zoomIn" data-wow-delay="0.25s">
				<a href="#">
					<figure class="production-image">
							<img src="img/zern_cultrure.jpg" class="production-image__img">
						</figure>
				</a>
				<div class="production-maintext">
					<a class="production-maintext__heading" href="#">
						Зерновые Культуры
					</a>
					<p>Зерновые культуры — важнейшая группа возделываемых растений, дающих зерно, основной продукт питания человека, сырьё для многих отраслей промышленности и корма для сельскохозяйственных животных.</p>
				</div>
			</li>
			<li class="production-list__item wow zoomIn" data-wow-delay="0.5s">
				<a href="#">
					<figure class="production-image">
						<img src="img/masl_cultrure.jpg" class="production-image__img">
					</figure>
				</a>
				<div class="production-maintext">
					<a class="production-maintext__heading" href="#">
						Масличные Культуры
					</a>
					<p>К масличным культурам относят растения, семена и плоды которых содержат жир (20...60 %) и являются сырьем для получения растительного масла, которое имеет большое пищевое и техническое значение.</p>
				</div>
			</li>
			<li class="production-list__item wow zoomIn" data-wow-delay="0.75s">
				<a href="#">
						<figure class="production-image">
							<img src="img/bob_cultrure.jpg" class="production-image__img">
						</figure>
				</a>
				<div class="production-maintext">
					<a class="production-maintext__heading" href="#">
						Бобовые Культуры
					</a>
					<p>Зерновые культуры — важнейшая группа возделываемых растений, дающих зерно, основной продукт питания человека, сырьё для многих отраслей промышленности и корма для сельскохозяйственных животных.</p>
				</div>
			</li>
		</ul>
</div>
<div class="partners">
	<div class="h-heading">
		<h4 class="h-heading__text">Наши партнеры</h4>
	</div>
	<div class="partners-slider">
		<?php foreach($partners as $item): ?>
		<div class="partner-slide">
		<?php if($item['Partner']['link']): ?>
			<a href="<?=$item['Partner']['link']?>">
		<?php endif ?>
			<img class="partner-slide__img" src="/img/partner/thumbs/<?=$item['Partner']['img']?>">
		<?php if($item['Partner']['link']): ?>
			</a>
		<?php endif ?>
		</div>
	<?php endforeach ?>
	</div>
</div>