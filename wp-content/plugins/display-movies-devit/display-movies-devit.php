<?php 
/*
Plugin Name: Display Movies  Dev It
Description: Display Movies
Version: 1.0
Author: Andrey Yeryomin
*/
add_action( 'the_content', 'my_movies_filter' );
function my_movies_filter($content) {
	global $post;
	if ($post->post_type == 'movies') {
    	
    	$bio_box =
        	"sdsf";
        return $content . $bio_box;
    } else {
        return $content;
    }
     
}

