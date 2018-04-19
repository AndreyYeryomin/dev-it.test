<?php 
add_action( 'init', 'create_movie_post_type' );
add_action( 'init', 'create_movie_taxonomies' );
add_action('init', 'true_custom_fields');
add_theme_support( 'movies-thumbnails' ); 

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
      'supports' => array( 'title', 'editor', 'thumbnail' ),
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

function movies_shortkod() {
	$args = array(
		'numberposts' => 5,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'include'     => array(),
		'exclude'     => array(),
		'meta_key'    => '',
		'meta_value'  =>'',
		'post_type'   => 'movies',
		'suppress_filters' => true, 
	);
	$posts = get_posts($args);
	ob_start();
	$i=1;
	foreach ($posts as $post) { 

		$genres = get_terms_movies($post->ID,'genre');
   		$countries = get_terms_movies($post->ID,'countrie');
   		$years = get_terms_movies($post->ID,'year');
   		$actors = get_terms_movies($post->ID,'actor');
   		$release_date = get_movies_meta($post->ID,'release_date');
   		$ticket_price = get_movies_meta($post->ID,'ticket_price');
		if($i%2 != 0){
			echo "<div class ='row'>";
		}
		?>

		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="col-sm-4 col-md-4 col-lg-4">
				<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>	
			</div>
			<div  class="col-sm-8 col-md-8 col-lg-8">	
				<h2 id="movies-<?php echo $post->ID; ?>">
					<a href="<?php echo get_permalink($post->ID); ?>">
						<?php echo $post->post_title; ?>
					</a>
				</h2>
				<p>	<?php echo $post->post_content; ?></p>
				<p>
					<i class="glyphicon glyphicon-film"></i> 
					Genres: <span><?php echo $genres; ?></span>
				</p>
				<p>
					<i class="glyphicon glyphicon-globe"></i> 
					Countrie: <span><?php echo $countries; ?></span>
				</p>
				<p>
					<i class="glyphicon glyphicon-calendar"></i> 
					Year: <span><?php echo $years; ?></span>
				</p>
				<p>
					<i class="glyphicon glyphicon-user"></i> 
					Actors: <span><?php echo $actors; ?></span>
				</p>
				<p>
					<i class="glyphicon glyphicon-calendar"></i> 
					Release date: <span class="label" ><?php echo $release_date; ?></span>
				</p>
				<p>
					<i class="glyphicon glyphicon-usd"></i> 
					Ticket price: <span class="label"><?php echo $ticket_price; ?></span>
				</p>
			</div>
		</div>
		<?php if($i%2 == 0){
			echo "</div";
		} ?>
	 <?php
	$i++;} 
	$output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode( 'movies', 'movies_shortkod' );

function true_add_mce_button() {
	// проверяем права пользователя - может ли он редактировать посты и страницы
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return; // если не может, то и кнопка ему не понадобится, в этом случае выходим из функции
	}
	// проверяем, включен ли визуальный редактор у пользователя в настройках (если нет, то и кнопку подключать незачем)
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'true_add_tinymce_script' );
		add_filter( 'mce_buttons', 'true_register_mce_button' );
	}
}
add_action('admin_head', 'true_add_mce_button');
 
// В этом функции указываем ссылку на JavaScript-файл кнопки
function true_add_tinymce_script( $plugin_array ) {
	$plugin_array['true_mce_button'] = get_stylesheet_directory_uri() .'/true_button.js'; // true_mce_button - идентификатор кнопки
	return $plugin_array;
}
 
// Регистрируем кнопку в редакторе
function true_register_mce_button( $buttons ) {
	array_push( $buttons, 'true_mce_button' ); // true_mce_button - идентификатор кнопки
	return $buttons;
}

function get_terms_movies($post,$args){

	$terms = get_the_terms($post,$args);
   	if($terms){
   		foreach ($terms as $term) {
   			$term_arr[] = $term->name;
   		}
   	}

   	$term_list = implode(',', $term_arr);
   	return $term_list;
}

function get_movies_meta($post,$args){

	$meta = get_post_meta($post,$args);
   	return $meta[0];
}
?>