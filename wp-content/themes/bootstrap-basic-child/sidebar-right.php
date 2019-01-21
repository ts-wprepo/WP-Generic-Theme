<?php
/**
 * The right sidebar.
 * 
 * @package bootstrap-basic
 */

global $bootstrapbasic_sidebar_right_size; // column value from functions.php
if ($bootstrapbasic_sidebar_right_size == null || !is_numeric($bootstrapbasic_sidebar_right_size)) {
	$bootstrapbasic_sidebar_right_size = 3; // default value
}

if (is_active_sidebar('sidebar-right')) { ?>
	<div id="sidebar-right" class="col-md-<?php echo $bootstrapbasic_sidebar_right_size; ?>">
		<?php do_action('before_sidebar'); ?> 
		<?php dynamic_sidebar('sidebar-right'); ?> 
	</div>
<?php } ?>