<?php
/**
 * Front page — Buylix homepage.
 * Order: hero → trust → about → features → models → benefits → reviews → FAQ → contact.
 *
 * @package Buylix
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/home-sections' );
get_footer();
