<?php get_header(); ?>


<div class="frontPage">
	<div class="frontPage__slider iosslider">
		<div class="slider">
			<?php
				//you can dynamically define the category_name string based off of the url slug if you want to revise your contnt.php loop
				$the_query = new WP_Query( array( 'category_name' => 'nature' ) );

				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$img = get_the_post_thumbnail($post->ID, 'thumbnail');
						$title = get_the_title();

						echo '
							<div class="slide" data-title="'.$title.'">
								'.$img.'
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