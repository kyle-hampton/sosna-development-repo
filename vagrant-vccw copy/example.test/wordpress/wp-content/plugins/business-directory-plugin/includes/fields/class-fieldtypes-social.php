<?php
/**
 * Field to Handle Social Networks
 *
 * @package BDP/Includes/Fields/Social
 * @since 5.3.5
 */

// phpcs:disable

/**
 * Class WPBDP_FieldTypes_Social
 *
 * @SuppressWarnings(PHPMD)
 */
class WPBDP_FieldTypes_Social extends WPBDP_Form_Field_Type {

    private $social_types = array(
        'Twitter',
        'Facebook',
        'LinkedIn',
        'Youtube',
        'Pinterest',
        'Instagram',
        'Tumblr',
        'reddit',
        'Other',
        'Flickr',
    );

    /**
     * WPBDP_FieldTypes_Social constructor.
     */
    public function __construct() {
        parent::__construct( _x( 'Social Site (Other)', 'form-fields api', 'WPBDM' ) );

        add_action( 'wp_enqueue_scripts', array( $this, '_enqueue_scripts' ) );
        add_action( 'admin_enqueue_scripts', array( $this, '_enqueue_scripts' ) );
    }

    public function get_id() {
        return 'social-network';
    }

    public function setup_field( &$field ) {
        $field->add_display_flag( 'social' );
    }

    public function render_field_settings( &$field = null, $association = null ) {
        if ( 'meta' !== $association ) {
            return '';
        }

        $settings = array();

        $display_options = array(
            'icon_first' => 'Social Icon + Text',
            'text_first' => 'Text + Social Icon',
            'icon_only'  => 'Social Icon Only',
            'text_only'  => 'Text Only',
        );

        $content = '<select name="field[display_order]">';

        foreach ( $display_options as $order => $text ) {
            $content .= sprintf(
                '<option value="%s" %s>%s</option>',
                $order,
                ( $field && $field->data( 'display_order' ) === $order ) ? 'selected' : '',
                $text
            );
        }

        $content .= '</select>';

        $settings['display_order'][] = _x( 'Field Display Order', 'form-fields admin', 'WPBDM' );
        $settings['display_order'][] = $content;

        return self::render_admin_settings( $settings );
    }

    public function process_field_settings( &$field ) {
        $field->set_data( 'display_order', isset( $_POST['field']['display_order'] ) ? stripslashes_deep( $_POST['field']['display_order'] ) : 'icon_first' );
    }

    public function render_field_inner( &$field, $value, $context, &$extra = null, $field_settings = array() ) {
        if ( 'search' === $context ) {
            return '';
        }

        $html  = '';
        $html .= '<div class="wpbdp-social-url">';
        $html .= sprintf(
            '<span class="sublabel">%s</span>',
            _x( 'URL:', 'form-fields api', 'WPBDM' )
        );
        $html .= sprintf(
            '<input type="text" id="%s" name="%s" value="%s" %s />',
            'wpbdp-field-' . $field->get_id(),
            'listingfields[' . $field->get_id() . '][0]',
            esc_attr( ! empty( $value[0] ) ? $value[0] : '' ),
            ( isset( $field_settings['placeholder'] ) ? sprintf( 'placeholder="%s"', esc_attr( $field_settings['placeholder'] ) ) : '' )
        );
        $html .= '</div>';
        $html .= '<div class="wpbdp-social-text">';

        $text_input = sprintf(
            '<input type="hidden" name="listingfields[%s][social-text]" value="">',
            $field->get_id()
        );

        if ( 'icon_only' !== $field->data( 'display_order' ) ) {
            $text_input = sprintf(
                '<span class="sublabel">%s</span>',
                _x( 'Text:', 'form-fields api', 'WPBDM' )
            );

            $text_input .= sprintf(
                '<input type="text" name="listingfields[%s][social-text]" value="%s" placeholder="%s">',
                $field->get_id(),
                ! empty( $value['social-text'] ) ? $value['social-text'] : '',
                _x( 'Text to be displayed for social field', 'form-fields api', 'WPBDM' )
            );
        }

        $html .= $text_input;
        $html .= '</div>';

        $html .= '<div class="wpbdp-social-type-field">';

        $icon_input = sprintf(
            '<input type="hidden" name="listingfields[%1$s][type]" value="">
            <input type="hidden" name="listingfields[%1$s][social-icon]" value="">',
            $field->get_id()
        );

        if ( 'text_only' !== $field->data( 'display_order' ) ) {
            $icon_input = sprintf(
                '<span class="sublabel">%s</span>',
                _x( 'Type:', 'form-fields api', 'WPBDM' )
            );

            foreach ( $this->social_types as $type ) {
                $css_classes   = array();
                $css_classes[] = 'wpbdp-inner-social-field-option';
                $css_classes[] = 'wpbdp-inner-social-field-option-' . esc_attr( strtolower( $type ) );

                $icon_input .= sprintf(
                    '<div class="%s"><label><input type="radio" name="%s" value="%s" %s /> %s</label></div>',
                    implode( ' ', $css_classes ),
                    'listingfields[' . $field->get_id() . '][type]',
                    $type,
                    ( ! empty( $value['type'] ) && $type === $value['type'] ) ? 'checked="checked"' : '',
                    'Other' === $type ? $type : '<i class="fab fa-' . esc_attr( strtolower( $type ) ) . '"></i> ' . esc_html( $type )
                );
            }

            $icon = ! empty( $value['social-icon'] ) ? $value['social-icon'] : 0;

            $icon_input .= sprintf(
                '<input type="hidden" name="listingfields[%d][social-icon]" value="%s" />',
                $field->get_id(),
                $icon
            );

            $icon_input .= '<div class="preview"' . ( ! $icon ? ' style="display: none;"' : '' ) . '>';
            if ( $icon ) {
                $icon_input .= wp_get_attachment_image( $icon, 'wpbdp-thumb', false );
            }

            $icon_input .= sprintf(
                '<a href="http://google.com" class="delete" onclick="return WPBDP.fileUpload.deleteUpload(%d, \'%s\');">%s</a>',
                $field->get_id(),
                'listingfields[' . $field->get_id() . '][social-icon]',
                _x( 'Remove', 'form-fields-api', 'WPBDM' )
            );

            $icon_input .= '</div>';

            $listing_id = 0;
            if ( 'submit' === $context ) {
                $listing_id = $extra->get_id();
            } elseif ( is_admin() ) {
                global $post;
                if ( ! empty( $post ) && WPBDP_POST_TYPE === $post->post_type ) {
                    $listing_id = $post->ID;
                }
            }

            $nonce    = wp_create_nonce( 'wpbdp-file-field-upload-' . $field->get_id() . '-listing_id-' . $listing_id );
            $ajax_url = add_query_arg(
                array(
                    'action'     => 'wpbdp-file-field-upload',
                    'field_id'   => $field->get_id(),
                    'element'    => 'listingfields[' . $field->get_id() . '][social-icon]',
                    'nonce'      => $nonce,
                    'listing_id' => $listing_id,
                ),
                admin_url( 'admin-ajax.php' )
            );

            $icon_input .= '<div class="wpbdp-upload-widget">';
            $icon_input .= sprintf(
                '<iframe class="wpbdp-upload-iframe" name="upload-iframe-%d" id="wpbdp-upload-iframe-%d" src="%s" scrolling="no" seamless="seamless" border="0" frameborder="0"></iframe>',
                $field->get_id(),
                $field->get_id(),
                $ajax_url
            );
            $icon_input .= '</div>';
    }

        $html .= $icon_input;

        $html .= '</div>';

        return $html;

    }

    public function get_supported_associations() {
        return array( 'meta' );
    }

    public function get_field_plain_value( &$field, $post_id ) {
        $value = $field->value( $post_id );

        if ( empty( $value ) || $this->is_empty_value( $value ) ) {
            return '';
        }

        $value = is_array( $value ) ? $value : array( $value );

        return implode( ',', $value );
    }

    public function get_field_html_value( &$field, $post_id ) {
        $value = $field->value( $post_id );

        if ( ! $value[0] ) {
            return '';
        }

        $type = ! empty( $value['type'] ) ? $value['type'] : '';
        $text = ! empty( $value['social-text'] ) ? $value['social-text'] : $value[0];

        $html  = '';
        $html .= sprintf(
            '<div class="social-field social-field-link %s %s">',
            esc_attr( strtolower( $type ) ),
            esc_attr( $field->data( 'display_order', 'icon_first' ) )
        );

        $html .= '<a href="' . esc_url( $value[0] ) . '" target="_blank">';

        $icon = '';

        if ( $type ) {
            $icon = '<span class="social-icon">';

            $social_icon = sprintf( '<img src="%s" class="logo">', WPBDP_URL . 'assets/images/social/' .$type . '.svg' );

            if ( 'Other' === $type ) {
                $social_icon = '';

                if ( $value['social-icon'] ) {
                    $social_icon = wp_get_attachment_image( $value['social-icon'], 'wpbdp-thumb', false );
                }
            }

            $icon .= $social_icon;
            $icon .= '</span>';
        }

        $text = '<span class="social-text">' . esc_html( $text ) . '</span>';

        switch ( $field->data( 'display_order' ) ) {
            case 'icon_only':
                $html .= $icon ? $icon : $text;
                break;
            case 'text_only':
                $html .= $text;
                break;
            case 'text_first':
                $html .= $text . $icon;
                break;
            default:
                $html .= $icon . $text;
        }

        $html .= '</a></div>';

        return $html;
    }

    public function store_field_value( &$field, $post_id, $value ) {
        if ( $value && empty( $value[0] ) ) {
            foreach ( $value as $input => $val ) {
                $value[ $input ] = '';
            }
        }

        if ( ! empty( $value ) && ( empty( $value['type'] ) || 'Other' !== $value['type'] ) ) {
            $value['social-icon'] = '';
        }

        parent::store_field_value( $field, $post_id, $value );
    }

    public function is_empty_value( $value ) {
        return empty( $value[0] );
    }

    public function convert_csv_input( &$field, $input = '', $import_settings = array() ) {
        $field_value = array();
        $field_keys  = array( 'social-text', 'type', 'social-icon' );

        $input = str_replace( array( '"', '\'' ), '', $input );
        $input = str_replace( ';', ',', $input ); // Support ; as a separator here.
        $parts = explode( ',', $input );

        $field_value[] = array_shift( $parts );

        foreach ( $parts as $pos => $val ) {
            $field_value[ $field_keys[$pos] ] = $val;
        }

        return $field_value;
    }

    public function _enqueue_scripts() {
        if ( wpbdp_get_option( 'enqueue-fontawesome-styles', true ) ) {
            wp_enqueue_style( 'wpbdp_font_awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
        }
    }
}