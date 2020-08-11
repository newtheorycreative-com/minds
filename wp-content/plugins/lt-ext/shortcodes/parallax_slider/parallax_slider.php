<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_parallax_slider_params' ) ) {

	function ltx_vc_parallax_slider_params() {

		$fields = array(

			array(
				"param_name" => "image1",
				"heading" => esc_html__("Image 1", 'lt-ext'),
				"admin_label" => true,
				"type" => "attach_image"
			),
			array(
				"param_name" => "image2",
				"heading" => esc_html__("Image 2", 'lt-ext'),
				"admin_label" => true,
				"type" => "attach_image"
			),				
			array(
				"param_name" => "layout",
				"heading" => esc_html__("Layout", 'lt-ext'),
				"std" => "photos",
				"value" => array(
					esc_html__('Image 1 in front', 'lt-ext') => 'im1',
					esc_html__('Image 2 in front', 'lt-ext') => 'im2',
				),
				"type" => "dropdown"
			),				
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_parallax_slider' ) ) {

	function like_sc_parallax_slider($atts, $content = null) {	

		$atts = like_sc_atts_parse('like_sc_parallax_slider', $atts, array_merge( array(

			'image1'		=> '',
			'image2'		=> '',
			'layout'		=> '',

			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		return like_sc_output('parallax_slider', $atts, $content);

	}

	if (ltx_vc_inited()) add_shortcode("like_sc_parallax_slider", "like_sc_parallax_slider");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_parallax_slider_add')) {

	function ltx_vc_parallax_slider_add() {
		
		vc_map( array(
			"base" => "like_sc_parallax_slider",
			"name" 	=> esc_html__("Parallax Slider", 'lt-ext'),
//			"description" => esc_html__("Background changing with Ken Burns effect", 'lt-ext'),
			"class" => "like_sc_parallax_slider",
//			"icon"	=>	ltxGetPluginUrl('/shortcodes/parallax_slider/parallax_slider.png'),
			"is_container" => true,
			"js_view" => 'VcColumnView',
			"category" => esc_html__('LTX-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_parallax_slider_params(),
				ltx_vc_default_params()
			),
		) );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		    class WPBakeryShortCode_like_sc_parallax_slider extends WPBakeryShortCodesContainer {
		    }
		}
		
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_parallax_slider_add', 30);
}


