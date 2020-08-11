<?php
/**
 * The default template for displaying standard post format
 */

$post_class = '';
$featured = get_query_var( 'hub2b_featured_disabled' );
if ( function_exists( 'FW' ) AND empty ( $featured ) ) {

	$featured_post = fw_get_db_post_option(get_The_ID(), 'featured');
	if ( !empty($featured_post) ) {

		$post_class = 'ltx-featured-post-none';
	}
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr($post_class) ); ?>>
	<?php 

		if ( has_post_thumbnail() ) {

			$hub2b_photo_class = 'photo';
        	$hub2b_layout = get_query_var( 'hub2b_layout' );

			$hub2b_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_The_ID()), 'full' );

			if ($hub2b_image_src[2] > $hub2b_image_src[1]) $hub2b_photo_class .= ' vertical';
			
		    echo '<a href="'.esc_url(get_the_permalink()).'" class="'.esc_attr($hub2b_photo_class).'">';

	    	if ( empty($hub2b_layout) OR $hub2b_layout == 'classic'  ) {

	    		the_post_thumbnail();
	    	}
	    		else
	    	if ( $hub2b_layout == 'two-cols'  ) {	    	

	    		the_post_thumbnail();
	    	}
	    		else {


				$sizes_hooks = array( 'hub2b-blog', 'hub2b-blog-full' );
				$sizes_media = array( '1199px' => 'hub2b-blog' );

				hub2b_the_img_srcset( get_post_thumbnail_id(), $sizes_hooks, $sizes_media );
    		}

		    echo '</a>';

    		hub2b_get_the_cats_archive();
		}
	?>
    <div class="description">
    	<?php

    		hub2b_get_the_post_headline();
    		
    	?>
        <a href="<?php esc_url( the_permalink() ); ?>" class="header"><h3><?php the_title(); ?></h3></a>
        <?php

        	if ( !function_exists('FW') OR (!empty($hub2b_layout) AND $hub2b_layout == 'classic') ) {

	       		$display_excerpt = 'visible';
        	}
        ?>
        <div class="text text-page">
			<?php
				if ( !empty( $display_excerpt ) AND $display_excerpt == 'visible' ) {

					add_filter( 'the_content', 'hub2b_excerpt' );
			    	the_excerpt();			    	
			   	}

			    echo '<a href="'.esc_url( get_the_permalink() ).'" class="more-link">'.esc_html__( 'Read more', 'hub2b' ).'</a>';
			?>
        </div>            
    </div>    
</article>