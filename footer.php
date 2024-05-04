<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alxwntr
 */
?>

<footer id="site-footer" class="site-footer">
	<div class="footer__container | content width--x-large">
		<div class="footer__copyright">
			<p>© <?php echo date('Y'); ?> - Alex Winter</p>
		</div>

		<div class="footer__theme">
			<button class="theme-toggle--light-mode" style="width:130px">Light Mode</button>
			<button class="theme-toggle--dark-mode" style="width:130px">Dark Mode</button>
			<button class="theme-toggle--party-mode" style="width:130px">Party Mode</button>
		</div>

		<div class="footer__social">
			<?php get_template_part( 'template-parts/content', 'social' ); ?>
		</div>
	</div>
</footer>

<div class="theme-transition"></div>

<?php wp_footer(); ?>
<?php get_template_part( 'template-parts/scripts', 'analytics' ); ?>

</body>
</html>