<?php $dynamic_sidebar = get_post_meta( $post->ID, 'dynamic_sidebar', true ); ?>
<div class="sidebar">
<div class="span3">

<?php if ( !function_exists('dynamic_sidebar')
                    || !dynamic_sidebar($dynamic_sidebar) ) : ?>
<?php endif;?>
</div>
</div>