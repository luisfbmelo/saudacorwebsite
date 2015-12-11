<div class="container">
	<form action="<?php bloginfo('siteurl'); ?>" class="searchform" method="get">
		<fieldset class="row">
			<div class="col-xs-8 col-sm-9 text-field">
				<label for="s" class="screen-reader-text">Pesquisar por:</label>
	         	<input type="search" id="s" name="s" class="bottom-thin search-input" placeholder="Insira o seu texto..." required />
		     </div>
			<div class="col-xs-2 col-sm-2 col-xs-offset-2 col-sm-offset-1">
				<input type="submit" id="searchsubmit" alt="Search" value="Pesquisar" class="cta primary alignright" />
			</div>
		</fieldset>
	</form>
</div>
