<?php 

/* STYLES 
========================================== */
function theme_styles() {  
  
  wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );  
  
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

//function login_styles() {
//  wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/style-admin.css' );  
//}
//add_action('login_header', 'login_styles');

// custom login for theme
function admin_style() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/style-admin.css" />';
}
 
add_action('login_head', 'admin_style');

/* SCRIPTS 
========================================== */
function theme_js() {  
  global $wp_scripts;   
  
  wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
  wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );
  
  $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
  $wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );
  
  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );


/* MENUS 
========================================== */
add_theme_support( 'menus' );

// Register Custom Navigation Walker
require_once('inc/wp_bootstrap_navwalker.php');

/* SIDEBARS 
========================================== */
function create_widget($name, $id, $description) {
    register_sidebar(array(
      'name'          =>  __( $name ),
      'id'            =>  $id,
      'description'   =>  __( $description ),
      'before_widget' =>  '<div class="widget">',
      'after_widget' =>  '</div>',
      'before_title' =>  '<h3>',
      'after_title' =>  '</h3>',
      
    ));
}
create_widget( 'Front Page Left', 'front-left', 'Displays on left column of the homepage.' );
create_widget( 'Front Page Center', 'front-center', 'Displays on center column of the homepage.' );
create_widget( 'Front Page Right', 'front-right', 'Displays on right column of the homepage.' );

/* THUMBNAILS 
========================================== */
add_theme_support( 'post-thumbnails' );


/* MEMBERS
========================================== */
// Restrict users from accessing dashboard, a la http://pento.net/2011/06/19/preventing-users-from-accessing-wp-admin/
add_action( 'init', 'blockusers_init' );
	function blockusers_init() {
		if ( is_admin() && ! current_user_can( 'administrator' ) && ! current_user_can('booking-agent') &&	! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
	wp_redirect( home_url() );
	exit;
	}
}


//function wpse66093_no_admin_access()
//{
//    $redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : home_url( '/' );
//    if ( 
//        current_user_can( 'booking-member' )
//        //OR current_user_can( 'booking-member' )
//    )
//        exit( wp_redirect( $redirect ) );
//}
//add_action( 'admin_init', 'wpse66093_no_admin_access', 100 );



// Add logout link to custom menu - http://premium.wpmudev.org/blog/how-to-add-a-loginlogout-link-to-your-wordpress-menu/
//add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
//function add_login_logout_link($items, $args) {
//        ob_start();
//        wp_loginout('index.php');
//        $loginoutlink = ob_get_contents();
//        ob_end_clean();
//        $items .= '<li class="menu-item-logout">'. $loginoutlink .'</li>';
//    return $items;
//}


/* Login Page
========================================== */
// Logo links to bloginfo('url') and anchor title set.
function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'My Tahoe Retreat';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// Remove the Lost Password link.
function remove_lostpassword_text ( $text ) {
if ($text == 'Lost your password?'){$text = '';}
return $text;
}
add_filter( 'gettext', 'remove_lostpassword_text' );

// Remove login error message(s)
//add_filter('login_errors',create_function('$a', "return null;"));









?>