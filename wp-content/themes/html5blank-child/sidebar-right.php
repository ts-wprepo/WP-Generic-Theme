<?php
/**
 * The right sidebar.
 * 
 */

global $sidebar_right_size; // column value from functions.php
if ($sidebar_right_size == null || !is_numeric($sidebar_right_size)) {
	$sidebar_right_size = 3; // default value
}

if (is_active_sidebar('sidebar-right')) { ?>
	<div id="sidebar-right" class="col-md-<?php echo $sidebar_right_size; ?> sidebar">
		<?php dynamic_sidebar('sidebar-right'); ?> 
	</div>
<?php } ?>