<?php get_header(); ?>
<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-4 col-md-4 col-lg-4">
				<?php echo get_the_post_thumbnail( $post->ID, 'medium', array('class' => 'img-thumbnail') ); ?>	
			</div>
			<div  class="col-sm-8 col-md-8 col-lg-8">	
				<h2 id="movies-<?php echo $post->ID; ?>">
						<?php echo $post->post_title; ?>
				</h2>
				<p>	<?php echo $post->post_content; ?></p>
				<p><i class="glyphicon glyphicon-film"></i> 
					Genres: <span><?php echo get_terms_movies($post->ID,'genre');; ?></span>
				</p>
				<p><i class="glyphicon glyphicon-globe"></i> 
					Countrie: <span><?php echo get_terms_movies($post->ID,'countrie') ?></span>
				</p>
				<p><i class="glyphicon glyphicon-calendar"></i> 
					Year: <span><?php echo get_terms_movies($post->ID,'year'); ?></span>
				</p>
				<p><i class="glyphicon glyphicon-user"></i> 
					Actors: <span><?php echo get_terms_movies($post->ID,'actor'); ?></span>
				</p>
				<p><i class="glyphicon glyphicon-calendar"></i> 
					Release date: <span class="label" ><?php echo get_movies_meta($post->ID,'release_date'); ?></span>
				</p>
				<p><i class="glyphicon glyphicon-usd"></i> 
					Ticket price: <span class="label"><?php echo get_movies_meta($post->ID,'ticket_price'); ?></span>
				</p>
			</div>
		</div>
<?php get_footer(); ?>