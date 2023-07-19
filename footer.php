<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alxwntr
 */
?>

<footer id="site-footer" class="site-footer">
	<div class="footer__container | content width-df">
		<p>© <?php echo date('Y'); ?> - Alex Winter</p>

		<div class="footer__social">
			<?php get_template_part( 'template-parts/content', 'social' ); ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
