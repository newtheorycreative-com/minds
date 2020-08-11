<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'theme_block' => array(
		'title'   => esc_html__( 'Theme Block', 'hub2b' ),
		'label'   => esc_html__( 'Theme Block', 'hub2b' ),
		'type'    => 'select',
		'choices' => array(
			'none'  => esc_html__( 'Not Assigned', 'hub2b' ),
			'before_footer'  => esc_html__( 'Before Footer', 'hub2b' ),
			'subscribe'  => esc_html__( 'Subscribe', 'hub2b' ),
			'top_bar'  => esc_html__( 'Top Bar', 'hub2b' ),
		),
		'value' => 'none',
	)
);


