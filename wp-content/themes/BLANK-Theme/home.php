<?php get_header(); ?>
<?php get_sidebar(); ?>
<section class="content">
<?php
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post(); ?>
		<div class="post">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<article class="post-text">
			<span class="date"><?php the_date(); ?></span>
				<p><?php the_content(); ?></p>
			</article>
		</div>

	<?php } 
} ?> 

	<?php wp_reset_query(); ?>

	<?php // Цикл 2 
	$query2 = new WP_Query('page_id=80');
	while($query2->have_posts()) $query2->the_post(); ;?>   
	<h2 class="entry-title"><?php the_title(); ?></h2> 
	<div class="entry-content"> <?php the_content(); ?> 
	</div> 
	<?php wp_reset_query(); ?>
	<h2> Our Products</h2>
<?php query_posts( array( 'post_type' => 'products', 'showposts' => 5 ) ); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<p><?php the_content(); ?></p>
<?php endwhile; endif; wp_reset_query(); ?>

</section>
<?php get_footer(); ?>