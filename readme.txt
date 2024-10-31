=== Post Links Redux ===
Contributors: zarathos
Tags: post, navigation
Requires at least: 2.1
Tested up to: 6.0
Stable tag: trunk

Display text instead of nothing if there isn't a next or previous post for the currently-displayed post.

= IMPORTANT NOTES =
>THIS PLUGIN IS NO LONGER UPDATED!  It still works in newer versions of WordPress.  If it breaks in a future version of WP, I will remove it from the Extend database.

== Description ==
The standard Wordpress template tags used for post navigation (next_post, previous_post, next_post_link, and previous_post_link) don't offer this functionality, leaving you with nothing returned if there isn't a post.  This plugin changes that.

NOTE!!!  This plugin only works (without a hack in your template) on single post pages.

You can find the plugin home page (and leave comments) [here](http://keithsolomon.net/plr/).

== Installation ==
1. Upload `post-links-redux.php` to the `/wp-content/plugins/` directory.
2. Activate `Post Links Redux` through the 'Plugins' menu in Wordpress.
3. Add (or replace) the template tags in your theme where you would like your links to show up.

== Changelog ==
You can always find the most up-to-date information about the plugin [here](http://keithsolomon.net/plr/).

    Version Date       Changes
    1.0     2007/09/22 Initial release of plugin.

== Usage ==
plr_[next|previous]_post_link('format', 'link', 'in_same_cat', 'excluded_categories')

== Example ==
<?php plr_next_post_link(); ?>

This would show "Next Post Title →" as a link if there was a post that came after the currently-viewed post, or "next post:" as plain text if the current post is the most recent.

== Parameters ==
This plugin uses the same parameters and format as the next_post and previous_post Wordpress functions.  For more info on these functions, please visit the [codex](http://codex.wordpress.org/Template_Tags/next_post_link).
