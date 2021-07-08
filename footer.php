<?php
/**
 * Footer
 *
 */

?>
<footer>
    <div class="container">
        <div class="row widgets-wrapper">
            <div id="footer-sidebar1" class="col">
                    <?php
                    if(is_active_sidebar('footer-sidebar-1')){
                    dynamic_sidebar('footer-sidebar-1');
                    }
                ?>
            </div>
            <div id="footer-sidebar2" class="col">
                    <?php
                    if(is_active_sidebar('footer-sidebar-2')){
                    dynamic_sidebar('footer-sidebar-2');
                    }
                ?>
            </div>
            <div id="footer-sidebar3" class="col">
                <?php
                    if(is_active_sidebar('footer-sidebar-3')){
                    dynamic_sidebar('footer-sidebar-3');
                    }
                ?>
            </div>
            <div id="footer-sidebar4" class="col">
                <?php
                    if(is_active_sidebar('footer-sidebar-4')){
                    dynamic_sidebar('footer-sidebar-4');
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="copyright pt-3 pb-3"> <?php echo "<i class='fa fa-copyright'></i> " . date('Y') . " Company. All rights reserved";?> </div>

    <?php wp_footer(); ?>
</footer>

</body>
</html>