<?php
/** 
* Functions file.
* 
*/
// Required WordPress variable
if (!isset($content_width)) {
 $content_width = 1140;// this will be override again in inc/classes/BootstrapBasic4.php `detectContentWidth()` method.
}

// Configurations
// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
if (!isset($bootstrapbasic4_sidebar_left_size)) {
	$bootstrapbasic4_sidebar_left_size = apply_filters('bootstrap_basic4_column_left', 3);
}
// Right sidebar column size.
if (!isset($bootstrapbasic4_sidebar_right_size)) {
	$bootstrapbasic4_sidebar_right_size = apply_filters('bootstrap_basic4_column_right', 4);
}
// Once you specified left and right column size, while widget was activated in all or some sidebar the main column size will be calculate automatically from these size and widgets activated.
// For example: you use only left sidebar (widgets activated) and left sidebar size is 4, the main column size will be 12 - 4 = 8.
// 
// Title separator. Please note that this value maybe able overriden by other plugins.
if (!isset($bootstrapbasic4_title_separator)) {
	$bootstrapbasic4_title_separator = '|';
}

// Require, include files - child theme
require get_stylesheet_directory() . '/inc/functions/include-functions.php';
require get_stylesheet_directory() . '/inc/classes/Bsb4Design.php';
require get_stylesheet_directory() . '/inc/classes/BootstrapBasic4WalkerNavMenu.php';

function remove_scripts() {
	$parent_style = 'bootstrap-basic4-wp-main';
	wp_dequeue_style( $parent_style );
	wp_deregister_style( $parent_style );

	/*remove fa v5*/
	wp_dequeue_style( 'bootstrap-basic4-font-awesome5' );
	wp_deregister_style( 'bootstrap-basic4-font-awesome5' );

	// wp_dequeue_script( 'site' );
	// wp_deregister_script( 'site' );
}
add_action( 'wp_enqueue_scripts', 'remove_scripts', 11 );

function childThemeEnqueueScripts() {
	$parent_style = 'bootstrap-basic4-style';

	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('bootstrap-basic4-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version') );

   wp_enqueue_style('fontawesome-style', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0');
	/*wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/js/slick/slick.css');
	wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/assets/js/slick/slick-theme.css');*/
	wp_enqueue_style('child-main-style', get_stylesheet_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style('app-style', get_stylesheet_directory_uri() . '/assets/css/app-style.css');

	/*wp_enqueue_script('slick-script', get_stylesheet_directory_uri() . '/assets/js/slick/slick.min.js', array(), '1.8.0', true);*/
	wp_enqueue_script('child-main-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'childThemeEnqueueScripts', 11);

if (!function_exists('customWidgetsInit')) {
	/**
	 * Register widget areas
	 */
	function customWidgetsInit() {
		register_sidebar( array (
			'name' => __( 'Footer-Top-1'),
			'id' => 'footer-top-1',
			'description' => __('Footer-Top-1'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		) );
		
		register_sidebar( array (
			'name' => __( 'Footer-Top-2'),
			'id' => 'footer-top-2',
			'description' => __('Footer-Top-2'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		) );

		register_sidebar( array (
			'name' => __( 'Footer-Top-3'),
			'id' => 'footer-top-3',
			'description' => __('Footer-Top-3'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		) );

		register_sidebar( array (
			'name' => __( 'Footer-Top-4'),
			'id' => 'footer-top-4',
			'description' => __('Footer-Top-4'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		) );
	}// customWidgetsInit

}
add_action('widgets_init', 'customWidgetsInit', 11);

/* Theme Settings */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'    => 'General Settings',
		'menu_title'    => 'Site Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
	/*acf_add_options_page(array(
		'page_title'    => 'Testimonials',
		'menu_title'    => 'Testimonials',
		'menu_slug'     => 'testimonials',
		'capability'    => 'edit_posts',
		'redirect'      => false,
		'position'      => 25,
		'icon_url'      => 'dashicons-format-quote'
	));*/
}

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* Update wp_admin Section */
add_action("login_head", "generic_login_head");
function generic_login_head() {
	if(!is_user_logged_in()){ 
		$admin_login_logo = get_field('admin_login_logo', 'option');
		$admin_logo_width = get_field('admin_logo_width', 'option');
		$admin_logo_height = get_field('admin_logo_height', 'option');
		$admin_background_color = get_field('admin_background_colour', 'option');
		$admin_form_background_color = get_field('admin_form_background_color', 'option');
		$admin_form_text_color = get_field('admin_form_text_color', 'option');
		$admin_logo = ($admin_login_logo != '') ? $admin_login_logo : get_stylesheet_directory_uri()."/assets/img/admin-logo.png";
		$admin_background_color = ($admin_background_color != '') ? $admin_background_color : "#fff";
		$admin_form_background_color = ($admin_form_background_color != '') ? $admin_form_background_color : "#fff";
		$admin_form_text_color = ($admin_form_text_color != '') ? $admin_form_text_color : "#72777c";
		echo "<style>
		body.login div#login h1 a {
			background-image: url('".$admin_logo."') !important;
			background-size: contain !important;
			background-position: center center;
			width: ".(!empty($admin_logo_width) ? $admin_logo_width.'px' : '280px')." !important;
			height: ".(!empty($admin_logo_height) ? $admin_logo_height.'px' : '80px')." !important;
		}
		html, body { background: ".$admin_background_color." !important; }
		.login form { background: ".$admin_form_background_color." !important; }
		.login label { color: ".$admin_form_text_color." !important; }
		.login .message, .login form { -webkit-box-shadow: 0 1px ".$admin_background_color." inset, 0 1px 3px rgba(34, 25, 25, 0.4); box-shadow: 0 1px ".$admin_background_color." inset, 0 1px 3px rgba(34, 25, 25, 0.4); }
		</style>";
	}
}
/* Update Favicon Section */
add_action( 'wp_head', 'favicon' );
add_action( 'admin_head', 'favicon' );
add_action( 'login_head', 'favicon' );
function favicon() {
	$fav_icon = get_field('favicon', 'option');
	$favicon = ($fav_icon != '') ? $fav_icon : get_stylesheet_directory_uri()."/assets/img/favicon/favicon.ico"; 
	if($favicon != '') echo '<link rel="shortcut icon" type="image/png" sizes="32x32" href="'.$favicon.'"/><link rel="apple-touch-icon" sizes="180x180" href="'.get_stylesheet_directory_uri().'/assets/img/favicon/apple-touch-icon.png">';
}

function all_year() {
	return date('Y');
}
add_shortcode('year', 'all_year');

function add_slug_to_body_class($classes) {
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
		if ($key > -1) {
			// unset($classes[$key]);
		}
	} elseif (is_page()) {
		$classes[] = sanitize_html_class($post->post_name);
	} elseif (is_singular()) {
		$classes[] = sanitize_html_class($post->post_name);
	}

	return $classes;
}
add_filter('body_class', 'add_slug_to_body_class');

function get_social_links($classes = '') {
	$links = '';
	if( have_rows('social_links', 'option') ):
		$links .= '<ul class="social-links '.$classes.'">';
		while( have_rows('social_links', 'option') ): the_row();
			$links .= '<li>';
				$links .= '<a href="'.get_sub_field('link').'" class="link"><span class="icon">'.get_sub_field('icon').'</span></a>';
			$links .= '</li>';
		endwhile;
		$links .= '</ul>';
	endif;
	return $links;
}
add_shortcode('do_social_links', 'get_social_links');

function get_top_header() {
	$enable_top_bar = get_field('enable_top_header', 'option');
	$top_bar = '';
	if($enable_top_bar) {
		$top_bar .= '<div class="top-header">';
			$top_bar .= '<div class="container flex-box align-middle">';
				$top_bar .= '<div class="info-bar top-bar-cell flex-grow-1">';
					$location = get_field('location', 'option');
					$email = get_field('email', 'option');
					$phone_number = get_field('phone_number', 'option');
					if(!empty($location)) {
						$top_bar .= '<span class="info--item"><span class="fa fa-map-marker"></span>&nbsp;<span class="txt">'.$location.'</span></span>';
					}
					if(!empty($email)) {
						$top_bar .= '<a class="info--item email" href="mailto:'.$email.'"><span class="fa fa-envelope-o"></span>&nbsp;<span class="txt">'.$email.'</span></a>';
					}
					if(!empty($phone_number)) {
						$top_bar .= '<a class="info--item phone" href="tel:'.preg_replace('/[^0-9]/', '', $phone_number).'"><span class="fa fa-phone"></span>&nbsp;<span class="txt">'.$phone_number.'</span></a>';
					}
				$top_bar .= '</div>';
				$top_bar .= '<div class="social top-bar-cell flex-grow-1 text-right">';
					$top_bar .= get_social_links();
				$top_bar .= '</div>';
			$top_bar .= '</div>';
		$top_bar .= '</div>';
	}
	return $top_bar;
}

/* breadcrumb */
if (!function_exists('get_breadcrumb')) {
	/*
	$delimiter
	# ;&#187;
	# |
	# -
	*/
	function get_breadcrumb($home_text = 'Home', $delimiter = '-') {
		$enable_breadcrumb = get_field('enable_breadcrumb', 'options');
		if(!$enable_breadcrumb) { return; }
		
		global $post;
		$breadcrumb = '<div class="breadcrumb">';
		if(is_front_page()){
			$breadcrumb .= esc_html('Front Page', 'excitor');
		}elseif(is_home()){
			$breadcrumb .= esc_html('Blog', 'excitor');
		}else{
			$breadcrumb .= '<a href="' . esc_url(home_url('/')) . '" rel="nofollow">' . $home_text . '</a> ' . $delimiter . ' ';
		}

		if(is_category()){
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) $breadcrumb .= get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
			$breadcrumb .= '<span class="current">' . single_cat_title(esc_html__('Archive by category: ', 'excitor'), false) . '</span>';
		}elseif ( is_tag() ) {
			$breadcrumb .= '<span class="current">' . single_tag_title(esc_html__('Posts tagged: ', 'excitor'), false) . '</span>';
		}elseif(is_tax()){
			$breadcrumb .= '<span class="current">' . single_term_title(esc_html__('Archive by taxonomy: ', 'excitor'), false) . '</span>';
		}elseif(is_search()){
			$breadcrumb .= '<span class="current">' . esc_html__('Search results for: ', 'excitor') . get_search_query() . '</span>';
		}elseif(is_day()){
			$breadcrumb .= '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
			$breadcrumb .= '<span class="current">' . get_the_time('d') . '</span>';
		}elseif(is_month()){
			$breadcrumb .= '<span class="current">' . get_the_time('F'). ' '. get_the_time('Y') . '</span>';
		}elseif(is_single() && !is_attachment()){
			if(get_post_type() != 'post'){
				if(get_post_type() == 'team'){
					$terms = get_the_terms(get_the_ID(), 'team_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'team_category', '' , ', ' );
						$breadcrumb .= ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						$breadcrumb .= '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'testimonial'){
					$terms = get_the_terms(get_the_ID(), 'testimonial_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'testimonial_category', '' , ', ' );
						$breadcrumb .= ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						$breadcrumb .= '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'services'){
					$terms = get_the_terms(get_the_ID(), 'services_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'services_category', '' , ', ' );
						$breadcrumb .= ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						$breadcrumb .= '<span class="current">' . get_the_title() . '</span>';
					}
				}else{
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					$breadcrumb .= '<a href="' . esc_url(home_url('/')) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					$breadcrumb .= ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}
			}else{
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				$breadcrumb .= ''.$cats;
				$breadcrumb .= '<span class="current">' . get_the_title() . '</span>';
			}
		}elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if($post_type) $breadcrumb .= '<span class="current">' . $post_type->labels->singular_name . '</span>';
		}elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$breadcrumb .= '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			$breadcrumb .= ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_page() && !is_front_page() && !$post->post_parent ) {
			$breadcrumb .= '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_page() && !is_front_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				$breadcrumb .= ''.$breadcrumbs[$i];
				if ($i != count($breadcrumbs) - 1)
					$breadcrumb .= ' ' . $delimiter . ' ';
			}
			$breadcrumb .= ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			$breadcrumb .= '<span class="current">' . esc_html__('Articles posted by ', 'excitor') . $userdata->display_name . '</span>';
		}elseif ( is_404() ) {
			$breadcrumb .= '<span class="current">' . esc_html__('Error 404', 'excitor') . '</span>';
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $breadcrumb .= ' (';
			$breadcrumb .= ' ' . $delimiter . ' ' . esc_html__('Page', 'excitor') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $breadcrumb .= ')';
		}

		$breadcrumb .= '</div>';
		return $breadcrumb;
	}
}

function get_banner(){
	global $post;
	$banner = '';
	if(!is_front_page()) {
		$enable_page_header = get_field('enable_page_header', 'options');
		if(empty($enable_page_header)) {
			return '';
		}
		if(is_home()):
			$post_id = get_option( 'page_for_posts' );
		else:
			$post_id = $post->ID;
		endif;
		$header_default_img = get_field('page_header_default_image', 'options');
		$header_bg_color = get_field('page_header_background_color', 'options');
		$headers_overlay = get_field('page_headers_overlay', 'options');
		$page_header_image = get_field('page_header_image', $post_id);
		$header_style = '';
		if(!empty($page_header_image)) {
			$header_img = $page_header_image;
		} else {
			$header_img = $header_default_img;
		}
		$header_style .= ' style="background-color: '.$header_bg_color.';';
		$header_style .= ( !empty( $header_img ) ? 'background-image: url('.$header_img.');background-position: '.$image_position.';' : '' );
		$header_style .= '"';

		$banner .= '<div class="page-header-bar'.($headers_overlay ? ' header-overlay': '').'"'.$header_style.'>';
			$banner .= '<div class="container">';
				$banner .= '<div class="heading-strip">';
					$banner .= '<h1 class="">';
						if(is_404()):
							$banner .= "Page not found";
						elseif(is_search()):
							$total_results = $wp_query->found_posts;
							$items = ( $total_results == '1' ) ? ' item.' : ' items.';
							$title = get_search_query() . ', ' . $total_results . $items;
							$banner .= $title;
						else:
							$banner .= get_the_title($post_id);
						endif;
					$banner .= '</h1>';
				$banner .= '</div>';
				$banner .= get_breadcrumb();
			$banner .= '</div>';
		$banner .= '</div>';
	} else {
		$slider_shortcode = get_field('slider_shortcode', 'option');
		$banner .= '<div class="slider-section">';
			$banner .= do_shortcode($slider_shortcode);
		$banner .= '</div>';
	}
	return  $banner;
}
add_shortcode('do_banner', 'get_banner');

/*testimonials*/
function get_testimonials() {
	$content = '';
	$slide_cnt = 1;
	if( have_rows('testimonials', 'options') ) {
		$content .= '<div id="testimonial-slider" class="slide-cnt-'.$slide_cnt.'">';
		while ( have_rows('testimonials', 'options') ) : the_row();
			$content .= '<div class="testimonial-item">';
				$content .= '<div class="t-content">'.get_sub_field('testimonial_content').'</div>';
				$content .= '<div class="t-user">'.get_sub_field('user_name').'</div>';
				$content .= '<div class="t-user-info">'.get_sub_field('user_info').'</div>';
			$content .= '</div>';
			$slide_cnt++;
		endwhile;
		$content .= '</div>';
	} else {
		$content .= '<p>No Testimonials...</p>';
	}
	return $content;
}
add_shortcode('do_testimonials', 'get_testimonials');