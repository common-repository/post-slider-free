<?php
/*
	Plugin Name: Post Slider Free
	Plugin URI: https://pickelements.com/postslider
	Description: Post Slider is a cross-browser and responsive plugin for WordPress to display posts in a beautiful slideshow with different styles. It’s the best choice and the most eye-catching way to display WordPress Posts.
	Version: 2.0.3
	Author: Pickelements
	Author URI: https://pickelements.com
	License: GPLv2
	Text Domain: post-slider-free
	Domain Path: /languages
*/

	/**********************************************************
	 * Exit if accessed directly
	 **********************************************************/

	if ( ! defined( 'ABSPATH' ) )
	die("Can't load this file directly");

	define('PIC_POSTSLIDER_FREE_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('pic_postslider_free_plugin_dir', plugin_dir_path( __FILE__ ) );
	add_filter('widget_text', 'do_shortcode');

	# load plugin style & scripts
	function pic_postslider_free_init_scripts(){
		wp_enqueue_style('pic-postslider-font', plugins_url( '/public/css/font-awesome.css' , __FILE__ ) );
		wp_enqueue_style('pic-postslider-owls-theme', plugins_url( '/public/css/owl.carousel.min.css' , __FILE__ ) );
		wp_enqueue_style('pic-postslider-public-css', plugins_url( '/public/css/post-slider-free-public.css' , __FILE__ ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script('pic-postslider-owl', plugins_url( '/public/js/owl.carousel.js', __FILE__ ), array('jquery'), '1.9.0', false);
		wp_enqueue_script('pic-postslider-public-js', plugins_url( '/public/js/post-slider-free-public.js', __FILE__ ), array('jquery'), '1.0.0', false);
	}
	add_action('wp_enqueue_scripts', 'pic_postslider_free_init_scripts');

	# load plugin textdomain
	function pic_postslider_free_load_textdomain(){
		load_plugin_textdomain('post-slider-free', false, dirname(plugin_basename( __FILE__ )) . '/languages/');
	}
	add_action('plugins_loaded', 'pic_postslider_free_load_textdomain');

	# Admin enqueue scripts
	function pic_postslider_admin_enqueue_scripts(){
		wp_enqueue_style('pic-post-slider-admin-css', plugins_url( '/admin/css/post-slider-free-admin.css' , __FILE__ ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'pic-post-slider-admin-js', plugins_url( '/admin/js/post-slider-free-admin.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true  );
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script( 'post_slider_free_color_picker', plugins_url('admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
	add_action('admin_enqueue_scripts', 'pic_postslider_admin_enqueue_scripts');

	# Post Type
	require_once( 'includes/post-types/post-slider-free-post-type.php' );

	# Metaboxes
	require_once( 'includes/meta-boxes/post-slider-free-metaboxes.php' );

	# Shortcode
	require_once( 'includes/shortcode/post-slider-free-shortcode.php' );