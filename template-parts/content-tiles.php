<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WAI_Components_Gallery
 */

?>

<?php $field = get_fields(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('tile'); ?>>
	<a href="<?php echo get_permalink(); ?>">
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?> <small>by <?php echo $field['vendor']->name; ?></small></h2>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wai_components_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="thumbnail">
		<?php
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail( 'small', array('alt' => '', 'title' => ''));
			} else {
				echo wai_icon( "image" );
			}
		?>
		</div>
		<?php
			/*the_content( sprintf(
				/* translators: %s: Name of current post. *//*
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wai_components' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );*/
			if ( strlen($field['description']) > 200 ) {
			   echo substr($field['description'],0,100).'…';
			} else {
				echo $field['description'];
			}
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wai_components' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wai_components_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	</a>
</article><!-- #post-## -->
