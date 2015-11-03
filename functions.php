<?php
// Admin Bar
show_admin_bar('true');

// ----------------------------
// Navigation Functions
// ----------------------------

// Register Menus
register_nav_menus( array(
    'cats' => __( 'Category Navigation', 'vanilla' ),
    'pages' => __( 'Page Navigation', 'vanilla' )
) );

// Remove nav classes, except for 'usefull classes'
function custom_wp_nav_menu($var) {
	return is_array($var) ? array_intersect($var, array(
		// Useful classes
		'current_page_item',
		'current_page_parent',
		'current_page_ancestor'
		)
	) : '';}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

// ----------------------------
// Theme Branding Functions
// ----------------------------

// Custom CSS for the login page
function loginCSS() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/wp-login.css"/>';
}
add_action('login_head', 'loginCSS');

// ----------------------------
// Content Functions
// ----------------------------

// Featured Images
add_theme_support( 'post-thumbnails' );

// Post Formats
add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

// function new_excerpt_more($more) {
//        global $post;
//     return '&hellip;<br /><br /><a class="inline-link lees-meer" href="'. get_permalink($post->ID) . '"> Lees meer</a>';
// }
// add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
    return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function replace_tribe_events_calendar_stylesheet() {
   $styleUrl = get_bloginfo('template_url') . '/css/agenda.css';
   return $styleUrl;
}
add_filter('tribe_events_stylesheet_url', 'replace_tribe_events_calendar_stylesheet');

function my_theme_add_scripts() {
  wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3', true );
  wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/maps.js', array('google-map', 'jquery'), '0.1', true );
}

add_action( 'wp_enqueue_scripts', 'my_theme_add_scripts' );

function widgets_init() {

  register_sidebar( array(
    'name'          => 'Evenementen - Sidebar',
    'id'            => 'agenda',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'widgets_init' );

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_bedrijf-fotos',
    'title' => 'Bedrijf - Foto\'s',
    'fields' => array (
      array (
        'key' => 'field_550596a29134a',
        'label' => 'Foto\'s',
        'name' => 'image_gallery',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_550596b59134b',
            'label' => 'Foto',
            'name' => 'image',
            'type' => 'image',
            'column_width' => '',
            'save_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
          ),
          array (
            'key' => 'field_550596d79134c',
            'label' => 'Breedte',
            'name' => 'width',
            'type' => 'select',
            'required' => 1,
            'column_width' => '',
            'choices' => array (
              'col_1' => '1 kolom',
              'col_2' => '2 kolommen',
              'col_3' => '3 kolommen',
              'col_4' => '4 kolommen',
            ),
            'default_value' => '',
            'allow_null' => 0,
            'multiple' => 0,
          ),
        ),
        'row_min' => '',
        'row_limit' => '',
        'layout' => 'table',
        'button_label' => 'Voeg afbeelding toe',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'spot',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_bedrijf-locatie',
    'title' => 'Bedrijf - Locatie',
    'fields' => array (
      array (
        'key' => 'field_5509ed64eb437',
        'label' => 'Google Maps',
        'name' => 'google_maps',
        'type' => 'google_map',
        'center_lat' => '',
        'center_lng' => '',
        'zoom' => '',
        'height' => 340,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'spot',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_cover-image',
    'title' => 'Cover image',
    'fields' => array (
      array (
        'key' => 'field_54ff7566b493f',
        'label' => 'Thumbnail',
        'name' => 'cover_image',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_5516f93e9157d',
        'label' => 'Cropped Image',
        'name' => 'cropped_image',
        'type' => 'image_crop',
        'crop_type' => 'hard',
        'target_size' => 'custom',
        'width' => 1440,
        'height' => 400,
        'preview_size' => 'full',
        'force_crop' => 'yes',
        'save_in_media_library' => 'yes',
        'retina_mode' => 'no',
        'save_format' => 'url',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'spot',
          'order_no' => 0,
          'group_no' => 1,
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'tribe_events',
          'order_no' => 0,
          'group_no' => 2,
        ),
      ),
      array (
        array (
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'page-fulltext.php',
          'order_no' => 0,
          'group_no' => 3,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'default',
      'hide_on_screen' => array (
        0 => 'featured_image',
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_masthead-general',
    'title' => 'Masthead - General',
    'fields' => array (
      array (
        'key' => 'field_550e7ee4caa88',
        'label' => 'General Masthead',
        'name' => 'masthead_tax',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_551a4558756a3',
        'label' => 'Do Proeft - Masthead',
        'name' => 'do_proeft_masthead',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_551a456d756a4',
        'label' => 'Do Shopt - Masthead',
        'name' => 'do_shopt_masthead',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_551a4597756a5',
        'label' => 'Do Slaapt - Masthead',
        'name' => 'do_slaapt_masthead',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_551a45af756a6',
        'label' => 'Dordt Design - Masthead',
        'name' => 'dordt_design_masthead',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_551a45cb756a7',
        'label' => 'Do Ontdekt - Masthead',
        'name' => 'do_ontdekt_masthead',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_551a54768ad4f',
        'label' => 'Blog - Masthead',
        'name' => 'blog_masthead',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_bedrijfevent-korte-intro',
    'title' => 'Bedrijf/Event - Korte intro',
    'fields' => array (
      array (
        'key' => 'field_550a7f551159e',
        'label' => 'Foto Overzichtspagina',
        'name' => 'foto_overzichtspagina',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_550a7ea659b8e',
        'label' => 'Korte beschrijving',
        'name' => 'korte_beschrijving',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 4,
        'formatting' => 'br',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'spot',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'tribe_events',
          'order_no' => 0,
          'group_no' => 1,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 2,
  ));
  register_field_group(array (
    'id' => 'acf_bedrijf-adres-openingstijden',
    'title' => 'Bedrijf - Adres + Openingstijden',
    'fields' => array (
      array (
        'key' => 'field_55167e5165aed',
        'label' => 'Adresgegevens',
        'name' => 'adres',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 3,
        'formatting' => 'br',
      ),
      array (
        'key' => 'field_55167e6965aee',
        'label' => 'Openingstijden',
        'name' => 'openingstijden',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_55167e8265aef',
            'label' => 'Dag',
            'name' => 'dag',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_55167eac65af0',
            'label' => 'Tijd',
            'name' => 'tijd',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
        ),
        'row_min' => '',
        'row_limit' => '',
        'layout' => 'table',
        'button_label' => 'Add Row',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'spot',
          'order_no' => 0,
          'group_no' => 0,
        ),
        array (
          'param' => 'taxonomy',
          'operator' => '!=',
          'value' => '12',
          'order_no' => 1,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 3,
  ));
  register_field_group(array (
    'id' => 'acf_bedrijf-details',
    'title' => 'Bedrijf - Details',
    'fields' => array (
      array (
        'key' => 'field_550579c9bb9e8',
        'label' => 'Website',
        'name' => 'website',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_550a897976c62',
            'label' => 'webadres',
            'name' => 'webadres',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
        ),
        'row_min' => 0,
        'row_limit' => '',
        'layout' => 'table',
        'button_label' => 'Voeg site toe',
      ),
      array (
        'key' => 'field_5510880f8cfee',
        'label' => 'E-mail',
        'name' => 'e-mail',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_55057a2abb9e9',
        'label' => 'Social Media',
        'name' => 'social_media',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_55057a76bb9ea',
            'label' => 'Facebook',
            'name' => 'facebook',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_55057a85bb9eb',
            'label' => 'twitter',
            'name' => 'twitter',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_55057a8ebb9ec',
            'label' => 'Foursquare',
            'name' => 'foursquare',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_55057a99bb9ed',
            'label' => 'pinterest',
            'name' => 'pinterest',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_550a804dc33a3',
            'label' => 'Instagram',
            'name' => 'instagram',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
        ),
        'row_min' => 0,
        'row_limit' => 1,
        'layout' => 'row',
        'button_label' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'spot',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 4,
  ));
}



// function posts_for_current_author($query) {

//   if($query->is_admin) {

//     global $user_ID;
//     $query->set('author',  $user_ID);
//   }
//   return $query;
// }
// add_filter('pre_get_posts', 'posts_for_current_author');

// add_action( 'admin_init', 'my_remove_menu_pages' );
// function my_remove_menu_pages() {

//   global $user_ID;

//   if (!current_user_can( 'edit_others_posts' ) ) {
//     remove_menu_page('edit.php');
//     remove_menu_page('admin.php?page=acf-options');
//     }
//   }

// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {

  function wpex_pagination() {

    $prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
    $next_arrow = is_rtl() ? '&larr;' : '&rarr;';

    global $wp_query;
    $total = $wp_query->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if( $total > 1 )  {
       if( !$current_page = get_query_var('paged') )
         $current_page = 1;
       if( get_option('permalink_structure') ) {
         $format = 'page/%#%/';
       } else {
         $format = '&paged=%#%';
       }
      echo paginate_links(array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => $format,
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $total,
        'mid_size'    => 3,
        'type'      => 'list',
        'prev_text'   => $prev_arrow,
        'next_text'   => $next_arrow,
       ) );
    }
  }

}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

?>