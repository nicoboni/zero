<?php
/**
 * Theme functions and definitions
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if ( ! isset( $content_width ) ) {
	$content_width = 800; // pixels
}

/*
 * Theme support
 */
if ( ! function_exists( 'zero_theme_setup' ) ) {
	function zero_theme_setup() {
		if ( apply_filters( 'zero_theme_load_textdomain', true ) ) {
			load_theme_textdomain( 'zero', get_template_directory() . '/languages' );
		}

		if ( apply_filters( 'zero_theme_register_menus', true ) ) {
			register_nav_menus( array( 'menu-1' => __( 'Primary', 'zero' ) ) );
		}

		if ( apply_filters( 'zero_theme_add_theme_support', true ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'custom-logo' );
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );
			add_theme_support( 'custom-logo' );

			/*
			 * WooCommerce
			 */
			if ( apply_filters( 'zero_theme_add_woocommerce_support', true ) ) {
				add_theme_support( 'woocommerce' );
				add_theme_support( 'wc-product-gallery-zoom' );
				add_theme_support( 'wc-product-gallery-lightbox' );
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'zero_theme_setup' );

/*
 * Register Elementor Locations
 */
if ( ! function_exists( 'zero_theme_register_elementor_locations' ) ) {
	function zero_theme_register_elementor_locations( $elementor_theme_manager ) {
		if ( apply_filters( 'zero_theme_register_elementor_locations', true ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'zero_theme_register_elementor_locations' );
