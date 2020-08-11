<?php
/**
 * The template for displaying the footer
 */
?>
        </div>
    </div>
<?php

    hub2b_the_before_footer();
    
?>
    <div class="ltx-footer-wrapper">
<?php
    /**
     * Before Footer area
     */
    hub2b_the_subscribe_block();

    /**
     * Footer widgets area
     */
    hub2b_the_footer_widgets();

    /**
     * Copyright
     */
    hub2b_the_copyrights_section();
?>
    </div>
<?php 

    hub2b_the_go_top();

    /**
     * WordPress Core Function
     */   
    wp_footer();
?>
</body>
</html>
