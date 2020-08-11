<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Portfolio Shortcode
 */

$args = get_query_var('like_sc_portfolio');

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

$class .= ' layout-'.$args['layout'];

$query_args = array(
	'post_type' => 'portfolio',
	'post_status' => 'publish',
	'posts_per_page' => (int)($args['limit']),
);

if ( !empty($args['ids']) ) $query_args['post__in'] = explode(',', esc_attr($args['ids']));
	else
if ( !empty($args['cat']) ) {

	$query_args['tax_query'] = 	array(
		array(
            'taxonomy'  => 'portfolio-category',
            'field'     => 'if', 
            'terms'     => array(esc_attr($args['cat'])),
		)
    );
}

$query = new WP_Query( $query_args );

if ( $query->have_posts() ) {

	$cols = 1;

	echo '<div class="portfolio-sc ltx-'.esc_attr($atts['layout']).'">';

	if ( $atts['layout'] == 'slider' ) {

		echo '<div class="swiper-container portfolio-list ltx-portfolio-slider '.esc_attr($class).'  row" data-cols="'.esc_attr($cols).'" data-autoplay="'.esc_attr($atts['autoplay']).'" '.$id.'>
				<div class="swiper-wrapper">';

		$x = 1;
		while ( $query->have_posts() ) {

			$query->the_post();

			echo '
			<div class="swiper-slide">
				<div class="row">
					<div class="col-lg-4">
						<div class="ltx-wrapper">';
							echo '<div class="heading header-underline"><h3 class="header">'. get_the_title() .'</h3></div>';
							echo '<div class="text">';
								echo do_shortcode(get_the_content());
							echo '</div>
						</div>
					</div>			
					<div class="col-lg-8 ltx-image-wrapper">
						<div class="ltx-image">';
						the_post_thumbnail('full');
							echo '<span class="header count">0'.esc_html($x).'.</span>';
							echo '
							<div class="arrows">
								<a href="#" class="arrow-left fa fa-chevron-left"></a><a href="#" class="arrow-right fa fa-chevron-right"></a>
							</div>				
						</div>
					</div>
				</div>
			</div>';
			$x++;
		}

		echo '</div>';
		echo '</div>';	
	}
		else
	if ( $atts['layout'] == 'grid' ) {

		echo '<div class="row centered">';

		$x = 0;
		while ( $query->have_posts() ) {

			$x++;
			$col = ' col-lg-4 col-sm-6 col-xs-12';

			if ( $query->post_count % 2 != 0 AND $query->post_count == $x ) {

				$col .= ' ltx-last ';
			}

			$query->the_post();


			$header = fw_get_db_post_option(get_The_ID(), 'header');
			$cut = fw_get_db_post_option(get_The_ID(), 'cut');
			$link = fw_get_db_post_option(get_The_ID(), 'link');

			if ( empty($link) ) {

				$link = get_the_permalink();
			}	

			if ( empty($header) ) {

				$header = get_the_title();
			}
				else {

				$header = ltx_header_parse($header);
			}

			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

			echo '<div class="'.esc_attr($col).'" style="background-image: url('.esc_attr($image[0]).')">';

				echo '<div class="ltx-wrapper">';
					echo '<div class="heading header-underline align-center "><h5 class="header">'.wp_kses_post($header).'</h5></div>';
					if ( !empty($cut) ) {

						echo '<p>'.esc_html($cut).'</p>';
					}

					if ( !empty( $atts['more_text'] )) {

						echo '<a href="'.esc_url($link).'" class="btn btn-xs color-hover-white">'.esc_html($atts['more_text']).'</a>';
					}

				echo '</div>';

			echo '</div>';
		}
		echo '</div>';	
	}

	echo '</div>';
}

