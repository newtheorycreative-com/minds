<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(			
			'header'    => array(
				'label' => esc_html__( 'Alternative Header', 'hub2b' ),
				'desc' => esc_html__( 'Use {{ brackets }} to headlight', 'hub2b' ),
				'type'  => 'text',
			),			
			'cut'    => array(
				'label' => esc_html__( 'Short Description', 'hub2b' ),
				'type'  => 'textarea',
			),		
			'link'    => array(
				'label' => esc_html__( 'External Link', 'hub2b' ),
				'desc' => esc_html__( 'Replaces default service link', 'hub2b' ),				
				'type'  => 'text',
			),							
		),
	),
);

