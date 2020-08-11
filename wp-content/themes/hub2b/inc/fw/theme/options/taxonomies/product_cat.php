<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => '',
		'type'    => 'box',
		'options' => array(
			'subheader'    => array(
				'label' => esc_html__( 'Additional Header', 'hub2b' ),
				'desc' => esc_html__( 'Use {{ to highlight }} the word', 'hub2b' ),
				'type'  => 'text',
			),			
		),
	),
);

