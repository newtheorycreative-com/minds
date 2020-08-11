<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * TGM Plugin Activation
 */

require_once get_template_directory() . '/tgm-plugin-activation/class-tgm-plugin-activation.php';

if ( !function_exists('hub2b_action_theme_register_required_plugins') ) {

	function hub2b_action_theme_register_required_plugins() {

		$config = array(

			'id'           => 'hub2b',
			'menu'         => 'hub2b-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => false,
			'is_automatic' => false,
		);

		tgmpa( array(

			array(
				'name'      => esc_html__('Unyson', 'hub2b'),
				'slug'      => 'unyson',
				'required'  => true,
			),
			array(
				'name'      => esc_html__('LT Extension', 'hub2b'),
				'slug'      => 'lt-ext',
				'source'   	=> get_template_directory() . '/inc/plugins/lt-ext.zip',
				'version'   => '2.1.6',
				'required'  => true,
			),
			array(
				'name'      => esc_html__('WPBakery Page Builder', 'hub2b'),
				'slug'      => 'js_composer',
				'source'   	=> 'http://updates.like-themes.com/plugins/js_composer.zip',
				'required'  => true,
			),
			array(
				'name'      => esc_html__('Envato Market', 'hub2b'),
				'slug'      => 'envato-market',
				'source'   	=> get_template_directory() . '/inc/plugins/envato-market.zip',
				'required'  => false,
			),													
			array(
				'name'      => esc_html__('Breadcrumb-navxt', 'hub2b'),
				'slug'      => 'breadcrumb-navxt',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('Contact Form 7', 'hub2b'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),
			array(
				'name'       => esc_html__('MailChimp for WordPress', 'hub2b'),
				'slug'       => 'mailchimp-for-wp',
				'required'   => false,
			),		
			array(
				'name'       => esc_html__('WooCommerce', 'hub2b'),
				'slug'       => 'woocommerce',
				'required'   => false,
			),
			array(
				'name'      => esc_html__('Post-views-counter', 'hub2b'),
				'slug'      => 'post-views-counter',
				'required'  => false,
			),			
			array(
				'name'      => esc_html__('User Profile Picture', 'hub2b'),
				'slug'      => 'metronet-profile-picture',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('The Events Calendar', 'hub2b'),
				'slug'      => 'the-events-calendar',
				'required'  => false,
			),							
			array(
				'name'      => esc_html__('Instagram Widget by WPZOOM', 'hub2b'),
				'slug'      => 'instagram-widget-by-wpzoom',
				'required'  => false,
			),
			
		), $config);
	}
}

add_action( 'tgmpa_register', 'hub2b_action_theme_register_required_plugins' );

