<?php
/**
 * The header for the theme
 *
 */

?>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>

        <?php
            if ( function_exists('the_custom_logo') ){
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id);
            }
        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="<?php echo $logo[0];?>" class="d-inline-block align-top"/>        
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <?php 
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-primary', 
                        'container' => '',
                        'items_wrap' => '<ul id="" class="navbar-nav ml-auto">%3$s</ul>'
                    ) );
            ?>
            
        </div>
        </nav>    

    </header>