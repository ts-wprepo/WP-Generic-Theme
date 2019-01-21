<!-- search -->
<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
	<div class="input-group">
		<input class="search-input" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'html5blank' ); ?>" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>">
		<span class="input-group-btn">
			<button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'html5blank' ); ?></button>
		</span>
	</div>
</form>
<!-- /search -->
