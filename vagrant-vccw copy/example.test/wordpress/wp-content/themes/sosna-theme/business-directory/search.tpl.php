<div id="wpbdp-search-page" class="wpbdp-search-page businessdirectory-search businessdirectory wpbdp-page <?php echo $_class; ?>">
    <?php if ($searching): ?>


        <?php if ( $results ): ?>
            <div class="search-results">
            <?php echo $results; ?>
            </div>
        <?php else: ?>
            <p><?php _ex( "No listings found.", 'templates', "WPBDM" ); ?></p>
            <?php if ( 'none' == $search_form_position ): ?>
                <?php
                if ( ! empty( $_REQUEST['return_url'] ) ):
                    $return_url = $_REQUEST['return_url'];
                else:
                    $return_url = wpbdp_get_page_link( 'search');
                endif;
                ?>
                <p><?php echo sprintf( '<a href="%s">%s</a>.', $return_url, _x('Return to Search', 'templates', 'WPBDM' ) ); ?></p>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ( 'below' == $search_form_position ): ?>
    <?php echo $search_form; ?>
    <?php endif; ?>
</div>
