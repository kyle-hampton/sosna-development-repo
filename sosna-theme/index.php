<?php get_header(); ?>

<?php get_sidebar(); ?>
<!-- main section -->
      <div id="main-border" class="main-section">

        <!-- search bar -->
        <div id="searchbar-section" class="searchbar-section">
          <div class="search">
            <div class="search-bar">

              <!-- search bar input -->
              <input id="search-input" type="text" placeholder="FIND BY KEY WORD OR NAME">
            </div>

              <!-- input submit button -->
              <input class="search-button" type="button" placeholder="SEARCH" value="SEARCH">
          </div>
        </div>

        <!-- wordpress loop -->
        <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-header">
               <div class="date"><?php the_time( 'M j y' ); ?></div>
               <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
               <div class="author"><?php the_author(); ?></div>
            </div><!--end post header-->
            <div class="entry clear">
               <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>
               <?php the_content(); ?>
               <?php edit_post_link(); ?>
               <?php wp_link_pages(); ?> </div>
            <!--end entry-->
            <div class="post-footer">
               <div class="comments"><?php comments_popup_link( 'Leave a Comment', '1 Comment', '% Comments' ); ?></div>
            </div><!--end post footer-->
            </div><!--end post-->
        <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
            <div class="navigation index">
               <div class="alignleft"><?php next_posts_link( 'Older Entries' ); ?></div>
               <div class="alignright"><?php previous_posts_link( 'Newer Entries' ); ?></div>
            </div><!--end navigation-->
        <?php else : ?>
        <?php endif; ?>

      </div>

<?php get_footer(); ?>
