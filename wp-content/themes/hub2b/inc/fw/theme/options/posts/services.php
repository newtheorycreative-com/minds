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
			'image' => array(
				'label' => esc_html__( 'Additional Image', 'hub2b' ),
				'type'  => 'upload',
			),
			'icon' => array(
				'label' => esc_html__( 'Icon', 'hub2b' ),
				'type'  => 'icon-v2',
			),			
			'cut'    => array(
				'label' => esc_html__( 'Short Description', 'hub2b' ),
				'type'  => 'textarea',
			),							
			'price'    => array(
				'label' => esc_html__( 'Price', 'hub2b' ),
				'desc' => esc_html__( 'Use {{ brackets }} to headlight', 'hub2b' ),
				'type'  => 'text',
			),					
			'link'    => array(
				'label' => esc_html__( 'External Link', 'hub2b' ),
				'desc' => esc_html__( 'Replaces default service link', 'hub2b' ),				
				'type'  => 'text',
			),		
			'items' => array(
				'label' => esc_html__( 'Charts', 'hub2b' ),
				'type' => 'addable-box',
				'value' => array(),
				'box-options' => array(
					'header' => array(
						'label' => esc_html__( 'Header', 'hub2b' ),
						'type' => 'text',
					),
					'value' => array(
						'label' => esc_html__( 'Value', 'hub2b' ),
						'type' => 'text',
					),					
				),
				'template' => '{{- header }}',
			),						
		),
	),
);

