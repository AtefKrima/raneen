<?php
/******************************************************************
@	Template Name: theme v.2.4
@	Theme URI: http://Raneen.com/
@	Description: Designed by atef  http://www.Raneen.com
@	Version:  2.4
@	Author:atef mohamed
/*******************************************************************/

require TEMPLATEPATH . '/framework/pagi.php';
require TEMPLATEPATH . '/framework/vid_thumb.php';
require TEMPLATEPATH . '/framework/videos.php';

    require_once TEMPLATEPATH . '/framework/Themater.php';
    $theme = new Themater('شبكات');
   
   
    if($theme->is_admin_user()) 
	{
        unset($theme->admin_options['Ads']);
    }
    $theme->load();

/**********************************/
    
    // CUSTOM ADMIN LOGIN HEADER LOGO
 
function my_custom_login_logo()
{
    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/screenshot.png)  !important; } </style>';
}
add_action('login_head',  'my_custom_login_logo');

// Admin footer modification
 
function remove_footer_admin ()
{
    echo '<span id="footer-thankyou">Developed by <a href="" target="_blank">2EGy</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*********************************
 define constants 
 ********************************/

define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES',THEMEROOT . '/images');
define('JS',THEMEROOT . '/js');
define('CSS',THEMEROOT . '/css');

/****************
 define Navbar
 ****************/
function register_my_menus() {
    register_nav_menus(
            array(
                
                'main-menu' => __( 'القائمة الرئيسية' ),
               
               
            )
     );
}

add_action('init', 'register_my_menus');


/****************
 define exert
 ****************/

////////////////


add_theme_support('post-thumbnails');

//thumbnails 
if (function_exists('add_image_size')) {

    add_image_size('F-block', 175, 98, true);
    add_image_size('S-block', 70, 100, true);
    add_image_size('post', 582, 350, true);
    add_image_size('cat', 175, 150, true);
    add_image_size('Side-block', 70, 61, true);
    add_image_size('ms', 600, 300, true);
}



/* * ************ */

function custom_excerpt_length($length) {
    return 999;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

/* * ***************** */
function limit_words($string, $word_limit) {
    // creates an array of words from $string (this will be our excerpt)
    // explode divides the excerpt up by using a space character
    $words = explode(' ', $string);
    // this next bit chops the $words array and sticks it back together
    // starting at the first word '0' and ending at the $word_limit
    // the $word_limit which is passed in the function will be the number
    // of words we want to use
    // implode glues the chopped up array back together using a space character
    return implode(' ', array_slice($words, 0, $word_limit));
}