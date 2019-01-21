<?php
/**
 * The left sidebar.
 * 
 * @package bootstrap-basic
 */

global $bootstrapbasic_sidebar_left_size; // column value from functions.php
if ($bootstrapbasic_sidebar_left_size == null || !is_numeric($bootstrapbasic_sidebar_left_size)) {
	$bootstrapbasic_sidebar_left_size = 3; // default value
}

if (is_active_sidebar('sidebar-left')) { ?> 
	<div id="sidebar-left" class="col-md-<?php echo $bootstrapbasic_sidebar_left_size; ?>">
		<?php do_action('before_sidebar'); ?> 
		<?php dynamic_sidebar('sidebar-left'); ?> 
	</div>
<?php } ?>