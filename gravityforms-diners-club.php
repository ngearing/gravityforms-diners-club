<?php
/**
 * Plugin Name: GF Diners Club
 * Plugin URI: https://github.com/ngearing/gravityforms-diners-club
 * Description: Adds Diners Club card to Gravity forms.
 * Version: 1.0.0
 * Author: Nathan
 * Author URI: https://nathangearing.com
 * License: GPL-3.0-or-later
 *
 * @package gfdc
 */

if ( ! ABSPATH ) {
	die();
}

function gf_card_type_diners( $cards ) {

	$cards[] = [
		'name'     => 'Diners Club',
		'slug'     => 'dinersclub',
		'lengths'  => '14',
		'prefixes' => '300,301,302,303,304,305,36,38',
		'checksum' => true,
	];

	return $cards;
}

add_action(
	'init',
	function() {
		add_filter( 'gform_creditcard_types', 'gf_card_type_diners', 10, 1 );

		add_action(
			'wp_enqueue_scripts', function() {
				wp_enqueue_style( 'gf-diners-club', plugin_dir_url( __FILE__ ) . 'gravityforms-diners-club.css', [], filemtime( plugin_dir_path( __FILE__ ) .'gravityforms-diners-club.css' ), 'screen' );
			}
		);
	}
);
