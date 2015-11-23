<?php get_header(); ?>


<div class="frontPage">
	<div class="frontPage__slider iosslider">
		<div class="slider">
			<?php
				query_posts('home'); //you can dynamically define this string based off of the url slug if you want to revise your contnt.php loop to be cleaner like this one

				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						$img   = get_the_post_thumbnail($post->ID, 'full');
						$title = get_the_title();

						echo '
							<div class="slide" data-title="'.$title.'">
								'.$img.'
							</div>
						';
					}
				}
				wp_reset_query();
			?>
		</div>
	</div>
</div>


<?php get_footer(); ?>