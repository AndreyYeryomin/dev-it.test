<?php 
/*
Plugin Name: Display Movies  Dev It
Description: Display Movies
Version: 1.0
Author: Andrey Yeryomin
*/

function my_movies_filter($content) {
  // assuming you have created a page/post entitled 'debug'
  if ($GLOBALS['post']->post_name == 'movies') {
   	$params = array(
	'post_type' => 'movies', // тип постов - записи
	);
	$posts = get_posts($params);
   	var_dump($posts);
  }
  // otherwise returns the database content
  return $content;
}

add_filter( 'the_content', 'my_movies_filter' );