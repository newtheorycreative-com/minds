<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			"price" => array(
				"label" => esc_html__("Price", 'hub2b'),
				"type" => "text"
			),				
		),
	),		
);

