<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alxwntr
 */
?>

<footer id="site-footer" class="site-footer">
	<div class="footer__container | content width-df | pbl-c-1-5-3 bt-1-grey-100">
		<div class="footer__copyright">
			<p>© <?php echo date('Y'); ?> - Alex Winter</p>
		</div>

		<div class="footer__social">
			<?php get_template_part( 'template-parts/content', 'social' ); ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
