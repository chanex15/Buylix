<?php
/**
 * Main template file (blog listing fallback).
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
		<span class="eyebrow" style="justify-content:center"><?php esc_html_e( 'Journal', 'buylix' ); ?></span>
		<h1><?php echo esc_html__( 'News & buying guides', 'buylix' ); ?></h1>
		<p class="lead" style="max-width:36rem;margin:.6rem auto 0"><?php esc_html_e( 'Inspection tips, market prices and ownership advice from our master technicians.', 'buylix' ); ?></p>
		<form class="search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="max-width:26rem;margin:1.2rem auto 0">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
			<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search articles…', 'buylix' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" aria-label="<?php esc_attr_e( 'Search', 'buylix' ); ?>" />
		</form>
	</div>

	<?php if ( have_posts() ) : ?>
		<div class="post-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="post-card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>"><?php the_post_thumbnail( 'buylix-card' ); ?></a>
					<?php endif; ?>
					<div class="in">
						<span class="post-meta"><?php echo esc_html( get_the_date() ); ?> · <?php echo esc_html( get_the_author() ); ?></span>
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
		<div class="empty"><strong><?php esc_html_e( 'No posts yet', 'buylix' ); ?></strong><p class="lead"><?php esc_html_e( 'Check back soon for buying guides and market updates.', 'buylix' ); ?></p></div>
	<?php endif; ?>
	<div style="height:1.5rem"></div>
</div>
<?php get_footer(); ?>
