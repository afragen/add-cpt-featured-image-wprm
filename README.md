# Add CPT Featured Image from WP Recipe Maker

* Plugin Name: Add CPT Featured Image from WP Recipe Maker
* Author: Andy Fragen
* License: MIT
* Requires at least: 5.2
* Requires PHP: 5.6

Add the WP Recipe Maker selected image as the featured image to the selected Custom Post Type.

This plugin was developed for [my wife's recipe site](https://food.thefragens.com).

It uses the following plugins.

* [Recipe CPT](https://github.com/afragen/recipe-cpt)
* [WP Recipe Maker](https://wordpress.org/plugins/wp-recipe-maker/)
* [WP Ultimate Post Grid](https://wordpress.org/plugins/wp-ultimate-post-grid/)

The CPT slug can be changed using the following filter hook.

```php
add_filter(
	'acfi_wprm_cpt_slug',
	function( $cpt_slug ) {
		$cpt_slug = 'my-cpt-slug';
		return $cpt_slug;
	}
);
```
