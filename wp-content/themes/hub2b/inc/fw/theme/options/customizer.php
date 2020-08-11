<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

$hub2b_cfg = hub2b_theme_config();

$options = array(
    
    'hub2b_customizer' => array(
        'title' => esc_html__('Hub2B Colors', 'hub2b'),
        'position' => 1,
        'options' => array(

            'main_color' => array(
                'type' => 'color-picker',
                'value' => $hub2b_cfg['color_main'],
                'label' => esc_html__('Main Color', 'hub2b'),
            ),            
            'second_color' => array(
                'type' => 'color-picker',
                'value' => $hub2b_cfg['color_second'],
                'label' => esc_html__('Second Color', 'hub2b'),
            ),                
            'gray_color' => array(
                'type' => 'color-picker',
                'value' => $hub2b_cfg['color_gray'],
                'label' => esc_html__('Gray Color', 'hub2b'),
            ),
            'black_color' => array(
                'type' => 'color-picker',
                'value' => $hub2b_cfg['color_black'],
                'label' => esc_html__('Black Color', 'hub2b'),
            ),      
            'red_color' => array(
                'type' => 'color-picker',
                'value' => $hub2b_cfg['color_red'],
                'label' => esc_html__('Red Color', 'hub2b'),
            ),
            'white_color' => array(
                'type' => 'color-picker',
                'value' => $hub2b_cfg['color_white'],
                'label' => esc_html__('White Color', 'hub2b'),
            ),                          
            'nav_opacity' => array(
                'type'  => 'slider',
                'value' => 0,
                'properties' => array(
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.05,
                ),
                'label' => esc_html__('Navbar Opacity (0 - 1)', 'hub2b'),
            ), 
            'nav_opacity_scroll' => array(
                'type'  => 'slider',
                'value' => 0.95,
                'properties' => array(
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.05,
                ),
                'label' => esc_html__('Navbar Sticked Opacity (0 - 1)', 'hub2b'),
            ),
            'logo_height' => array(
                'type'  => 'slider',
                'value' => 60,
                'properties' => array(

                    'min' => 0,
                    'max' => 200,
                    'step' => 1,

                ),
                'label' => esc_html__('Logo Max Height, px', 'hub2b'),
            ),        
        ),
    ),
);

