
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

				$title = get_the_title();
				$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); //we can specify a custom size in functions.php later
				$thumbUrl = $thumb['0'];

				echo '
				<div class="photoGrid__photo" data-imgurl="'.$imgUrl.'">
					<div class="photoGrid__overlay">
						<div class="photoGrid__overlay__title">'.$title.'</div>
					</div>
					<img src="'.$thumbUrl.'">
				</div>
				';
			}
		}
		wp_reset_postdata();

	?>
</div>