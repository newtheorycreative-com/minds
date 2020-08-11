<?php
/**
	Testimonials Single Item
 */

if ( function_exists( 'FW' ) ) {

	$subheader = fw_get_db_post_option(get_The_ID(), 'subheader');
	$rate = fw_get_db_post_option(get_The_ID(), 'rate');	
}

?>
<div class="col-lg-6">
	<article class="inner matchHeight">
	<?php
		echo '<div class="text" data-mh="ltx-testimonials-text">';
			echo '<p>'. get_the_content() .'</p>
		</div>';

		echo '<div class="author">';
		
			echo '<div class="image">';
				the_post_thumbnail('hub2b-tiny-square');
			echo '</div>';

			echo '<div class="header">'. get_the_title() .'</div>';
			if (!empty($subheader) AND isset($subheader_show)) {
				echo '<div class="subheader">'. wp_kses_post($subheader) .'</div>';
			}

		echo '</div>';
	?>
	</article>
</div>
