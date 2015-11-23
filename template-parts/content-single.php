<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WAI_Components_Gallery
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php wai_components_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$post_object = get_field('vendor');

			if( $post_object ):

				// override $post
				$post = $post_object;
				setup_postdata( $post );

				?>
			    <div style="border: 3px solid #bbb; padding: 10px;">
			    	<h3>Vendor: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			    	<?php //<span>Post Object Custom Field: <?php the_field('field_name'); </span> ?>
			    </div>
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
		<?php the_field( "description" ); ?>
		<?php the_field( "website" ); ?>
		<?php the_field( "a11y_statement" ); ?>
		<?php the_field( "a11y_statement_url" ); ?>
		<?php the_field( "development_url" ); ?>
		<?php the_content(); ?>
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
</article><!-- #post-## -->

