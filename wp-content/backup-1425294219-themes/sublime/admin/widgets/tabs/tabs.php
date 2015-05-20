<?php
/*----------------------------------------*/
/*	Tabs Widget
/*----------------------------------------*/
class sublimeTabs extends WP_Widget {
          function sublimeTabs() {
                    $widget_ops = array(
                    'classname' => 'sublimeTabs',
                    'description' => 'Tabs to display recent/popular posts'
          );
          $this->WP_Widget(
                    'sublimeTabst',
                    'Tabs Widget',
                    $widget_ops
          );
}
          function widget($args, $instance) { 

function tabs() { 

?>

<ul class="tabs">
  <li class="active"><a href="#tab1">
    <h5>Recent Posts</h5>
    </a></li>
  <li><a href="#tab2">
    <h5>Popular Posts</h5>
    </a></li>
</ul>
<div class="tab_container">
  <div id="tab1" class="tab_content">
    <ul>
      <li id="tab1" class="active">
        <?php query_posts('ignore_sticky_posts=1&posts_per_page=5'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="tabpost">
          <div class="tabpic">
            <?php 
            if ( has_post_thumbnail() ) { ?>
            <a class="thumblink" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('Tab Pic'); ?>
            </a>
            <?php } ?>
          </div>
          <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a>
          <p><small><?php echo get_the_date( 'Y-m-d' ); ?></small></p>
          <div class="clear"></div>
        </div>
        <?php 
	endwhile; 
	endif; 
	wp_reset_query(); ?>
      </li>
    </ul>
  </div>
  <div id="tab2" class="tab_content" style="display:none;">
    <ul>
      <li id="tab2">
        <?php query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&ignore_sticky_posts=1&posts_per_page=5' ); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="tabpost">
          <div class="tabpic">
            <?php 
            if ( has_post_thumbnail() ) { ?>
            <a class="thumblink" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('Tab Pic'); ?>
            </a>
            <?php } ?>
          </div>
          <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a>
          <p><small><?php echo getPostViews(get_the_ID()); ?> views</small></p>
          <div class="clear"></div>
        </div>
        <?php 
	endwhile; 
	endif; 
	wp_reset_query(); ?>
      </li>
    </ul>
  </div>
</div>
<div class="tab-clear"></div>
<?php

}
                    extract($args, EXTR_SKIP);
                    echo $before_widget; 

                    $tabs = tabs(); 

                    echo $tabs;
                    echo $after_widget; 
          }
}
add_action(
          'widgets_init',
          create_function('','return register_widget("sublimeTabs");')
);
?>