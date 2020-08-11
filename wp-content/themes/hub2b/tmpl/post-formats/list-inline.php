<?php
/**
 * The default template for displaying inline posts
 */

?>
<article id="post-<?php the_ID(); ?>">
	<?php 
		if ( has_post_thumbnail() ) {

			$hub2b_photo_class = 'photo';
        	$hub2b_layout = get_query_var( 'hub2b_layout' );

			$hub2b_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_The_ID()), 'full' );

			if ($hub2b_image_src[2] > $hub2b_image_src[1]) $hub2b_photo_class .= ' vertical';
			
		    echo '<a href="'.esc_url(get_the_permalink()).'" class="'.esc_attr($hub2b_photo_class).'">';

	    		the_post_thumbnail();

		    echo '</a>';
		}
	?>
    <div class="description">
   		<?php

   			hub2b_get_the_cats_archive();
   			
   		?>
        <a href="<?php esc_url( the_permalink() ); ?>" class="header"><h3><?php the_title(); ?></h3></a>
        <?php if ( !has_post_thumbnail() ): ?>
        <div class="text text-page">
			<?php
				add_filter( 'the_content', 'hub2b_excerpt' );
			    if( strpos( $post->post_content, '<!--more-->' ) ) {

			        the_content( esc_html__( 'Read more', 'hub2b' ) );
			    }
			    	else  {

			    	the_excerpt();
			    }	
			?>
        </div>            
    	<?php endif; ?>
    	<div class="blog-info">
    	<?php
			hub2b_the_post_info();
    	?>
    	</div>
    </div>  
</article>