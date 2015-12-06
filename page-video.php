<?php get_header(); ?>

	<div class="grid clearfix">

	<?php
	if (have_posts()):
		while (have_posts()): the_post(); ?>

		<div class="video-wrapper">
			<?php
			$the_query = new WP_Query('category_name=video');
			while ( $the_query->have_posts() ) :
					$the_query->the_post(); ?>

				<?php $src = get_the_excerpt(); ?>

                <div class="videoWrapper">
				    <iframe src="<?php echo $src; ?>" width="2000" height="580" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>

				<div class="vimeoVid">
			    	<h1 class="mobile-title"><?php the_title(); ?></h1>
				    <div class="desc">
			    	    <?php the_content(); ?>
			    	</div>
					<h1 class="web-title"><?php the_title(); ?></h1>
					<a class="showMore">SHOW MORE</a>
				</div><!-- /vimeoVid -->
				<hr>

			<?php
				endwhile;
				wp_reset_postdata();
			?>

		</div><!-- /video-wrapper -->
				
	<?php endwhile;
		else: 
			echo '<p>No Content Found<p>';
		endif;
	?>

	</div><!-- /grid clearfix -->

<?php get_footer(); ?>