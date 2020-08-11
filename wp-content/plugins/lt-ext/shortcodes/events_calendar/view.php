<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Events Shortcode
 */

$args = get_query_var('like_sc_events_calendar');

$query_args = array(
	'post_type' => 'tribe_events',
	'post_status' => 'publish',
	'posts_per_page' => (int)($atts['limit']),
);

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

if ( !empty($args['cat']) ) {

	$query_args['tax_query'] = 	array(
			array(
	            'taxonomy'  => 'tribe_events_cat',
	            'field'     => 'if', 
	            'terms'     => array(esc_attr($args['cat'])),
			)
    );
}

$query = new WP_Query( $query_args );

if ( $query->have_posts() ) {

	$cols = 1;

	echo '<div class="events-sc '.esc_attr($class).'" '.$id.'>';

	while ( $query->have_posts() ) {

		$query->the_post();
		$subheader = str_replace(array('{{', '}}'), array('<strong>', '</strong>'), fw_get_db_post_option(get_The_ID(), 'subheader'));
		$cut = str_replace(array('{{', '}}'), array('<strong>', '</strong>'), nl2br(get_the_excerpt()));


		$item_cats = wp_get_post_terms( get_the_ID(), 'tribe_events_cat' );
		$item_term = '';
		if ( $item_cats && !is_wp_error ( $item_cats ) ) {
			
			foreach ($item_cats as $cat) {

				$item_term = $cat->name;
			}
		}

		$date = array();
		if (function_exists('tribe_get_start_date')) {

			$date['d'] = tribe_get_start_date(get_The_ID(), false, 'd');
			$date['F'] = tribe_get_start_date(get_The_ID(), false, 'F');
			$date['Y'] = tribe_get_start_date(get_The_ID(), false, 'Y');

			$date['time'] = tribe_get_start_date(get_The_ID(), false, 'H:i');
		}

		echo '<div class="item">';
			echo '<div class="row">';
				echo '<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12"><div class="in img" data-mh="ltx-events"><a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), 'hub2b-gallery-grid').'</a></div></div>';			
				echo '<div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-xs-12 div-info">
						<div class="in name "  data-mh="ltx-events">
							<div>';			

								if ( !empty($item_term) ) {

									echo '<span class="more-link">'.esc_html($item_term).'</span>';
								}
								echo '<h5><a href="'.get_the_permalink().'">'. get_the_title() .'</a></h5>
								<span class="descr">'.wp_kses_post( $cut ).'</span>
							</div>
						</div>
					</div>';				
				echo '<div class="col-xl-3 col-lg-2 col-md-2 col-sm-12 col-xs-12">';
					echo '<div class="in date" data-mh="ltx-events">';
						echo '<div class="time-lg"><span class="date-day">'.esc_html($date['d']).'</span><span class="date-my">'.esc_html($date['F']).'</span></div>';
						echo '<div class="time">'.esc_html($date['time']).'</div>';
					echo '</div>';
				echo '</div>';			
				echo '<div class="col-xl-3 col-lg-3 col-md-2 col-sm-12 col-xs-12 div-more">
						<div class="in" data-mh="ltx-events"><a href="'.get_the_permalink().'" class="btn color-hover-black">'.esc_html($atts['btn_text']).'</a></div>
					</div>';
			echo '</div>';
		echo '</div>';
	}

	echo '</div>';

	wp_reset_postdata();
}

