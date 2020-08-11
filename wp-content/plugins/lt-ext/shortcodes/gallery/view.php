<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Gallery Shortcode
 */

$args = get_query_var('like_sc_gallery');

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

$list = fw_get_db_post_option( $args['cat'], 'photos' );

$class .= ' '.$args['layout'];

if ( $args['layout'] == 'static' ) {

	if ( !empty($list) ) {

		echo '<div class="gallery-sc gallery-static row '.esc_attr($class).'">';
	?>
		<?php foreach ( $list as $item ) : ?>
		<div class="item col-lg-4 col-sm-6">
			<a href="<?php echo esc_url( $item['url'] ); ?>" class="swipebox photo ">

				<span>
				<?php
					echo wp_get_attachment_image( $item['attachment_id'], 'hub2b-gallery' );
				?>
				</span>
			</a>
		</div>
		<?php endforeach; ?>

	<?php

		echo '</div>';
	}
}
	else {


	if ( !empty($list) ) {

		echo '<div class="gallery-sc swiper-gallery swiper-container '.esc_attr($class).'">';
			echo '<div class="swiper-wrapper">';
	?>
		<?php foreach ( $list as $item ) : ?>
		<div class="swiper-slide">
			<a href="<?php echo esc_url( $item['url'] ); ?>" class="swipebox photo ">

				<span>
				<?php

					if ( $args['layout'] == 'grid-big' ) {

						echo wp_get_attachment_image( $item['attachment_id'], 'hub2b-gallery-grid-big' );
					}
						else {

						echo wp_get_attachment_image( $item['attachment_id'], 'hub2b-gallery-grid' );
					}

				?>
				</span>
			</a>
		</div>
		<?php endforeach; ?>

	<?php

		echo '</div>
		</div>';
	}
}

