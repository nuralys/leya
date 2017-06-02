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
			</div>		
		</header> 
		<div class="container">
			<div class="cr">
				<div class="sibe-bar ">
					<div class="sibe-bar__title">
						<?=__('Проекты')?>
					</div>
					<ul class="sibe-bar-list">
					<?php foreach($list as $key => $value): ?>
						<li class="project"><a href="/<?=$lang?>constructions/view/<?=$key?>"><?php echo $value ?></a></li>
					<?php endforeach ?>
						
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
						<?php if(!empty($data['Article'])):?>
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
					<?php endif ?>
						<div class="title">
							Фото отчет
						</div>

						<div class="tab-container" >
							<ul class="tab-container-nav">
							<?php $years = array(); ?>
							<?php
							//Собираем все года какие есть и оставляем уникальные
								foreach($data['Report'] as $item){
							
									array_push($years, $this->Time->format($item['date'], '%Y', 'invalid'));
									$uniqa = array_unique($years);
								}
							?>
							<!-- Вывожу года -->
							<?php foreach($uniqa as $item => $value): ?>
								<li <?php if($item == 0) echo  'class="active"'; ?>><?php echo $value; ?></li>
							<?php endforeach ?>
							</ul>

							<?php foreach($uniqa as $item => $year): ?>
							<div class="year-tabs-item  <?php if($item == 0) echo  'active'; ?>">
								<div class="tab-month">
								<ul class="tab-month-menu-nav">
									<?php foreach($months as $key => $month_value): ?>
									<li <?php if($key == 1) echo  'class="active"'; ?>>
										
											<?=$month_value?>
									
									</li>
									<?php endforeach ?>
									
								</ul>
										<?php $ar = array(); ?>
								<?php foreach($data['Report'] as $item1): ?>
									<?php if($this->Time->format($item1['date'], '%Y', 'invalid') == $year): ?>
									<?php //debug($item1) ?>
										<?php $month = date("n", strtotime($item1['date'])); ?>
										<?php foreach($months as $key => $value): ?>

									<div class="tab-month__item <?php if(empty($ar)) echo  'active'; ?>" >
									<?php
									//добавляем в массив значения, тем самым делаем его не пустым, чтобы добавить active первому элементу
									$ar = array('1'=>'1'); 
									?>
										<ul class="foto-otchet">
										<?php foreach($data['Report'] as $report): ?>
											<?php if($key == date("n", strtotime($report['date'])) && $this->Time->format($report['date'], '%Y', 'invalid') == $year): ?>
											<li>
												<div class="foto-otchet-item">
													<div class="foto-otchet-item__img">
														<img src="/img/reports/thumbs/<?=$report['img']?>">
													</div>
													<div class="foto-otchet-item__bottom">
													<div class="foto-otchet-item__date">
													<?php echo $this->Time->format($report['date'], '%d.%m.%Y', 'invalid'); ?>
													</div>
													<p><?=$report['body']?></p>
													</div>
												</div>	
											</li>
										<?php endif ?>
										<?php endforeach ?>
										</ul>
									</div> 
									<!-- условие месяца--><?php //endif ?>
								<!-- Цикл месяца--><?php endforeach ?>
								<?php endif ?>
								<?php endforeach ?>
									
								</div>
							</div>
							<?php endforeach ?>
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

		
	
		<script src="/js/jquery.fancybox.pack.js" type="text/javascript"></script>
		<script src="/js/app.js" type="text/javascript"></script>
		<script src="/js/tab.js" type="text/javascript"></script>

	</body>
	</html>