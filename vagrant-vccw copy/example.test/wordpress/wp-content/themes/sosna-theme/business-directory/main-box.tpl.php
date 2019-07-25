<?php
/**
 * BD Main Box
 *
 * @package BDP/Templates/Main Box
 */

// phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
?>

<div id="wpbdp-main-box" class="wpbdp-main-box" data-breakpoints='{"tiny": [0,360], "small": [360,560], "medium": [560,710], "large": [710,999999]}' data-breakpoints-class-prefix="wpbdp-main-box">

<?php if ( wpbdp_get_option( 'show-search-listings' ) ) : ?>
<div class="main-fields box-row cols-2 cf">


    <form  id="searchbar-section" class="searchbar-section" action="<?php echo esc_url( $search_url ); ?>" method="get">
    <!-- search bar -->
    <div id="searchbar-section" class="searchbar-section">
      <div class="">


      <div class="search">
        <input type="hidden" name="wpbdp_view" value="search" />
        <?php echo $hidden_fields; ?>
        <?php if ( ! wpbdp_rewrite_on() ) : ?>
        <input type="hidden" name="page_id" value="<?php echo wpbdp_get_page_id(); ?>" />
        <?php endif; ?>

        <div class="search-bar">
        <div class="box-col search-fields">
            <div class="box-row cols-<?php echo $no_cols; ?>">

             <input id="search-input" type="text" id="wpbdp-main-box-keyword-field" class="keywords-field" name="kw" placeholder="<?php echo esc_attr( _x( 'FIND BY KEY WORD OR NAME', 'main box', 'WPBDM' ) ); ?>" />
             <?php echo $extra_fields; ?>

            </div>
        </div>
        </div>


            <input class="search-button" type="submit" value="<?php echo esc_attr_x( 'SEARCH', 'main box', 'WPBDM' ); ?>" /><br />
      </div>
        <!-- <a class="advanced-search-link" href="<?php echo $search_url; ?>"><?php echo esc_attr_x( 'Advanced Search', 'main box', 'WPBDM' ); ?></a> -->
      </div>
    </div>
    </form>

  </div>
</div>



<div class="box-row separator"></div>
<?php endif; ?>
