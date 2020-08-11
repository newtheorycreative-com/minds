<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$hub2b_choices =  array();
$hub2b_choices['default'] = esc_html__( 'Default', 'hub2b' );

$hub2b_color_schemes = fw_get_db_settings_option( 'items' );
if ( !empty($hub2b_color_schemes) ) {

	foreach ($hub2b_color_schemes as $v) {

		$hub2b_choices[$v['slug']] = esc_html( $v['name'] );
	}
}

$hub2b_theme_config = hub2b_theme_config();
$hub2b_sections_list = hub2b_get_sections();


$options = array(
	'general' => array(
		'title'   => esc_html__( 'Page settings', 'hub2b' ),
		'type'    => 'box',
		'options' => array(		
			'general-box' => array(
				'title'   => __( 'General Settings', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(

					'margin-layout'    => array(
						'label' => esc_html__( 'Content Margin', 'hub2b' ),
						'type'    => 'select',
						'desc'   => esc_html__( 'Margins control for content', 'hub2b' ),
						'choices' => array(
							'default'  => esc_html__( 'Top And Bottom', 'hub2b' ),
							'top'  => esc_html__( 'Top Only', 'hub2b' ),
							'bottom'  => esc_html__( 'Bottom Only', 'hub2b' ),
							'disabled' => esc_html__( 'Margin Removed', 'hub2b' ),
						),
						'value' => 'default',
					),			
					'topbar-layout'    => array(
						'label' => esc_html__( 'Topbar section', 'hub2b' ),
						'desc' => esc_html__( 'You can edit it in Sections menu of dashboard.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array('default' => 'Default') + array('hidden' => 'Hidden') + $hub2b_sections_list['top_bar'],						
						'value'	=> 'default',
					),						
					'navbar-layout'    => array(
						'label' => esc_html__( 'Navbar', 'hub2b' ),
						'type'    => 'select',
						'choices' => $hub2b_theme_config['navbar'] + array( 'disabled'  	=> esc_html__( 'Hidden', 'hub2b' ) ),
						'value' => $hub2b_theme_config['navbar-default'],
					),								
					'header-layout'    => array(
						'label' => esc_html__( 'Page Header', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'default'  => esc_html__( 'Default', 'hub2b' ),
							'disabled' => esc_html__( 'Hidden', 'hub2b' ),
						),
						'value' => 'default',
					),						
					'subscribe-layout'    => array(
						'label' => esc_html__( 'Subscribe Block', 'hub2b' ),
						'type'    => 'select',
						'desc'   => esc_html__( 'Subscribe block before footer. Can be edited from Sections Menu.', 'hub2b' ),
						'choices' => array(
							'default'  => esc_html__( 'Default', 'hub2b' ),
							'disabled' => esc_html__( 'Hidden', 'hub2b' ),
						),
						'value' => 'default',
					),		
					'before-footer-layout'    => array(
						'label' => esc_html__( 'Before Footer', 'hub2b' ),
						'type'    => 'select',
						'desc'   => esc_html__( 'Before footer sections. Edited in Sections menu.', 'hub2b' ),
						'choices' => array(
							'default'  => esc_html__( 'Default', 'hub2b' ),
							'disabled' => esc_html__( 'Hidden', 'hub2b' ),
						),
						'value' => 'default',
					),	
					'footer-layout'    => array(
						'label' => esc_html__( 'Footer', 'hub2b' ),
						'type'    => 'select',
						'desc'   => esc_html__( 'Footer block before footer. Edited in Widgets menu.', 'hub2b' ),
						'choices' => $hub2b_theme_config['footer'] + array( 'disabled'  	=> esc_html__( 'Hidden', 'hub2b' ) ),
						'value' => $hub2b_theme_config['footer-default'],
					),	
					'footer-parallax'    => array(
						'label' => esc_html__( 'Footer Parallax', 'hub2b' ),
						'type'    => 'select',
						'desc'   => esc_html__( 'Footer block parallax effect.', 'hub2b' ),
						'choices' => array(
							'default'  => esc_html__( 'Default', 'hub2b' ),
							'disabled' => esc_html__( 'Disabled', 'hub2b' ),
						),
						'value' => 'default',
					),																			
					'color-scheme'    => array(
						'label' => esc_html__( 'Color Scheme', 'hub2b' ),
						'type'    => 'select',
						'choices' => $hub2b_choices,
						'value' => 'default',
					),		
					'body-bg'    => array(
						'label' => esc_html__( 'Background Scheme', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'default'  => esc_html__( 'White', 'hub2b' ),
							'black'  => esc_html__( 'Black', 'hub2b' ),
						),
						'value' => 'default',
					),						
					'background-image'    => array(
						'label' => esc_html__( 'Background Image', 'hub2b' ),
						'type'  => 'upload',
						'desc'   => esc_html__( 'Will be used to fill whole page', 'hub2b' ),
					),												
				),											
			),	
			'cpt' => array(
				'title'   => esc_html__( 'Blog / Gallery', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(				
					'sidebar-layout'    => array(
						'label' => esc_html__( 'Blog Sidebar', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'hidden' => esc_html__( 'Hidden', 'hub2b' ),
							'left'  => esc_html__( 'Sidebar Left', 'hub2b' ),
							'right'  => esc_html__( 'Sidebar Right', 'hub2b' ),
						),
						'value' => 'hidden',
					),						
					'blog-layout'    => array(
						'label' => esc_html__( 'Blog Layout', 'hub2b' ),
						'description'   => esc_html__( 'Used only for blog pages.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'default'  => esc_html__( 'Default', 'hub2b' ),
							'classic'  => esc_html__( 'One Column', 'hub2b' ),
							'two-cols' => esc_html__( 'Two Columns', 'hub2b' ),
							'three-cols' => esc_html__( 'Three Columns', 'hub2b' ),
						),
						'value' => 'default',
					),
					'gallery-layout'    => array(
						'label' => esc_html__( 'Gallery Layout', 'hub2b' ),
						'description'   => esc_html__( 'Used only for gallery pages.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'default' => esc_html__( 'Default', 'hub2b' ),
							'col-2' => esc_html__( 'Two Columns', 'hub2b' ),
							'col-3' => esc_html__( 'Three Columns', 'hub2b' ),
							'col-4' => esc_html__( 'Four Columns', 'hub2b' ),
						),
						'value' => 'default',
					),					
				)
			)	
		)
	),
);

unset($options['general']['options']['general-box']['options']['footer-parallax']);

