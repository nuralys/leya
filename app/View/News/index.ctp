<div class="content-title">
	<?=__('Новости и события')?>
</div>
<?php foreach($new_array as $key => $value): ?>
<ul class="news-list">
	<li>
		<div class="year">
			<?=$key ?>
		</div>
	</li>
	<?php foreach($value as $item): ?>
	<li>
		<div class="news-item">
			<a href="/<?=$lang?>news/view/<?=$item['News']['id']?>" class="news-item__title">
				<?=$item['News']['title']?>
				 <div class="date-news"><?php echo $this->Time->format($item['News']['date'], '%d', 'invalid'); ?><br>
				 <?php switch ($this->Time->format($item['News']['date'], '%m', 'invalid')) {
				 	case '01': echo 'янв'; break;
				 	case '02': echo 'фев'; break;
				 	case '03': echo 'мар'; break;
				 	case '04': echo 'апр'; break;
				 	case '05': echo 'май'; break;
				 	case '06': echo 'июн'; break;
				 	case '07': echo 'июл'; break;
				 	case '08': echo 'авг'; break;
				 	case '09': echo 'сен'; break;
				 	case '10': echo 'окт'; break;
				 	case '11': echo 'ноя'; break;
				 	case '12': echo 'дек'; break;
				 	default:
				 		# code...
				 		break;
				 } ?>
				</div>
			</a>
			<p><?= $this->Text->truncate(strip_tags($item['News']['body']), 222, array('ellipsis' => '...', 'exact' => true)) ?></p>
		</div>
	</li>
<?php endforeach ?>

	
</ul>


<?php endforeach ?>