<?php
/**
 * Listing Contact Form template
 *
 * @package BDP/Templates/Listing Contact Form
 */

// phpcs:disable
if ( $validation_errors ) :
?>
<div class="wpbdp-msg wpbdp-error">
    <ul>
        <?php foreach ( $validation_errors as $error_msg ) : ?>
            <li><?php echo $error_msg; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
