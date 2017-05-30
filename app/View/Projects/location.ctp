
<style>
       #map {
            width: 100%; height: 300px; padding: 0; margin: 0;
        }
    </style>

<div class="content-compani-top">
	<div class="title">
		<?=__('Расположение')?>
	</div>
	<div class="raspolozhenie-text">
		<p>
			<?=$data['Project']['location'] ?>
		</p>
	</div>	
	<div id="map">
	
	</div>
</div>