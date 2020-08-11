<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$hub2b_theme_config = hub2b_theme_config();
$hub2b_sections_list = hub2b_get_sections();

$navbar_custom_assign = array();

if ( !empty( $hub2b_theme_config['navbar'] ) AND is_array($hub2b_theme_config['navbar']) AND sizeof( $hub2b_theme_config['navbar']) > 1 ) {

	$menus = get_terms('nav_menu');
	if ( !empty($menus) ) {

		$list = array();
		foreach ( $menus as $item ) {

			$list[$item->term_id] = $item->name;
		}

		foreach ( $hub2b_theme_config['navbar'] as $key => $val) {

			$navbar_custom_assign['navbar-'.$key.'-assign'] = array(
				'label' => sprintf( esc_html__( 'Navbar %s Assign', 'hub2b' ), ucwords($key) ),
				'type'    => 'select',
				'desc' => esc_html__( 'You can assign additional menus for inner navbar.', 'hub2b' ),
				'value' => 'default',
				'choices' => array('default' => esc_html__( 'Default', 'hub2b' )) + $list,
			);
		}

		$navbar_custom_assign = array();
	}
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'hub2b' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(						
					'page-loader'    => array(
						'type'    => 'multi-picker',
						'picker'       => array(
							'loader' => array(
								'label'   => esc_html__( 'Page Loader', 'hub2b' ),
								'type'    => 'select',
								'choices' => array(
									'disabled' => esc_html__( 'Disabled', 'hub2b' ),
									'image' => esc_html__( 'Image', 'hub2b' ),
									'enabled' => esc_html__( 'Theme Loader', 'hub2b' ),
								),
								'value' => 'enabled'
							)
						),						
						'choices' => array(
							'image' => array(
								'loader_img'    => array(
									'label' => esc_html__( 'Page Loader Image', 'hub2b' ),
									'type'  => 'upload',
								),
							),
						),
						'value' => 'enabled',
					),	
					'google_api'    => array(
						'label' => esc_html__( 'Google Maps API Key', 'hub2b' ),
						'desc'  => esc_html__( 'Required for contacts page, also used in widget. In order to use you must generate your own API on Google Maps Platform', 'hub2b' ),
						'type'  => 'text',
					),								
				),
			),
			'logo' => array(
				'title'   => esc_html__( 'Logo and Media', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(	
					'logo-box' => array(
						'title'   => esc_html__( 'Logo', 'hub2b' ),
						'type'    => 'box',
						'options' => array(			
							'favicon'    => array(
								'html' => esc_html__( 'To change Favicon go to Appearance -> Customize -> Site Identity', 'hub2b' ),
								'type'  => 'html',
							),							
							'logo'    => array(
								'label' => esc_html__( 'Logo Black', 'hub2b' ),
								'type'  => 'upload',
							),
							'logo_2x'    => array(
								'label' => esc_html__( 'Logo Black 2x', 'hub2b' ),
								'type'  => 'upload',
							),	
							'logo_white'    => array(
								'label' => esc_html__( 'Logo White', 'hub2b' ),
								'type'  => 'upload',
							),
							'logo_white_2x'    => array(
								'label' => esc_html__( 'Logo White 2x', 'hub2b' ),
								'type'  => 'upload',
							),		
							'theme-icon-main'    => array(
								'label' => esc_html__( 'Headers icon', 'hub2b' ),
								'type'  => 'icon-v2',
							),								
							'widgets_bg'    => array(
								'label' => esc_html__( 'Sidebar Widgets Background', 'hub2b' ),
								'type'  => 'upload',
							),									
							'404_bg'    => array(
								'label' => esc_html__( '404 Background', 'hub2b' ),
								'type'  => 'upload',
							),						
						),
					),
				),
			),				
		),
	),
	'header' => array(
		'title'   => esc_html__( 'Header', 'hub2b' ),
		'type'    => 'tab',
		'options' => array(
			'header-box-2' => array(
				'title'   => esc_html__( 'Navbar', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'navbar-default'    => array(
						'label' => esc_html__( 'Navbar Default', 'hub2b' ),
						'type'    => 'select',
						'value' => $hub2b_theme_config['navbar-default'],
						'choices' => $hub2b_theme_config['navbar'],
					),	
					'navbar-default-force'    => array(
						'label' => esc_html__( 'Navbar Default Override', 'hub2b' ),
						'desc'   => esc_html__( 'By default every page can have unqiue navbar setting. You can override them here.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'disabled' => esc_html__( 'Disabled. Every page uses its own settings', 'hub2b' ),
							'force'  => esc_html__( 'Enabled. Override all site pages and use Navbar Default', 'hub2b' ),
						),
						'value' => 'disabled',
					),						
					'navbar-affix'    => array(
						'label' => esc_html__( 'Navbar Sticked', 'hub2b' ),
						'desc'   => esc_html__( 'May not work with all navbar types', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'' => esc_html__( 'Allways Static', 'hub2b' ),
							'affix'  => esc_html__( 'Sticked', 'hub2b' ),
						),
						'value' => '',
					),
					'navbar-breakpoint'    => array(
						'label' => esc_html__( 'Navbar Mobile Breakpoint, px', 'hub2b' ),
						'desc'   => esc_html__( 'Mobile menu will be displayed in viewports below this value', 'hub2b' ),
						'type'    => 'text',
						'value' => '1198',
					),						
					$navbar_custom_assign,
				)
			),
			'header-box-topbar' => array(
				'title'   => esc_html__( 'Topbar', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'topbar-info'    => array(
						'label' => ' ',
						'type'    => 'html',
						'html' => esc_html__( 'You can edit topbar in sections menu of dashboard', 'hub2b' ),
					),					
					'topbar'    => array(
						'label' => esc_html__( 'Topbar visibility', 'hub2b' ),
						'desc'   => esc_html__( 'You can edit topbar layout in Sections menu', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'visible'  => esc_html__( 'Always Visible', 'hub2b' ),
							'desktop'  => esc_html__( 'Desktop Visible', 'hub2b' ),
							'desktop-tablet'  => esc_html__( 'Desktop and Tablet Visible', 'hub2b' ),
							'mobile'  => esc_html__( 'Mobile only Visible', 'hub2b' ),
							'hidden' => esc_html__( 'Hidden', 'hub2b' ),
						),
						'value' => 'hidden',
					),					
					'topbar-section'    => array(
						'label' => esc_html__( 'Topbar section', 'hub2b' ),
						'desc' => esc_html__( 'You can edit it in Sections menu of dashboard.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array('' => 'None / Hidden') + $hub2b_sections_list['top_bar'],						
						'value'	=> '',
					),						
				)
			),			
			'header-box-icons' => array(
				'title'   => esc_html__( 'Icons and Elements', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(		
					'icons-info'    => array(
						'label' => ' ',
						'type'    => 'html',
						'html' => esc_html__( 'Icons can be displayed in topbar using shortcode: [ltx-navbar-icons]', 'hub2b' ),
					),																
					'navbar-icons' => array(
		                'label' => esc_html__( 'Navbar / Topbar Icons', 'hub2b' ),
		                'desc' => esc_html__( 'Depends on theme style', 'hub2b' ),
		                'type' => 'addable-box',
		                'value' => array(),
		                'box-options' => array(
							'type'        => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'type_radio' => array(
										'label'   => esc_html__( 'Type', 'hub2b' ),
										'type'    => 'radio',
										'choices' => array(
											'search' => esc_html__( 'Search', 'hub2b' ),
											'basket'  => esc_html__( 'WooCommerce Cart', 'hub2b' ),
											'profile'  => esc_html__( 'User Profile', 'hub2b' ),
											'social'  => esc_html__( 'Social Icon', 'hub2b' ),
										),
									)
								),
								'choices'      => array(
									'basket'  => array(
										'count'    => array(
											'label' => esc_html__( 'Count', 'hub2b' ),
											'type'    => 'select',
											'choices' => array(
												'show' => esc_html__( 'Show count label', 'hub2b' ),
												'hide'  => esc_html__( 'Hide count label', 'hub2b' ),
											),
											'value' => 'show',
										),											
									),
									'profile'  => array(
					                    'header' => array(
					                        'label' => esc_html__( 'Non-logged header', 'hub2b' ),
					                        'type' => 'text',
					                        'value' => '',
					                    ),										
									),
									'social'  => array(
					                    'text' => array(
					                        'label' => esc_html__( 'Header', 'hub2b' ),
					                        'type' => 'text',
					                    ),
					                    'subheader' => array(
					                        'label' => esc_html__( 'Subheader', 'hub2b' ),
					                        'type' => 'text',
					                    ),					                    
					                    'href' => array(
					                        'label' => esc_html__( 'External Link', 'hub2b' ),
					                        'type' => 'text',
					                        'value' => '#',
					                    ),											
									),		
								),
								'show_borders' => false,
							),	  														                	
							'icon-type'        => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'value'        => array(
									'icon_radio' => 'default',
								),
								'picker'       => array(
									'icon_radio' => array(
										'label'   => esc_html__( 'Icon', 'hub2b' ),
										'type'    => 'radio',
										'choices' => array(
											'default'  => esc_html__( 'Default', 'hub2b' ),
											'fa' => esc_html__( 'FontAwesome', 'hub2b' )
										),
										'desc'    => esc_html__( 'For social icons you need to use FontAwesome in any case.',
											'hub2b' ),
									)
								),
								'choices'      => array(
									'default'  => array(
									),
									'fa' => array(
										'icon_v2'  => array(
											'type'  => 'icon-v2',
											'label' => esc_html__( 'Select Icon', 'hub2b' ),
										),										
									),
								),
								'show_borders' => false,
							),
							'icon-visible'        => array(
								'label'   => esc_html__( 'Visibility', 'hub2b' ),
								'type'    => 'radio',
								'value'    => 'hidden-mob',								
								'choices' => array(
									'hidden-mob'  => esc_html__( 'Hidden on mobile', 'hub2b' ),
									'visible-mob' => esc_html__( 'Visible on mobile', 'hub2b' )
								),
							),							
							'profile-name'        => array(
								'label'   => esc_html__( 'Profile Name', 'hub2b' ),
								'type'    => 'radio',
								'value'    => 'hidden',								
								'choices' => array(
									'hidden'  => esc_html__( 'Hidden', 'hub2b' ),
									'visible' => esc_html__( 'Visible', 'hub2b' )
								),
							),								
		                ),
                		'template' => '{{- type.type_radio }}',		                
                    ),
					'basket-icon'    => array(
						'label' => esc_html__( 'Basket icon in navbar', 'hub2b' ),
						'desc'   => esc_html__( 'As replacement for basket in topbar in mobile view', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'disabled' => esc_html__( 'Hidden', 'hub2b' ),
							'mobile'  => esc_html__( 'Visible on Mobile', 'hub2b' ),
						),
						'value' => 'disabled',
					),					
				),
			),
			'header-box-1' => array(
				'title'   => esc_html__( 'Page Header H1', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'pageheader-display'    => array(
						'label' => esc_html__( 'Page Header Visibility', 'hub2b' ),
						'desc'   => esc_html__( 'Status of Page Header with H1 and Breadcrumbs', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'default' => esc_html__( 'Default', 'hub2b' ),
							'disabled'  => esc_html__( 'Force Hidden on all Pages', 'hub2b' ),
						),
						'value' => 'fixed',
					),		
					'pageheader-overlay'    => array(
						'label' => esc_html__( 'Page Header Overlay', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'enabled' => esc_html__( 'Enabled', 'hub2b' ),
							'disabled'  => esc_html__( 'Disabled', 'hub2b' ),
						),
						'value' => 'enabled',
					),										
					'header_bg'    => array(
						'label' => esc_html__( 'Inner Pages Header Background', 'hub2b' ),
						'desc'  => esc_html__( 'By default header is gray, you can replace it with background image', 'hub2b' ),
						'type'  => 'upload',
					),  			
					'wc_bg'    => array(
						'label' => esc_html__( 'WooCommerce Header Background', 'hub2b' ),
						'desc'  => esc_html__( 'Used only for WooCommerce pages', 'hub2b' ),
						'type'  => 'upload',
					),  					
					'featured_bg'    => array(
						'label' => esc_html__( 'Featured Images as Background', 'hub2b' ),
						'desc'  => esc_html__( 'Use Featured Image for Page as Header Background for all the pages', 'hub2b' ),
						'type'    => 'select',						
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'hub2b' ),
							'enabled' => esc_html__( 'Enabled', 'hub2b' ),
						),
						'value' => 'disabled',
					),	
					'header-social'    => array(
						'label' => esc_html__( 'Social icons in page header', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'hub2b' ),
							'enabled' => esc_html__( 'Enabled', 'hub2b' ),
						),
						'value' => 'enabled',
					),	

				),
			),
		),
	),	
	'footer' => array(
		'title'   => esc_html__( 'Footer', 'hub2b' ),
		'type'    => 'tab',
		'options' => array(

			'footer-box-1' => array(
				'title'   => esc_html__( 'Widgets', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'footer-layout-default'    => array(
						'label' => esc_html__( 'Footer Default Style', 'hub2b' ),
						'type'    => 'select',
						'desc'   => esc_html__( 'Footer block before copyright. Edited in Widgets menu.', 'hub2b' ),
						'choices' => $hub2b_theme_config['footer'],
						'value' => $hub2b_theme_config['footer-default'],
					),						
					'footer_widgets'    => array(
						'label' => esc_html__( 'Enable Footer Widgets', 'hub2b' ),
						'desc'   => esc_html__( 'Widgets controled in Appearance -> Widgets. Column will be hidden, then no active widgets exists', 'hub2b' ),	
						'type'  => 'checkbox',
						'value'	=> 'true',
					),					
					'footer_bg'    => array(
						'label' => esc_html__( 'Footer Background', 'hub2b' ),
						'type'  => 'upload',
					),		
					'footer-box-1-1' => array(
						'title'   => esc_html__( 'Desktop widgets visibility', 'hub2b' ),
						'type'    => 'box',
						'options' => array(

							'footer_1_hide'    => array(
								'label' => esc_html__( 'Footer 1', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),						
							),
							'footer_2_hide'    => array(
								'label' => esc_html__( 'Footer 2', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),	
							),
							'footer_3_hide'    => array(
								'label' => esc_html__( 'Footer 3', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),	
							),
							'footer_4_hide'    => array(
								'label' => esc_html__( 'Footer 4', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),	
							),
						)
					),
					'footer-box-1-2' => array(
						'title'   => esc_html__( 'Notebook widgets visibility', 'hub2b' ),
						'type'    => 'box',
						'options' => array(

							'footer_1__hide_md'    => array(
								'label' => esc_html__( 'Footer 1', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),						
							),
							'footer_2_hide_md'    => array(
								'label' => esc_html__( 'Footer 2', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),	
							),
							'footer_3_hide_md'    => array(
								'label' => esc_html__( 'Footer 3', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),	
							),
							'footer_4_hide_md'    => array(
								'label' => esc_html__( 'Footer 4', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),	
							),
						)
					),					
					'footer-box-1-3' => array(
						'title'   => esc_html__( 'Mobile widgets visibility', 'hub2b' ),
						'type'    => 'box',
						'options' => array(
							'footer_1_hide_mobile'    => array(
								'label' => esc_html__( 'Footer 1', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),
							),
							'footer_2_hide_mobile'    => array(
								'label' => esc_html__( 'Footer 2', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),
							),
							'footer_3_hide_mobile'    => array(
								'label' => esc_html__( 'Footer 3', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),
							),
							'footer_4_hide_mobile'    => array(
								'label' => esc_html__( 'Footer 4', 'hub2b' ),
								'type'  => 'switch',
								'value'	=> 'show',
								'left-choice' => array(
									'value' => 'hide',
									'label' => esc_html__('Hide', 'hub2b'),
								),
								'right-choice' => array(
									'value' => 'show',
									'label' => esc_html__('Show', 'hub2b'),
								),
							),														
						)
					)
				),
			),
			'footer-box-subscribe' => array(
				'title'   => esc_html__( 'Subscribe and Other', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'footer-sections'    => array(
						'html' => esc_html__( 'You can edit all items in Sections menu of dashboard.', 'hub2b' ),
						'type'  => 'html',
					),							
					'subscribe-section'    => array(
						'label' => esc_html__( 'Subscribe block', 'hub2b' ),
						'desc' => esc_html__( 'Section displayed before widgets on every page. You can hide in on certain page in page settings.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array('' => 'None / Hidden') + $hub2b_sections_list['subscribe'],						
						'value'	=> '',
					),
					'before-footer-section'    => array(
						'label' => esc_html__( 'Before Footer section', 'hub2b' ),
						'desc' => esc_html__( 'Section displayed under all content before subscribe/widgets.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array('' => 'None / Hidden') + $hub2b_sections_list['before_footer'],
						'value'	=> '',
					),					
				),
			),	
			'footer-box-2' => array(
				'title'   => esc_html__( 'Go Top', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(															
					'go_top_visibility'    => array(
						'label' => esc_html__( 'Go Top Visibility', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'visible'  => esc_html__( 'Always visible', 'hub2b' ),
							'desktop' => esc_html__( 'Desktop Only', 'hub2b' ),
							'mobile' => esc_html__( 'Mobile Only', 'hub2b' ),
							'hidden' => esc_html__( 'Hidden', 'hub2b' ),
						),						
						'value'	=> 'visible',
					),		
					'go_top_pos'    => array(
						'label' => esc_html__( 'Go Top Position', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'floating'  => esc_html__( 'Floating', 'hub2b' ),
							'static' => esc_html__( 'Static at the footer', 'hub2b' ),
						),						
						'value'	=> 'floating',
					),		
					'go_top_img'    => array(
						'label' => esc_html__( 'Go Top Image', 'hub2b' ),
						'type'  => 'upload',
					),		
					'go_top_icon'    => array(
						'label' => esc_html__( 'Go Top Icon', 'hub2b' ),
						'type'  => 'icon-v2',
					),					
					'go_top_text'    => array(
						'label' => esc_html__( 'Go Top Text', 'hub2b' ),
						'type'  => 'text',
					),														
				),
			),
			'footer-box-3' => array(
				'title'   => esc_html__( 'Copyrights', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(																							
					'copyrights'    => array(
						'label' => esc_html__( 'Copyrights', 'hub2b' ),
						'type'  => 'wp-editor',
					),									
				),
			),					
		),
	),	
	'layout' => array(
		'title'   => esc_html__( 'Posts Layout', 'hub2b' ),
		'type'    => 'tab',
		'options' => array(

			'layout-box-1' => array(
				'title'   => esc_html__( 'Blog Posts', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(

					'blog_layout'    => array(
						'label' => esc_html__( 'Blog Layout', 'hub2b' ),
						'desc'   => esc_html__( 'Default blog page layout.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'classic'  => esc_html__( 'One Column', 'hub2b' ),
							'two-cols' => esc_html__( 'Two Columns', 'hub2b' ),
							'three-cols' => esc_html__( 'Three Columns', 'hub2b' ),
						),
						'value' => 'classic',
					),				
					'blog_list_sidebar'    => array(
						'label' => esc_html__( 'Blog List Sidebar', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'hidden'  => esc_html__( 'Hidden', 'hub2b' ),
							'left' => esc_html__( 'Left', 'hub2b' ),
							'right' => esc_html__( 'Right', 'hub2b' ),
						),
						'value' => 'right',
					),				
					'blog_post_sidebar'    => array(
						'label' => esc_html__( 'Blog Post Sidebar', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'hidden'  => esc_html__( 'Hidden', 'hub2b' ),
							'left' => esc_html__( 'Left', 'hub2b' ),
							'right' => esc_html__( 'Right', 'hub2b' ),
						),
						'value' => 'right',
					),																				
					'excerpt_auto'    => array(
						'label' => esc_html__( 'Excerpt Classic Blog Size', 'hub2b' ),
						'desc'  => esc_html__( 'Automaticly cuts content for blogs', 'hub2b' ),
						'value'	=> 350,
						'type'  => 'short-text',
					),
					'excerpt_masonry_auto'    => array(
						'label' => esc_html__( 'Excerpt Masonry Blog Size', 'hub2b' ),
						'desc'  => esc_html__( 'Automaticly cuts content for blogs', 'hub2b' ),
						'value'	=> 150,
						'type'  => 'short-text',
					),
					'blog_gallery_autoplay'    => array(
						'label' => esc_html__( 'Gallery post type autoplay, ms', 'hub2b' ),
						'desc'  => esc_html__( 'Set 0 to disable autoplay', 'hub2b' ),
						'type'  => 'text',
						'value' => '4000',
					),						
				)
			),
			'layout-box-2' => array(
				'title'   => esc_html__( 'Services', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(	
					'services_list_layout'    => array(
						'label' => esc_html__( 'Services List Layout', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'classic'  => esc_html__( 'One Column', 'hub2b' ),
							'two-cols' => esc_html__( 'Two Columns', 'hub2b' ),
							'three-cols' => esc_html__( 'Three Columns', 'hub2b' ),
						),
						'value' => 'two-cols',
					),						
					'services_list_sidebar'    => array(
						'label' => esc_html__( 'Services List Sidebar', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'hidden'  => esc_html__( 'Hidden', 'hub2b' ),
							'left' => esc_html__( 'Left', 'hub2b' ),
							'right' => esc_html__( 'Right', 'hub2b' ),
						),
						'value' => 'hidden',
					),				
					'services_post_sidebar'    => array(
						'label' => esc_html__( 'Services Post Sidebar', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'hidden'  => esc_html__( 'Hidden', 'hub2b' ),
							'left' => esc_html__( 'Left', 'hub2b' ),
							'right' => esc_html__( 'Right', 'hub2b' ),
						),
						'value' => 'hidden',
					),					
				)
			),
			'layout-box-3' => array(
				'title'   => esc_html__( 'WooCommerce', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'shop_list_sidebar'    => array(
						'label' => esc_html__( 'WooCommerce List Sidebar', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'hidden'  => esc_html__( 'Hidden', 'hub2b' ),
							'left' => esc_html__( 'Left', 'hub2b' ),
							'right' => esc_html__( 'Right', 'hub2b' ),
						),
						'value' => 'left',
					),				
					'shop_post_sidebar'    => array(
						'label' => esc_html__( 'WooCommerce Product Sidebar', 'hub2b' ),
						'desc'   => esc_html__( 'Blog Post Sidebar', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'hidden'  => esc_html__( 'Hidden', 'hub2b' ),
							'left' => esc_html__( 'Left', 'hub2b' ),
							'right' => esc_html__( 'Right', 'hub2b' ),
						),
						'value' => 'hidden',
					),											
					'excerpt_wc_auto'    => array(
						'label' => esc_html__( 'Excerpt WooCommerce Size', 'hub2b' ),
						'desc'  => esc_html__( 'Automaticly cuts description for products', 'hub2b' ),
						'value'	=> 50,
						'type'  => 'short-text',
					),		
					'wc_zoom'    => array(
						'label' => esc_html__( 'WooCommerce Product Hover Zoom', 'hub2b' ),
						'type'    => 'select',
						'desc'   => esc_html__( 'Enables mouse hover zoom in single product page', 'hub2b' ),
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'hub2b' ),
							'enabled' => esc_html__( 'Enabled', 'hub2b' ),
						),
						'value' => 'disabled',
					),
					'wc_columns'    => array(
						'label' => esc_html__( 'Columns number', 'hub2b' ),
						'desc'  => esc_html__( 'Overrides default WooCommerce settings', 'hub2b' ),
						'type'  => 'text',
						'value' => '3',
					),
					'wc_per_page'    => array(
						'label' => esc_html__( 'Products per Page', 'hub2b' ),
						'type'  => 'text',
						'value' => '6',
					),
					'wc_show_list_excerpt'    => array(
						'label' => esc_html__( 'Display Excerpt in Shop List', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'hub2b' ),
							'enabled' => esc_html__( 'Enabled', 'hub2b' ),
						),
						'value' => 'enabled',
					),					
					'wc_show_list_rate'    => array(
						'label' => esc_html__( 'Display Rate in Shop List', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'hub2b' ),
							'enabled' => esc_html__( 'Enabled', 'hub2b' ),
						),
						'value' => 'disabled',
					),
					'wc_show_list_attr'    => array(
						'label' => esc_html__( 'Display Attributes in Shop List', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'disabled'  => esc_html__( 'Disabled', 'hub2b' ),
							'enabled' => esc_html__( 'Enabled', 'hub2b' ),
						),
						'value' => 'disabled',
					),															
				)
			),
			'layout-box-4' => array(
				'title'   => esc_html__( 'Gallery', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(													
					'gallery_layout'    => array(
						'label' => esc_html__( 'Default Gallery Layout', 'hub2b' ),
						'desc'   => esc_html__( 'Default galley page layout.', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'col-2' => esc_html__( 'Two Columns', 'hub2b' ),
							'col-3' => esc_html__( 'Three Columns', 'hub2b' ),
							'col-4' => esc_html__( 'Four Columns', 'hub2b' ),
						),
						'value' => 'col-2',
					),						
				)
			)
		)
	),
	'fonts' => array(
		'title'   => esc_html__( 'Fonts', 'hub2b' ),
		'type'    => 'tab',
		'options' => array(

			'fonts-box' => array(
				'title'   => esc_html__( 'Fonts Settings', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'font-main'                => array(
						'label' => __( 'Main Font', 'hub2b' ),
						'type'  => 'typography-v2',
						'desc'	=>	esc_html__( 'Use https://fonts.google.com/ to find font you need', 'hub2b' ),
						'value'      => array(
							'family'    => $hub2b_theme_config['font_main'],
							'subset'    => 'latin-ext',
							'variation' => $hub2b_theme_config['font_main_var'],
							'size'      => 0,
							'line-height' => 0,
							'letter-spacing' => 0,
							'color'     => '#000'
						),
						'components' => array(
							'family'         => true,
							'size'           => false,
							'line-height'    => false,
							'letter-spacing' => false,
							'color'          => false
						),
					),
					'font-main-weights'    => array(
						'label' => esc_html__( 'Additonal weights', 'hub2b' ),
						'desc'  => esc_html__( 'Coma separates weights, for example: "800,900"', 'hub2b' ),
						'type'  => 'text',
						'value'  => $hub2b_theme_config['font_main_weights'],							
					),											
					'font-headers'                => array(
						'label' => __( 'Headers Font', 'hub2b' ),
						'type'  => 'typography-v2',
						'value'      => array(
							'family'    => $hub2b_theme_config['font_headers'],
							'subset'    => 'latin-ext',
							'variation' => $hub2b_theme_config['font_headers_var'],
							'size'      => 0,
							'line-height' => 0,
							'letter-spacing' => 0,
							'color'     => '#000'
						),
						'components' => array(
							'family'         => true,
							'size'           => false,
							'line-height'    => false,
							'letter-spacing' => false,
							'color'          => false
						),
					),
					'font-headers-weights'    => array(
						'label' => esc_html__( 'Additonal weights', 'hub2b' ),
						'desc'  => esc_html__( 'Coma separates weights, for example: "600,800"', 'hub2b' ),
						'type'  => 'text',
						'value'  => $hub2b_theme_config['font_headers_weights'],						
					),
					'font-subheaders'                => array(
						'label' => __( 'SubHeaders Font', 'hub2b' ),
						'type'  => 'typography-v2',
						'value'      => array(
							'family'    => $hub2b_theme_config['font_subheaders'],
							'subset'    => 'latin-ext',
							'variation' => $hub2b_theme_config['font_subheaders_var'],
							'size'      => 0,
							'line-height' => 0,
							'letter-spacing' => 0,
							'color'     => '#000'
						),
						'components' => array(
							'family'         => true,
							'size'           => false,
							'line-height'    => false,
							'letter-spacing' => false,
							'color'          => false
						),
					),
					'font-subheaders-weights'    => array(
						'label' => esc_html__( 'Additonal weights', 'hub2b' ),
						'desc'  => esc_html__( 'Coma separates weights, for example: "600,800"', 'hub2b' ),
						'type'  => 'text',
						'value'  => $hub2b_theme_config['font_subheaders_weights'],						
					),							
				),
			),
			'fontello-box' => array(
				'title'   => esc_html__( 'Fontello', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'fontello-css'    => array(
						'label' => esc_html__( 'Fontello Codes CSS', 'hub2b' ),
						'desc'  => esc_html__( 'Upload *-codes.css postfix file here', 'hub2b' ),
						'type'  => 'upload',
						'images_only' => false,
					),		
					'fontello-ttf'    => array(
						'label' => esc_html__( 'Fontello TTF', 'hub2b' ),
						'type'  => 'upload',
						'images_only' => false,
					),							
					'fontello-eot'    => array(
						'label' => esc_html__( 'Fontello EOT', 'hub2b' ),
						'type'  => 'upload',
						'images_only' => false,
					),							
					'fontello-woff'    => array(
						'label' => esc_html__( 'Fontello WOFF', 'hub2b' ),
						'type'  => 'upload',
						'images_only' => false,
					),							
					'fontello-woff2'    => array(
						'label' => esc_html__( 'Fontello WOFF2', 'hub2b' ),
						'type'  => 'upload',
						'images_only' => false,
					),							
					'fontello-svg'    => array(
						'label' => esc_html__( 'Fontello SVG', 'hub2b' ),
						'type'  => 'upload',
						'images_only' => false,
					),												
				),
			),

		),
	),	
	'social' => array(
		'title'   => esc_html__( 'Social', 'hub2b' ),
		'type'    => 'tab',
		'options' => array(
			'social-box' => array(
				'title'   => esc_html__( 'Social', 'hub2b' ),
				'type'    => 'tab',
				'options' => array(
					'target-social'    => array(
						'label' => esc_html__( 'Open social links in', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'self'  => esc_html__( 'Same window', 'hub2b' ),
							'blank' => esc_html__( 'New window', 'hub2b' ),
						),
						'value' => 'self',
					),															
		            'social-icons' => array(
		                'label' => esc_html__( 'Social Icons', 'hub2b' ),
		                'type' => 'addable-box',
		                'value' => array(),
		                'desc' => esc_html__( 'Visible in inner page header', 'hub2b' ),
		                'box-options' => array(
		                    'icon_v2' => array(
		                        'label' => esc_html__( 'Icon', 'hub2b' ),
		                        'type'  => 'icon-v2',
		                    ),
		                    'text' => array(
		                        'label' => esc_html__( 'Text', 'hub2b' ),
		                        'desc' => esc_html__( 'If needed', 'hub2b' ),
		                        'type' => 'text',
		                    ),
		                    'href' => array(
		                        'label' => esc_html__( 'Link', 'hub2b' ),
		                        'type' => 'text',
		                        'value' => '#',
		                    ),		                    
		                ),
                		'template' => '{{- text }}',		                
                    ),								
				),
			),
		),
	),	
	'colors' => array(
		'title'   => esc_html__( 'Colors Schemes', 'hub2b' ),
		'type'    => 'tab',
		'options' => array(			
			'schemes-box' => array(
				'title'   => esc_html__( 'Additional Color Schemes Settings', 'hub2b' ),
				'type'    => 'box',
				'options' => array(
					'advice'    => array(
						'html' => esc_html__( 'You also need to change the global settings in Appearance -> Customize -> Hub2B settings', 'hub2b' ),
						'type'  => 'html',
					),	
					'items' => array(
						'label' => esc_html__( 'Theme Color Schemes', 'hub2b' ),
						'type' => 'addable-box',
						'value' => array(),
						'desc' => esc_html__( 'Can be selected in page settings', 'hub2b' ),
						'box-options' => array(
							'slug' => array(
								'label' => esc_html__( 'Scheme ID', 'hub2b' ),
								'type' => 'text',
								'desc' => esc_html__( 'Required Field', 'hub2b' ),
								'value' => '',
							),							
							'name' => array(
								'label' => esc_html__( 'Scheme Name', 'hub2b' ),
								'desc' => esc_html__( 'Required Field', 'hub2b' ),
								'type' => 'text',
								'value' => '',
							),
							'logo'    => array(
								'label' => esc_html__( 'Logo White', 'hub2b' ),
								'type'  => 'upload',
							),
							'logo_2x'    => array(
								'label' => esc_html__( 'Logo White 2x', 'hub2b' ),
								'type'  => 'upload',
							),
							'logo_white'    => array(
								'label' => esc_html__( 'Logo Black', 'hub2b' ),
								'type'  => 'upload',
							),		
							'logo_white_2x'    => array(
								'label' => esc_html__( 'Logo Black 2x', 'hub2b' ),
								'type'  => 'upload',
							),		
							'main-color'  => array(
								'label' => esc_html__( 'Main Color', 'hub2b' ),
								'type'  => 'color-picker',
							),
							'second-color' => array(
								'label' => esc_html__( 'Second Color', 'hub2b' ),
								'type'  => 'color-picker',
							),
							'gray-color' => array(
								'label' => esc_html__( 'Gray Color', 'hub2b' ),
								'type'  => 'color-picker',
							),								
							'black-color' => array(
								'label' => esc_html__( 'Black Color', 'hub2b' ),
								'type'  => 'color-picker',
							),	
							'white-color' => array(
								'label' => esc_html__( 'White Color', 'hub2b' ),
								'type'  => 'color-picker',
							),								
						),
						'template' => '{{- name }}',
					),
				),
			),
		),
	),	
	'popup' => array(
		'title'   => esc_html__( 'Popup', 'hub2b' ),
		'type'    => 'tab',
		'options' => array(
			'popup-box' => array(
				'title'   => esc_html__( 'Popup settings', 'hub2b' ),
				'type'    => 'box',
				'options' => array(						
					'popup-status'    => array(
						'label'   => esc_html__( 'Status', 'hub2b' ),
						'type'    => 'select',
						'choices' => array(
							'disabled' => esc_html__( 'Disabled', 'hub2b' ),
							'enabled'  => esc_html__( 'Enabled', 'hub2b' ),
						),
						'value' => 'disabled'
					),						
					'popup-hours'    => array(
						'label' => esc_html__( 'Period hidden, days', 'hub2b' ),
						'type'  => 'text',
						'value'	=>	'24',
					),						
					'popup-text'    => array(
						'label' => esc_html__( 'Popup text', 'hub2b' ),
						'type'  => 'wp-editor',
					),
					'popup-bg'    => array(
						'label' => esc_html__( 'Popup Background', 'hub2b' ),
						'type'  => 'upload',
					),					
					'popup-yes'    => array(
						'label' => esc_html__( 'Yes button', 'hub2b' ),
						'type'  => 'text',
						'value'	=>	'Yes',
					),	
					'popup-no'    => array(
						'label' => esc_html__( 'No button', 'hub2b' ),
						'type'  => 'text',
						'value'	=>	'No',
					),																
					'popup-no-link'    => array(
						'label' => esc_html__( 'No link', 'hub2b' ),
						'type'  => 'text',
						'value'	=>	'https://google.com',
					),																
				),	
			),
		),
	),
);

unset($options['popup']);
unset($options['header']['header-box-topbar']);

if ( function_exists('ltx_share_buttons_conf') ) {

	$share_links = ltx_share_buttons_conf();

	$share_links_options = array();
	if ( !empty($share_links) ) {

		$share_links_options = array(

			'share_icons_hide' => array(
                'label' => esc_html__( 'Hide all share icons block', 'hub2b' ),
                'type'  => 'checkbox',
                'value'	=>	false,
            ),
		);
		foreach ( $share_links as $key => $item ) {

			$state = fw_get_db_settings_option( 'share_icon_' . $key );

			$value = false;
			if ( is_null($state) AND $item['active'] == 1 ) {

				$value = true;
			}

			$share_links_options[] =
			array(
				'share_icon_'.$key => array(
	                'label' => $item['header'],
	                'type'  => 'checkbox',
	                'value'	=>	$value,
	            ),
			);
		}
	}

	$share_links_options['share-add'] = array(

        'label' => esc_html__( 'Custom Share Buttons', 'hub2b' ),
        'type' => 'addable-box',
        'value' => array(),
        'desc' => esc_html__( 'You can use {link} and {title} variables to set url. E.g. "http://www.facebook.com/sharer.php?u={link}"', 'hub2b' ),
        'box-options' => array(
            'icon' => array(
                'label' => esc_html__( 'Icon', 'hub2b' ),
                'type'  => 'icon-v2',
            ),
            'header' => array(
                'label' => esc_html__( 'Header', 'hub2b' ),
                'type' => 'text',
            ),
            'link' => array(
                'label' => esc_html__( 'Link', 'hub2b' ),
                'type' => 'text',
                'value' => '',
            ),		  
            'color' => array(
                'label' => esc_html__( 'Color', 'hub2b' ),
                'type' => 'color-picker',
                'value' => '',
            ),		              
        ),
		'template' => '{{- header }}',		                
    );

	$options['social']['options']['share-box'] = array(
		'title'   => esc_html__( 'Share Buttons', 'hub2b' ),
		'type'    => 'tab',
		'options' => $share_links_options,
	);
}

