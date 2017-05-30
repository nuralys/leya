	<!DOCTYPE html>
	<html>
	<head>
		<title>Leya hodstr</title>
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
						<?php echo $this->element('header') ?>
						</div>
					</div>
				</div>
			</div>		
		</header> 
		<div class="container">
			<div class="cr">
				<div class="sibe-bar ">
					<div class="sibe-bar__title">
						проекты
					</div>
					<ul class="sibe-bar-list">
						<li class="project"><a href="">ЖК “ЗА РЕКОЙ”</a></li>
						<li class="project"><a href="">ЖК “ЗА РЕКОЙ” 2</a></li>
						<li class="project"><a href="">ЖК “ЗА РЕКОЙ” 3</a></li>
						
					</ul>
				</div>
				<div class="content-compani-container">
					<div class="content-compani-top">
						<div class="title">
							<?=$title_for_layout;?>
						</div>
						<div class="raspolozhenie-text">
							<?php echo $data['Construction']['body'] ?>
						</div>	
						<?php //debug($data);die; ?>
						<div class="storitelsto-news">
							<div class="storitelsto-news__title">
								Последние новости
							</div>
							<div class="storitelsto-news__slider">
							<?php foreach($data['Article'] as $item): ?>
								<div class="storitelsto-news__slider--item">
									<div class="storitelsto-news__slider--item--date">
											<?php echo $this->Time->format($item['date'], '%d.%m.%Y', 'invalid'); ?>
									</div>
									<?php echo $item['body']; ?>
								</div>	
								<?php endforeach ?>
							</div>	
						</div>
						<div class="title">
							Фото отчет
						</div>
						<div class="tab-container" id="tab-year">
							<ul class="tab-container-nav">
								<li><a href="#year2016">2016</a></li>
								<li><a href="#year2017">2017</a></li>
							</ul>
							<div class="year-tabs-item" id="year2016">
								<div id="tab-month">
								<ul class="tab-month-menu-nav">
									<li>
										<a href="#m1">
											Январь
										</a>
									</li>
									<li>
										<a href="#m2">
											Февраль
										</a>
									</li>
									<li>
										<a href="#m3">
											Март
										</a>
									</li>
									<li>
										<a href="#m4">
											Апрель
										</a>
									</li>
									<li>
										<a href="#m5">
											Май
										</a>
									</li>
									<li>
										<a href="#m6">
											Июнь
										</a>
									</li>
									<li>
										<a href="#m7">
											Июль
										</a>
									</li>
									<li>
										<a href="#m8">
											Август
										</a>
									</li>
									<li>
										<a href="#m9">
											Сентябрь
										</a>
									</li>
									<li>
										<a href="#m10">
											Октябрь
										</a>
									</li>
									<li>
										<a href="#m11">
											Ноябрь
										</a>
									</li>
									<li>
										<a href="#m12">
											Декабрь
										</a>
									</li>
								</ul>
									<div class="tab-month__item" id="m1">
										<ul class="foto-otchet">
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/foto-otchet.jpg">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
														12.01.2016
													</div>
													<p>
														Были проведены подготовительные работы по монтажу....
													</p>
													</div>
												</div>	
											</li>
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/foto-otchet.jpg">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
														12.01.2016
													</div>
													<p>
														Были проведены подготовительные работы по монтажу....
													</p>
													</div>
												</div>	
											</li>
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/foto-otchet.jpg">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
														12.01.2016
													</div>
													<p>
														Были проведены подготовительные работы по монтажу....
													</p>
													</div>
												</div>	
											</li>
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/foto-otchet.jpg">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
														12.01.2016
													</div>
													<p>
														Были проведены подготовительные работы по монтажу....
													</p>
													</div>
												</div>	
											</li>
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/foto-otchet.jpg">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
														12.01.2016
													</div>
													<p>
														Были проведены подготовительные работы по монтажу....
													</p>
													</div>
												</div>	
											</li>
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/foto-otchet.jpg">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
														12.01.2016
													</div>
													<p>
														Были проведены подготовительные работы по монтажу....
													</p>
													</div>
												</div>	
											</li>
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/foto-otchet.jpg">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
														12.01.2016
													</div>
													<p>
														Были проведены подготовительные работы по монтажу....
													</p>
													</div>
												</div>	
											</li>
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/foto-otchet.jpg">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
														12.01.2016
													</div>
													<p>
														Были проведены подготовительные работы по монтажу....
													</p>
													</div>
												</div>	
											</li>
										</ul>
									</div>
									<div class="tab-month__item" id="m2">
									<ul class="foto-otchet">
										<li>
											<div class="foto-otchet-item">
												<div class="foto-otchet-item__img">
													<img src="/img/foto-otchet.jpg">
												</div>
												<div class="foto-otchet-item__bottom">
												<div class="foto-otchet-item__date">
													12.01.2016
												</div>
												<p>
													Были проведены подготовительные работы по монтажу....
												</p>
												</div>
											</div>	
										</li>
										<li>
											<div class="foto-otchet-item">
												<div class="foto-otchet-item__img">
													<img src="/img/foto-otchet.jpg">
												</div>
												<div class="foto-otchet-item__bottom">
												<div class="foto-otchet-item__date">
													12.01.2016
												</div>
												<p>
													Были проведены подготовительные работы по монтажу....
												</p>
												</div>
											</div>	
										</li>
										<li>
											<div class="foto-otchet-item">
												<div class="foto-otchet-item__img">
													<img src="/img/foto-otchet.jpg">
												</div>
												<div class="foto-otchet-item__bottom">
												<div class="foto-otchet-item__date">
													12.01.2016
												</div>
												<p>
													Были проведены подготовительные работы по монтажу....
												</p>
												</div>
											</div>	
										</li>
										<li>
											<div class="foto-otchet-item">
												<div class="foto-otchet-item__img">
													<img src="/img/foto-otchet.jpg">
												</div>
												<div class="foto-otchet-item__bottom">
												<div class="foto-otchet-item__date">
													12.01.2016
												</div>
												<p>
													Были проведены подготовительные работы по монтажу....
												</p>
												</div>
											</div>	
										</li>
										<li>
											<div class="foto-otchet-item">
												<div class="foto-otchet-item__img">
													<img src="/img/foto-otchet.jpg">
												</div>
												<div class="foto-otchet-item__bottom">
												<div class="foto-otchet-item__date">
													12.01.2016
												</div>
												<p>
													Были проведены подготовительные работы по монтажу....
												</p>
												</div>
											</div>	
										</li>
										<li>
											<div class="foto-otchet-item">
												<div class="foto-otchet-item__img">
													<img src="/img/foto-otchet.jpg">
												</div>
												<div class="foto-otchet-item__bottom">
												<div class="foto-otchet-item__date">
													12.01.2016
												</div>
												<p>
													Были проведены подготовительные работы по монтажу....
												</p>
												</div>
											</div>	
										</li>
										<li>
											<div class="foto-otchet-item">
												<div class="foto-otchet-item__img">
													<img src="/img/foto-otchet.jpg">
												</div>
												<div class="foto-otchet-item__bottom">
												<div class="foto-otchet-item__date">
													12.01.2016
												</div>
												<p>
													Были проведены подготовительные работы по монтажу....
												</p>
												</div>
											</div>	
										</li>
										<li>
											<div class="foto-otchet-item">
												<div class="foto-otchet-item__img">
													<img src="/img/foto-otchet.jpg">
												</div>
												<div class="foto-otchet-item__bottom">
												<div class="foto-otchet-item__date">
													12.01.2016
												</div>
												<p>
													Были проведены подготовительные работы по монтажу....
												</p>
												</div>
											</div>	
										</li>
									</ul>
									</div>
									<div class="tab-month__item" id="m3">
									3
									</div>
									<div class="tab-month__item" id="m4">
									4
									</div>
									<div class="tab-month__item" id="m5">
									5
									</div>
									<div class="tab-month__item" id="m6">
									6
									</div>
									<div class="tab-month__item" id="m7">
									7
									</div>
									<div class="tab-month__item" id="m8">
									8
									</div>
									<div class="tab-month__item" id="m9">
									9
									</div>
									<div class="tab-month__item" id="m10">
									10
									</div>
									<div class="tab-month__item" id="m11">
									11
									</div>
									<div class="tab-month__item" id="m12">
									12
									</div>
								</div>
							</div>
							<div class="year-tabs-item" id="year2017">
								asdasdas2
							</div>
						</div>

						<div class="title">
							Онлайн трансляция
						</div>
						<div class="online-trans">
						<img src="/img/online.jpg">
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
		<footer class="footer">
			
		</footer>
		<script src="/js/jquery.js" type="text/javascript"></script>
		<script src="/js/jquery.fullPage.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
			$(document).ready(function() {
				$('#fullpage').fullpage({
					anchors:['Main','Programm','Pre','Review','Contact'],
					menu:"#rightMenu",
					navigation: true,			    	
				});
			});
		</script>
		<script>
  	$( function() {
    	$( "#tab-year" ).tabs();
    	$( "#tab-month" ).tabs();
    });
  </script>
		<script src="/js/jquery.fancybox.pack.js" type="text/javascript"></script>
		<script src="/js/app.js" type="text/javascript"></script>

	</body>
	</html>