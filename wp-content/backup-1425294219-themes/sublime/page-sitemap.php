<?php
/*
Template Name: Site Map
*/
?>
<?php get_header();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="bgimage parallax">
  <div class="container box">
    <h3><span>
      <?php the_title(); ?>
      </span></h3>
    <?php if(get_post_meta($post->ID, "tk_header_subtitle", true) ) { ?>
    <h2> <small><?php echo get_post_meta ($post->ID, 'tk_header_subtitle', true) ?></small></h2>
    <?php }; ?>
  </div>
</section>
<div class="container box" id="content">
  <div class="row">
    <div class="span12">
      <div id="archive">
        <div class="featurebox span4"><span class="featurebox-icon"><span class="fa fa-folder-open"> </span></span>
          <div class="featurebox-content">
            <h4 class="featurebox-content-title">
              <?php _e('Archive By Day','sublime'); ?>
            </h4>
            <ul>
              <?php wp_get_archives('type=daily&limit=15'); ?>
            </ul>
          </div>
        </div>
        <div class="featurebox span4"><span class="featurebox-icon"><span class="fa fa-folder-open"> </span></span>
          <div class="featurebox-content">
            <h4 class="featurebox-content-title">
              <?php _e('Archive By Month','sublime'); ?>
            </h4>
            <ul>
              <?php wp_get_archives('type=monthly&limit=12'); ?>
            </ul>
          </div>
        </div>
        <div class="featurebox span4"><span class="featurebox-icon"><span class="fa fa-folder-open"> </span></span>
          <div class="featurebox-content">
            <h4 class="featurebox-content-title">
              <?php _e('Archive By Year','sublime'); ?>
            </h4>
            </h4>
            <ul>
              <?php wp_get_archives('type=yearly&limit=12'); ?>
            </ul>
          </div>
        </div>
        <div class="featurebox span4"><span class="featurebox-icon"><span class="fa fa-folder-open"> </span></span>
          <div class="featurebox-content">
            <h4 class="featurebox-content-title">
              <?php _e('Latest Posts','sublime'); ?>
            </h4>
            <ul>
              <?php wp_get_archives('type=postbypost&limit=20'); ?>
            </ul>
          </div>
        </div>
        <div class="featurebox span4"><span class="featurebox-icon"><span class="fa fa-folder-open"> </span></span>
          <div class="featurebox-content">
            <h4 class="featurebox-content-title">
              <?php _e('Pages','sublime'); ?>
            </h4>
            <ul>
              <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
            </ul>
          </div>
        </div>
        <div class="featurebox span4"><span class="featurebox-icon"><span class="fa fa-folder-open"> </span></span>
          <div class="featurebox-content">
            <h4 class="featurebox-content-title">
              <?php _e('Categories','sublime'); ?>
            </h4>
            <ul>
              <?php wp_list_categories('orderby=name&title_li='); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- archive --> 
  </div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>
