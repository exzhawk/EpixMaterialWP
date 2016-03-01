<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EpixMaterialWP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mdl-card mdl-shadow--4dp'); ?>>
	<div class="mdl-card__title">
		<?php
		if ( is_single() ) {
			the_title( '<h2 class="entry-title mdl-card__title-text">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title mdl-card__title-text">', '</h2>' );
		}
		?>
	</div>
<!--	<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"></a>-->
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php epixmaterialwp_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'epixmaterialwp' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'epixmaterialwp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php epixmaterialwp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
