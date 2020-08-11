<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Theme Configuration and Custom CSS initializtion
 */

/**
 * Global theme config for header/footer/sections/colors/fonts
 */
if ( !function_exists('hub2b_theme_config') ) {

	add_filter( 'ltx_get_theme_config', 'hub2b_theme_config', 10, 1 );
	function hub2b_theme_config() {

	    return array(
	    	'navbar'	=>	array(
				'white'  	=> esc_html__( 'Default. White Background', 'hub2b' ),
				'transparent'  => esc_html__( 'Transparent Dark Homepage Slider', 'hub2b' ),		
			),
			'navbar-default' => 'white',

			'footer' => array(
				'default'  => esc_html__( 'Default', 'hub2b' ),		
				'copyright'  => esc_html__( 'Copyright Only', 'hub2b' ),		
				'copyright-transparent'  => esc_html__( 'Copyright Transparent', 'hub2b' ),		
			),
			'footer-default' => 'default',

			'color_main'	=>	'#F7DB15',
			'color_second'	=>	'#4CC675',
			'color_black'	=>	'#131313',
			'color_gray'	=>	'#F4F4F4',
			'color_white'	=>	'#FFFFFF',
			'color_red'		=>	'#AA3F44',
			'color_main_header'	=>	esc_html__( 'Yellow', 'hub2b' ),


			'font_main'					=>	'Catamaran',
			'font_main_var'				=>	'regular',
			'font_main_weights'			=>	'400,400i,700',
			'font_headers'				=>	'Mukta',
			'font_headers_var'			=>	'800',
			'font_headers_weights'		=>	'800,300',
			'font_subheaders'			=>	'Mukta',
			'font_subheaders_var'		=>	'800',
			'font_subheaders_weights'	=>	'800,300',
		);
	}
}

/**
 *  Editor Settings
 */
function hub2b_editor_settings() {

	$cfg = hub2b_theme_config();

    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'Main', 'hub2b' ),
            'slug' => 'main-theme',
            'color' => $cfg['color_main'],
        ),
        array(
            'name' => esc_html__( 'Gray', 'hub2b' ),
            'slug' => 'gray',
            'color' => $cfg['color_gray'],
        ),
        array(
            'name' => esc_html__( 'Black', 'hub2b' ),
            'slug' => 'black',
            'color' => $cfg['color_black'],
        ),
        array(
            'name' => esc_html__( 'Red', 'hub2b' ),
            'slug' => 'red',
            'color' => $cfg['color_red'],
        ),        
    ) );

	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => esc_html__( 'small', 'hub2b' ),
			'shortName' => esc_html__( 'S', 'hub2b' ),
			'size'      => 14,
			'slug'      => 'small'
		),
		array(
			'name'      => esc_html__( 'regular', 'hub2b' ),
			'shortName' => esc_html__( 'M', 'hub2b' ),
			'size'      => 16,
			'slug'      => 'regular'
		),
		array(
			'name'      => esc_html__( 'large', 'hub2b' ),
			'shortName' => esc_html__( 'L', 'hub2b' ),
			'size'      => 24,
			'slug'      => 'large'
		),
	) );    
}
add_action( 'after_setup_theme', 'hub2b_editor_settings', 10 );

/**
 * Get Google default font url
 */
if ( !function_exists('hub2b_font_url') ) {

	function hub2b_font_url() {

		$cfg = hub2b_theme_config();
		$q = array();
		foreach ( array('font_main', 'font_headers', 'font_subheaders') as $item ) {

			if ( !empty($cfg[$item]) ) {

				$w = '';
				if ( !empty($cfg[$item.'_weights']) ) {

					$w .= ':'.$cfg[$item.'_weights'];
				}
				$q[] = $cfg[$item].$w;
			}
		}

		$query_args = array( 'family' => implode('|', $q), 'subset' => 'latin' );
		$font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

		return esc_url( $font_url );
	}
}

/**
 * Config used for lt-ext plugin to set Visual Composer configuration
 */
if ( !function_exists('hub2b_vc_config') ) {

	add_filter( 'ltx_get_vc_config', 'hub2b_vc_config', 10, 1 );
	function hub2b_vc_config( $value ) {

	    return array(
	    	'sections'	=>	array(
				esc_html__("Overflow visible section", 'hub2b') 	=> "displaced-top",				
				esc_html__("Slider Blocks", 'hub2b') 	=> "ltx-slider-blocks",
			),
			'background' => array(
				esc_html__( "Main", 'hub2b' ) => "theme_color",	
				esc_html__( "Second", 'hub2b' ) => "second",	
				esc_html__( "Gray", 'hub2b' ) => "gray",
				esc_html__( "White", 'hub2b' ) => "white",
				esc_html__( "Black", 'hub2b' ) => "black",			
			),
			'overlay'	=> array(
				esc_html__( "Semi-Black Overlay (50%)", 'hub2b' ) => "half",
				esc_html__( "Black Overlay (70%)", 'hub2b' ) => "black",
				esc_html__( "White Overlay", 'hub2b' ) => "white",
			),
		);
	}
}


/*
* Adding additional TinyMCE options
*/
if ( !function_exists('hub2b_mce_before_init_insert_formats') ) {

	add_filter('mce_buttons_2', 'hub2b_wpb_mce_buttons_2');
	function hub2b_wpb_mce_buttons_2( $buttons ) {

	    array_unshift($buttons, 'styleselect');
	    return $buttons;
	}

	add_filter( 'tiny_mce_before_init', 'hub2b_mce_before_init_insert_formats' );
	function hub2b_mce_before_init_insert_formats( $init_array ) {  

	    $style_formats = array(

	        array(  
	            'title' => esc_html__('Main Color', 'hub2b'),
	            'block' => 'span',  
	            'classes' => 'color-main',
	            'wrapper' => true,
	        ),  
	        array(  
	            'title' => esc_html__('White Color', 'hub2b'),
	            'block' => 'span',  
	            'classes' => 'color-white',
	            'wrapper' => true,   
	        ),
	        array(  
	            'title' => esc_html__('Large Text', 'hub2b'),
	            'block' => 'span',  
	            'classes' => 'text-lg',
	            'wrapper' => true,
	        ),    
	        array(  
	            'title' => 'List Checkbox',
	            'selector' => 'ul',
	            'classes' => 'check',
	        ),       
	        array(  
	            'title' => 'Read More Link',
	            'selector' => 'a',
	            'classes' => 'more-link',
	        ),    	           
	    );  
	    $init_array['style_formats'] = json_encode( $style_formats );  
	     
	    return $init_array;  
	} 
}


/**
 * Register widget areas.
 *
 */
if ( !function_exists('hub2b_action_theme_widgets_init') ) {

	add_action( 'widgets_init', 'hub2b_action_theme_widgets_init' );
	function hub2b_action_theme_widgets_init() {

		$span_class = 'widget-icon';

		$header_class = $theme_icon = '';
		if ( function_exists('FW') ) {

			if ( !empty($theme_icon['icon-class']) ) $header_class = 'hasIcon';
		}


		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Default', 'hub2b' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Displayed in the right/left section of the site.', 'hub2b' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="header-widget '.esc_attr($header_class).'"><span class="'.esc_attr($span_class).'"></span>',
			'after_title'   => '<span class="last '.esc_attr($span_class).'"></span></h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar WooCommerce', 'hub2b' ),
			'id'            => 'sidebar-wc',
			'description'   => esc_html__( 'Displayed in the right/left section of the site.', 'hub2b' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="header-widget '.esc_attr($header_class).'"><span class="'.esc_attr($span_class).'"></span>',
			'after_title'   => '<span class="last '.esc_attr($span_class).'"></span></h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 1', 'hub2b' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Displayed in the footer section of the site.', 'hub2b' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="header-widget '.esc_attr($header_class).'"><span class="'.esc_attr($span_class).'"></span>',
			'after_title'   => '<span class="last '.esc_attr($span_class).'"></span></h3>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 2', 'hub2b' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Displayed in the footer section of the site.', 'hub2b' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="header-widget '.esc_attr($header_class).'"><span class="'.esc_attr($span_class).'"></span>',
			'after_title'   => '<span class="last '.esc_attr($span_class).'"></span></h3>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 3', 'hub2b' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Displayed in the footer section of the site.', 'hub2b' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="header-widget '.esc_attr($header_class).'"><span class="'.esc_attr($span_class).'"></span>',
			'after_title'   => '<span class="last '.esc_attr($span_class).'"></span></h3>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', 'hub2b' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Displayed in the footer section of the site.', 'hub2b' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="header-widget '.esc_attr($header_class).'"><span class="'.esc_attr($span_class).'"></span>',
			'after_title'   => '<span class="last '.esc_attr($span_class).'"></span></h3>',
		) );			

	}
}



/**
 * Additional styles init
 */
if ( !function_exists('hub2b_css_style') ) {

	add_action( 'wp_enqueue_scripts', 'hub2b_css_style', 10 );
	function hub2b_css_style() {

		global $wp_query;

		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array(), '1.0' );

		wp_enqueue_style( 'hub2b-plugins', get_template_directory_uri() . '/assets/css/plugins.css', array(), wp_get_theme()->get('Version') );

		wp_enqueue_style( 'hub2b-theme-style', get_stylesheet_uri(), array( 'bootstrap', 'hub2b-plugins' ), wp_get_theme()->get('Version') );
	}
}


/**
 * Wp-admin styles and scripts
 */
if ( !function_exists('hub2b_admin_init') ) {

	add_action( 'after_setup_theme', 'hub2b_admin_init' );
	function hub2b_admin_init() {

		add_action("admin_enqueue_scripts", 'hub2b_admin_scripts');
	}

	function hub2b_admin_scripts() {

		if ( function_exists('fw_get_db_settings_option') ) {

			$fontello['css'] = fw_get_db_settings_option( 'fontello-css' );
			$fontello['eot'] = fw_get_db_settings_option( 'fontello-eot' );
			$fontello['ttf'] = fw_get_db_settings_option( 'fontello-ttf' );
			$fontello['woff'] = fw_get_db_settings_option( 'fontello-woff' );
			$fontello['woff2'] = fw_get_db_settings_option( 'fontello-woff2' );
			$fontello['svg'] = fw_get_db_settings_option( 'fontello-svg' );

			if ( !empty($fontello['css']) AND !empty( $fontello['eot']) AND  !empty( $fontello['ttf']) AND  !empty( $fontello['woff']) AND  !empty( $fontello['woff2']) AND  !empty( $fontello['svg']) ) {

				wp_enqueue_style(  'hub2b-fontello',  $fontello['css']['url'], array(), wp_get_theme()->get('Version') );

				$randomver = wp_get_theme()->get('Version');
				$css_content = "@font-face {
				font-family: 'hub2b-fontello';
				  src: url('". esc_url ( $fontello['eot']['url']. "?" . $randomver )."');
				  src: url('". esc_url ( $fontello['eot']['url']. "?" . $randomver )."#iefix') format('embedded-opentype'),
				       url('". esc_url ( $fontello['woff2']['url']. "?" . $randomver )."') format('woff2'),
				       url('". esc_url ( $fontello['woff']['url']. "?" . $randomver )."') format('woff'),
				       url('". esc_url ( $fontello['ttf']['url']. "?" . $randomver )."') format('truetype'),
				       url('". esc_url ( $fontello['svg']['url']. "?" . $randomver )."#" . pathinfo(wp_basename( $fontello['svg']['url'] ), PATHINFO_FILENAME)  . "') format('svg');
				  font-weight: normal;
				  font-style: normal;
				}";

				wp_add_inline_style( 'hub2b-fontello', $css_content );
			}

			wp_enqueue_script( 'hub2b-theme-admin', get_template_directory_uri() . '/assets/js/scripts-admin.js', array( 'jquery' ) );
		}
	}
}




