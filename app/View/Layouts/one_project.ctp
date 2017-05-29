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
		<link href="/css/style2.css" rel="stylesheet" type="text/css">
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
								<a href="">о компании    </a>
							</li>
							<li><a href="">проекты  </a></li>
							<li><a href="">ход строительства </a></li>
							<li><a href="">новости и события</a></li>
							<li><a href="">вакансии</a></li>
							<li><a href="">вакансии</a></li>
						</ul>
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
						<li class="project"><a href="">О проекте</a></li>
						<li class="raspolozhenie"><a href="">Расположение</a></li>
						<li class="planirovka"><a href="">Планировка</a></li>
						<li class="gallery"> <a href="">Галерея</a></li>
						<li class="tehnologia"><a href="">Технологии</a></li>
						<li class="contact"><a href="">контакты</a></li>
						<li class="sravnit"><a href="">Сравнить</a></li>
					</ul>
				</div>
				<div class="content-compani-container">
					<ul class="blocks">
						<li>
							<a class="b-link b-link--active" href="#">Блок А</a>
						</li>
						<li>
							<a class="b-link" href="#">Блок Б</a>
						</li>
					</ul>
					<div id="tabs">
						<ul class="floor-ul">
						<?php for($floor = 1; $floor <= $data['Project']['floor']; $floor++): ?>
							<li class="floor">
								<a class="floor__circle" href="#floor<?=$floor?>"><?=$floor?></a>
								<span class="floor__text">Этаж</span>
							</li>
							<?php endfor?>
						</ul>
						<?php for($floor = 1; $floor <= $data['Project']['floor']; $floor++): ?>
						<div id="floor<?=$floor?>" class="floor-part">
							<div class="tabs3">
							<div class="floor-part__left">
								<div class="p-container">
									<span class="p-container__heading">Планировка этажа:</span>
									<div class="plan-item">
										<?php foreach($data['Plan'] as $item): ?>
											<?php if($item['plan_of_floor'] == 1 && $item['floor'] == $floor): ?>
												<img src="/img/plans/thumbs/<?=$item['img']?>">
											<?php endif ?>
										<?php endforeach ?>
									</div>
								</div>
								<div class="p-container">
									<span class="p-container__heading">Количество комнат:</span>
									<div class="com-ul">
									<?php $count_rooms = array(); ?>
									<?php foreach ($data['Plan'] as $item): ?>
										<?php if($item['floor'] == $floor && $item['rooms'] != 0): ?>
											<?php
											array_push($count_rooms, $item['rooms']);
											$uniqa = array_unique($count_rooms);
											?>
									<?php endif ?>
									<?php endforeach ?>
									<?php foreach($uniqa as $item): ?>
										<div class="com-item">
											<div class="com-item__info kom<?=$item?>"><?=$item?></div>
										</div>
									<?php endforeach ?>
									</div>
								</div>
								<div class="p-container p-photos">
									<ul class="p-ul">
										<?php foreach($data['Plan'] as $item): ?>
											<?php if($item['plan_of_floor']==0 && $item['floor'] == $floor): ?>
											<li class="plan-<?=$item['rooms']?>">
												<a href="#plan<?=$item['id']?>">
													<img src="/img/plans/thumbs/<?=$item['img']?>">
													<span><?=$item['square']?> м²</span>
												</a>
											</li>
											<?php endif ?>
										<?php endforeach ?>
									</ul>
								</div>													
							</div>
							<div class="floor-part__plan floor-part__plan--active">
								<div class="big-plan">
									<div>
									<?php foreach($data['Plan'] as $item): ?>
											<?php if($item['plan_of_floor']==1 && $item['floor'] == $floor): ?>
												<img src="/img/plans/<?=$item['img']?>">
											<?php endif ?>
										<?php endforeach ?>
									</div>
									<div class="bot-plan">
										<a class="link link--back" href="#">
											Назад в меню
										</a>
										<a class="link link--download" href="#">
											Скачать план
										</a>
										<a class="link link--print" href="#">
											Распечатать
										</a>
										<a class="link link--compare" href="#">
											Сравнить
										</a>																
									</div>											
								</div>
							</div>	
								<div class="floor-part__right">
									<?php foreach($data['Plan'] as $item): ?>
										<?php if($item['plan_of_floor']==0 && $item['floor']==$floor): ?>
											<div id="plan<?=$item['id']?>" class="big-plan">
												<span>План 1</span>
												<div><img src="/img/plans/<?=$item['img']?>"></div>
												<div class="bot-plan">
													<a class="link link--back" href="#">Назад в меню</a>
													<a class="link link--download" href="#">Скачать план</a>
													<a class="link link--print" href="#">Распечатать</a>
													<a class="link link--compare" href="#">Сравнить</a>					
												</div>											
											</div>
										<?php endif ?>
									<?php endforeach ?>						
								</div>
							</div>
						</div>
<?php endfor ?>
						<!-- -->				
					</div>
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