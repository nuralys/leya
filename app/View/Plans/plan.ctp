
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
							<?php $plan_dowload = $item['img']; ?>
							<img src="/img/plans/<?=$item['img']?>">
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
				<?php foreach($data['Plan'] as $item): ?>
					<?php if($item['plan_of_floor']==0 && $item['floor']==$floor): ?>
						<div id="plan<?=$item['id']?>" class="big-plan">
							<span>План 1</span>
							<div><img src="/img/plans/<?=$item['img']?>"></div>
							<div class="bot-plan">
								<a class="link link--back" href="#">Назад в меню</a>
								<a class="link link--download" href="/img/plans/<?=$item['img']?>" download>Скачать план</a>
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
					