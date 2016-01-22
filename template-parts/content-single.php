<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WAI_Components_Gallery
 */

?>

<?php $field = get_fields(); ?>
<div class="toolbar">
	<button>
		<?php echo wai_icon( "share" ); ?>
		Share link to this widget
	</button>
	<?php get_search_form(true); ?>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title( ); ?> <small>by <?php echo $field['vendor']->name; ?></small></h1>
	</header><!-- .entry-header -->
	<div class="entry-content entry-content-wrapper">
		<div class="entry-content-main">
			<?php the_field( "description" ); ?>
			<div class="links">
				<a href="<?php the_field( "website" ); ?>"><?php echo wai_icon( "home" ); ?> <?php _e('Website', 'wai_components'); ?></a>
				<?php if( get_field( 'a11y_statement' ) ): ?>
				<a href="<?php the_field( "a11y_statement_url" ); ?>"><?php echo wai_icon( "accessibility" ); ?> <?php _e('Accessibility Statement', 'wai_components'); ?></a>
				<?php endif; ?>
				<!-- TODO: If Github: Show github logo. If not, show generic cloud symbol. -->
				<a href="<?php the_field( "development_url" ); ?>"><?php echo wai_icon( "cloud" ); ?> <?php _e('Development URL', 'wai_components'); ?></a>
			</div>
			<div class="entry-meta">
				<?php wai_components_posted_on(); ?>
			</div><!-- .entry-meta -->
				<button onclick="document.querySelector('#comment_form').removeAttribute('hidden');"><?php echo wai_icon( 'warning' ); ?> Report a problem with this entry</button>
				<div hidden id="comment_form">
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
				</div>
		</div>
		<div class="entry-content-side">
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail( 'medium' );
			} ?>
			<dl>
				<dt>License</dt>
				<dd><a href="<?php echo get_term_link( get_field( "license" ) ); ?>"><?php echo get_field( "license" )->name; ?></a></dd>
		    <dt>Vendor</dt>
				<dd><a href="<?php echo get_term_link( get_field( "vendor" ) ); ?>"><?php echo get_field( "vendor" )->name; ?></a></dd>
				<?php if ( get_field( "contact_url" ) ) { ?>
					<dt>Contact URL</dt>
					<dd><a href="<?php echo get_field( "contact_url" ); ?>"><?php echo get_field( "contact_url" ); ?></a></dd>
				<?php } elseif ( get_field( "contact_email" ) ) { ?>
					<dt>Contact Email</dt>
					<dd><a href="mailto:<?php echo get_field( "contact_email" ); ?>"><?php echo get_field( "contact_email" ); ?></a></dd>
				<?php } ?>
			</dl>
			<?php // if ( strpos ( get_field( "development_url" ) , 'github.com' ) !== FALSE ) { ?>
			<p><strong>Github statistics for this project:</strong></p>
			<ul>
				<li>Latest commit to master: 2015-12-12</li>
		    <li>Readme information: <a href="#">Readme.txt</a></li>
				<li>Stars: 3</li>
				<li>Forks: 27</li>
				<li>Contributors: Max Mustermann</li>
			</ul>
			<?php // } ?>
		</div>
		<?php // the_content(); ?>
		<?php
			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wai_components' ),
			// 	'after'  => '</div>',
			// ) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wai_components_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

