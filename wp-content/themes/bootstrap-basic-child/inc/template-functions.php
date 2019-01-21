<?php
/**
 * Template functions
 * for functions to work with template example: get main column size, calculate or check things, ...
 * 
 */


if (!function_exists('bootstrapBasicGetMainColumnSize')) {
	function bootstrapBasicGetMainColumnSize() 
	{
		global $bootstrapbasic_sidebar_left_size, $bootstrapbasic_sidebar_right_size; // column value from functions.php
		if (!is_numeric($bootstrapbasic_sidebar_left_size)) {
			$bootstrapbasic_sidebar_left_size = 3; //default value
		}
		if (!is_numeric($bootstrapbasic_sidebar_right_size)) {
			$bootstrapbasic_sidebar_right_size = 3; // default value
		}

		$full_column_size = apply_filters('bootstrap_basic_full_column_size', 12);
		if (!is_numeric($full_column_size)) {
			$full_column_size = 12; // default value
		}

		if (is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
			$main_column_size = ($full_column_size - $bootstrapbasic_sidebar_left_size - $bootstrapbasic_sidebar_right_size);
		} elseif (is_active_sidebar('sidebar-left') && !is_active_sidebar('sidebar-right')) {
			$main_column_size = ($full_column_size - $bootstrapbasic_sidebar_left_size);
		} elseif (!is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
			$main_column_size = ($full_column_size - $bootstrapbasic_sidebar_right_size);
		} else {
			$main_column_size = $full_column_size;
		}
		if (!is_numeric($main_column_size) || !$main_column_size) {
			$main_column_size = 12;
		}
		return $main_column_size;
	}// bootstrapBasicGetMainColumnSize
}
