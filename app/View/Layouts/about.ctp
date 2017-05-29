<!DOCTYPE html>
	<html>
	<head>
		<title>Lea</title>
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
							<a href=""><img src="/img/kz.jpg" alt=""></a>
						</li>
						<li>
							<a href=""><img src="/img/ru.jpg" alt=""></a>
						</li>
						<li>
							<a href=""><img src="/img/eng.jpg" alt=""></a>
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
							<img src="/img/logo.png" alt="">
						</a>
						<div class="searach-container">
							<div class="searach-container__icon">
								<img src="/img/search.png" alt="">
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
												<a href="">Отзывы</a>
											</li>
											<li>
												<a href="">Презентация и видео</a>
											</li>
										</ul>
									</div>
								</li>
								<li><a href="">проекты  </a></li>
								<li><a href="">ход строительства </a></li>
								<li><a href="">новости и события</a></li>
								<li><a href="">вакансии</a></li>
								<li><a href="">        КОНТАКТЫ</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>		
		</header> 
		<div class="container">
			<div class="big-cr-container">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
		<footer class="footer">
			
		</footer>
		<script src="/js/jquery.js" type="text/javascript"></script>
		<script src="/js/jquery.fullPage.min.js"></script>

		<script src="/js/jquery.fancybox.pack.js" type="text/javascript"></script>
		<script src="/js/app.js" type="text/javascript"></script>

	</body>
</html>