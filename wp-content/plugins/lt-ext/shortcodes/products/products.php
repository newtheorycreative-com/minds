<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Shortcode Header
 */

// Shortcode fields configuration
if ( !function_exists( 'ltx_vc_products_params' ) ) {

	function ltx_vc_products_params() {

		$cats = ltxGetProductsCats();
		$cat = array();
		foreach ($cats as $catId => $item) {

			$cat[$item['name']] = $catId;
		}

		$fields = array(

			array(
				"param_name" => "slider",
				"heading" => esc_html__("Slider", 'lt-ext'),
				"std" => "disabled",
				"value" => array(
					esc_html__('Enabled', 'lt-ext') 	=> 'default',
					esc_html__('Disabled', 'lt-ext') 	=> 'disabled',
				),
				"type" => "dropdown"
			),		

			array(
				"param_name" => "layout",
				"heading" => esc_html__("Layout", 'lt-ext'),
				"std" => "default",
				"value" => array(
					esc_html__('Short Info', 'lt-ext') 	=> 'short',
					esc_html__('Full Product', 'lt-ext') 	=> 'simple',
				),
				"type" => "dropdown"
			),		
			array(
				"param_name" => "bg",
				"heading" => esc_html__("Background", 'lt-ext'),
				"std" => "white",
				"value" => array(
					esc_html__('Transparent', 'lt-ext') 	=> 'transparent',
					esc_html__('White', 'lt-ext') 	=> 'white',
				),
				"type" => "dropdown"
			),				
			array(
				"param_name" => "price",
				"heading" => esc_html__("Price", 'lt-ext'),
				"std" => "hidden",
				"value" => array(
					esc_html__('Hidden', 'lt-ext') 	=> 'hidden',
					esc_html__('Visible', 'lt-ext') 	=> 'visible',
				),
				"type" => "dropdown",
				'dependency' => array(
					'element' => 'layout',
					'value' => 'short',
				),						
			),				
/*	
			array(
				"param_name" => "rate",
				"heading" => esc_html__("Rating", 'lt-ext'),
				"std" => "visible",
				"value" => array(
					esc_html__('Visible', 'lt-ext') 	=> 'visible',
					esc_html__('Hidden', 'lt-ext') 	=> 'hidden',
				),
				"type" => "dropdown"
			),				
*/			
/*			
			array(
				"param_name" => "limit",
				"heading" => esc_html__("Total Products in Category", 'lt-ext'),
				"std"	=>	"8",				
				"admin_label" => true,
				"type" => "textfield"
			),
*/			
			array(
				"param_name" => "per_slide",
				"heading" => esc_html__("Items limit", 'lt-ext'),
//				"description" => esc_html__("If empty or null - no slider will be active", 'lt-ext'),
				"std"	=>	"4",
				"admin_label" => true,
				"type" => "textfield"
			),
			array(
				"param_name" => "cols",
				"heading" => esc_html__("Columns", 'lt-ext'),
				"std"	=>	"4",
				"admin_label" => true,
				"type" => "textfield"
			),			
			array(
				"param_name" => "category_filter",
				"heading" => esc_html__("Categories Filter", 'lt-ext'),
				"value" => array_merge(array(esc_html__('All Parent', 'lt-ext') => 0), $cat),
				"type" => "dropdown"
			),		
/*			
			array(
				'type' => 'autocomplete',
				'heading' => __( 'Categories', 'lt-ext' ),
				'param_name' => 'ids',
				'settings' => array(
					'multiple' => true,
					'sortable' => true,
				),
				'save_always' => true,
				'description' => esc_html__( 'If empty - displays all', 'lt-ext' ),
			),				
*/			
		);

		return $fields;
	}
}

// Add Wp Shortcode
if ( !function_exists( 'like_sc_products' ) ) {

	function like_sc_products($atts, $content = null) {	

		$atts = like_sc_atts_parse('products', $atts, array_merge( array(

			'ids' 			=> '',
			'limit' 		=> '',
			'price' 		=> 'hidden',
			'bg' 		=> 'white',
			'slider' 		=> 'disabled',
			'cols' 		=> '4',
			'rate' 		=> 'visible',
			'layout' 		=> 'simple',	
			'category_filter' 		=> '0',	
			'per_slide' 	=> '',
			'autoplay' 		=> '0',


			), array_fill_keys(array_keys(ltx_vc_default_params()), null) )
		);

		if ( ltx_is_wc('wc_active') ) return like_sc_output('products', $atts, $content);
	}

	if (ltx_vc_inited()) add_shortcode("like_sc_products", "like_sc_products");
}


// Adding shortcode to VC
if (!function_exists('ltx_vc_products_add')) {

	function ltx_vc_products_add() {
		
		vc_map( array(
			"base" => "like_sc_products",
			"name" 	=> esc_html__("Products", 'lt-ext'),
			"description" => esc_html__("Products Customized List", 'lt-ext'),
			"class" => "like_sc_products",
			"icon"	=>	ltxGetPluginUrl('/shortcodes/products/products.png'),
			"show_settings_on_create" => true,
			"category" => esc_html__('LTX-Themes', 'lt-ext'),
			'content_element' => true,
			"params" => array_merge(
				ltx_vc_products_params(),
				ltx_vc_default_params()
			)
		) );
	}

	if (ltx_vc_inited()) add_action('vc_before_init', 'ltx_vc_products_add', 30);
}


