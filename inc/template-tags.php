<?php
/**
 *
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EpixMaterialWP
 */

/**
 * Return publish time for current post.
 */
if (! function_exists('epixmaterialwp_get_publish_time')):
	function epixmaterialwp_get_publish_time() {
		$format_time_string = '<time datetime="%1$s">%2$s</time>';
		$time_string=sprintf($format_time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
			);
		return $time_string;
	}
endif;

if ( ! function_exists( 'epixmaterialwp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function epixmaterialwp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'epixmaterialwp' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'epixmaterialwp' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

/**
 * Return tags for current post.
 */
if (! function_exists('epixmaterialwp_get_tags')):
	function epixmaterialwp_get_tags() {
		$tags_list = epixmaterialwp_add_class_to_bare_tag( 'a', 'epixmdl_tag', get_the_tag_list() );
		if ( $tags_list ) {
			return '<span class="tags-links">' . $tags_list . '</span>';
		}
	}
endif;

if ( ! function_exists( 'epixmaterialwp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function epixmaterialwp_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'epixmaterialwp' ) );
		if ( $categories_list && epixmaterialwp_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'epixmaterialwp' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'epixmaterialwp' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'epixmaterialwp' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'epixmaterialwp' ), esc_html__( '1 Comment', 'epixmaterialwp' ), esc_html__( '% Comments', 'epixmaterialwp' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'epixmaterialwp' ), ""
//			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function epixmaterialwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'epixmaterialwp_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'epixmaterialwp_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so epixmaterialwp_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so epixmaterialwp_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in epixmaterialwp_categorized_blog.
 */
function epixmaterialwp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'epixmaterialwp_categories' );
}
add_action( 'edit_category', 'epixmaterialwp_category_transient_flusher' );
add_action( 'save_post',     'epixmaterialwp_category_transient_flusher' );


function epixmaterialwp_simple_a_tag_menu($class_value){
	return strip_tags( epixmaterialwp_add_class_to_bare_tag( 'a', $class_value, wp_nav_menu( array( 'theme_location' => 'primary',
		'container' => false, 'echo' => false, 'items_wrap' => '%3$s' ) ) ), '<a>' );
}

function epixmaterialwp_add_class_to_bare_tag( $target_tag, $class_value, $source_html ) {
	return preg_replace( '/<' . $target_tag . '/', '<' . $target_tag . ' class="' . $class_value . '"', $source_html );
}