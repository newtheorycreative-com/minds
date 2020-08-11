<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode
 */

$args = get_query_var('like_sc_parallax_slider');

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

$bg = ltx_get_attachment_img_url($atts['background']);
$glass1 = ltx_get_attachment_img_url($atts['glass1']);
$glass2 = ltx_get_attachment_img_url($atts['glass2']);

$js = "
jQuery(document).on('ready', function() { 

    jQuery('.ltx-ripples').ripples({
        resolution: 512,
        dropRadius: 20,
        perturbance: 0.04,
    });

    jQuery('.ltx-ripples').ripples('drop', 800, 400, 50, 0.05);
});
";

wp_add_inline_script('ripples', $js);

?>
<div class="ltx-ripples <?php echo esc_attr($class); ?>" id="<?php echo esc_attr($id); ?>" style="background-image:url(<?php echo esc_url($glass1[0]); ?>)">
	<div class="ltx-slider-inner"><?php echo do_shortcode( $content ); ?></div>
	<?php if ( !empty($glass1[0]) ): ?> 
		<div id="ltx-ripples-background-1" style="background-image:url(<?php echo esc_url($bg[0]); ?>)"></div>
	<?php endif; ?>
	<?php if ( !empty($glass2[0]) ): ?> 
		<div id="ltx-ripples-background-2" style="background-image:url(<?php echo esc_url($glass2[0]); ?>)"></div>
	<?php endif; ?>

</div>