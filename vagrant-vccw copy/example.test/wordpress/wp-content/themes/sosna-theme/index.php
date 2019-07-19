<?php get_header(); ?>

<?php get_sidebar(); ?>
<!-- main section -->
      <div id="main-border" class="main-section">

        <div class="business-catagories">
        <!-- wordpress loop -->
        <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-header">
               <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            </div><!--end post header-->
            <div class="entry clear">
               <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>
               <?php the_content(); ?>
               <?php edit_post_link(); ?>
               <?php wp_link_pages(); ?> </div>
            <!--end entry-->

            </div><!--end post-->
        <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
            <div class="navigation index">
               <div class="alignleft"><?php next_posts_link( 'Older Entries' ); ?></div>
               <div class="alignright"><?php previous_posts_link( 'Newer Entries' ); ?></div>
            </div><!--end navigation-->
        <?php else : ?>
        <?php endif; ?>

        </div>

      </div>

<?php get_footer(); ?>
