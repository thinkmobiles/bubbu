<?php get_header();?>

<section class="bgimage parallax">
  <div class="container box">
    <h3> <span>
      <?php wp_title("",true); ?>
      </span></h3>
  </div>
</section>
<div class="container box" id="content">
  <div class="row left post-row">
    <?php $sidebar_value  = get_theme_mod('sidebar_selection'); ?>
    <?php	if ($sidebar_value == 'sidebar-right') {  ?>
    <div class="span9">
      <?php if (have_posts()) :
   while (have_posts()) :
       the_post(); ?>
      <?php $author_link = get_the_author_link(); ?>
      <?php $comments_count = wp_count_comments($post->ID); ?>
      <div class="span2">
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
          <div class="portfolio-project">
            <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
            <?php the_post_thumbnail(); }?>
            <div class="mask">
              <div class="portfolio-project-mask"> <a class="project-zoom" href="<?php the_permalink(); ?>"><i class="icon-external-link iconbg"></i></a> </div>
            </div>
          </div>
          <div><a href="<?php the_permalink(); ?>">
            <h4>
              <?php the_title(); ?>
            </h4>
            </a>
            <?php custom_excerpt('regular'); ?>
          </div>
        </div>
      </div>
      <?php endwhile; endif; ?>
      <div class="span2"></div>
      <div class="span6">
        <div class="pagination pagination-centered">
          <?php
global $wp_query;

$big = 999999999; // need an unlikely integer
echo paginate_links( array(
'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
'format' => '?paged=%#%',
'show_all' => False,
'end_size' => 1,
'mid_size' => 2,
'prev_next' => True,
'prev_text' => __(' &larr;','sublime'),
'next_text' => __(' &rarr;','sublime'),
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages,
'type' => 'list'
) );
?>
        </div>
      </div>
    </div>
    <?php get_sidebar('sidebar'); ?>
  </div>
</div>
<?php } elseif ($sidebar_value == "sidebar-left") {
 ?>
<?php get_sidebar(); ?>
<div class="span9">
  <?php if (have_posts()) :
   while (have_posts()) :
       the_post(); ?>
  <?php $author_link = get_the_author_link(); ?>
  <?php $comments_count = wp_count_comments($post->ID); ?>
  <div class="span6">
    <div <?php post_class('text'); ?> id="post-<?php the_ID(); ?>">
      <div class="portfolio-project">
        <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
        <?php the_post_thumbnail(); }?>
        <div class="portfolio-project-mask"> <a class="project-zoom" href="<?php echo get_permalink() ?>"><i class="icon-external-link iconbg"></i></a> </div>
      </div>
      <div><a href="<?php the_permalink(); ?>">
        <h4>
          <?php the_title(); ?>
        </h4>
        </a>
        <?php custom_excerpt('regular'); ?>
      </div>
    </div>
  </div>
  <div class="span2">
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
  <?php endwhile; endif;?>
  <div class="span2"></div>
  <div class="span6">
    <div class="pagination pagination-centered">
      <?php
global $wp_query;

$big = 999999999; // need an unlikely integer
echo paginate_links( array(
'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
'format' => '?paged=%#%',
'show_all' => False,
'end_size' => 1,
'mid_size' => 2,
'prev_next' => True,
'prev_text' => __(' &larr;','sublime'),
'next_text' => __(' &rarr;','sublime'),
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages,
'type' => 'list'
) );
?>
    </div>
  </div>
</div>
<?php wp_reset_query(); } ?>
</div>
</div>
</div>
<?php get_footer();?>
