<?php get_header(); ?>


<div class="sliderDots"></div>


<div class="frontPage">
	<div class="frontPage__slider iosSlider">
		<div class="slider">
			<?php
				//you can dynamically define the category_name string based off of the url slug if you want to revise your contnt.php loop
				$the_query = new WP_Query( array( 'category_name' => 'home' ) );

				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						$title = get_the_title();

						//$img = get_the_post_thumbnail($post->ID, 'thumbnail'); //returns <img> tag, not desired here

						//thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
						//$url = $thumb['0'];

						echo '
						<div class="slide" data-title="'.$title.'">
							<div class="slideImg" style="background-image: url('.$imgUrl.')"></div>
						</div>
						';
					}
				}
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>