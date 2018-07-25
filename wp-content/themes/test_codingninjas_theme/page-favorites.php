<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

			$args = array(
		        'post_type' => 'movies',
		        'post_status' => 'publish',
		        'meta_query' => array(
					array(
						'key'     => 'mov_favorites',
						'compare' => 'EXISTS',
					),
				),
		    );
			$query = new WP_Query( $args );

			if( $query->have_posts() ): ?>

				<ul class="products columns-4">

					<?php while( $query->have_posts() ):
						$query->the_post();

						get_template_part( 'template-parts/post/content', 'favorites' );

					endwhile; // End of the loop. ?>

				</ul>

			<?php endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->


<?php get_footer();
