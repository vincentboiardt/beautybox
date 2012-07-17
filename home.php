<?php get_header(); ?>
<section id="main">
	<?php query_posts( 'pagename=start' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>