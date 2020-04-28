<?php
/**
 * Add CPT Featured Image from WP Recipe Maker
 *
 * @package Add_CPT_Featured_Image_WPRM
 * @author Andy Fragen
 * @license MIT
 */

/**
 * Plugin Name:       Add CPT Featured Image from WP Recipe Maker
 * Plugin URI:        https://github.com/afragen/add-cpt-featured-image-wprm
 * Description:       Add the WP Recipe Maker selected image as the featured image to the selected Custom Post Type.
 * Author:            Andy Fragen
 * Version:           0.3.1
 * License:           MIT
 * Domain Path:       /languages
 * Text Domain:       add-cpt-featured-image-wprm
 * GitHub Plugin URI: https://github.com/afragen/add-cpt-featured-image-wprm
 * Requires at least: 5.2
 * Requires PHP:      5.6
 */

namespace Fragen\Add_CPT_Featured_Image_WPRM;

/*
 * Exit if called directly.
 * PHP version check and exit.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

$cpt_slug = \apply_filters( 'acfi_wprm_cpt_slug', 'kj-recipe' );
add_action( "save_post_{$cpt_slug}", __NAMESPACE__ . '\set_featured_image', 10, 2 );

/**
 * Set featured image to CPT from WP Recipe Maker image on CPT Save.
 *
 * @param int      $postID Post ID.
 * @param \WP_Post $post   WP_Post object.
 *
 * @return void
 */
function set_featured_image( $postID, $post ) {
	if ( class_exists( 'WPRM_Recipe' ) ) {
		$content = \parse_blocks( $post->post_content );
		if ( isset( $content[0] ) ) {
			$recipe_id    = $content[0]['attrs']['id'];
			$recipe       = get_post( $recipe_id );
			$thumbnail_id = ( new \WPRM_Recipe( $recipe ) )->image_id();
			set_post_thumbnail( $post, $thumbnail_id );
		}
	}
}
