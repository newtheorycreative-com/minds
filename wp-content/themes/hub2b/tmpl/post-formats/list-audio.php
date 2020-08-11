<?php
/**
 * Audio Post Format
 */

$post_class = '';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr($post_class) ); ?>>
	<div class="ltx-wrapper">
		<?php

		if ( has_post_thumbnail() ) {

			$hub2b_photo_class = 'photo';

		    echo '<a href="'.esc_url(get_the_permalink()).'" class="'.esc_attr($hub2b_photo_class).'">';

			    the_post_thumbnail();

		    echo '</a>';
		}

		$mp3 = hub2b_find_http(get_the_content());

		echo wp_audio_shortcode(
			array('src'	=>	esc_url($mp3))
		);

		$headline = 'inline';

		?>
	</div>
    <div class="description">
    	<?php

    		hub2b_get_the_post_headline();
    		
    	?>
        <a href="<?php esc_url( the_permalink() ); ?>" class="header"><h3><?php the_title(); ?></h3></a>
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