<?php
/**
 * Template functions
 * for functions to work with template example: get main column size, calculate or check things, ...
 * 
 */
if (!function_exists('getMainColumnSize')) {
	function getMainColumnSize() 
	{
		global $sidebar_left_size, $sidebar_right_size; // column value from functions.php
		if (!is_numeric($sidebar_left_size)) {
			$sidebar_left_size = 3; //default value
		}
		if (!is_numeric($sidebar_right_size)) {
			$sidebar_right_size = 3; // default value
		}

		$full_column_size = apply_filters('bootstrap_basic_full_column_size', 12);
		if (!is_numeric($full_column_size)) {
			$full_column_size = 12; // default value
		}

		if (is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
			$main_column_size = ($full_column_size - $sidebar_left_size - $sidebar_right_size);
		} elseif (is_active_sidebar('sidebar-left') && !is_active_sidebar('sidebar-right')) {
			$main_column_size = ($full_column_size - $sidebar_left_size);
		} elseif (!is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right')) {
			$main_column_size = ($full_column_size - $sidebar_right_size);
		} else {
			$main_column_size = $full_column_size;
		}
		if (!is_numeric($main_column_size) || !$main_column_size) {
			$main_column_size = 12;
		}
		return $main_column_size;
	}// getMainColumnSize
}

if (!function_exists('fullPageSearchForm')) {
	/**
	 * Display full page search form
	 * 
	 * @return string the search form element
	 */
	function fullPageSearchForm() 
	{
		$output = '<form role="search" method="get" class="search-form form" action="' . esc_url(home_url('/')) . '">';
			$output .= '<div class="input-group">';
				$output .= '<input type="search" id="form-search-input" class="form-control" placeholder="' . esc_attr_x('To search, type and hit enter&hellip;', 'placeholder', 'bootstrap-basic') . '" value="' . esc_attr(get_search_query()) . '" name="s" title="' . esc_attr_x('Search &hellip;', 'label', 'bootstrap-basic') . '"/>';
				$output .= '<span class="input-group-btn"><button type="submit" class="btn btn-default">' . __('Search', 'bootstrap-basic') . '</button></span>';
			$output .= '</div>';
		$output .= '</form>';

		return $output;
	}// fullPageSearchForm
}