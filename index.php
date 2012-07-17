<?php get_header(); ?>
<section id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>