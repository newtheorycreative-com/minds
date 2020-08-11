<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * WPBakery Page Builder functions
 */

if ( hub2b_is_vc() ) {

	/**
	 * Changing path of templates
	 */
	if (function_exists('vc_set_shortcodes_templates_dir') ) {

		$dir = get_template_directory_uri() . '/vc-templates';
		vc_set_shortcodes_templates_dir( $dir );
	}

	if (!function_exists('hub2b_vc_theme_init')) {

		function hub2b_vc_theme_init() {

			add_filter( 'vc_iconpicker-type-fontawesome', 'hub2b_vc_iconpicker_type_fontawesome' );
		}
		add_action( 'after_setup_theme', 'hub2b_vc_theme_init', 9 );
	}
		
	/**
	 * Adding Fontello icons to VC Fontawesome library
	 * https://kb.wpbakery.com/docs/developers-how-tos/adding-icons-to-vc_icon/
	 */
	if ( !function_exists( 'hub2b_vc_iconpicker_type_fontawesome' ) ) {

		function hub2b_vc_iconpicker_type_fontawesome($icons) {


			if ( function_exists('FW')) {

				$fontello['css'] = fw_get_db_settings_option( 'fontello-css' );

				if ( !empty($fontello['css']) ) {

					$list = hub2b_get_fontello_icons( get_attached_file($fontello['css']['attachment_id']) );
				}
			}		

			if ( empty($list) ) {

				return $icons;
			}
				else {

				$items = array();
				foreach ($list as $item) {

					$items[] = array(

						$item => str_replace('icon-', '', $icon)
					);
				}

				return array_merge( $icons, array( esc_html__('Hub2B Icons', 'hub2b' ) => $items ) );
			}
		}

		add_filter( 'vc_iconpicker-type-fontawesome', 'hub2b_vc_iconpicker_type_fontawesome' );
	}

}



/**
 * Parses fontello css file and generates array with icons names
 */
if ( !function_exists( 'hub2b_get_fontello_icons' ) ) {

	function hub2b_get_fontello_icons( $css_uri ) {

		static $list = false;

		if ( !is_array($list) ) {

			$list = array();

			if ( is_admin() )  {

				$fontello = $css_uri;
				$file = hub2b_get_contents_array( $fontello );

				if ( empty($file) ) return $list;

				foreach ($file as $row) {

					if ( substr($row, 0, 1 ) == '.') {

						$i = explode(':', $row);

						if ( !empty($i[0]) ) {

							$list[] = substr($i[0], 1);
						}
					}
				}				
			}
		}

		return $list;
	}
}

/**
 * Getting file contents as array
 * https://codex.wordpress.org/Filesystem_API
 */
if ( !function_exists('hub2b_get_contents_array') ) {

	function hub2b_get_contents_array( $file ) {

		global $wp_filesystem;

		if ( !empty($file) AND !empty($wp_filesystem) AND is_object($wp_filesystem) ) {

			$file = str_replace( ABSPATH, $wp_filesystem->abspath(), $file );
			$list = $wp_filesystem->get_contents_array($file);

			return $list;
		}

		return array();
	}
}

/**
 * Adding icons packs to Unyson icon-v2
 * https://github.com/ThemeFuse/Unyson/blob/master/framework/includes/option-types/icon-v2/includes/class-fw-icon-v2-packs-loader.php#L19
 */
if ( !function_exists('hub2b_fw_add_more_packs') ) {

	function hub2b_fw_add_more_packs( $default_packs ) {

		$fontello['css'] = fw_get_db_settings_option( 'fontello-css' );
		if ( !empty($fontello['css']) ) {

			$file = get_attached_file($fontello['css']['attachment_id']);

			return array(

				'hub2b_theme_icons' => array(
				  'name' => 'hub2b_theme_icons',
				  'title' => 'Hub2B Theme Icons',
				  'css_class_prefix' => 'icon',

				  'css_file' => $file,
				  'css_file_uri' => $fontello['css']['url'],

				  'admin_wp_enqueue_handle' => 'hub2b-fontello',
				  'frontend_wp_enqueue_handle' => 'hub2b-fontello',

				  'require_css_file' => false,
				  'icons' => false,

				  'apply_root_class' => true
				)
			);
		}
			else {

			return array();
		}
	}

	add_filter( 'fw:option_type:icon-v2:packs', 'hub2b_fw_add_more_packs' );
}

