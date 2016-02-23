<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Alpha
 */

get_header(); ?>

	<div class="wrap">
		<div class="row">
			<div class="col small-12 medium-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'single' );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- col small-12 medium-8 -->

			<div class="col small-12 medium-4">
				<?php get_sidebar(); ?>
			</div><!-- col small-12 medium-4 -->

		</div><!-- .row -->
	</div><!-- .wrap -->
<?php get_footer(); ?>
