<?php
/**
 * Footer template.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>

<footer class="site-footer">
	<div class="footer-card">
		<div class="footer-grid">
			<div class="footer-brand">
				<a class="brand-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="brand-mark" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7"/><path d="M8 7h8v8"/><circle cx="12" cy="12" r="10" opacity="0.35"/></svg>
					</span>
					<span class="brand-name"><?php bloginfo( 'name' ); ?></span>
				</a>
				<p class="footer-tag"><?php esc_html_e( 'Premium pre-owned cars with published inspections, flood scans, HPG/LTO clearance and 30-day exchange. BGC · Makati · Cebu · Davao.', 'buylix' ); ?></p>
				<form class="newsletter" id="newsletterForm" action="#" method="post">
					<label for="nl-email"><?php esc_html_e( 'Get new arrivals first', 'buylix' ); ?></label>
					<div class="newsletter-row">
						<input id="nl-email" type="email" name="email" required placeholder="<?php esc_attr_e( 'Email address', 'buylix' ); ?>" />
						<button type="submit" aria-label="<?php esc_attr_e( 'Subscribe', 'buylix' ); ?>">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7M8 7h9v9"/></svg>
						</button>
					</div>
					<p class="newsletter-ok" id="newsletterOk" hidden><?php esc_html_e( 'Thanks — you are on the list.', 'buylix' ); ?></p>
				</form>
			</div>
			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer', 'buylix' ); ?>">
				<div class="footer-col">
					<p><?php esc_html_e( 'Inventory', 'buylix' ); ?></p>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'footer-links',
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
					?>
					<ul class="footer-links footer-fallback">
						<li><a href="<?php echo esc_url( home_url( '/#models' ) ); ?>"><?php esc_html_e( 'All certified cars', 'buylix' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#models' ) ); ?>">BMW</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#models' ) ); ?>">Mercedes-Benz</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#models' ) ); ?>">Toyota</a></li>
						<li><a href="<?php echo esc_url( home_url( '/#models' ) ); ?>">Volkswagen</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<p><?php esc_html_e( 'Company', 'buylix' ); ?></p>
					<ul class="footer-links">
						<li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>"><?php esc_html_e( 'About us', 'buylix' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#benefits' ) ); ?>"><?php esc_html_e( 'Benefits', 'buylix' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Contact', 'buylix' ); ?></a></li>
						<li><a href="<?php echo esc_url( get_post_type_archive_link( 'car' ) ?: home_url( '/#models' ) ); ?>"><?php esc_html_e( 'Browse cars', 'buylix' ); ?></a></li>
					</ul>
				</div>
				<div class="footer-col">
					<p><?php esc_html_e( 'Visit', 'buylix' ); ?></p>
					<ul class="footer-links footer-contact">
						<li><?php echo esc_html( get_theme_mod( 'buylix_address', 'BGC, Taguig · EDSA Makati · Mandaue Cebu · Bajada Davao' ) ); ?></li>
						<li><a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', get_theme_mod( 'buylix_phone', '(02) 8856-0142' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'buylix_phone', '(02) 8856-0142' ) ); ?></a></li>
						<li><a href="mailto:<?php echo esc_attr( get_theme_mod( 'buylix_email', 'hello@buylix.ph' ) ); ?>"><?php echo esc_html( get_theme_mod( 'buylix_email', 'hello@buylix.ph' ) ); ?></a></li>
						<li><?php echo esc_html( get_theme_mod( 'buylix_hours', 'Mon–Sat 9:00AM–7:00PM · Sun 10:00AM–6:00PM' ) ); ?></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="footer-bottom">
			<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'buylix' ); ?></p>
			<p><?php esc_html_e( 'WordPress theme “Buylix” v1.0', 'buylix' ); ?></p>
		</div>
	</div>
</footer>

</div><!-- .page-shell -->
</div><!-- .page-frame -->
<?php wp_footer(); ?>
</body>
</html>
