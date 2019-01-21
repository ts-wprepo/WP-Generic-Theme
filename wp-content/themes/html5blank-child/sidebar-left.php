<?php
/**
 * The left sidebar.
 * 
 */

global $sidebar_left_size; // column value from functions.php
if ($sidebar_left_size == null || !is_numeric($sidebar_left_size)) {
	$sidebar_left_size = 3; // default value
}

if (is_active_sidebar('sidebar-left')) { ?> 
	<div id="sidebar-left" class="col-md-<?php echo $sidebar_left_size; ?> sidebar">
		<?php dynamic_sidebar('sidebar-left'); ?> 
	</div>
<?php } ?>