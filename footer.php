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
			<button class="theme-toggle" title="Toggle Light Mode" aria-label="Toggle light mode color scheme">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve">
					<path class="theme-toggle__bulb" d="M23.8 32.5c-.6-1.5-.7-3.2-.3-4.8.8-2.9 3-7 8.5-7s7.6 4.1 8.5 7c.5 1.6.4 3.3-.2 4.9L36 43.1h-8l-4.2-10.6z"/>
					<path class="theme-toggle__bulb" d="M28.1 43.1v2.1c0 .5.4.9.9.9h5.8c.5 0 .9-.4.9-.9v-2.1"/>
					<path class="theme-toggle__bulb" d="M29.2 46.7s.4 3.1 2.9 3.1 2.7-3.1 2.7-3.1"/>
					<path class="theme-toggle__bulb" d="M34.2 24.2s2.2.3 2.5 3.2"/>
					<path class="theme-toggle__lines" d="M32 14.3v3M21.1 18.8l2.1 2.1M42.9 18.8l-2.1 2.1M19.5 29.8h-3M47.5 29.8h-3M18.9 40.7l2.5-1.7M45 40.7 42.6 39"/>
				</svg>
			</button>
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
