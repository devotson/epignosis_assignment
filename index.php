<?php
/**
 * The main template file
 */

get_header();
?>

<!-- body goes here -->

<div id="main-content">
    <div class="container">

    <?php
        if( have_posts() ){
            the_post();
            the_content();
        }
    ?>
    
    </div>
</div>

<?php 
get_footer();
