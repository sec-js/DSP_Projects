<?php

/*

Copyright 2014 Dario Curvino (email : d.curvino@tiscali.it)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

if ( ! defined( 'ABSPATH' ) ) exit('You\'re not allowed to see this page'); // Exit if accessed directly

//this load guten-block.js, only in admin side
add_action('enqueue_block_editor_assets', 'yasr_gutenberg_scripts');

function yasr_gutenberg_scripts () {

	//Script
	wp_enqueue_script( 'yasr_blocks', YASR_JS_DIR . '/yasr-guten-blocks.js', array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ) );

}

//This filter is used to add a new categoty in gutenberg
add_filter( 'block_categories', 'yasr_add_gutenberg_category', 10, 2);

function yasr_add_gutenberg_category ($categories) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'yet-another-stars-rating',
				'title' => 'Yasr: Yet Another Stars Rating',
			),
		)
	);
};

add_action('yasr_add_admin_scripts_end', 'yasr_add_js_constant_gutenberg');

function yasr_add_js_constant_gutenberg ($hook) {

    if ($hook === 'post.php' || $hook === 'post-new.php') {

        $post_id=get_the_ID();
        $overall_rating=yasr_get_overall_rating($post_id);

        if (!$overall_rating) {
            $overall_rating = "0";
        }

        $ajax_nonce_overall = wp_create_nonce( "yasr_nonce_insert_overall_rating" );

        wp_localize_script ('yasradmin', 'yasrConstantGutenberg',
            array(
                'overallRating' => $overall_rating,
                'nonceOverall' => $ajax_nonce_overall
            )
        );

    }

}

?>