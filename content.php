<div class="grid clearfix">
	<div class="grid-sizer clearfix"></div><!-- /grid-sizer -->

	<?php
	if (have_posts()):
		while (have_posts()): the_post(); ?>

		<?php 

			global $wp_query;
			$post_id = $wp_query->post->ID;

			$post = get_post( $post_id );
			$slug = $post->post_name;

			$args = array('category_name' => $slug);

			if( in_category('uncategorized') ){
				echo '<div class="grid"><br/>sorry, no content found. please make sure to select a category before publishing your posts.</div>'; 
			}

		?>

		<?php
		$the_query = new WP_Query( $args );
		while ( $the_query->have_posts() ) :
				$the_query->the_post(); ?>

			<div class="grid-item clearfix">
				<div class="tabImage">
					<?php the_post_thumbnail(); ?>
					<div class="mobile-hover"></div><!-- /mobile-hover -->
				</div><!-- /tabImage -->
				<div class="excerpt">
					<h1><?php the_title(); ?></h1>
				</div><!-- /excerpt -->
			</div>

		<?php
			endwhile;
			wp_reset_postdata();
		?>
				
		<?php endwhile;
			else: 
				echo '<p>No Content Found</p>';
			endif;
		?>

</div>