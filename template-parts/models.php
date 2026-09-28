<?php
/**
 * Inventory / models section. Uses "car" CPT when available,
 * falls back to built-in demo stock so the theme looks complete on install.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cars = array();
$q    = new WP_Query(
	array(
		'post_type'      => 'car',
		'posts_per_page' => 12,
		'post_status'    => 'publish',
	)
);
if ( $q->have_posts() ) {
	while ( $q->have_posts() ) {
		$q->the_post();
		$meta   = buylix_get_car_data( get_the_ID() );
		$brands = get_the_terms( get_the_ID(), 'brand' );
		$cars[] = array(
			'brand'     => ( $brands && ! is_wp_error( $brands ) ) ? $brands[0]->name : __( 'Buylix', 'buylix' ),
			'name'      => get_the_title(),
			'trim'      => $meta['trim'],
			'price'     => $meta['price'] ? (int) $meta['price'] : 0,
			'old_price' => (int) $meta['old_price'],
			'year'      => $meta['year'],
			'km'        => (int) $meta['km'],
			'fuel'      => $meta['fuel'] ?: __( 'Petrol', 'buylix' ),
			'trans'     => $meta['trans'] ?: __( 'Automatic', 'buylix' ),
			'seats'     => $meta['seats'] ?: '5',
			'range'     => $meta['range'] ?: '600',
			'tag'       => $meta['tag'],
			'img'       => get_the_post_thumbnail_url( get_the_ID(), 'buylix-card' ),
		);
	}
	wp_reset_postdata();
}

// Demo fallback stock.
if ( empty( $cars ) ) {
	$base = get_template_directory_uri() . '/assets/images/';
	$cars = array(
		array( 'brand' => 'BMW', 'name' => 'BMW M4 Competition', 'trim' => '3.0 M TwinPower · xDrive · PH-spec', 'price' => 5290000, 'old_price' => 5590000, 'year' => 2024, 'km' => 8200, 'fuel' => 'Petrol', 'trans' => 'Automatic', 'seats' => 4, 'range' => 610, 'tag' => 'Flood-free certified', 'img' => $base . 'car-bmw.jpg' ),
		array( 'brand' => 'Toyota', 'name' => 'Toyota GR Supra', 'trim' => '3.0 Premium · RWD · Casa-maintained', 'price' => 3850000, 'old_price' => 0, 'year' => 2024, 'km' => 5400, 'fuel' => 'Petrol', 'trans' => 'Automatic', 'seats' => 2, 'range' => 580, 'tag' => 'Casa records', 'img' => $base . 'car-toyota.jpg' ),
		array( 'brand' => 'Mercedes-Benz', 'name' => 'Mercedes-Benz C 300', 'trim' => 'AMG Line · 4MATIC', 'price' => 2980000, 'old_price' => 3150000, 'year' => 2023, 'km' => 14800, 'fuel' => 'Hybrid', 'trans' => 'Automatic', 'seats' => 5, 'range' => 830, 'tag' => 'Best value', 'img' => $base . 'car-mercedes.jpg' ),
		array( 'brand' => 'Volkswagen', 'name' => 'Volkswagen Golf GTI', 'trim' => '2.0 TSI · DSG · VW BGC serviced', 'price' => 1680000, 'old_price' => 0, 'year' => 2023, 'km' => 18200, 'fuel' => 'Petrol', 'trans' => 'Automatic', 'seats' => 5, 'range' => 640, 'tag' => '', 'img' => $base . 'car-vw.jpg' ),
		array( 'brand' => 'Audi', 'name' => 'Audi RS 5 Sportback', 'trim' => '2.9 TFSI · quattro · PGA Cars serviced', 'price' => 5490000, 'old_price' => 0, 'year' => 2024, 'km' => 9600, 'fuel' => 'Petrol', 'trans' => 'Automatic', 'seats' => 5, 'range' => 595, 'tag' => 'New arrival', 'img' => $base . 'car-audi.jpg' ),
		array( 'brand' => 'BMW', 'name' => 'Buylix Cabrio S', 'trim' => 'Convertible · Signature · BGC showcase', 'price' => 4250000, 'old_price' => 4490000, 'year' => 2025, 'km' => 1200, 'fuel' => 'Petrol', 'trans' => 'Automatic', 'seats' => 2, 'range' => 830, 'tag' => 'Showcase', 'img' => $base . 'hero-car.png' ),
	);
}

$brands = array( 'All', 'BMW', 'Toyota', 'Mercedes-Benz', 'Volkswagen', 'Audi' );
?>
<section id="models" aria-label="<?php esc_attr_e( 'Models', 'buylix' ); ?>">
	<div class="wrap band">
		<div class="stock reveal">
			<div class="sec-head">
				<div>
					<span class="eyebrow"><?php esc_html_e( 'Models', 'buylix' ); ?></span>
					<h2 class="h2"><?php esc_html_e( 'Certified stock,', 'buylix' ); ?> <span class="accent"><?php esc_html_e( 'ready to drive.', 'buylix' ); ?></span></h2>
					<p class="lead"><?php esc_html_e( 'Every car below passed our 182-point inspection this month. Reserve for ₱10,000 — refundable in 7 days. HPG/LTO-cleared, flood-scanned.', 'buylix' ); ?></p>
				</div>
				<div class="call-card">
					<span class="phone-ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.7a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.7 2Z"/></svg></span>
					<div><small><?php esc_html_e( 'Need help choosing?', 'buylix' ); ?></small><a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', get_theme_mod( 'buylix_phone', '(02) 8856-0142' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'buylix_phone', '(02) 8856-0142' ) ); ?></a></div>
				</div>
			</div>

			<div class="controls">
				<div class="tabs" role="tablist" aria-label="<?php esc_attr_e( 'Brands', 'buylix' ); ?>">
					<?php foreach ( $brands as $i => $b ) : ?>
						<button role="tab" aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>" class="<?php echo $i === 0 ? 'on' : ''; ?>" data-brand="<?php echo esc_attr( $b ); ?>"><?php echo $b === 'All' ? esc_html__( 'All cars', 'buylix' ) : esc_html( $b ); ?></button>
					<?php endforeach; ?>
				</div>
				<div class="controls-right">
					<label class="search">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
						<input id="carSearch" type="search" placeholder="<?php esc_attr_e( 'Search model, trim…', 'buylix' ); ?>" aria-label="<?php esc_attr_e( 'Search cars', 'buylix' ); ?>" />
					</label>
					<label class="sortsel">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M7 12h10M10 18h4"/></svg>
						<select id="carSort" aria-label="<?php esc_attr_e( 'Sort cars', 'buylix' ); ?>">
							<option value="featured"><?php esc_html_e( 'Featured', 'buylix' ); ?></option>
							<option value="price-low"><?php esc_html_e( 'Price: low to high', 'buylix' ); ?></option>
							<option value="price-high"><?php esc_html_e( 'Price: high to low', 'buylix' ); ?></option>
							<option value="mileage"><?php esc_html_e( 'Lowest mileage', 'buylix' ); ?></option>
							<option value="year"><?php esc_html_e( 'Newest year', 'buylix' ); ?></option>
						</select>
					</label>
				</div>
			</div>

			<div class="budget">
				<strong><?php esc_html_e( 'Max budget:', 'buylix' ); ?> <em id="budgetLabel">₱6,000,000</em></strong>
				<input type="range" id="carBudget" min="1000000" max="6000000" step="100000" value="6000000" aria-label="<?php esc_attr_e( 'Maximum price', 'buylix' ); ?>" />
				<small id="carCount"><?php echo esc_html( sprintf( __( '%d of %d cars', 'buylix' ), count( $cars ), count( $cars ) ) ); ?></small>
			</div>

			<div class="car-grid" id="carGrid">
				<?php foreach ( $cars as $car ) :
					$search_str = $car['brand'] . ' ' . $car['name'] . ' ' . $car['trim'];
					$dp         = $car['price'] * 0.2;
					$monthly    = $car['price'] ? round( ( ( $car['price'] - $dp ) * ( 1 + 0.109 * 5 ) ) / 60 ) : 0;
					?>
					<article class="car"
						data-brand="<?php echo esc_attr( $car['brand'] ); ?>"
						data-price="<?php echo esc_attr( $car['price'] ); ?>"
						data-km="<?php echo esc_attr( $car['km'] ); ?>"
						data-year="<?php echo esc_attr( $car['year'] ); ?>"
						data-search="<?php echo esc_attr( $search_str ); ?>"
						data-name="<?php echo esc_attr( $car['name'] ); ?>"
						data-trim="<?php echo esc_attr( $car['trim'] ); ?>"
						data-fuel="<?php echo esc_attr( $car['fuel'] ); ?>"
						data-trans="<?php echo esc_attr( $car['trans'] ); ?>"
						data-seats="<?php echo esc_attr( $car['seats'] ); ?>"
						data-range="<?php echo esc_attr( $car['range'] ); ?>"
						data-old="<?php echo esc_attr( $car['old_price'] ); ?>"
						data-img="<?php echo esc_url( $car['img'] ); ?>">
						<div class="car-img">
							<?php if ( $car['img'] ) : ?>
								<img src="<?php echo esc_url( $car['img'] ); ?>" alt="<?php echo esc_attr( $car['name'] . ' ' . $car['trim'] ); ?>" loading="lazy" />
							<?php endif; ?>
							<?php if ( $car['tag'] ) : ?><span class="car-tag"><?php echo esc_html( $car['tag'] ); ?></span><?php endif; ?>
						</div>
						<div class="car-body">
							<span class="car-brand"><?php echo esc_html( $car['brand'] ); ?></span>
							<h3><?php echo esc_html( $car['name'] ); ?></h3>
							<span class="car-trim"><?php echo esc_html( $car['trim'] ); ?></span>
							<div class="car-specs">
								<div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></svg><p><?php echo esc_html( $car['year'] ); ?></p></div>
								<div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 15l4-6"/><path d="M3.5 15a9 9 0 1 1 17 0"/></svg><p><?php echo esc_html( number_format_i18n( $car['km'] ) ); ?></p></div>
								<div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 21V6a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v15M4 21h12M15 9h2a2 2 0 0 1 2 2v7"/></svg><p><?php echo esc_html( $car['fuel'] ); ?></p></div>
								<div><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M19 12a7 7 0 0 0-.1-1.2l2-1.6-2-3.4-2.4 1a7 7 0 0 0-2-1.2L14 2h-4l-.5 2.6a7 7 0 0 0-2 1.2l-2.4-1-2 3.4 2 1.6A7 7 0 0 0 5 12c0 .4 0 .8.1 1.2l-2 1.6 2 3.4 2.4-1a7 7 0 0 0 2 1.2L10 22h4l.5-2.6a7 7 0 0 0 2-1.2l2.4 1 2-3.4-2-1.6c.06-.4.1-.8.1-1.2z"/></svg><p><?php echo esc_html( $car['trans'] ); ?></p></div>
							</div>
							<div class="car-foot">
								<div>
									<?php if ( $car['old_price'] ) : ?><div class="old"><?php echo esc_html( buylix_price( $car['old_price'] ) ); ?></div><?php endif; ?>
									<div class="price"><?php echo esc_html( buylix_price( $car['price'] ) ); ?></div>
									<div class="per"><?php echo esc_html( sprintf( __( 'Est. %s/mo', 'buylix' ), buylix_price( $monthly ) ) ); ?></div>
								</div>
								<button class="btn btn-dark" data-open-car><?php esc_html_e( 'Details', 'buylix' ); ?>
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
								</button>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="empty" id="carEmpty" hidden>
				<strong><?php esc_html_e( 'No cars match those filters', 'buylix' ); ?></strong>
				<p class="lead"><?php esc_html_e( "Try raising your budget or clearing the search.", 'buylix' ); ?></p>
				<button class="btn btn-dark" id="carReset"><?php esc_html_e( 'Reset filters', 'buylix' ); ?></button>
			</div>
		</div>
	</div>

	<!-- Detail modal -->
	<div class="modal-back" id="carModal" hidden role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Car details', 'buylix' ); ?>">
		<div class="modal">
			<button class="modal-x" data-close-modal aria-label="<?php esc_attr_e( 'Close details', 'buylix' ); ?>">✕</button>
			<div class="modal-grid">
				<div>
					<div class="car-img" style="border-radius:16px"><img id="mImg" src="" alt="" style="height:15rem" /></div>
					<div class="car-specs" style="grid-template-columns:repeat(3,1fr)">
						<div><p style="color:var(--faint);font-size:.65rem">RANGE</p><p id="mRange">—</p></div>
						<div><p style="color:var(--faint);font-size:.65rem">SEATS</p><p id="mSeats">—</p></div>
						<div><p style="color:var(--faint);font-size:.65rem">YEAR</p><p id="mYear">—</p></div>
					</div>
					<ul class="ticks">
						<li><i>✓</i><?php esc_html_e( '182-point inspection passed', 'buylix' ); ?></li>
						<li><i>✓</i><?php esc_html_e( 'Clean title & service history', 'buylix' ); ?></li>
						<li><i>✓</i><?php esc_html_e( '12-month warranty included', 'buylix' ); ?></li>
					</ul>
				</div>
				<div>
					<span class="car-brand" id="mBrand" style="color:var(--brand)"></span>
					<h3 id="mName" style="margin:.3rem 0;font-size:1.5rem;font-weight:800;letter-spacing:-.02em"></h3>
					<p class="lead" id="mTrim" style="font-size:.82rem"></p>
					<p style="margin:.8rem 0 0"><span id="mPrice" style="font-size:1.9rem;font-weight:800"></span> <span id="mOld" style="color:var(--faint);text-decoration:line-through;font-weight:700"></span></p>
					<div class="calc">
						<div class="row"><span><?php esc_html_e( 'Estimate payment', 'buylix' ); ?></span><span>10.9% add-on · 60 mo</span></div>
						<p class="big"><span id="mMonthly">₱0</span><small>/mo</small></p>
						<label for="mDown" style="font-size:.75rem;font-weight:800;color:var(--muted)"><?php esc_html_e( 'Down payment:', 'buylix' ); ?> <span id="mDownLabel">20%</span></label>
						<input type="range" id="mDown" min="20" max="50" step="5" value="20" style="margin-top:.5rem" />
					</div>
					<div class="modal-ctas">
						<a class="btn btn-brand" href="#contact" data-close-modal style="justify-content:center"><?php esc_html_e( 'Book test drive', 'buylix' ); ?></a>
						<a class="btn btn-ghost" href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', get_theme_mod( 'buylix_phone', '(02) 8856-0142' ) ) ); ?>" style="justify-content:center"><?php esc_html_e( 'Call dealer', 'buylix' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
