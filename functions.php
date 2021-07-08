<?php
/**
 * Functions and definitions
 *
 */

/**
 * Add Theme Functionality
 *
 */
function theme_setup() {

    add_theme_support( 'title-tag' );    
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );

    register_nav_menus(
        array(
            'menu-primary' => __( 'Primary', 'epignosishq-wp-website' )
        )
    );

    //Gutenberg
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );

}
add_action('after_setup_theme','theme_setup');

/**
 * Scripts Registration
 *
 */
function theme_register_scripts() {
    wp_enqueue_script('theme_scripts', get_template_directory_uri() . '/assets/dist/bundle.js', [], '1.0.0', true);
    wp_enqueue_style('theme_styles', get_template_directory_uri() . '/assets/dist/main.css', [], '1.0.1', 'all');
}
add_action('wp_enqueue_scripts', 'theme_register_scripts');

/**
 * Gutenberg Blocks Rwgistration
 *
 */
function epig_gutenberg_blocks()
{
    wp_register_script( 'custom-header-js', get_template_directory_uri() . '/gutenberg/dist/js/main.js', array( 'wp-blocks', 'wp-editor', 'wp-components' ));

    register_block_type( 'assessment/header', array(
        'editor_script' => 'custom-header-js'
    ) );
}
add_action( 'init', 'epig_gutenberg_blocks' );

/**
 * Excerpts Manipulation
 *
 */
function custom_excerpt_length() {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {

   return '... <br><br><a class="more-link" href="'. get_permalink( get_the_ID() ) . '">READ MORE ' . '<i class="fa fa-long-arrow-right"></i></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Footer Sidebars Registration
 *
 */
register_sidebar( array(
    'name' => 'Footer Sidebar 1',
    'id' => 'footer-sidebar-1',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5 class="widget-title mb-3">',
    'after_title' => '</h5>',
) );

register_sidebar( array(
    'name' => 'Footer Sidebar 2',
    'id' => 'footer-sidebar-2',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5 class="widget-title mb-3">',
    'after_title' => '</h5>',
) );

register_sidebar( array(
    'name' => 'Footer Sidebar 3',
    'id' => 'footer-sidebar-3',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5 class="widget-title mb-3">',
    'after_title' => '</h5>',
) );

register_sidebar( array(
    'name' => 'Footer Sidebar 4',
    'id' => 'footer-sidebar-4',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5 class="widget-title mb-3">',
    'after_title' => '</h5>',
) );

/**
 * Fetch Category posts Shortcode
 *
 */

function epig_categoryposts( $attr ) {
    
    $shortcode_args = shortcode_atts( array(
        'cat'     => 'tips',
        'num'     => '6',
        'order'  => 'desc'
    ), $attr );

    $args = array(
        'category_name'  => $shortcode_args['cat'],
        'posts_per_page' => $shortcode_args['num'],
        'order'          => $shortcode_args['order']         
     );

    $the_query = new WP_Query( $args ); 
      
    if ( $the_query->have_posts() ) :
		$counter = 1;
        $output .= '<div class="card-deck">';
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
                if ( has_post_thumbnail() ) :
                    $output .= '<div class="card mb-3">';
                    $output .= '<img class="card-img-top" src="' . get_the_post_thumbnail_url( null, "medium") . '" alt="Card image cap">';
                    $output .= '<div class="card-body">';
                    $output .= '<div class="card-cat mb-2">' . strtoupper($shortcode_args['cat']) . '</div>';
                    $output .= '<h5 class="card-title">' . get_the_title() . '</h5>';
                    $output .= '<div class="card-date mb-3">' . '<i class="fa fa-clock-o mr-2"></i>' . get_the_date( 'F j, Y' ) . '</div>';
                    $output .= '<p class="card-text">' . get_the_excerpt() . '</p>';
                    $output .= '</div></div>';
					if ($counter === 3):
						$output .= '<div class="w-100"></div>';
					endif;
					$counter++ ;
                endif;
        endwhile;
        $output .= '</div>';
    else :
        $output = '<p> No posts were found! </p>';

    endif;    
      
    return $output;
      
    wp_reset_postdata();
}

add_shortcode('epig_recent_posts', 'epig_categoryposts');