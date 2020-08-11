<?php
	$header_wrapper = hub2b_get_pageheader_wrapper();
	$header_class = hub2b_get_pageheader_class();
	$pageheader_layout = hub2b_get_pageheader_layout();
	$navbar_layout = hub2b_get_navbar_layout();

    if ( is_404() ) {

    	$pageheader_layout = 'disabled';
    	$header_wrapper = '';
    }	
?>
<div class="ltx-content-wrapper <?php echo esc_attr($header_wrapper.' '.$navbar_layout); ?>">
	<div class="header-wrapper <?php echo esc_attr($header_class .' ltx-pageheader-'. $pageheader_layout); ?>">
	<?php
		get_template_part( 'tmpl/navbar' );

		if ( $pageheader_layout != 'disabled' ) : ?>
		<header class="page-header">
			<?php hub2b_the_tagline_header(); ?>
		    <div class="container">
		    	<span class="ltx-before"></span>
		    	<?php
		    		hub2b_the_h1();			
					hub2b_the_breadcrumbs();
				?>	 
				<span class="ltx-after"></span>
				<div class="ltx-header-icon"></div>
			    <?php hub2b_the_social_header(); ?>
		    </div>
		</header>
		<?php endif; ?>
	</div>