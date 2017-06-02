<ul class="menu">
<li>
<a href="/<?=$lang?>page/about">О компании</a>
<div class="sub-menu-container">
	<ul class="sub-menu">
		
		<li>
			<a href="/<?=$lang?>page/word-from-principle">Слово первого руководителя</a>
		</li>
		<li>
			<a href="/<?=$lang?>page/mission">Миссия и стратегия</a>
		</li>
		<li>
			<a href="/<?=$lang?>#">Приоритеты и ценности</a>
		</li>
		
		<li>
			<a href="/<?=$lang?>leaderships">Руководство</a>
		</li>
		<li>
			<a href="/<?=$lang?>presentations">Презентация и видео</a>
		</li>
		<li>
			<a href="/<?=$lang?>reviews">Отзывы</a>
		</li>
	</ul>
</div>
	</li>
	<li><a href="/<?=$lang?>projects">Проекты</a>
	<div class="sub-menu-container">
		<ul class="sub-menu">
			
			<li>
				<a href="/<?=$lang?>page/completed-projects">Реализованные</a>
			</li>
			<li>
				<a href="/projects?on_stage=1">На стадии релизации</a>
				<div class="sub-menu-child">
					<ul class="sub-menu-child-list">
						<?php foreach($projects_on_stage_menu as $item => $value): ?>
							<li><a href="/<?=$lang?>projects/description/<?=$item?>"><?=$value?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</li>
			<li>
				<a href="/projects?foreign_project=1">Зарубежные проекты</a>
				<div class="sub-menu-child">
					<ul class="sub-menu-child-list">
						<?php foreach($projects_foreign_menu as $item => $value): ?>
							<li><a href="/<?=$lang?>projects/description/<?=$item?>"><?=$value?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</li>
		</ul>
	</div>
	</li>
	<li><a href="/<?=$lang?>constructions">Ход строительства</a>
	<div class="sub-menu-container">
		<ul class="sub-menu">
		<?php foreach($constructions_menu as $item => $value): ?>
			<li><a href="/<?=$lang?>constructions/view/<?=$item?>"><?=$value?></a></li>
		<?php endforeach ?>
			
		</ul>
	</div>
	</li>
	<li><a href="/<?=$lang?>news">Новости и события</a></li>
	<li><a href="/<?=$lang?>vacancies">Вакансии</a>
	<div class="sub-menu-container">
		<ul class="sub-menu">
			<li>
				<a href="/<?=$lang?>page/working-with-us">Почему стоит работать у нас</a>
			</li>
			<li>
				<a href="/<?=$lang?>vacancies">Текущие вакансии </a>
			</li>
			<li>
				<a href="/<?=$lang?>">Оставить заявку</a>
			</li>
		</ul>
	</div>
	</li>
	<li><a href="/<?=$lang?>contacts">Контакты</a></li>
</ul>

