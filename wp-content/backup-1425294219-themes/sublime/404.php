<?php get_header();?>

<section class="bgimage parallax">
		<div class="container box">
  <h3> <span><?php wp_title("",true); ?></span></h3>
</div>
	</section>

    <div class="container box">
      <h3>
        <?php wp_title("",true); ?>
      </h3>
      <div class="pull-right">
        <h3>404</h3>
      </div>
    </div>
  </div>
</div>
<div class="container box">
<div class="row">
  <div class="span12">
    <?php _e('Sorry, but the page you are looking for has moved or no longer exists. Please use the search below.','sublime'); ?>
    <br/>
    <br/>
    <br/>
    <div class="span4">
      <?php get_search_form();?>
      <br/>
      <br/>
    </div>
  </div>
</div>
<?php get_footer();?>
