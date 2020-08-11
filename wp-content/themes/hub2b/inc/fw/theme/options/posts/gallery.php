<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'photos' => array(
				'label' => esc_html__( 'Multi Upload', 'hub2b' ),
				'type'  => 'multi-upload',
				),
			),
		),
	);

