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

<p><span class="wpbdp-contact-listing-title"><?php _ex( 'Listing Title: ', 'templates', 'WPBDM' ); ?></span><?php echo get_the_title( $listing_id ); ?></p>

<form method="POST" action="<?php echo wpbdp_url( 'listing_contact', $listing_id ); ?>">
    <?php wp_nonce_field( 'contact-form-' . $listing_id ); ?>

    <?php if ( $current_user ) : ?>
        <p>
            <?php
            echo sprintf(
                _x( 'You are currently logged in as %s. Your message will be sent using your logged in contact email.', 'templates', 'WPBDM' ),
                $current_user->user_login
            );
			?>
        </p>
    <?php else : ?>
        <p>
            <label for="wpbdp-contact-form-name"><?php _ex( 'Your Name', 'templates', 'WPBDM' ); ?></label> <input id="wpbdp-contact-form-name" type="text" class="intextbox" name="commentauthorname" value="<?php echo esc_attr( wpbdp_getv( $_POST, 'commentauthorname', '' ) ); ?>" />
        </p>
        <p>
            <label for="wpbdp-contact-form-email"><?php _ex( 'Your Email', 'templates', 'WPBDM' ); ?></label> <input id="wpbdp-contact-form-email" type="text" class="intextbox" name="commentauthoremail" value="<?php echo esc_attr( wpbdp_getv( $_POST, 'commentauthoremail' ) ); ?>" />
        </p>
    <?php endif; ?>

    <p>
        <label for="wpbdp-contact-form-message"><?php _ex( 'Message', 'templates', 'WPBDM' ); ?></label> <textarea id="wpbdp-contact-form-message" name="commentauthormessage" rows="4" class="intextarea"><?php echo esc_textarea( wpbdp_getv( $_POST, 'commentauthormessage', '' ) ); ?></textarea>
    </p>

    <?php do_action( 'wpbdp_contact_form_extra_fields' ); ?>

    <?php if ( $recaptcha ) : ?>
    <?php echo $recaptcha; ?>
    <?php endif; ?> 

    <input type="submit" class="wpbdp-button wpbdp-submit submit" value="<?php _ex( 'Send', 'templates', 'WPBDM' ); ?>" />
</form>
