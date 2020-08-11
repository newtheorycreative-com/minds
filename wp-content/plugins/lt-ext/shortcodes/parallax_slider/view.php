<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Zoom Slider Shortcode
 */

$args = get_query_var('like_sc_parallax_slider');

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

$image1 = ltx_get_attachment_img_url($atts['image1']);
$image2 = ltx_get_attachment_img_url($atts['image2']);


?> 
<div class="ltx-parallax-slider-wrapper ltx-parallax-slider">
	<div class="row">
		<div class="col-lg-push-6 col-lg-6 col-md-push-7 col-md-5">

			<div class=" ltx-parallax-slider-slides-wrapper">

				<div class=" ltx-parallax-slider-slides">
					<div class="ltx-corner ltx-corner-tl"></div>
					<div class="ltx-corner ltx-corner-tr"></div>
					<div class="ltx-corner ltx-corner-bl"></div>
					<div class="ltx-corner ltx-corner-br"></div>

					<?php 
						if ( $args['layout'] == 'im1' ):
					?>

						<?php if ( !empty($image2) ): ?>
						<div data-depth="0.5" class="ltx-layer ltx-layer-1 ltx-floating-image <?php echo esc_attr($args['layout']); ?>">
							<img class="ltx-floating-image" alt="bg" src="<?php echo esc_url($image2[0]); ?>" >
						</div>		
						<?php endif; ?>	
						<?php if ( !empty($image1) ): ?>
						<div data-depth="0.15" class="ltx-layer ltx-layer-2 ltx-floating-image <?php echo esc_attr($args['layout']); ?>">
							<img class="ltx-floating-image" alt="bg" src="<?php echo esc_url($image1[0]); ?>" >
						</div>		
						<?php endif; ?>

					<?php 
						else:
					?>
						<?php if ( !empty($image1) ): ?>
						<div data-depth="0.15" class="ltx-layer ltx-layer-2 ltx-floating-image <?php echo esc_attr($args['layout']); ?>">
							<img class="ltx-floating-image" alt="bg" src="<?php echo esc_url($image1[0]); ?>" >
						</div>		
						<?php endif; ?>
						<?php if ( !empty($image2) ): ?>
						<div data-depth="0.5" class="ltx-layer ltx-layer-1 ltx-floating-image <?php echo esc_attr($args['layout']); ?>">
							<img class="ltx-floating-image" alt="bg" src="<?php echo esc_url($image2[0]); ?>" >
						</div>		
						<?php endif; ?>							
					<?php 
						endif;
					?>
				</div>
			</div>	
		</div>
		<div class="col-lg-pull-6 col-lg-6 col-md-pull-5 col-md-7 ltx-parallax-slider-content">
			<div class="ltx-slider-inner"><?php echo do_shortcode( $content ); ?></div>
		</div>		
	</div>
</div>
