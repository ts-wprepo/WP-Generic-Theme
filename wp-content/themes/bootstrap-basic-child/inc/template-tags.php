<?php
/**
 * Custom template tags for this theme
 * 
 */

if (!function_exists('bootstrapBasicFullPageSearchForm')) {
	/**
	 * Display full page search form
	 * 
	 * @return string the search form element
	 */
	function bootstrapBasicFullPageSearchForm() 
	{
		$output = '<form role="search" method="get" class="search-form form" action="' . esc_url(home_url('/')) . '">';
			$output .= '<div class="input-group">';
				$output .= '<input type="search" id="form-search-input" class="form-control" placeholder="' . esc_attr_x('To search, type and hit enter&hellip;', 'placeholder', 'bootstrap-basic') . '" value="' . esc_attr(get_search_query()) . '" name="s" title="' . esc_attr_x('Search &hellip;', 'label', 'bootstrap-basic') . '"/>';
				$output .= '<span class="input-group-btn"><button type="submit" class="btn btn-default">' . __('Search', 'bootstrap-basic') . '</button></span>';
			$output .= '</div>';
		$output .= '</form>';

		return $output;
	}// bootstrapBasicFullPageSearchForm
}