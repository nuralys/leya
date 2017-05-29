<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title_for_layout ?></title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta name="keyword" content="">
		<meta name="description" content="">
		<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
		<link href="/css/normalize.css" rel="stylesheet" type="text/css">
		<link href="/css/style.css" rel="stylesheet" type="text/css">
		<link href="/css/jquery.fullPage.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="/css/slide.min.css">
		<link href="/css/animate.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="/css/jquery.fancybox.css" type="text/css" media="screen" />
		<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="/js/icon.js" type="text/javascript"></script>
	</head>
	
	<body class="main second-page ">
	<div class="page">
		<header class="header">
			<div class="header-top-line">
				<div class="cr">
					<ul class="header-item header-item--lang">
						<li>
							<a href=""><img src="img/kz.jpg" alt=""></a>
						</li>
						<li>
							<a href=""><img src="img/ru.jpg" alt=""></a>
						</li>
						<li>
							<a href=""><img src="img/eng.jpg" alt=""></a>
						</li>
					</ul>
					<ul class="header-item soc-seti">
						<li>
							<a href="" class="face"></a>
						</li>
						<li>
							<a href="" class="twit"></a>
						</li>
						<li>
							<a href="" class="google"></a>
						</li>
						<li>
							<a href="" class="in"></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="header-fix">
				<div class="header-bottom-height"></div>
				<div class="header-bottom">
					<div class="cr">
						<a href="" class="header-logo">
							<img src="img/logo.png" alt="">
						</a>
						<div class="searach-container">
							<div class="searach-container__icon">
								<img src="img/search.png" alt="">
							</div>
							<div class="searach-container__input">
								<input type="text" placeholder="Поиск по сайту">
							</div>
						</div>
						<div class="menu-container">
						<ul class="menu">
							<li>
							<a >      о компании    </a>
							<div class="sub-menu-container">
								<ul class="sub-menu">
											<li>
												<a href="">МИССИЯ И СТРАТЕГИЯ</a>
											</li>
											<li>
												<a href="">СЛОВО ПЕРВОГО РУКОВОДИТЕЛЯ	</a>
											</li>
											<li>
												<a href="">РУКОВОДСТВО</a>
											</li>
											<li>
												<a href="">О КОМПАНИИ</a>
											</li>
											<li>
												<a href="/<?=$lang?>reviews">Отзывы</a>
											</li>
											<li>
												<a href="">Презентация и видео</a>
											</li>
										</ul>
									</div>
								</li>
								<li><a href="/<?=$lang?>projects">проекты  </a></li>
								<li><a href="/<?=$lang?>constructions">ход строительства </a></li>
								<li><a href="/<?=$lang?>news">новости и события</a></li>
								<li><a href="/<?=$lang?>vacancies">вакансии</a></li>
								<li><a href="/<?=$lang?>contacts">        КОНТАКТЫ</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>		
		</header> 
		<div class="container">
			<div class="cr">
			<div class="sibe-bar project-side-bar">
					<div class="sibe-bar__title">
						проекты
					</div>
					<ul class="sibe-bar-list">
						<li class="project"><a href="">Реализованные проекты</a></li>
						<li class="raspolozhenie"><a href="">На стадии реализации</a></li>
						<li class="planirovka"><a href="">Зарубежные проекты</a></li>
						<li class="gallery"> <a href="">Галерея</a></li>
						<li class="tehnologia"><a href="">Технологии</a></li>
						<li class="contact"><a href="">контакты</a></li>
						<li class="sravnit"><a href="">Сравнить</a></li>
					</ul>
				</div>
				<?php //debug($data); ?>
					<ul class="project-list">
					<?php foreach($data as $item): ?>
						<li>
							<div class="project-item">
								<img src="/img/projects/thumbs/<?php echo $item['Project']['img'] ?>">
								<div class="project-item__hover">
									<div class="project-item__hover-conatiner">
										<div class="project-item__hover--title">
											<?php echo $item['Project']['title'] ?>
										</div>
										<div class="project-item__hover--text">
											<p>Жилой комплекс и кратка информация о нём,
											в данный момент здесь
											находится “рыба-текст”...</p>
										</div>
										<a href="/<?=$lang?>projects/<?php echo $item['Project']['id'] ?>" class="project-item--button">
											Узнать подробнее
										</a>
									</div>
								</div>	
							</div>
						</li>
					<?php endforeach ?>
					</ul>
			</div>
		</div>
	</div>
		<footer class="footer">
			
		</footer>
		<script src="/js/jquery.js" type="text/javascript"></script>
		<script src="/js/jquery.fullPage.min.js"></script>

		<script>
			$(document).ready(function() {
				$('#fullpage').fullpage({
					anchors:['Main','Programm','Pre','Review','Contact'],
					menu:"#rightMenu",
					navigation: true,			    	
				});
			});
		</script>
		<script src="/js/jquery.fancybox.pack.js" type="text/javascript"></script>
		<script src="/js/app.js" type="text/javascript"></script>

	</body>
</html>