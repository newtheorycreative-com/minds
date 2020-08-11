<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'main' => array(
		'title'   => 'LTX Post Format',
		'type'    => 'box',
		'options' => array(
			'featured'    => array(
				'label' => esc_html__( 'Featured Post', 'hub2b' ),
				'type'  => 'checkbox',
			),			
			'gallery'    => array(
				'label' => esc_html__( 'Gallery', 'hub2b' ),
				'desc' => esc_html__( 'Upload featured images for slider gallery post type', 'hub2b' ),
				'type'  => 'multi-upload',
			),				
		),
	),
);

