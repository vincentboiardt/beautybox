<?php get_header(); ?>
<section id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; ?>
</section>
<aside id="sidebar">
	<article class="module">
		<h2>En module</h2>
		<p>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet doloramet lorem ipsum dolor sit amet.</p>
	</article>
	
	<article class="module">
		<h2>En module</h2>
		<p>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet doloramet lorem ipsum dolor sit amet.</p>
	</article>
</aside>
<?php get_footer(); ?>