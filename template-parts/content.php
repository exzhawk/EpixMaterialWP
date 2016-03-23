<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EpixMaterialWP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mdl-card mdl-shadow--2dp epixmdl_card'); ?>>
<!--	<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"></a>-->
	<div class="epixmdl_card__left">
		<div class="mdl-card__media">
			<?php the_post_thumbnail('w400h400-thumb');?>
		</div>
	</div>
	<div class="epixmdl_card__right">
        <div class="mdl-card__title">
            <?php
            if ( is_single() ) {
                the_title( '<h2 class="entry-title mdl-card__title-text">', '</h1>' );
            } else {
                the_title( '<h2 class="entry-title mdl-card__title-text">', '</h2>' );
            }
            ?>
        </div>
        <div class="mdl-card__supporting-text">
            <?php echo strip_tags(get_the_content( '' )); ?>
        </div>
        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="mdl-card__supporting-text">
                <?php echo epixmaterialwp_get_publish_time(); ?>
            </div>
            <div class="mdl-card__supporting-text">
                <?php echo epixmaterialwp_get_update_time(); ?>
            </div>
            <div class="mdl-card__supporting-text">
                <?php echo epixmaterialwp_get_tags(); ?>
            </div>
            <div class="mdl-card__supporting-text">
                <?php echo epixmaterialwp_get_cats(); ?>
            </div>
            <?php
        endif; ?>
	</div>
</article><!-- #post-## -->
