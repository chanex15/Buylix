<?php
/**
 * Archive template (blog archives + car stock archive).
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<div class="wrap band">
	<div class="page-hero reveal">
		<span class="eyebrow" style="justify-content:center"><?php the_archive_type() === 'post' || is_post_type_archive( 'car' ) ? esc_html_e( 'Browse', 'buylix' ) : the_archive_type(); ?></span>
		<h1><?php the_archive_title(); ?></h1>
		<?php if ( get_the_archive_description() ) : ?>
			<p class="lead" style="max-width:36rem;margin:.6rem auto 0"><?php echo wp_kses_post( get_the_archive_description() ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( have_posts() ) : ?>
		<div class="post-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="post-card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'buylix-card' ); ?></a>
					<?php endif; ?>
					<div class="in">
						<span class="post-meta">
							<?php
							if ( get_post_type() === 'car' ) {
								$car = buylix_get_car_data( get_the_ID() );
								echo $car['price'] ? esc_html( buylix_price( $car['price'] ) ) : esc_html__( 'Price on request', 'buylix' );
							} else {
								echo esc_html( get_the_date() );
							}
							?>
						</span>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt() ?: get_the_content(), 22 ) ); ?></p>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<div class="pagination">
			<?php
			echo wp_kses_post(
				paginate_links(
					array(
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
						'type'      => 'plain',
					)
				)
			);
			?>
		</div>
	<?php else : ?>
		<div class="empty"><strong><?php esc_html_e( 'Nothing here yet', 'buylix' ); ?></strong><p class="lead"><?php esc_html_e( 'Try a different category or check back soon.', 'buylix' ); ?></p></div>
	<?php endif; ?>
	<div style="height:1.5rem"></div>
</div>
<?php get_footer(); ?>
