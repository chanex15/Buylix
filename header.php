<?php
/**
 * Header template.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'buylix' ); ?></a>
<div class="page-frame">
<div class="page-shell">

<header class="site-header" id="top">
	<div class="header-inner">
		<div class="brand">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="brand-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<span class="brand-mark" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7"/><path d="M8 7h8v8"/><circle cx="12" cy="12" r="10" opacity="0.35"/></svg>
					</span>
					<span class="brand-name"><?php bloginfo( 'name' ); ?></span>
				</a>
			<?php endif; ?>
		</div>

		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary', 'buylix' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'pill-menu',
					'container'      => false,
					'fallback_cb'    => 'buylix_fallback_menu',
				)
			);
			?>
		</nav>

		<div class="header-cta">
			<a class="header-phone" href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', get_theme_mod( 'buylix_phone', '(02) 8856-0142' ) ) ); ?>">
				<span class="phone-ico" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.7a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.7 2Z"/></svg>
				</span>
				<?php echo esc_html( get_theme_mod( 'buylix_phone', '(02) 8856-0142' ) ); ?>
			</a>
			<a class="btn btn-brand" href="<?php echo esc_url( is_front_page() ? '#contact' : home_url( '/#contact' ) ); ?>">
				<?php esc_html_e( 'Contact', 'buylix' ); ?>
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
			</a>
			<button class="menu-toggle" id="menuToggle" aria-expanded="false" aria-controls="mobileMenu" aria-label="<?php esc_attr_e( 'Open menu', 'buylix' ); ?>">
				<span class="bar" aria-hidden="true"></span>
				<span class="bar" aria-hidden="true"></span>
			</button>
		</div>
	</div>

	<div class="mobile-menu" id="mobileMenu" hidden>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_class'     => 'mobile-list',
				'container'      => 'nav',
				'container_aria_label' => esc_attr__( 'Mobile', 'buylix' ),
				'fallback_cb'    => 'buylix_fallback_menu',
			)
		);
		?>
		<a class="btn btn-brand btn-block" href="<?php echo esc_url( is_front_page() ? '#contact' : home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Contact us', 'buylix' ); ?></a>
	</div>
</header>

<?php
// Fallback menu when no menu assigned.
function buylix_fallback_menu() {
	$items = array(
		'home'     => __( 'Home', 'buylix' ),
		'about'    => __( 'About', 'buylix' ),
		'features' => __( 'Features', 'buylix' ),
		'models'   => __( 'Models', 'buylix' ),
		'benefits' => __( 'Benefits', 'buylix' ),
	);
	echo '<ul class="pill-menu">';
	$first = true;
	foreach ( $items as $anchor => $label ) {
		$url = is_front_page() ? '#' . $anchor : home_url( '/#' . $anchor );
		printf(
			'<li><a class="%s" href="%s">%s</a></li>',
			$first ? 'is-active' : '',
			esc_url( $url ),
			esc_html( $label )
		);
		$first = false;
	}
	echo '</ul>';
}
?>
<main id="main">
