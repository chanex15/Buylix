<?php
/**
 * Buylix theme functions.
 *
 * @package Buylix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BUYLIX_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function buylix_setup() {
	load_theme_textdomain( 'buylix', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 48,
			'width'       => 160,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	add_image_size( 'buylix-card', 800, 600, true );
	add_image_size( 'buylix-hero', 1600, 1000, false );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'buylix' ),
			'footer'  => esc_html__( 'Footer Menu', 'buylix' ),
		)
	);
}
add_action( 'after_setup_theme', 'buylix_setup' );

/**
 * Enqueue assets.
 */
function buylix_assets() {
	wp_enqueue_style(
		'buylix-fonts',
		'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'buylix-style', get_stylesheet_uri(), array(), BUYLIX_VERSION );
	wp_enqueue_style( 'buylix-main', get_template_directory_uri() . '/assets/css/main.css', array( 'buylix-fonts' ), BUYLIX_VERSION );

	wp_enqueue_script(
		'buylix-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		BUYLIX_VERSION,
		array( 'strategy' => 'defer' )
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'buylix_assets' );

/**
 * Register "Car" post type for inventory.
 */
function buylix_register_car_cpt() {
	$labels = array(
		'name'               => esc_html__( 'Cars', 'buylix' ),
		'singular_name'      => esc_html__( 'Car', 'buylix' ),
		'add_new_item'       => esc_html__( 'Add New Car', 'buylix' ),
		'edit_item'          => esc_html__( 'Edit Car', 'buylix' ),
		'new_item'           => esc_html__( 'New Car', 'buylix' ),
		'view_item'          => esc_html__( 'View Car', 'buylix' ),
		'search_items'       => esc_html__( 'Search Cars', 'buylix' ),
		'not_found'          => esc_html__( 'No cars found', 'buylix' ),
		'all_items'          => esc_html__( 'All Cars', 'buylix' ),
		'archives'           => esc_html__( 'Car Archives', 'buylix' ),
	);
	register_post_type(
		'car',
		array(
			'labels'        => $labels,
			'public'        => true,
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'cars' ),
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-car',
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		)
	);

	register_taxonomy(
		'brand',
		'car',
		array(
			'label'        => esc_html__( 'Brands', 'buylix' ),
			'public'       => true,
			'hierarchical' => true,
			'show_in_rest' => true,
			'rewrite'      => array( 'slug' => 'brand' ),
		)
	);
}
add_action( 'init', 'buylix_register_car_cpt' );

/**
 * Car meta boxes (price, specs).
 */
function buylix_car_meta_boxes() {
	add_meta_box( 'buylix_car_details', esc_html__( 'Car Details', 'buylix' ), 'buylix_car_meta_html', 'car', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'buylix_car_meta_boxes' );

function buylix_car_meta_html( $post ) {
	wp_nonce_field( 'buylix_car_meta', 'buylix_car_nonce' );
	$keys = array( 'trim', 'price', 'old_price', 'year', 'km', 'fuel', 'trans', 'seats', 'range', 'tag' );
	foreach ( $keys as $key ) {
		${$key} = get_post_meta( $post->ID, '_buylix_' . $key, true );
	}
	?>
	<table class="form-table" style="max-width:640px">
		<tr><th><label for="buylix_trim"><?php esc_html_e( 'Trim', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_trim" name="buylix_trim" value="<?php echo esc_attr( $trim ); ?>" placeholder="3.0 M TwinPower · xDrive" /></td></tr>
		<tr><th><label for="buylix_price"><?php esc_html_e( 'Price (PHP)', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_price" name="buylix_price" type="number" value="<?php echo esc_attr( $price ); ?>" placeholder="2980000" /></td></tr>
		<tr><th><label for="buylix_old_price"><?php esc_html_e( 'Old price (optional)', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_old_price" name="buylix_old_price" type="number" value="<?php echo esc_attr( $old_price ); ?>" /></td></tr>
		<tr><th><label for="buylix_year"><?php esc_html_e( 'Year', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_year" name="buylix_year" type="number" value="<?php echo esc_attr( $year ); ?>" placeholder="2024" /></td></tr>
		<tr><th><label for="buylix_km"><?php esc_html_e( 'Mileage (km)', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_km" name="buylix_km" type="number" value="<?php echo esc_attr( $km ); ?>" placeholder="8200" /></td></tr>
		<tr><th><label for="buylix_fuel"><?php esc_html_e( 'Fuel', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_fuel" name="buylix_fuel" value="<?php echo esc_attr( $fuel ); ?>" placeholder="Petrol" /></td></tr>
		<tr><th><label for="buylix_trans"><?php esc_html_e( 'Transmission', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_trans" name="buylix_trans" value="<?php echo esc_attr( $trans ); ?>" placeholder="Automatic" /></td></tr>
		<tr><th><label for="buylix_seats"><?php esc_html_e( 'Seats', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_seats" name="buylix_seats" type="number" value="<?php echo esc_attr( $seats ); ?>" placeholder="4" /></td></tr>
		<tr><th><label for="buylix_range"><?php esc_html_e( 'Range (km)', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_range" name="buylix_range" type="number" value="<?php echo esc_attr( $range ); ?>" placeholder="610" /></td></tr>
		<tr><th><label for="buylix_tag"><?php esc_html_e( 'Badge (optional)', 'buylix' ); ?></label></th>
			<td><input class="regular-text" id="buylix_tag" name="buylix_tag" value="<?php echo esc_attr( $tag ); ?>" placeholder="Certified" /></td></tr>
	</table>
	<?php
}

function buylix_save_car_meta( $post_id ) {
	if ( ! isset( $_POST['buylix_car_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['buylix_car_nonce'] ) ), 'buylix_car_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$fields = array( 'trim', 'price', 'old_price', 'year', 'km', 'fuel', 'trans', 'seats', 'range', 'tag' );
	foreach ( $fields as $f ) {
		if ( isset( $_POST[ 'buylix_' . $f ] ) ) {
			update_post_meta( $post_id, '_buylix_' . $f, sanitize_text_field( wp_unslash( $_POST[ 'buylix_' . $f ] ) ) );
		}
	}
}
add_action( 'save_post_car', 'buylix_save_car_meta' );

/**
 * Helper: get car meta array.
 */
function buylix_get_car_data( $post_id ) {
	return array(
		'trim'      => get_post_meta( $post_id, '_buylix_trim', true ),
		'price'     => (int) get_post_meta( $post_id, '_buylix_price', true ),
		'old_price' => (int) get_post_meta( $post_id, '_buylix_old_price', true ),
		'year'      => get_post_meta( $post_id, '_buylix_year', true ),
		'km'        => (int) get_post_meta( $post_id, '_buylix_km', true ),
		'fuel'      => get_post_meta( $post_id, '_buylix_fuel', true ),
		'trans'     => get_post_meta( $post_id, '_buylix_trans', true ),
		'seats'     => get_post_meta( $post_id, '_buylix_seats', true ),
		'range'     => get_post_meta( $post_id, '_buylix_range', true ),
		'tag'       => get_post_meta( $post_id, '_buylix_tag', true ),
	);
}

/**
 * Customizer: contact details.
 */
function buylix_customize( $wp_customize ) {
	$wp_customize->add_section( 'buylix_contact', array( 'title' => esc_html__( 'Buylix Contact', 'buylix' ), 'priority' => 30 ) );
	$settings = array(
		'buylix_phone'   => array( '(02) 8856-0142', esc_html__( 'Phone', 'buylix' ) ),
		'buylix_email'   => array( 'hello@buylix.ph', esc_html__( 'Email', 'buylix' ) ),
		'buylix_address' => array( 'BGC, Taguig · EDSA Makati · Mandaue Cebu · Bajada Davao', esc_html__( 'Address', 'buylix' ) ),
		'buylix_hours'   => array( 'Mon–Sat 9:00AM–7:00PM · Sun 10:00AM–6:00PM', esc_html__( 'Opening hours', 'buylix' ) ),
	);
	foreach ( $settings as $id => $def ) {
		$wp_customize->add_setting( $id, array( 'default' => $def[0], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $id, array( 'label' => $def[1], 'section' => 'buylix_contact', 'type' => 'text' ) );
	}
}
add_action( 'customize_register', 'buylix_customize' );

/**
 * Sidebar.
 */
function buylix_widgets() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'buylix' ),
			'id'            => 'blog-sidebar',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'buylix_widgets' );

/**
 * Format price.
 */
function buylix_price( $n ) {
	return '₱' . number_format_i18n( (int) $n );
}
