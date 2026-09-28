<?php
/**
 * Homepage content sections: trust bar, about, features,
 * benefits, testimonials, FAQ, contact.
 * Localized for Buylix Motors Philippines Inc.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$showroom = get_template_directory_uri() . '/assets/images/showroom.jpg';
$phone    = get_theme_mod( 'buylix_phone', '(02) 8856-0142' );
$phone_tel = preg_replace( '/[^+\d]/', '', $phone );
?>

<!-- Trust bar -->
<div class="wrap band">
	<div class="dark-band reveal">
		<div class="dark-grid">
			<div>
				<p class="kicker"><?php esc_html_e( 'Accredited banks & insurers', 'buylix' ); ?></p>
				<div class="marquee-mask"><div class="marquee" aria-hidden="true">
					<?php foreach ( array( 'BDO', 'BPI', 'Metrobank', 'UnionBank', 'Security Bank', 'Chinabank', 'Malayan Insurance', 'LTO Accredited', 'BDO', 'BPI', 'Metrobank', 'UnionBank', 'Security Bank', 'Chinabank', 'Malayan Insurance', 'LTO Accredited' ) as $b ) : ?>
						<span><?php echo esc_html( $b ); ?><i></i></span>
					<?php endforeach; ?>
				</div></div>
			</div>
			<div class="stat-row">
				<div><strong>12.4k</strong><span><?php esc_html_e( 'Cars delivered', 'buylix' ); ?></span></div>
				<div><strong>4.9/5</strong><span><?php esc_html_e( 'Google rating', 'buylix' ); ?></span></div>
				<div><strong>182-pt</strong><span><?php esc_html_e( '+ flood scan', 'buylix' ); ?></span></div>
				<div><strong>4</strong><span><?php esc_html_e( 'Branches nationwide', 'buylix' ); ?></span></div>
			</div>
		</div>
	</div>
</div>

<!-- About -->
<section id="about">
	<div class="wrap band">
		<div class="split">
			<div class="media-card reveal">
				<img class="bg" src="<?php echo esc_url( $showroom ); ?>" alt="<?php esc_attr_e( 'Buylix BGC flagship showroom in Taguig', 'buylix' ); ?>" loading="lazy" />
				<a class="play-btn" href="#models" aria-label="<?php esc_attr_e( 'See certified stock', 'buylix' ); ?>"><span><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5.5v13l11-6.5z"/></svg></span></a>
				<div class="media-chip">
					<div><strong><?php esc_html_e( 'Flagship — BGC, Taguig + 3 branches', 'buylix' ); ?></strong><small><?php esc_html_e( 'Makati · Cebu · Davao — open daily', 'buylix' ); ?></small></div>
					<span class="live"><?php esc_html_e( 'Live stock', 'buylix' ); ?></span>
				</div>
			</div>
			<div class="card reveal">
				<span class="eyebrow"><?php esc_html_e( 'About Buylix PH', 'buylix' ); ?></span>
				<h2 class="h2"><?php esc_html_e( 'Second-hand buying,', 'buylix' ); ?> <span class="accent"><?php esc_html_e( 'without the sugal.', 'buylix' ); ?></span></h2>
				<p class="lead"><?php esc_html_e( 'Buylix Motors Philippines Inc. started in 2021 on Chino Roces, Makati. Today we run 4 branches and every unit carries a published 182-point inspection, flood scan, paint-depth map and HPG/LTO clearance — bago ka pa man bumisita.', 'buylix' ); ?></p>
				<ul class="check-grid">
					<li><span class="check-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H6a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8z"/><path d="M14 3v5h5M9 14l2 2 4-4"/></svg></span><span><strong><?php esc_html_e( 'OR/CR + HPG verified', 'buylix' ); ?></strong><small><?php esc_html_e( 'Alarm, encumbrance & mileage checked', 'buylix' ); ?></small></span></li>
					<li><span class="check-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a4.5 4.5 0 0 0-6 6L3 18l3 3 5.7-5.7a4.5 4.5 0 0 0 6-6L14 13l-3-3z"/></svg></span><span><strong><?php esc_html_e( 'Flood scan included', 'buylix' ); ?></strong><small><?php esc_html_e( 'ECU, harness & carpet moisture test', 'buylix' ); ?></small></span></li>
					<li><span class="check-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></svg></span><span><strong><?php esc_html_e( '8-bank financing', 'buylix' ); ?></strong><small><?php esc_html_e( 'From 10.9% add-on, 24-hr approval', 'buylix' ); ?></small></span></li>
					<li><span class="check-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 15.5-6.2L21 8M21 12a9 9 0 0 1-15.5 6.2L3 16"/><path d="M21 3v5h-5M3 21v-5h5"/></svg></span><span><strong><?php esc_html_e( '30-day exchange', 'buylix' ); ?></strong><small><?php esc_html_e( "Palit-unit kung hindi swak sa'yo", 'buylix' ); ?></small></span></li>
				</ul>
				<div class="about-cta">
					<a class="btn btn-dark" href="#models"><?php esc_html_e( 'See certified stock', 'buylix' ); ?>
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
					<div style="display:flex;align-items:center;gap:.7rem">
						<div class="avatars" aria-hidden="true"><span style="background:#0b0b0c">JM</span><span style="background:#ff4d00">AC</span><span style="background:#5b9dff">RT</span></div>
						<p class="trust-note"><?php esc_html_e( 'Trusted by', 'buylix' ); ?> <strong>12,400+ <?php esc_html_e( 'Filipino drivers', 'buylix' ); ?></strong><br /><?php esc_html_e( 'Luzon · Visayas · Mindanao', 'buylix' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Features -->
<section id="features">
	<div class="wrap band">
		<div class="card reveal">
			<div class="sec-head">
				<div>
					<span class="eyebrow"><?php esc_html_e( 'Features', 'buylix' ); ?></span>
					<h2 class="h2"><?php esc_html_e( 'Lahat asikaso,', 'buylix' ); ?> <span style="color:var(--muted);font-weight:500"><?php esc_html_e( 'ikaw mag-drive na lang.', 'buylix' ); ?></span></h2>
				</div>
				<a class="link-arrow" href="#contact"><?php esc_html_e( 'Talk to a specialist', 'buylix' ); ?><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7M8 7h9v9"/></svg></span></a>
			</div>
			<div class="feat-grid">
				<?php
				$feats = array(
					array( __( '182-point + flood scan', 'buylix' ), __( 'Engine, gearbox, chassis, electronics, paint-depth — plus ECU/harness/carpet flood detection. Full PDF with photos on every listing.', 'buylix' ), __( 'Report included', 'buylix' ) ),
					array( __( '8-bank financing', 'buylix' ), __( 'BDO, BPI, Metrobank + 5 more. One application, lowest rate you qualify for — quoted with chattel + insurance, no surprises.', 'buylix' ), __( 'From 10.9% add-on', 'buylix' ) ),
					array( __( '12-month warranty', 'buylix' ), __( 'Engine, transmission, cooling and major electrics — honored at all 4 branches + 30 partner casas. Extendable to 36 months.', 'buylix' ), __( 'Extendable', 'buylix' ) ),
					array( __( 'Home test drive', 'buylix' ), __( 'We bring the car to your village, office or condo within 25 km — Skyway run, EDSA crawl, your call. Free for serious buyers.', 'buylix' ), __( 'Free · 45 mins', 'buylix' ) ),
					array( __( 'Trade-in + ₱20k bonus', 'buylix' ), __( 'Firm offer in 30 minutes, honored 14 days. We settle your bank balance and collect from your driveway for free.', 'buylix' ), __( '+₱20k bonus', 'buylix' ) ),
					array( __( 'HPG/LTO cleared', 'buylix' ), __( 'Alarm check, encumbrance check, mileage verification. OR/CR transfer to your name in 3–7 days NCR — no LTO lines.', 'buylix' ), __( 'Transfer included', 'buylix' ) ),
				);
				foreach ( $feats as $f ) :
					?>
					<article class="feat">
						<div class="feat-top">
							<span class="feat-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l7 3v6c0 5-3.5 9-7 11-3.5-2-7-6-7-11V5z"/><path d="M9 12l2 2 4-4"/></svg></span>
							<span class="feat-meta"><?php echo esc_html( $f[2] ); ?></span>
						</div>
						<h3><?php echo esc_html( $f[0] ); ?></h3>
						<p><?php echo esc_html( $f[1] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/models' ); ?>

<!-- Benefits -->
<section id="benefits">
	<div class="wrap band">
		<div class="split">
			<div class="compare reveal">
				<p class="kicker"><?php esc_html_e( 'Benefits', 'buylix' ); ?></p>
				<h2><?php esc_html_e( 'Buylix vs. typical', 'buylix' ); ?> <span><?php esc_html_e( 'buy-and-sell lot.', 'buylix' ); ?></span></h2>
				<div class="cmp-table">
					<div class="cmp-head"><p><?php esc_html_e( 'What you get', 'buylix' ); ?></p><p>Buylix</p><p><?php esc_html_e( 'Others', 'buylix' ); ?></p></div>
					<?php
					$rows = array(
						__( 'Published 182-pt inspection + flood scan', 'buylix' ),
						__( 'Real photos + 4K walkaround video', 'buylix' ),
						__( 'HPG/LTO clearance verified before listing', 'buylix' ),
						__( '12-month warranty, 4 branches', 'buylix' ),
						__( 'OR/CR transfer handled (no LTO lines)', 'buylix' ),
						__( '30-day exchange + flood money-back', 'buylix' ),
					);
					foreach ( $rows as $r ) :
						?>
						<div class="cmp-row"><p><?php echo esc_html( $r ); ?></p><p class="c"><span class="cmp-yes">✓</span></p><p class="c"><span class="cmp-no">–</span></p></div>
					<?php endforeach; ?>
				</div>
				<p class="fine"><?php esc_html_e( 'Based on a 2025 mystery-shop of 24 lots along EDSA, Evangelista & Banawe.', 'buylix' ); ?></p>
			</div>
			<div class="card reveal">
				<span class="eyebrow"><?php esc_html_e( 'How it works', 'buylix' ); ?></span>
				<h2 class="h2"><?php esc_html_e( 'Browsing to driving in 48 hours.', 'buylix' ); ?></h2>
				<ol class="steps">
					<li><span class="n">01</span><span><strong><?php esc_html_e( 'Browse & reserve', 'buylix' ); ?></strong><small><?php esc_html_e( '₱10,000 refundable hold via GCash/Maya/bank. Off-market for 7 days while you decide.', 'buylix' ); ?></small></span></li>
					<li><span class="n">02</span><span><strong><?php esc_html_e( 'Inspect & drive', 'buylix' ); ?></strong><small><?php esc_html_e( 'Branch visit, home test within 25 km, or video-call walkaround for provincial buyers. Bring your mekaniko.', 'buylix' ); ?></small></span></li>
					<li><span class="n">03</span><span><strong><?php esc_html_e( 'Finance & sign', 'buylix' ); ?></strong><small><?php esc_html_e( '24-hr bank approval, e-sign in 20 mins. Trade-in collected from your driveway, balance settled.', 'buylix' ); ?></small></span></li>
					<li><span class="n">04</span><span><strong><?php esc_html_e( 'Drive + OR/CR transfer', 'buylix' ); ?></strong><small><?php esc_html_e( 'HPG clearance + LTO transfer to your name in 3–7 days NCR. 12-mo warranty + 24/7 roadside.', 'buylix' ); ?></small></span></li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!-- Testimonials -->
<div class="wrap band" id="testimonials">
	<div class="card reveal">
		<div class="testi-grid">
			<div>
				<span class="eyebrow"><?php esc_html_e( 'Reviews', 'buylix' ); ?></span>
				<h2 class="h2"><?php esc_html_e( 'Loved nationwide, rated 4.9/5.', 'buylix' ); ?></h2>
				<div class="stars" aria-label="4.9 out of 5 stars">
					<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9z"/></svg>
					<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9z"/></svg>
					<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9z"/></svg>
					<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9z"/></svg>
					<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.5l2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9z"/></svg>
					<span>2,400+ <?php esc_html_e( 'verified', 'buylix' ); ?></span>
				</div>
				<div class="testi-nav">
					<button class="tbtn" id="tPrev" aria-label="<?php esc_attr_e( 'Previous review', 'buylix' ); ?>">←</button>
					<button class="tbtn solid" id="tNext" aria-label="<?php esc_attr_e( 'Next review', 'buylix' ); ?>">→</button>
					<div class="tdots" role="tablist" aria-label="<?php esc_attr_e( 'Choose review', 'buylix' ); ?>">
						<button class="on" role="tab" aria-selected="true" aria-label="Review 1"></button>
						<button role="tab" aria-selected="false" aria-label="Review 2"></button>
						<button role="tab" aria-selected="false" aria-label="Review 3"></button>
						<button role="tab" aria-selected="false" aria-label="Review 4"></button>
					</div>
				</div>
			</div>
			<div class="quote-stack">
				<?php
				$quotes = array(
					array( 'Jessa Mendoza', 'Mercedes-Benz C 300 · 2023 · BGC', 'Pinakita nila sa 4K video ang maliit na gasgas na hindi pa naka-list — doon ako naniwala sa inspection. Eleven minutes lang ang BPI approval, then delivered detailed with full tank sa condo ko sa Uptown.', 'JM', '#0b0b0c' ),
					array( 'Andrei Cruz', 'BMW M4 Competition · 2024 · Makati', 'Same M4 sa dalawang ibang dealer, mas mura ng ₱140k ang out-the-door sa Buylix — kasama pa 12-month warranty na ₱95k ang singil sa iba. Yung flood scan report with photos ang nag-seal ng deal.', 'AC', '#ff4d00' ),
					array( 'Rachelle Tan', 'Volkswagen Golf GTI · 2023 · Cebu', 'From Mandaue branch — they honored my Vios trade-in appraisal to the peso, handled HPG and LTO transfer in 6 days. Never ako pumila. Weekly updates on Viber with pictures.', 'RT', '#5b9dff' ),
					array( 'Marco Villanueva', 'Audi RS 5 · 2024 · Davao', 'First premium buy ko, ang daming tanong. They sent compression-test photos, service invoices from PGA Cars, even the previous OR/CR history. Zero pressure, video-call pa ang walkaround.', 'MV', '#059669' ),
				);
				foreach ( $quotes as $i => $qt ) :
					?>
					<figure class="quote-card quote-slide <?php echo $i === 0 ? '' : 'off'; ?>" <?php echo $i === 0 ? '' : 'aria-hidden="true"'; ?>>
						<svg class="q" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M10 8H6a4 4 0 0 0-4 4v6h7v-7H6.5A2.5 2.5 0 0 1 9 8.5zm12 0h-4a4 4 0 0 0-4 4v6h7v-7h-2.5A2.5 2.5 0 0 1 21 8.5z"/></svg>
						<blockquote>“<?php echo esc_html( $qt[2] ); ?>”</blockquote>
						<figcaption class="quote-who">
							<span class="quote-av" style="background:<?php echo esc_attr( $qt[4] ); ?>" aria-hidden="true"><?php echo esc_html( $qt[3] ); ?></span>
							<span><strong><?php echo esc_html( $qt[0] ); ?></strong><small><?php echo esc_html( $qt[1] ); ?></small></span>
							<span class="verified">✓ <?php esc_html_e( 'OR/CR-verified', 'buylix' ); ?></span>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<!-- FAQ -->
<div class="wrap band">
	<div class="split">
		<div class="faq-cta reveal">
			<h2><?php esc_html_e( 'Tanong? Sumasagot kami na parang may-ari, hindi ahente.', 'buylix' ); ?></h2>
			<p><?php esc_html_e( 'Tawag, text o Viber — product specialist (hindi call center) replies in ~15 mins sa opening hours.', 'buylix' ); ?></p>
			<a class="white-btn" href="tel:<?php echo esc_attr( $phone_tel ); ?>"><?php echo esc_html( $phone ); ?></a>
			<a class="ghost-btn" href="#contact"><?php esc_html_e( 'Send a message', 'buylix' ); ?></a>
			<p style="font-size:.75rem"><?php echo esc_html( get_theme_mod( 'buylix_hours', 'Mon–Sat 9:00AM–7:00PM · Sun 10:00AM–6:00PM' ) ); ?></p>
		</div>
		<div class="faq-list reveal">
			<?php
			$faqs = array(
				array( __( 'Paano ko malalaman na hindi flooded o tampered ang unit?', 'buylix' ), __( 'Every listing carries a downloadable PDF: 182-point inspection, ECU/harness/carpet flood scan, paint-depth map, OBD mileage log, plus HPG alarm and LTO encumbrance clearances. If our flood-free certification is proven wrong within 12 months: full refund + ₱50,000.', 'buylix' ) ),
				array( __( 'Gaano katagal ang OR/CR transfer sa pangalan ko?', 'buylix' ), __( '3–7 working days in NCR, 7–14 in Cebu/Davao — handled entirely by our LTO liaisons. Includes HPG clearance, notarized deed of sale, BIR CAR assistance and new-plate tracking.', 'buylix' ) ),
				array( __( 'Pwede ba ang financing kung OFW, seaman o freelancer ako?', 'buylix' ), __( 'Yes. BDO, BPI and Security Bank accept POEA contracts + allotment slips (OFW/seafarer), ITR + bank statements (freelancer/business). One application shopped to 8 banks; pre-approval in ~24 hours.', 'buylix' ) ),
				array( __( 'How does trade-in work? May balance pa ako sa bank.', 'buylix' ), __( 'Send plate, year/make/model, mileage and 6 photos for a firm 30-minute offer, honored 14 days/500 km. We settle your balance directly with your bank and collect free within Metro Manila, Cebu or Davao. +₱20,000 bonus when you buy from stock.', 'buylix' ) ),
				array( __( 'Nagde-deliver ba kayo sa probinsya? Magkano?', 'buylix' ), __( 'Yes — Metro Manila free, Luzon flatbed from ₱8,500, VisMin via 2GO RoRo from ₱28,000 with marine insurance (Cebu 3–5 days, Davao 5–8). Balance payable on delivery inspection.', 'buylix' ) ),
				array( __( 'Ano ang 30-day exchange promise?', 'buylix' ), __( "Drive up to 30 days or 1,000 km. If the car isn't right, exchange for any unit of equal or greater value — just pay the difference. No restocking fee. One exchange per purchase.", 'buylix' ) ),
			);
			foreach ( $faqs as $i => $f ) :
				?>
				<div class="faq-item <?php echo $i === 0 ? 'open' : ''; ?>">
					<button class="faq-q" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"><?php echo esc_html( $f[0] ); ?><span class="faq-x" aria-hidden="true">+</span></button>
					<div class="faq-a"><div><p><?php echo esc_html( $f[1] ); ?></p></div></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!-- Contact -->
<section id="contact">
	<div class="wrap band">
		<div class="contact reveal">
			<div class="contact-info">
				<p class="kicker"><?php esc_html_e( 'Contact · 4 branches', 'buylix' ); ?></p>
				<h2><?php esc_html_e( "Visit a branch, or kami ang pupunta sa'yo.", 'buylix' ); ?></h2>
				<p class="sub"><?php esc_html_e( 'Book a test drive, value your trade-in or just talk cars. Home test drives within 25 km of any branch — free, fueled and detailed.', 'buylix' ); ?></p>
				<ul class="info-list">
					<li><span class="info-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg></span><span><strong><?php echo esc_html( get_theme_mod( 'buylix_address', 'BGC, Taguig · EDSA Makati · Mandaue Cebu · Bajada Davao' ) ); ?></strong><small><?php esc_html_e( 'Free parking + EV charging at flagship', 'buylix' ); ?></small></span></li>
					<li><span class="info-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span><span><strong><?php echo esc_html( get_theme_mod( 'buylix_hours', 'Mon–Sat 9:00AM–7:00PM · Sun 10:00AM–6:00PM' ) ); ?></strong><small><?php esc_html_e( 'After-hours pickup by appointment', 'buylix' ); ?></small></span></li>
					<li><span class="info-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.7a2 2 0 0 1-.5 2.1L8 9.7a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.5 2.7.6a2 2 0 0 1 1.7 2Z"/></svg></span><span><strong><a href="tel:<?php echo esc_attr( $phone_tel ); ?>" style="color:#fff"><?php echo esc_html( $phone ); ?></a></strong><small><?php esc_html_e( 'Call, text, Viber or WhatsApp — ~15 min reply', 'buylix' ); ?></small></span></li>
					<li><span class="info-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 6L22 7"/></svg></span><span><strong><a href="mailto:<?php echo esc_attr( get_theme_mod( 'buylix_email', 'hello@buylix.ph' ) ); ?>" style="color:#fff"><?php echo esc_html( get_theme_mod( 'buylix_email', 'hello@buylix.ph' ) ); ?></a></strong><small><?php esc_html_e( 'Inspection PDFs & OR/CR inquiries', 'buylix' ); ?></small></span></li>
				</ul>
			</div>
			<div class="contact-form">
				<form id="contactForm" action="#" method="post" novalidate>
					<h3><?php esc_html_e( 'Book your visit', 'buylix' ); ?></h3>
					<p class="form-sub"><?php esc_html_e( 'No spam, no pressure. Confirmed time + fueled car + Viber updates.', 'buylix' ); ?></p>
					<div class="form-grid">
						<div class="field"><label for="c-name"><?php esc_html_e( 'Full name *', 'buylix' ); ?></label><input id="c-name" name="name" autocomplete="name" placeholder="Juan Dela Cruz" /></div>
						<div class="field"><label for="c-phone"><?php esc_html_e( 'Mobile (Viber-ready) *', 'buylix' ); ?></label><input id="c-phone" name="phone" autocomplete="tel" inputmode="tel" placeholder="0917 123 4567" /></div>
						<div class="field"><label for="c-email"><?php esc_html_e( 'Email', 'buylix' ); ?></label><input id="c-email" name="email" type="email" autocomplete="email" placeholder="you@email.com" /></div>
						<div class="field"><label for="c-date"><?php esc_html_e( 'Preferred date', 'buylix' ); ?></label><input id="c-date" name="date" type="date" /></div>
						<div class="field span2"><label for="c-interest"><?php esc_html_e( "I'm interested in", 'buylix' ); ?></label>
							<select id="c-interest" name="interest">
								<option><?php esc_html_e( 'Book a test drive', 'buylix' ); ?></option>
								<option><?php esc_html_e( 'Home test drive', 'buylix' ); ?></option>
								<option><?php esc_html_e( 'Value my trade-in', 'buylix' ); ?></option>
								<option><?php esc_html_e( 'Get financing pre-approval', 'buylix' ); ?></option>
								<option><?php esc_html_e( 'Source a specific car', 'buylix' ); ?></option>
							</select>
						</div>
						<div class="field span2"><label for="c-msg"><?php esc_html_e( 'Message', 'buylix' ); ?></label><textarea id="c-msg" name="message" placeholder="<?php esc_attr_e( 'e.g. Gusto ko ma-try ang C 300 sa Saturday morning, BGC.', 'buylix' ); ?>"></textarea></div>
					</div>
					<p class="form-err" id="formErr" hidden role="alert"></p>
					<button type="submit" class="btn btn-brand btn-block" style="margin-top:1rem"><?php esc_html_e( 'Request appointment', 'buylix' ); ?></button>
					<p class="tiny"><?php esc_html_e( 'Data handled per RA 10173 (Data Privacy Act). Tip: connect to Contact Form 7 / WPForms / Fluent Forms — field names match.', 'buylix' ); ?></p>
				</form>
				<div class="form-ok" id="formDone" hidden>
					<span class="ok-ico">✓</span>
					<h3><?php esc_html_e( 'Salamat,', 'buylix' ); ?> <span id="formWho"><?php esc_html_e( 'ka-Buylix', 'buylix' ); ?></span>!</h3>
					<p class="lead"><?php esc_html_e( 'A product specialist will confirm your visit within 15 minutes in opening hours.', 'buylix' ); ?></p>
					<button class="btn btn-ghost" id="formAgain"><?php esc_html_e( 'Make another request', 'buylix' ); ?></button>
				</div>
			</div>
		</div>
	</div>
</section>
