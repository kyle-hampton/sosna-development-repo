<?php
/**
 * Compatibility code for Beaver Themer.
 */

/**
 * @since 5.5.8
 */
class WPBDP_Beaver_Themer_Compat {

    function __construct() {
        add_filter( 'wpbdp_has_shortcode', array( &$this, 'cornerstone_wpbdp_has_shortcode' ), 10, 3 );
    }

    function cornerstone_wpbdp_has_shortcode( $has_shortcode, $post, $shortcode ) {
        if ( $has_shortcode ) {
            return $has_shortcode;
        }

        $ids = FLThemeBuilderLayoutData::get_current_page_content_ids();

        if ( empty( $ids ) ) {
            return $has_shortcode;
        }

        if ( 'fl-theme-layout' == get_post_type() && count( $ids ) > 1 ) {
            $post_id = FLBuilderModel::get_post_id();
        } else {
            $post_id = $ids[0];
        }

        FLBuilderModel::set_post_id( $post_id );

        ob_start();
        FLBuilder::render_nodes();
        $content = ob_get_clean();

        FLBuilderModel::reset_post_id();

        return wpbdp_has_shortcode( $content, $shortcode );
    }
}
