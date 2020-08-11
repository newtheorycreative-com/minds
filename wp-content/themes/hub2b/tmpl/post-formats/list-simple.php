<?php
/**
 * The default template for displaying standard post format
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="photo">
	<?php

		the_post_thumbnail();
		
	?>
    </div>
    <div class="description">
        <?php

            hub2b_get_the_post_headline();
            
        ?>
        <a href="<?php esc_url( the_permalink() ); ?>" class="header"><h3><?php the_title(); ?></h3></a>
        <?php

            $hub2b_display_excerpt = 'visible';
        ?>
        <div class="text text-page">
            <?php
                add_filter( 'the_content', 'hub2b_excerpt' );
                if( strpos( $post->post_content, '<!--more-->' ) ) {

                    the_content( esc_html__( 'Read more', 'hub2b' ) );
                }
                    else  {

                    the_excerpt();                  
                }   

                echo '<a href="'.esc_url( get_the_permalink() ).'" class="more-link">'.esc_html__( 'Read more', 'hub2b' ).'</a>';
            ?>
        </div>            
    </div>    
</article>