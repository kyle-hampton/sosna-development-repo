<?php
/**
 * Template listing single view.
 *
 * @package BDP/Templates/Single
 */

// phpcs:disable
?>


<div id="<?php echo $listing_css_id; ?>" class="<?php echo $listing_css_class; ?>">
    <div class="listing-title">
        <h2><?php echo $title; ?></h2>
    </div>

    <?php if ( in_array( 'single', wpbdp_get_option( 'display-sticky-badge' ) ) ) : ?>
        <?php echo $sticky_tag; ?>
    <?php endif; ?>



    <?php wpbdp_x_part( 'single_content' ); ?>

    <?php wpbdp_get_return_link(); ?>

</div>
