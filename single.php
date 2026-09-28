<?php
/**
 * Single post / car template.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
while ( have_posts() ) :
	the_post();
	$is_car = get_post_type() === 'car';
	$car    = $is_car ? buylix_get_car_data( get_the_ID() ) : null;
	?>
	<div class="wrap band">
		<div class="page-hero reveal">
			<span class="eyebrow" style="justify-content:center"><?php echo $is_car ? esc_html__( 'Certified car', 'buylix' ) : esc_html( get_the_date() ); ?></span>
			<h1><?php the_title(); ?></h1>
			<?php if ( $is_car && $car['price'] ) : ?>
				<p style="margin:.6rem 0 0;font-size:1.6rem;font-weight:800"><?php echo esc_html( buylix_price( $car['price'] ) ); ?>
					<?php if ( $car['old_price'] ) : ?><span style="font-size:1rem;color:var(--faint);text-decoration:line-through;font-weight:700"><?php echo esc_html( buylix_price( $car['old_price'] ) ); ?></span><?php endif; ?>
				</p>
			<?php endif; ?>
		</div>
		<div style="height:1.25rem"></div>
		<article class="prose reveal" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<div style="border-radius:16px;overflow:hidden;margin-bottom:1.5rem"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<?php if ( $is_car && $car ) : ?>
				<div class="car-specs" style="grid-template-columns:repeat(3,1fr);margin-bottom:1.5rem">
					<div><p style="color:var(--faint);font-size:.65rem">YEAR</p><p><?php echo esc_html( $car['year'] ?: '—' ); ?></p></div>
					<div><p style="color:var(--faint);font-size:.65rem">MILEAGE</p><p><?php echo esc_html( $car['km'] ? number_format_i18n( $car['km'] ) . ' km' : '—' ); ?></p></div>
					<div><p style="color:var(--faint);font-size:.65rem">FUEL</p><p><?php echo esc_html( $car['fuel'] ?: '—' ); ?></p></div>
					<div><p style="color:var(--faint);font-size:.65rem">GEARBOX</p><p><?php echo esc_html( $car['trans'] ?: '—' ); ?></p></div>
					<div><p style="color:var(--faint);font-size:.65rem">SEATS</p><p><?php echo esc_html( $car['seats'] ?: '—' ); ?></p></div>
					<div><p style="color:var(--faint);font-size:.65rem">RANGE</p><p><?php echo esc_html( $car['range'] ? $car['range'] . ' km' : '—' ); ?></p></div>
				</div>
			<?php endif; ?>
			<?php the_content(); ?>
			<?php if ( $is_car ) : ?>
				<p style="margin-top:1.5rem;display:flex;gap:.6rem;flex-wrap:wrap">
					<a class="btn btn-brand" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Book test drive', 'buylix' ); ?></a>
					<a class="btn btn-ghost" href="<?php echo esc_url( get_post_type_archive_link( 'car' ) ); ?>"><?php esc_html_e( 'Back to stock', 'buylix' ); ?></a>
				</p>
			<?php endif; ?>
		</article>
		<?php if ( comments_open() || get_comments_number() ) : ?>
			<div class="prose" style="margin-top:1.25rem"><?php comments_template(); ?></div>
		<?php endif; ?>
		<div style="height:1.5rem"></div>
	</div>
	<?php
endwhile;
get_footer();
