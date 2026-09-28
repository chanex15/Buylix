<?php
/**
 * Single page template.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
while ( have_posts() ) :
	the_post();
	?>
	<div class="wrap band">
		<div class="page-hero reveal">
			<span class="eyebrow" style="justify-content:center"><?php esc_html_e( 'Buylix', 'buylix' ); ?></span>
			<h1><?php the_title(); ?></h1>
		</div>
		<div style="height:1.25rem"></div>
		<article class="prose reveal" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<div style="border-radius:16px;overflow:hidden;margin-bottom:1.5rem"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<?php the_content(); ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<p>' . esc_html__( 'Pages:', 'buylix' ),
					'after'  => '</p>',
				)
			);
			?>
		</article>
		<?php if ( comments_open() || get_comments_number() ) : ?>
			<div class="prose" style="margin-top:1.25rem"><?php comments_template(); ?></div>
		<?php endif; ?>
		<div style="height:1.5rem"></div>
	</div>
	<?php
endwhile;
get_footer();
