<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Products Shortcode
 */

$args = get_query_var('like_sc_products');

$query_args = array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => (int)($args['per_slide']),
);

//if ( $args['layout'] == 'simple' ) {
if ( !empty($args['category_filter']) ) {

	$query_args['tax_query'] = 	array(
			array(
	            'taxonomy'  => 'product_cat',
	            'field'     => 'if', 
	            'terms'     => array(esc_attr($args['category_filter'])),
			),
		    array(
		        'taxonomy' => 'product_visibility',
		        'field'    => 'name',
		        'terms'    => 'exclude-from-catalog',
		        'operator' => 'NOT IN',
		    ),			
    );

	$query_args['posts_per_page'] = (int)($args['per_slide']);
}
//}
$cols = 3;
if ( !empty($args['cols']) ) {

	$cols = $args['cols'];
}

$query = new WP_Query( $query_args );
$currency = get_woocommerce_currency_symbol();

if ( $query->have_posts() ) {
	
	if ( $args['layout'] == 'simple' OR $args['layout'] == 'short' ) {

		$item_class = '';
		if ( $args['rate'] == 'hidden' ) $item_class .= 'products-hide-rate ';
		if ( $args['price'] == 'hidden' ) $item_class .= 'ltx-products-hide-price ';

		if ( !empty($args['slider']) AND $args['slider'] == 'default' ) {
				
			echo '<div class="woocommerce swiper-container products-slider" data-cols="'.esc_attr($args['cols']).'" data-autoplay="0"><ul class="swiper-wrapper products products-sc products-sc-'.esc_attr($args['layout']).' ltx-products-bg-'.esc_attr($args['bg']).'">';

			$item_class .= 'swiper-slide ';
		}
			else {

			echo '<div class="woocommerce"><ul class="products columns-'.esc_attr($args['cols']).' products-sc products-sc-'.esc_attr($args['layout']).' ltx-products-bg-'.esc_attr($args['bg']).'">';
		}

		while ( $query->have_posts() ):

			$query->the_post();

			if ( isset($single_cat->term_id) ) $current_cat = $single_cat->term_id;
			if ( empty($current_cat) ) $current_cat = '';

			$product = $item = wc_get_product( get_the_ID() );

			?>
			<li id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($item_class)); ?>>
			<?php

			if ( !function_exists('is_product_sc') ) {

				function is_product_sc() {

					return true;
				}
			}

			do_action( 'woocommerce_before_shop_loop_item' );

			do_action( 'woocommerce_before_shop_loop_item_title' );

			do_action( 'woocommerce_shop_loop_item_title' );

			do_action( 'woocommerce_after_shop_loop_item_title' );

			do_action( 'woocommerce_after_shop_loop_item' );
			?>
	    
			</li>
		<?php
		endwhile;

		if ( !empty($args['slider']) AND $args['slider'] == 'default' ) {

				echo '
				</ul>
				<div class="arrows">
					<a href="#" class="arrow-left"></a>
					<a href="#" class="arrow-right"></a>
				</div>
			</div>';
		}
			else {

			echo '</ul></div>';	
		}
	}
	

	wp_reset_postdata();
}


