=== Buylix ===
Contributors: buylix-studio
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: automotive, business, clean, minimal, white, orange, responsive, custom-menu, featured-images, translation-ready

Premium automotive dealership theme. White showroom aesthetic, signal-orange accent,
pill navigation, hero showcase, certified inventory (Car post type), benefits,
reviews, FAQ and booking contact section. No page builder required.

== Description ==

Buylix is a complete dealership homepage plus blog-ready inner templates:

* Sticky pill navigation with mobile menu (Primary Menu location)
* Hero showcase with range badge, hotspots, brand tabs and deal card
* Trust bar, about/showroom, features grid
* Filterable inventory (brand tabs, live search, sort, budget slider, detail modal
  with payment estimator) — powered by the "car" Custom Post Type + "brand" taxonomy
* Benefits comparison, 4-step process, auto-playing testimonials, FAQ accordion
* Contact/booking section with validation + Customizer details (phone, email, address, hours)
* Templates: front-page, index, page, single (post + car), archive (incl. car archive),
  search, 404. Sidebar: Blog Sidebar.

Demo stock ships as a built-in fallback so the homepage looks complete before you
add cars. Add real cars under Dashboard → Cars → Add New, set the featured image
and fill the "Car Details" box (price, year, mileage, fuel, transmission, seats,
range, badge). Assign a Brand term to make filters work.

== Installation ==

1. Copy demo images (optional but recommended):
   public/images/*.png|jpg  →  wordpress-theme/assets/images/
   (hero-car.png, car-black.png, car-bmw.jpg, car-toyota.jpg, car-mercedes.jpg,
   car-vw.jpg, car-audi.jpg, showroom.jpg)
2. Zip the `wordpress-theme` folder contents so style.css is at the zip root,
   rename to buylix.zip (or use the provided wordpress-theme.zip).
3. WordPress Dashboard → Appearance → Themes → Add New → Upload Theme → choose
   buylix.zip → Install Now → Activate.
4. Appearance → Menus: create a menu with links Home (#home), About (#about),
   Features (#features), Models (#models), Benefits (#benefits); assign to Primary.
5. Settings → Reading: set homepage to a static page using template "Front Page"
   or simply visit the front page (front-page.php renders automatically).
6. Appearance → Customize → Buylix Contact: set phone, email, address, hours.
   Appearance → Customize → Site Identity: upload logo (optional).
7. Cars → Brands: add BMW, Toyota, Mercedes-Benz, Volkswagen, Audi. Cars → Add New
   for each vehicle with featured image + details.

== Forms ==

The contact form validates in vanilla JS and shows a success state. For email
delivery / CRM, install Contact Form 7, WPForms or Fluent Forms and replace the
<form id="contactForm"> block in template-parts/home-sections.php — field names
(name, phone, email, date, interest, message) are already compatible.

== Performance & accessibility ==

* No frameworks: one stylesheet (~all design tokens in :root), one deferred
  vanilla-JS file, system-friendly Google font with display=swap.
* Semantic landmarks, skip link, aria labels on controls, focus-visible styles,
  alt text, keyboard-closable modal/menu, prefers-reduced-motion support.

== Changelog ==

= 1.0.0 =
* Initial release.
