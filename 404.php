<?php
/**
 * 404 template.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<div class="wrap band">
	<div class="page-hero reveal" style="padding:4rem 1.75rem">
		<span class="hero-badge" style="margin:0 auto">404</span>
		<h1><?php esc_html_e( 'This road leads nowhere.', 'buylix' ); ?></h1>
		<p class="lead" style="max-width:30rem;margin:.8rem auto 0"><?php esc_html_e( 'The page you are looking for moved or never existed. Let’s get you back to cars worth your time.', 'buylix' ); ?></p>
		<p style="display:flex;gap:.6rem;justify-content:center;flex-wrap:wrap;margin-top:1.5rem">
			<a class="btn btn-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back home', 'buylix' ); ?></a>
			<a class="btn btn-brand" href="<?php echo esc_url( home_url( '/#models' ) ); ?>"><?php esc_html_e( 'Browse stock', 'buylix' ); ?></a>
		</p>
		<form class="search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="max-width:26rem;margin:1.5rem auto 0">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
			<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search the site…', 'buylix' ); ?>" aria-label="<?php esc_attr_e( 'Search', 'buylix' ); ?>" />
		</form>
	</div>
	<div style="height:1.5rem"></div>
</div>
<?php get_footer(); ?>
