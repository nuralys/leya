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
		<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
		<?php if($this->request->params['action']=='plan'): ?>
			<link href="/css/style2.css" rel="stylesheet" type="text/css">
		<?php endif ?>
		<script type="text/javascript"><?=$data['Project']['map']?></script>
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
			<div class="header-bottom">
				<div class="cr">
					<a href="/<?=$lang?>" class="header-logo">
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
						<?php echo $this->element('header') ?>
					</div>
				</div>
			</div>
		</header> 
		<div class="container">
			<div class="cr">
				<div class="sibe-bar">
					<div class="sibe-bar__title">
						Жилой Комплекс
						<span>лея -1</span>
					</div>
					
					<ul class="sibe-bar-list">
						<li class="project"><a href="/<?=$lang?>projects/description/<?=$this->request->params['pass'][0]?>">О проекте</a></li>
						<li class="raspolozhenie"><a href="/<?=$lang?>projects/location/<?=$this->request->params['pass'][0]?>">Расположение</a></li>
						<li class="planirovka"><a href="/<?=$lang?>projects/plan/<?=$this->request->params['pass'][0]?>">Планировка</a></li>
						<li class="gallery"> <a href="/<?=$lang?>projects//<?=$this->request->params['pass'][0]?>">Галерея</a></li>
						<li class="tehnologia"><a href="">Технологии</a></li>
						<li class="contact"><a href="">контакты</a></li>
						<li class="sravnit"><a href="">Сравнить</a></li>
					</ul>
				</div>
				<div class="content-compani-container">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">		
	</footer>
	<script src="/js/jquery.js" type="text/javascript"></script>
	<script src="/js/jquery.fullPage.min.js"></script>
	<script src="/js/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
  	$( function() {
    	$( "#tabs" ).tabs();
    	// $( "#tabs2" ).tabs();
    	$( ".tabs3" ).tabs();
    });
  </script>
  <script src="/js/sain.js"></script>  
	<script src="/js/app.js"></script>
	<script>
		$(document).ready(function() {
			$('#fullpage').fullpage({
				anchors:['Main','Programm','Pre','Review','Contact'],
				menu:"#rightMenu",
				navigation: true,			    	
			});
		});
	</script>

</body>
</html>