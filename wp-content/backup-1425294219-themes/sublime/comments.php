<?php
/**
 * Comments Template
 */

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>

<p class="nocomments">
  <?php _e('This post is password protected. Enter the password to view comments.', 'sublime'); ?>
</p>
<?php
		return;
	}
?>
<div id="comments-template">
<div class="comments-section">
  <div id="comments">
    <?php if ( have_comments() ) : ?>
    <h3 id="comments-number" class="comments-header">
      <?php comments_number( __('No Responses', 'sublime'), __('1 Comment', 'sublime'), __( 'Comments', 'sublime') );?>
    </h3>
    <ol class="comments">
      <?php wp_list_comments( array( 'callback' => 'cl_comment' ) ); ?>
    </ol>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav">
    <div class="nav-previous">
      <?php previous_comments_link( __( 'Older Comments', 'sublime' ) ); ?>
    </div>
    <div class="nav-next">
      <?php next_comments_link( __( 'Newer Comments', 'sublime' ) ); ?>
    </div>
  </div>
  <!-- .navigation -->
  <?php endif;  ?>
  <?php else : 

	
	if ( ! comments_open() ) :
?>
  <?php endif;  ?>
  <?php endif;  ?>
  <?php comment_form(); ?>
</div>
<!-- #comments --> 

