<?php
function childThemeEnqueueScripts() {
   wp_enqueue_style('html5blank-child-style', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version') );
   wp_enqueue_style('fontawesome-style', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');

   /*wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/js/slick/slick.css');
   wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/js/slick/slick-theme.css');*/
   wp_enqueue_style('app-style', get_stylesheet_directory_uri() . '/css/app-style.css');

   /*wp_enqueue_script('slick-script', get_stylesheet_directory_uri() . '/js/slick/slick.min.js', array(), '1.9.0', true);*/
   wp_enqueue_script('child-main-script', get_stylesheet_directory_uri() . '/js/scripts.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'childThemeEnqueueScripts', 11);

if (!function_exists('customWidgetsInit')) {
   /**
    * Register widget areas
    */
   function customWidgetsInit() {
      register_sidebar(array(
         'name' => __('Sidebar right', 'bootstrap-basic'),
         'id' => 'sidebar-right',
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget' => '</aside>',
         'before_title' => '<h1 class="widget-title">',
         'after_title' => '</h1>',
      ));

      register_sidebar(array(
         'name' => __('Sidebar left', 'bootstrap-basic'),
         'id' => 'sidebar-left',
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget' => '</aside>',
         'before_title' => '<h1 class="widget-title">',
         'after_title' => '</h1>',
      ));

      register_sidebar(array(
         'name' => __('Header right', 'bootstrap-basic'),
         'id' => 'header-right',
         'description' => __('Header widget area on the right side next to site title.', 'bootstrap-basic'),
         'before_widget' => '<div id="%1$s" class="widget %2$s">',
         'after_widget' => '</div>',
         'before_title' => '<h1 class="widget-title">',
         'after_title' => '</h1>',
      ));

      register_sidebar(array(
         'name' => __('Footer left', 'bootstrap-basic'),
         'id' => 'footer-left',
         'before_widget' => '<div id="%1$s" class="widget %2$s">',
         'after_widget' => '</div>',
         'before_title' => '<h1 class="widget-title">',
         'after_title' => '</h1>',
      ));

      register_sidebar(array(
         'name' => __('Footer right', 'bootstrap-basic'),
         'id' => 'footer-right',
         'before_widget' => '<div id="%1$s" class="widget %2$s">',
         'after_widget' => '</div>',
         'before_title' => '<h1 class="widget-title">',
         'after_title' => '</h1>',
      ));
      
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

// remove HTML5 Blank Custom Post Type
function deregister_post_type(){
   unregister_post_type( 'html5-blank' );
}
add_action('init', 'deregister_post_type', 100);

/**
 *
 Sidebar column size configurations
 *
 */
// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
if (!isset($sidebar_left_size)) {
   $sidebar_left_size = apply_filters('sidebar_column_left', 3);
}
// Right sidebar column size.
if (!isset($sidebar_right_size)) {
   $sidebar_right_size = apply_filters('sidebar_column_right', 4);
}
/**
 * Template functions
 */
require get_stylesheet_directory() . '/inc/template-functions.php';

/* Theme Settings */
if( function_exists('acf_add_options_page') ) {
   acf_add_options_page(array(
      'page_title'    => 'General Settings',
      'menu_title'    => 'Site Settings',
      'menu_slug'     => 'theme-general-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
   ));
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
      $admin_logo = ($admin_login_logo != '') ? $admin_login_logo : get_stylesheet_directory_uri()."/img/admin-logo.png";
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
   $favicon = ($fav_icon != '') ? $fav_icon : get_stylesheet_directory_uri()."/img/favicon/favicon.ico"; 
   if($favicon != '') echo '<link rel="shortcut icon" type="image/png" sizes="32x32" href="'.$favicon.'"/><link rel="apple-touch-icon" sizes="180x180" href="'.get_stylesheet_directory_uri().'/img/favicon/apple-touch-icon.png">';
}

function all_year() {
   return date('Y');
}
add_shortcode('year', 'all_year');

/**
 * Post pagination
 */
if(!( function_exists('post_pagination') )){
   function post_pagination($pages = '', $range = 2){
      $showitems = ($range * 2)+1;

      global $paged;
      if(empty($paged)) $paged = 1;

      if($pages == ''){
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
            $pages = 1;
         }
      }

      $output = '';

      if(1 != $pages){

         $output .= '<nav class="pagination clearfix">';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output .= "<a href='".get_pagenum_link(1)."'><i class=\"fa fa-angle-left\"></i></a>";
         
         for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
               $output .= ($paged == $i)? "<span class=\"page-numbers current\">".$i."</span>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
            }
         }

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output .= "<a href='".get_pagenum_link($pages)."'><i class=\"fa fa-angle-right\"></i></a>";
         $output.= "</nav>";
      }

      return $output;
   }
}

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
   if(!is_front_page()){
      if(is_home()):
         $post_id = get_option( 'page_for_posts' );
      else:
         $post_id = $post->ID;
      endif;
      $header_default_img = get_field('page_header_default_image', 'options');
      $header_bg_color = get_field('page_header_background_color', 'options');
      $headers_overlay = get_field('page_headers_overlay', 'options');
      $use_default_header_img = get_field('use_default_header_image', $post_id);
      $page_header_image = get_field('page_header_image', $post_id);
      $header_style = '';
      if($use_default_header_img) {
         $header_img = $header_default_img;
      } else {
         $header_img = $page_header_image;
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
?>
