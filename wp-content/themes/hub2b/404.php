<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();

	$page = get_posts( array(
		'name' => '404-layout',
		'post_type' => 'page',
	) );

	if ( $page ) {
		
		echo do_shortcode( $page[0]->post_content );
	}
		else {
		?>
		<section class="page-404 page-404-default">
			<div class="container">
				<div class="center">				
					<div class="heading  heading-xl"><h1><?php echo esc_html__( '404', 'hub2b' ) ?></h1></div>
					<div class="heading  heading-large header-inline align-center color-main subcolor-second transform-default heading-tag-h3">
						<h4><?php echo esc_html__( 'Oops! Page Not Found', 'hub2b' ) ?></h4>
					</div>
					<p class="center-404">
						<?php echo esc_html__( 'The page you are looking for was moved, removed, renamed or might never existed.', 'hub2b' ); ?></strong>
					</p>
					<div class="ltx-empty-space"></div>
					<a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="btn  btn-xs btn-default color-hover-white align-center"><?php echo esc_html__( 'Home Page', 'hub2b' ) ?></a>
				</div>
			</div>
		</section>				
		<?php
	}

get_footer();

