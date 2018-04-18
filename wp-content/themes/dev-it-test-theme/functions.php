<?php 
add_action( 'init', 'create_movie_post_type' );
add_action( 'init', 'create_movie_taxonomies' );
add_action('init', 'true_custom_fields');

function true_custom_fields() {
	add_post_type_support( 'movies', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}
 
add_action('init', 'true_custom_fields');
function create_movie_post_type() {
  register_post_type( 'movies',
    array(
      'labels' => array(
        'name' => __( 'Movies' ),
        'singular_name' => __( 'Movie' ),
        'search_items' =>  __( 'Search Movies' ),
		'all_items' => __( 'All Movies' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Movie' ),
		'update_item' => __( 'Update Movie' ),
		'add_new_item' => __( 'Add New Movie' ),
		'new_item_name' => __( 'New Movie Name' ),
		'menu_name' => __( 'Movies' ),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'movies'),
    )
  );
}

function create_movie_taxonomies(){
	// определяем заголовки для 'genre'
	$labels = array(
		'name' => _x( 'Genres', 'taxonomy general name' ),
		'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Genres' ),
		'all_items' => __( 'All Genres' ),
		'parent_item' => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item' => __( 'Edit Genre' ),
		'update_item' => __( 'Update Genre' ),
		'add_new_item' => __( 'Add New Genre' ),
		'new_item_name' => __( 'New Genre Name' ),
		'menu_name' => __( 'Genre' ),
	);

	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy('genre', array('movies'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'genre' ),
	));

	// определяем заголовки для 'Countrie'
	$labels = array(
		'name' => _x( 'Countrie', 'taxonomy general name' ),
		'singular_name' => _x( 'Countrie', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Countries' ),
		'popular_items' => __( 'Popular Countries' ),
		'all_items' => __( 'All Countries' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Countrie' ),
		'update_item' => __( 'Update Countrie' ),
		'add_new_item' => __( 'Add New Countrie' ),
		'new_item_name' => __( 'New Countrie Name' ),
		'menu_name' => __( 'Countries' ),
	);

	// Добавляем НЕ древовидную таксономию 'countrie' (как метки)
	register_taxonomy('countrie', 'movies',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'countrie' ),
	));
	// определяем заголовки для 'year'
	$labels = array(
		'name' => _x( 'Year', 'taxonomy general name' ),
		'singular_name' => _x( 'Year', 'taxonomy singular name' ),
		'menu_name' => __( 'Year' ),
	);

	// Добавляем НЕ древовидную таксономию 'year' (как метки)
	register_taxonomy('year', 'movies',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'year' ),
	));
// определяем заголовки для 'Actors'
	$labels = array(
		'name' => _x( 'Actors', 'taxonomy general name' ),
		'singular_name' => _x( 'Actor', 'taxonomy singular name' ),
		'menu_name' => __( 'Actor' ),
	);

	// Добавляем НЕ древовидную таксономию 'Actors' (как метки)
	register_taxonomy('actor', 'movies',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'actors' ),
	));
}

?>