<?php
/*
Plugin Name: Post Links Redux
Plugin URI:  http://keithsolomon.net/
Description: Updated previous and next post links functions to show the link title if there is no next or previous post.
Author: Keith Solomon
Version: 1.0
Author URI: http://keithsolomon.net/
*/

/* These two functions are technically deprecated, but they still work inside the Loop, so they are included here for your use. */
function plr_previous_post($format='%', $previous='previous post: ', $title='yes', $in_same_cat='no', $limitprev=1, $excluded_categories='') {

	if ( empty($in_same_cat) || 'no' == $in_same_cat )
		$in_same_cat = false;
	else
		$in_same_cat = true;

	$post = get_previous_post($in_same_cat, $excluded_categories);

	if ( !$post ) /* If no previous post, we just want the title */
		$string = $previous;
	else
		$string = '<a href="'.get_permalink($post->ID).'">'.$previous;
	if ( 'yes' == $title )
		$string .= apply_filters('the_title', $post->post_title, $post);
	if ( !$post ) /* If no previous post, we don't need to close a link */
		$string .= '';
	else
		$string .= '</a>';
	$format = str_replace('%', $string, $format);
	echo $format;
}

function plr_next_post($format='%', $next='next post: ', $title='yes', $in_same_cat='no', $limitnext=1, $excluded_categories='') {

	if ( empty($in_same_cat) || 'no' == $in_same_cat )
		$in_same_cat = false;
	else
		$in_same_cat = true;

	$post = get_next_post($in_same_cat, $excluded_categories);

	if ( !$post ) /* If no next post, we just want the title */
		$string = $next;
	else
		$string = '<a href="'.get_permalink($post->ID).'">'.$next;
	if ( 'yes' == $title )
		$string .= apply_filters('the_title', $post->post_title, $nextpost);
	if ( !$post ) /* If no next post, we don't need to close a link */
		$string .= '';
	else
		$string .= '</a>';
	$format = str_replace('%', $string, $format);
	echo $format;
}

function plr_previous_post_link($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {

	if ( is_attachment() )
		$post = & get_post($GLOBALS['post']->post_parent);
	else
		$post = get_previous_post($in_same_cat, $excluded_categories);

	$title = $post->post_title;

	if ( empty($post->post_title) )
		$title = __('Previous Post');

	$title = apply_filters('the_title', $title, $post);
	
	if ( !$post ) /* If no previous post, we just want the title */
		$format = $title;
	else
		$string = '<a href="'.get_permalink($post->ID).'">';
		$link = str_replace('%title', $title, $link);
		$link = $pre . $string . $link . '</a>';

		$format = str_replace('%link', $link, $format);

	echo $format;
}

function plr_next_post_link($format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
	$post = get_next_post($in_same_cat, $excluded_categories);

	$title = $post->post_title;

	if ( empty($post->post_title) )
		$title = __('Next Post');

		$title = apply_filters('the_title', $title, $post);

		if ( !$post ) /* If no next post, we just want the title */
			$format = $title;
		else
			$string = '<a href="'.get_permalink($post->ID).'">';
			$link = str_replace('%title', $title, $link);
			$link = $pre . $string . $link . '</a>';

			$format = str_replace('%link', $link, $format);

	echo $format;
}
