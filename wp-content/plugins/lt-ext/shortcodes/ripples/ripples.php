<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_ripples_params' ) ) {

	function ltx_vc_ripples_params() {

		$fields = array(

			array(
				"param_name" => "background",
				"heading" => esc_html__("Main Background", 'lt-ext'),
				"admin_label" => true,
				"type" => "attach_image"
			),
			array(
				"param_name" => "glass1",
				"heading" => esc_html__("Glass", 'lt-ext'),
				"admin_label" => true,
				"type" => "attach_image"
			),				
			array(
				"param_name" => "glass2",
				"heading" => esc_html__("Glass overlay", 'lt-ext'),
				"admin_label" => true,
				"type" => "attach_image"
			),							
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_ripples' ) ) {

	function like_sc_ripples($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_ripples', $atts, array_merge( array(

			'background'	=> '',
			'glass1'		=> '',
			'glass2'		=> '',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		wp_enqueue_script( 'ripples', ltxGetPluginUrl('/shortcodes/ripples/jquery.ripples.js'), array('jquery'), null, true );

		return like_sc_output('ripples', $atts, $content);

	}

	if (ltx_vc_inited()) add_shortcode("like_sc_ripples", "like_sc_ripples");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_ripples_add')) {

	function ltx_vc_ripples_add() {
		
		vc_map( array(
			"base" => "like_sc_ripples",
			"name" 	=> esc_html__("Ripples Section", 'lt-ext'),
			"class" => "like_sc_ripples",
			"is_container" => true,
			"js_view" => 'VcColumnView',
			"category" => esc_html__('LTX-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_ripples_params(),
				ltx_vc_default_params()
			),
		) );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		    class WPBakeryShortCode_like_sc_ripples extends WPBakeryShortCodesContainer {
		    }
		}
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_ripples_add', 30);
}


