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

				//dimensions defined in /wp-admin/options-media.php
				$largeImg     = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); //max 2400x1200
				$mobileThumb  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); //max 300x400
				$desktopThumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); //max 600x900

				echo '
				<div class="photoGrid__photo" data-imgurl="'.$largeImg['0'].'">
					<div class="photoGrid__overlay">
						<div class="photoGrid__overlay__title">'.$title.'</div>
					</div>
					<img data-desktopThumb="'.$desktopThumb['0'].'" data-mobileThumb="'.$mobileThumb['0'].'"> 
				</div>
				';
			}
		}
		wp_reset_postdata();

	?>
</div>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/content.js"></script>