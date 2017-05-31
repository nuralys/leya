<?php if($block_id != null): ?>
<ul class="blocks">
<?php foreach($blocks_list as $item): ?>
	<li>
	<!-- b-link--active -->
		<a class="b-link " href="/<?$lang?>plans/plan/<?=$this->request->params['pass'][0]?>/<?=$item['Block']['id']?>">Блок <?=$item['Block']['title']?></a>
	</li>
	<?php endforeach ?>
	<!-- <li>
		<a class="b-link" href="/<?$lang?>plans/plan/<?//=$this->request->params['pass'][0]?>/b">Блок Б</a>
	</li> -->
</ul>
<div id="tabs">
	<ul class="floor-ul">
	<?php $count_item = count($data);
	$count_plan = 0;
	// debug($data);
	// die;
	?> 
	<!-- Счетчик 1-->
	<?php //debug($data);die; ?>
	<?php if(!empty($data)): ?>
	<?php for($floor = 1; $floor <= $data[0]['Project']['floor']; $floor++): ?>
		<li class="floor">
			<a class="floor__circle" href="#floor<?=$floor?>"><?=$floor?></a>
			<span class="floor__text">Этаж</span>
		</li>
		<?php endfor?>
	</ul>
	<?php for($floor = 1; $floor <= $data[0]['Project']['floor']; $floor++): ?>
	<div id="floor<?=$floor?>" class="floor-part">
		<div class="tabs3">
		<div class="floor-part__left">
			<div class="p-container">
				<span class="p-container__heading">Планировка этажа:</span>
				<div class="plan-item">
				<?php //foreach($data as $item) ?>
				<?php //echo $data[$count_plan]['Plan']['img']; ?>
				<?php //debug($data[1]['Plan']);die; ?>
					<?php foreach($data as $item ): ?>
						<?php //debug($item);die; ?>
						<?php //debug($item); ?>
						<?php if($item['Plan']['plan_of_floor'] == 1 && $item['Plan']['floor'] == $floor): ?>
							<img src="/img/plans/thumbs/<?=$item['Plan']['img']?>">
						<?php endif ?>
						
					<?php endforeach ?>
					<?php $count_plan++; 
							//die;
					?>
				</div>
			</div>

			<div class="p-container">
				<span class="p-container__heading">Количество комнат:</span>
				<div class="com-ul">
				<?php $count_rooms = array(); ?>
				<?php foreach ($data as $item): ?>
					<?php if($item['Plan']['floor'] == $floor && $item['Plan']['rooms'] != 0): ?>
						<?php
						array_push($count_rooms, $item['Plan']['rooms']);
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
					<?php foreach($data as $item): ?>
						<?php if($item['Plan']['plan_of_floor']==0 && $item['Plan']['floor'] == $floor): ?>
						<li class="plan-<?=$item['Plan']['rooms']?>">
							<a href="#plan<?=$item['Plan']['id']?>">
								<img src="/img/plans/thumbs/<?=$item['Plan']['img']?>">
								<span><?=$item['Plan']['square']?> м²</span>
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
				<?php foreach($data as $item): ?>
						<?php if($item['Plan']['plan_of_floor']==1 && $item['Plan']['floor'] == $floor): ?>
							<?php $plan_dowload = $item['Plan']['img']; ?>
							<img src="/img/plans/<?=$item['Plan']['img']?>">
						<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class="bot-plan">
					<a class="link link--back" href="#">
						Назад в меню
					</a>
					<a class="link link--download" href="/img/plans/<?=$plan_dowload?>" download>
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
				<?php foreach($data as $item): ?>
					<?php if($item['Plan']['plan_of_floor']==0 && $item['Plan']['floor']==$floor): ?>
						<div id="plan<?=$item['Plan']['id']?>" class="big-plan">
							<span>План 1</span>
							<div><img src="/img/plans/<?=$item['Plan']['img']?>"></div>
							<div class="bot-plan">
								<a class="link link--back" href="#">Назад в меню</a>
								<a class="link link--download" href="/img/plans/<?=$item['Plan']['img']?>" download>Скачать план</a>
								<a class="link link--print" href="#">Распечатать</a>
								<a class="link link--compare" href="#">Сравнить</a>					
							</div>											
						</div>
					<?php endif ?>
				<?php endforeach ?>						
			</div>
		</div>
	</div>
	<!-- Счетчик 2 -->	
<?php endfor ?>
<?php endif ?>
<!-- Счетчик 1-->
<?php //endfor ?>

							
			</div>
		<?php else: ?>
			<div class="content-compani-top">
				<p >К сожалению информация по блокам еще не добавлена...</p>
			
			</div>
		<?php endif ?>
					