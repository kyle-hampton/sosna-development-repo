<!-- user catagory options -->
<div class="business-catagories">

  <div id="wpbdp-main-page" class="wpbdp-main-page wpbdp-main businessdirectory wpbdp-page <?php echo join(' ', $__page__['class']); ?>">


      <?php echo $__page__['before_content']; ?>

      <div class="catagory" class="wpbdp-page-content <?php echo join(' ', $__page__['content_class']); ?>">
          <div id="box-container" class="title-box" id="wpbdp-categories" class="cf">
              <?php wpbdp_the_directory_categories(); ?>
          </div>

          <?php if ($listings) echo $listings; ?>
      </div>
    </div>


</div>
