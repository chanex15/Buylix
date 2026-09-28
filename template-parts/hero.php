<?php
/**
 * Hero / showcase section.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$hero_img  = get_template_directory_uri() . '/assets/images/hero-car.png';
$black_img = get_template_directory_uri() . '/assets/images/car-black.png';
// Fallback to uploads if the demo images were imported.
?>
<section class="hero" id="home" aria-label="<?php esc_attr_e( 'Showcase', 'buylix' ); ?>">
	<div class="wrap">
		<div class="hero-top">
			<div>
				<span class="hero-badge">
					<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9z"/></svg>
					<?php esc_html_e( '4.9 · 2,400+ verified reviews', 'buylix' ); ?>
				</span>
				<h1 class="hero-title">
					<?php esc_html_e( 'Explore Quality', 'buylix' ); ?><br />
					<span class="o"><?php esc_html_e( 'Cars', 'buylix' ); ?></span> <?php esc_html_e( 'You Can', 'buylix' ); ?><br />
					<?php esc_html_e( 'Trust', 'buylix' ); ?>
				</h1>
				<div class="hero-ctas">
					<a class="btn btn-dark" href="#models"><?php esc_html_e( 'Browse inventory', 'buylix' ); ?>
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
					</a>
					<a class="btn btn-ghost" href="#contact"><?php esc_html_e( 'Book test drive', 'buylix' ); ?></a>
				</div>
				<p class="hero-note">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l7 3v6c0 5-3.5 9-7 11-3.5-2-7-6-7-11V5z"/><path d="M9 12l2 2 4-4"/></svg>
					<?php esc_html_e( 'Flood-free certified · HPG/LTO cleared · 12-mo warranty', 'buylix' ); ?>
				</p>
			</div>

			<div class="hero-mid">
				<a class="hero-arrow" href="#about" aria-label="<?php esc_attr_e( 'Learn more about Buylix', 'buylix' ); ?>">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
				</a>
				<p class="hero-desc"><?php esc_html_e( "Metro Manila's most transparent premium pre-owned dealer — published inspections, flood scans and HPG clearance on every unit.", 'buylix' ); ?></p>
			</div>

			<div class="hero-range">
				<div class="range-orb" role="img" aria-label="<?php esc_attr_e( '830 kilometers driving range', 'buylix' ); ?>">
					<div><strong>830 <small>KM</small></strong><span><?php esc_html_e( 'Driving Range', 'buylix' ); ?></span></div>
				</div>
			</div>
		</div>

		<div class="car-stage">
			<div class="social-rail" aria-label="<?php esc_attr_e( 'Social media', 'buylix' ); ?>">
				<a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-7h2.4l.4-3h-2.8V9.1c0-.9.3-1.5 1.6-1.5h1.3V4.9c-.3 0-1.1-.1-2-.1-2 0-3.4 1.2-3.4 3.5V11H8.5v3H11v7h2.5z"/></svg></a>
				<a href="#" class="on" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1.1" fill="currentColor" stroke="none"/></svg></a>
				<a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.5 8.8v12H3V8.8h3.5zM4.7 3.5a2 2 0 1 1 0 4.1 2 2 0 0 1 0-4.1zM20.5 13.4v7.4h-3.5v-6.6c0-1.6-.6-2.6-2-2.6-.9 0-1.4.6-1.7 1.2-.1.2-.1.5-.1.8v7.2H9.7V8.8h3.5v1.6c.5-.7 1.3-1.8 3.2-1.8 2.4 0 4.1 1.6 4.1 4.8z"/></svg></a>
				<a href="#" aria-label="X"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.2 2.3h3.3l-7.2 8.2 8.5 11.2h-6.7l-5.2-6.8-6 6.8H1.7l7.7-8.8-8.1-10.6h6.9l4.7 6.2z"/></svg></a>
			</div>

			<div class="car-main">
				<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php esc_attr_e( 'Silver Buylix Cabrio S convertible sports car', 'buylix' ); ?>" fetchpriority="high" />
				<button class="hotspot" style="left:54%;top:5%" data-hotspot aria-controls="hotspotCard" data-title="<?php esc_attr_e( 'Panoramic acoustic roof', 'buylix' ); ?>" data-text="<?php esc_attr_e( 'Triple-layer insulation, one-touch open in 9 seconds, wind deflector included.', 'buylix' ); ?>" aria-label="<?php esc_attr_e( 'Roof details', 'buylix' ); ?>">+</button>
				<button class="hotspot" style="left:28%;top:71%" data-hotspot aria-controls="hotspotCard" data-title="<?php esc_attr_e( '21-inch forged alloys', 'buylix' ); ?>" data-text="<?php esc_attr_e( 'Michelin Pilot Sport 4S, red calipers, ceramic coating and TPMS as standard.', 'buylix' ); ?>" aria-label="<?php esc_attr_e( 'Wheel details', 'buylix' ); ?>">+</button>
				<div class="hotspot-card" id="hotspotCard" hidden>
					<strong data-t></strong>
					<p data-d></p>
					<button data-hotspot-close><?php esc_html_e( 'Close', 'buylix' ); ?></button>
				</div>
			</div>

			<div class="hero-bottom">
				<div class="brand-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Filter by brand', 'buylix' ); ?>">
					<button class="on" role="tab" aria-selected="true" data-brand="BMW">BMW <?php esc_html_e( 'Cars', 'buylix' ); ?></button>
					<button role="tab" aria-selected="false" data-brand="Toyota">Toyota <?php esc_html_e( 'Cars', 'buylix' ); ?></button>
					<button role="tab" aria-selected="false" data-brand="Mercedes-Benz">Mercedes-Benz <?php esc_html_e( 'Cars', 'buylix' ); ?></button>
					<button role="tab" aria-selected="false" data-brand="Volkswagen">Volkswagen <?php esc_html_e( 'Cars', 'buylix' ); ?></button>
				</div>

				<div class="hero-mini">
					<div class="mini-stat"><strong>30 <small><?php esc_html_e( 'days', 'buylix' ); ?></small></strong><span><?php esc_html_e( 'Exchange promise', 'buylix' ); ?></span></div>
					<div class="swatches" role="radiogroup" aria-label="<?php esc_attr_e( 'Exterior color', 'buylix' ); ?>">
						<button class="on" role="radio" aria-checked="true" data-name="Sunset Orange" aria-label="Sunset Orange" style="background:#ff4d00"></button>
						<button role="radio" aria-checked="false" data-name="Silver Mist" aria-label="Silver Mist" style="background:#c7c9ce"></button>
						<button role="radio" aria-checked="false" data-name="Coastal Blue" aria-label="Coastal Blue" style="background:#5b9dff"></button>
						<button role="radio" aria-checked="false" data-name="Midnight Black" aria-label="Midnight Black" style="background:#0b0b0c"></button>
						<button role="radio" aria-checked="false" data-name="Mint Fresh" aria-label="Mint Fresh" style="background:#d8f3b4"></button>
					</div>
					<span id="swatchName" class="trust-note" aria-live="polite">Sunset Orange</span>
				</div>

				<a class="deal-card" href="#models">
					<span class="deal-plus" aria-hidden="true">+</span>
					<span class="deal-img">
						<img src="<?php echo esc_url( $black_img ); ?>" alt="<?php esc_attr_e( 'Black convertible available now', 'buylix' ); ?>" loading="lazy" />
						<span class="deal-tag">830 KM <?php esc_html_e( 'range', 'buylix' ); ?></span>
					</span>
					<p><?php esc_html_e( 'Find The Best Deals On Top-Condition Cars.', 'buylix' ); ?></p>
				</a>
			</div>
		</div>
	</div>
</section>
