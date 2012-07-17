	</div>
	<footer>
		<div class="inner clear">
			<div class="copyright">
				<p><?php echo esc_attr( get_option( 'bb_footer' ) ); ?></p>
			</div>
			<div class="widgets">
				<?php dynamic_sidebar( 'footer_sidebar' ); ?>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>