<?php
/**
 * The template used for displaying page content in page.php
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php kalki_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php
		/**
		 * kalki_before_content hook.
		 *
		 *
		 * @hooked kalki_featured_page_header_inside_single - 10
		 */
		do_action( 'kalki_before_content' );

		if ( kalki_show_title() ) : ?>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
			</header><!-- .entry-header -->

		<?php endif;

		/**
		 * kalki_after_entry_header hook.
		 *
		 *
		 * @hooked kalki_post_image - 10
		 */
		do_action( 'kalki_after_entry_header' );
		?>

		<div class="entry-content" itemprop="text">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kalki' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<?php
		/**
		 * kalki_after_content hook.
		 *
		 */
		do_action( 'kalki_after_content' );
		?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
