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
   		$genres = get_the_terms($post->ID,'genre');
   		$countries = get_the_terms($post->ID,'countrie');
   		$years = get_the_terms($post->ID,'year');
   		$actors = get_the_terms($post->ID,'actor');
   		$release_date = get_post_meta($post->ID,'release_date');
   		$ticket_price = get_post_meta($post->ID,'ticket_price');
   		if($genres){
   			foreach ($genres as $genre) {
   				$genre_arr[] = $genre->name;
   			}
   		}
   		if($countries){
   			foreach ($countries as $countrie) {
   				$countrie_arr[] = $countrie->name;
   			}
   		}
   		if($years){
   			foreach ($years as $year) {
   				$year_arr[] = $year->name;
   			}
   		}
   		if($actors){
   			foreach ($actors as $actor) {
   				$actor_arr[] = $actor->name;
   			}
   		}
   		$genre_list = implode(',', $genre_arr);
   		$countrie_list = implode(',', $countrie_arr);
   		$year_list = implode(',', $year_arr);
   		$actor_list = implode(',', $actor_arr);

   		$movies_info = "
			<p>Genre: $genre_list</p>
			<p>Countrie: $countrie_list </p>
			<p>Year: $year_list </p>
			<p>Actors: $actor_list</p>
			<p>Release date: $release_date[0]</p>
			<p>Ticket price: $ticket_price[0]</p>
   		";


        return $content. $movies_info;
    } else {
        return $content;
    }
     
}

