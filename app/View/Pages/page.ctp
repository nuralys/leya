<div class="cr ov">
	<div class="ov">
		<div class="h-heading">
			<h1 class="h-heading__text"><?=$title_for_layout?></h1>
		</div>
		
		<div class="content about_content">
			<?=$page['Page']['body'] ?>

		<?php if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == 'about'): ?>
		<div class="h-center-heading">
						<h4 class="h-center-heading__text">Организационная структура</h4>
					</div>
					<div class="structure">
						<div class="structure-row structure-row--center">
							<div class="structure-row__item">
								<div class="structure-inner">
									Fergus DMCC<br> (г. Дубай, ОАЭ)
								</div>
							</div>
							<div class="structure-row__item">
								<div class="structure-inner structure-inner--with-bot structure-inner--with-lineone">
									Fergus Kazakhstan<br> Головной офис в Астане
								</div>
							</div>
						</div>
						<div class="structure-row structure-row--right">
							<div class="structure-row__item">
									<div class="structure-inner structure-inner--with-top structure-inner--with-bot">
										Экспортный<br> отдел
									</div>	
							</div>
							<div class="structure-row__item">
								<div class="structure-inner structure-inner--with-top">
									Юридический<br> отдел
								</div>	
							</div>
							<div class="structure-row__item">
								<div class="structure-inner structure-inner--with-top">
									Финансовый<br> отдел
								</div>	
							</div>
						</div>
						<div class="structure-row structure-row--left">
							<div class="structure-row__item">
									<div class="structure-inner structure-inner--with-top structure-inner--with-linetwo">
										Офис Акмолинского<br> региона
									</div>	
							</div>
							<div class="structure-row__item">
								<div class="structure-inner structure-inner--with-top">
									Офис Костанайского<br> региона
								</div>	
							</div>
							<div class="structure-row__item">
								<div class="structure-inner structure-inner--with-top">
									Северо-Казахстанского<br> региона
								</div>	
							</div>
						</div>	
		<?php endif ?>
		</div>				
	</div>
</div>