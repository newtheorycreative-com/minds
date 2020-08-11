<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'subheader'    => array(
				'label' => esc_html__( 'Subheader', 'hub2b' ),
				'type'  => 'text',
			),
			'rate'    => array(
				'type'    => 'select',
				'label' => esc_html__( 'Rate', 'hub2b' ),				
				'description'   => esc_html__( 'Null for hidden', 'hub2b' ),
				'choices' => array(
					0,1,2,3,4,5
				),
			),						
		),
	),		
);

unset($options['main']['options']['rate']);

