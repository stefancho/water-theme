<?php

register_nav_menu('telerk-top-menu', 'Telerik Menu Top');

function get_post_image_urls($post)
{
	$args = array (
			'post_type' => 'attachment',
			'post_parent' => $post->ID
	);
	$images = get_posts( $args );
	$img_urls = array();
	if ($images) {
		foreach ( $images as $attachment ) 
		{
			$img_url = wp_get_attachment_url($attachment->ID);
			array_push($img_urls, $img_url);
		}
	}
	return $img_urls;
}