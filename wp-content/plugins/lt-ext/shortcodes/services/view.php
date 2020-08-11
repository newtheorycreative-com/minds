<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Services Shortcode
 */

$args = get_query_var('like_sc_services');

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

$class .= ' layout-'.$args['layout'].' ltx-style-'.$args['style'];

$query_args = array(
	'post_type' => 'services',
	'post_status' => 'publish',
	'posts_per_page' => (int)($args['limit']),
);

if ( !empty($args['ids']) ) $query_args['post__in'] = explode(',', esc_attr($args['ids']));
	else
if ( !empty($args['cat']) ) {

	$query_args['tax_query'] = 	array(
		array(
            'taxonomy'  => 'services-category',
            'field'     => 'if', 
            'terms'     => array(esc_attr($args['cat'])),
		)
    );
}

$query = new WP_Query( $query_args );

if ( $query->have_posts() ) {

	echo '<div class="services-sc row centered '.esc_attr($class).'" '.$id.'>';

		while ( $query->have_posts() ):

			$query->the_post();

			$subheader = fw_get_db_post_option(get_The_ID(), 'header');
			$price = fw_get_db_post_option(get_The_ID(), 'price');
			$cut = fw_get_db_post_option(get_The_ID(), 'cut');
			$image = fw_get_db_post_option(get_The_ID(), 'image');
			$header = get_the_title();
			$link = fw_get_db_post_option(get_The_ID(), 'link');

			if ( empty($link) ) {

				$link = get_the_permalink();
			}		

			if ( $args['layout'] == 'photos' ):

				if ( !empty($subheader) ) {

					$header = ltx_header_parse($subheader);
				}

				?>
				<article class="col-lg-4 col-ms-12">
					<div class="inner">
						<?php 
							if ( has_post_thumbnail() ) {

							    echo '<a href="'.esc_url(get_the_permalink()).'" class="photo">';

							    if ( !empty($image) ) {

							    	echo '<img src="'.$image['url'].'" alt="'.esc_attr(get_the_title()).'">';
							    }
							    	else {

								    the_post_thumbnail();
						    	}

							    if ( !empty($price)) {

							    	echo '<span class="price">'.esc_html($price).'</span>';
							    }

							    echo '</a>';
							}
						?>
					    <div class="description">
					        <a href="<?php esc_url( the_permalink() ); ?>" class="header">
					        	<h4 class="header"><?php echo wp_kses_post($header); ?></h4>
					        </a>
				        	<p>
				        		<?php echo wp_kses_post($cut); ?>
				        	</p>	        
					        <?php
								if ( !empty($args['more_text']) ) {

									echo '<a href="'.esc_url( $link ).'" class="more-link">'.esc_html($args['more_text']).'</a>';
								}		 	
							?>
					    </div>    
					</div>
				</article>	
				<?php

			elseif ( $args['layout'] == 'portfolio' OR $args['layout'] == 'portfolio-simple' ):

				$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
				$style = '';
				if ( !empty($image) ) {

					$style = ' style="background-image: url('.esc_attr($image[0]).');" data-image="'.esc_attr($image[0]).'" ';
				}

				?>
				<article class="col-lg-3 col-md-6 col-sm-6 col-ms-12 col-xs-12">
					<?php 
				    echo '<a href="'.esc_url( $link ).'" class="item ltx-lead-bg" '.$style.'>';

				    	if ( !empty($subheader) ) {

				    		echo '<span class="subheader">'.esc_html($subheader).'</span>';
				    	}

				    	echo '<span class="descr">';
						    echo '<span class="header">'.wp_kses_post($header).'</span>';

							if ( !empty($args['more_text']) ) {

								if ( $args['layout'] == 'portfolio-simple' ) {

									echo '<span class="btn btn-xs btn-black color-hover-white ">'.esc_html($args['more_text']).'</span>';
								}
									else {

									echo '<span class="btn btn-xs ">'.esc_html($args['more_text']).'</span>';
								}
							}
						echo '</span>';
				    echo '</a>';
					?> 
				</article>	
				<?php

			elseif ( $args['layout'] == 'icons'  ):

				$icon = fw_get_db_post_option(get_The_ID(), 'icon');

				?>
				<article class="col-lg-4 col-md-6 col-sm-6 col-ms-12 col-xs-12">
					<?php 

					if ( !empty($icon) ) {

						echo '<span class="ltx-icon '.esc_attr($icon['icon-class']).'"></span>';
					}

			    	echo '<div class="descr">';
					    echo '<h4 class="header"><a href="'.esc_url( $link ).'">'.wp_kses_post($header).'</a></h4>';
			        		
		        		echo '<p>'.wp_kses_post(nl2br(ltx_header_parse($cut))).'</p>';

						if ( !empty($args['more_text']) ) {

							echo '<a href="'.esc_url( $link ).'" class="more-link">'.esc_html($args['more_text']).'</a>';
						}
					echo '</div>';
					?> 
				</article>	
				<?php				

			elseif ( $args['layout'] == 'product' ):

				?>
				<article class="col-lg-3 col-sm-6 col-ms-12">
					<div class="inner">
						<?php 
							if ( has_post_thumbnail() ) {

							    echo '<a href="'.esc_url(get_the_permalink()).'" class="photo">';

							    if ( !empty($image) ) {

							    	echo '<img src="'.$image['url'].'" alt="'.esc_attr(get_the_title()).'">';
							    }
							    	else {

								    the_post_thumbnail('full');
						    	}

							    echo '</a>';
							}
						?>
					    <div class="description">
					        <a href="<?php esc_url( the_permalink() ); ?>" class="header">
					        	<h4 class="header"><?php echo wp_kses_post($header); ?></h4>
					        </a>
				        	<p>
				        		<?php echo wp_kses_post(nl2br(ltx_header_parse($cut))); ?>
				        	</p>
					        <?php

					        	$chart = fw_get_db_post_option(get_The_ID(), 'items');
					        	if (!empty($chart)) {

					        		echo '<div class="ltx-chart">';

					        		foreach ( $chart as $item ) {

					        			$value = (int)($item['value']);

					        			echo '<div class="item">';
					        				echo '<h6 class="header">'.esc_html($item['header']).' <span>'.esc_html($item['value']).'</span></h6>';
					        				echo '<div class="chart"><span style="width: '.esc_attr(100 - $value).'%;"></span></div>';
					        			echo '</div>';
					        		}

					        		echo '</div>';
					        	}

							    if ( !empty($price)) {

							    	echo '<span class="price">'.esc_html($price).'</span>';
							    }

								if ( !empty($args['more_text']) ) {

									echo '<a href="'.esc_url( $link ).'" class="btn btn-xs">'.esc_html($args['more_text']).'</a>';
								}		 	
							?>
					    </div>    
					</div>
				</article>	
				<?php

			endif;

		endwhile;

	echo '</div>';

	wp_reset_postdata();
}

