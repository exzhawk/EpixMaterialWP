<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EpixMaterialWP
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer mdl-mini-footer" role="contentinfo">
		<div class="site-info mdl-mini-footer__left-section">
			<ul class="mdl-mini-footer__link-list">
				<li>
					<a href="<?php echo esc_url(__('https://wordpress.org/', 'epixmaterialwp')); ?>"><?php printf(esc_html__('Proudly powered by %s', 'epixmaterialwp'), 'WordPress'); ?></a>
				</li>
				<li><?php printf(esc_html__('Theme: %1$s by %2$s.', 'epixmaterialwp'), 'epixmaterialwp', '<a href="http://exz.me/" rel="designer">Epix</a>'); ?></li>
			</ul>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
