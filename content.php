
<div class="photoGrid">

	<?php

		//get category slug of current page
		global $post;
		$slug = get_post( $post )->post_name;

		//query posts for the category $slug
		$the_query = new WP_Query( array( 'category_name' => $slug ) );

		//loop through the posts
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$title = get_the_title();

				//$img = get_the_post_thumbnail($post->ID, 'thumbnail'); //returns <img> tag, not desired here

				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
				$thumbUrl = $thumb['0'];

				echo '
				<div class="photoGrid__photo" data-filepath="">
					<div class="photoGrid__overlay">
						<div class="photoGrid__overlay__title">'.$title.'</div>
					</div>
					<img src="'.$thumbUrl.'">
				</div>
				';

				//<div class="slideImg" style="background-image: url('.$imgUrl.')"></div>
/*
				<div class="grid-item clearfix">
					<div class="tabImage">
						<?php the_post_thumbnail(); ?>
						<div class="mobile-hover"></div><!-- /mobile-hover -->
					</div><!-- /tabImage -->
					<div class="excerpt">
						<h1><?php the_title(); ?></h1>
					</div><!-- /excerpt -->
				</div>
*/				

			}
		}
		wp_reset_postdata();

	?>

</div>