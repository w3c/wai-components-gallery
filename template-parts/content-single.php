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

		<?php if ( get_post_type( ) == 'wai_vendors' ): ?>
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail( 'medium', array( 'class' => 'alignright' ) );
			} ?>
			<?php
				// args
				$args = array(
					'numberposts'	=> -1,
					'post_type'		=> array('wai_frameworks'),
					'meta_key'		=> 'vendor',
					'meta_value'	=> get_the_ID()
				);

				// query
				$the_query = new WP_Query( $args );
				?>
				<?php if( $the_query->have_posts() ): ?>
					<h2>Frameworks:</h2>
					<ul class="widgetlist">
					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail( 'small' );
								} ?>
								<span><?php the_title(); ?></span>
							</a>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

			<?php
				// args
				$args = array(
					'numberposts'	=> -1,
					'post_type'		=> array('wai_widgets'),
					'meta_key'		=> 'vendor',
					'meta_value'	=> get_the_ID()
				);

				// query
				$the_query = new WP_Query( $args );
				?>
				<?php if( $the_query->have_posts() ): ?>
					<h2>Widgets:</h2>
					<ul class="widgetlist">
					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail( 'small' );
								} ?>
								<span><?php the_title(); ?></span>
							</a>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


			<?php
				// args
				$args = array(
					'numberposts'	=> -1,
					'post_type'		=> array('wai_templates'),
					'meta_key'		=> 'vendor',
					'meta_value'	=> get_the_ID()
				);

				// query
				$the_query = new WP_Query( $args );
				?>
				<?php if( $the_query->have_posts() ): ?>
					<h2>Templates:</h2>
					<ul class="widgetlist">
					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail( 'small' );
								} ?>
								<span><?php the_title(); ?></span>
							</a>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
		<?php else: ?>
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail( 'medium', array( 'class' => 'alignright' ) );
			} ?>
			<dl>
				<?php
				$post_object = get_field('vendor');

				if( $post_object ):

					// override $post
					$post = $post_object;
					setup_postdata( $post );

					?>
				    <dt>Vendor</dt>
				    <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
				    <?php //<span>Post Object Custom Field: <?php the_field('field_name'); </span> ?>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				<dt>Description</dt>
				<dd><?php the_field( "description" ); ?></dd>
				<dt>Website</dt>
				<dd><a href="<?php the_field( "website" ); ?>"><?php the_field( "website" ); ?></a></dd>
				<?php if( get_field( 'a11y_statement' ) ): ?>
				<dt>Accessibility Statement</dt>
				<dd><a href="<?php the_field( "a11y_statement_url" ); ?>"><?php the_field( "a11y_statement_url" ); ?></a></dd>
				<?php endif; ?>
				<dt>Development URL</dt>
				<dd><a href="<?php the_field( "development_url" ); ?>"><?php the_field( "development_url" ); ?></a></dd>
			</dl>
		<?php endif; ?>
		<?php // the_content(); ?>
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

