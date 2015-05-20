<?php get_header();
setPostViews(get_the_ID());?>
<?php $sidebar_value  = get_theme_mod('sidebar_selection'); ?>
<?php	if ($sidebar_value == 'sidebar-right') {
						?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="bgimage parallax">
  <div class="container box">
    <h3> <span>
      <?php the_title(); ?>
      </span></h3>
    <?php if(get_post_meta($post->ID, "tk_header_subtitle", true) ) { ?>
    <h2> <small><?php echo get_post_meta ($post->ID, 'tk_header_subtitle', true) ?></small></h2>
    <?php }; ?>
  </div>
</section>
<div class="container box">
  <div class="row left post-row">
    <div class="span9">
      <?php $author_link = get_the_author_link(); ?>
      <?php $comments_count = wp_count_comments($post->ID); ?>
      <div class="blog span2">
        <div class="post-meta"><span class="postdate">
          <?php the_time('M j') ?>
          </span><span class="author"><i class="icon-pencil"></i>By <?php echo $author_link; ?></a></span> <span> <?php echo getPostViews(get_the_ID()); ?><i class="icon-comment"></i>
          <?php  echo $comments_count->approved ?>
          </span> </div>
        <div class="sub-meta">
          <?php $categories = get_the_category();
$separator = ' ';
$output = '';
if($categories){
	foreach($categories as $category) {
		$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", "sublime" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
	}
echo '<span><i class="icon-folder-open"></i> Category: '.trim($output, $separator).'</span>';
} ?>
          <br/>
          <?php $posttags = get_the_tags();
if ($posttags) {?>
          <span> <i class="icon-tags"></i>
          <?php the_tags(); ?>
          </span>
          <?php }; ?>
        </div>
      </div>
      <div class="span6">
       
        <div <?php post_class('text'); ?> id="post-<?php the_ID(); ?>">
          <div class="postimg">
            <?php if(get_post_meta($post->ID, "tk_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "tk_post_video", true));
	echo '</div>';       

                                                     } else { 
                                                     if (has_gallery()){ } else {?>
            <?php the_post_thumbnail(); ?> </div> <div> <?php } }?>
          
         
            <?php the_content(); ?>
          </div>
        </div>
        <?php endwhile; ?>
        <?php previous_post_link(); wp_link_pages();?>
        <div class="pull-right">
          <?php next_post_link(); ?>
        </div>
        <?php endif; ?>
        <?php comments_template( '', true ); ?>
      </div>
    </div>
  </div>
</div>
<?php get_sidebar();
         } elseif ($sidebar_value == "sidebar-left") {
					 ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="bgimage parallax">
  <div class="container box">
    <h3> <span>
      <?php the_title(); ?>
      </span></h3>
    <?php if(get_post_meta($post->ID, "tk_header_subtitle", true) ) { ?>
    <h2> <small><?php echo get_post_meta ($post->ID, 'tk_header_subtitle', true) ?></small></h2>
    <?php }; ?>
  </div>
</section>
<div class="container box">
  <div class="row right post-row">
    <?php get_sidebar(); ?>
    <div class="span9">
      <?php $author_link = get_the_author_link(); ?>
      <?php $comments_count = wp_count_comments($post->ID); ?>
      <div class="span6">
        <div <?php post_class('text'); ?> id="post-<?php the_ID(); ?>">
          <div class="postimg">
            <?php if(get_post_meta($post->ID, "tk_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "tk_post_video", true));
	echo '</div>';       

                                                     } else { 
                                                     if (has_gallery()){ } else {?>
            <?php the_post_thumbnail(); ?> </div> <div> <?php } }?>
          </div>
          <div><a href="<?php the_permalink(); ?>">
            <h4>
              <?php the_title(); ?>
            </h4>
            </a>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <div class="blog span2">
        <div class="post-meta"><span class="postdate">
          <?php the_time('M j') ?>
          </span><span class="author"><i class="icon-pencil"></i>By <?php echo $author_link; ?></a></span> <span> <?php echo getPostViews(get_the_ID()); ?><i class="icon-comment"></i>
          <?php  echo $comments_count->approved ?>
          </span> </div>
        <div class="sub-meta">
          <?php $categories = get_the_category();
$separator = '';
$output = '';
if($categories){
	foreach($categories as $category) {
		$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", "sublime" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
	}
echo '<span><i class="icon-folder-open"></i> Category: '.trim($output, $separator).'</span>';
} ?>
          <?php $posttags = get_the_tags();
if ($posttags) {?>
          <span> <i class="icon-tags"></i>
          <?php the_tags(); ?>
          </span>
          <?php }; ?>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="span6"> <br/>
        <?php previous_post_link(); wp_link_pages();?>
        <div class="pull-right">
          <?php next_post_link(); ?>
        </div>
        <?php endif; ?>
        <?php comments_template( '', true ); ?>
      </div>
    </div>
  </div>
</div>
<?php 
					  } ?>
</div>
<?php get_footer();?>
