</div>

<div class="footbg">
  <div class="container box">
    <div class="row footer">
      <?php get_sidebar('footer');?>
    </div>
    <footer class="foot">
      <div class="row"> </div>
    </footer>
  </div>
  <!-- /container --> 
</div>
<div class="copyright">
  <div class="container">
    <ul class="nav pull-right">
      <div class="social tooltips" id="social">
        <?php $twitter  = get_theme_mod('twitter_text');  ?>
        <?php $facebook  = get_theme_mod('facebook_text');  ?>
        <?php $googleplus  = get_theme_mod('google1_text');  ?>
        <?php $linkedin  = get_theme_mod('linkedin_text');  ?>
        <?php $pinterest  = get_theme_mod('pinterest_text');  ?>
		<?php $instagram  = get_theme_mod('instagram_text');  ?>
		<?php $youtube  = get_theme_mod('youtube_text');  ?>
        <?php $rss  = get_theme_mod('rss_text');  ?>
        <?php $github  = get_theme_mod('github_text');  ?>
        <?php if(!empty($linkedin)){?>
        <a href="<?php echo $linkedin ?>" target="_blank" title="linkedin" data-tip="top" data-original-title="linkedin" class="linkedin"> <i class="fa fa-linkedin"></i></a>
        <?php } ?>
        <?php if(!empty($pinterest)){?>
        <a href="<?php echo $pinterest ?>" target="_blank" title="pinterest" data-tip="top" data-original-title="pinterest" class="pinterest"> <i class="fa fa-pinterest"></i></a>
        <?php } ?>
        <?php if(!empty($rss)){?>
        <a href="<?php echo $rss ?>" target="_blank" title="rss" data-tip="top" data-original-title="rss" class="rss"> <i class="fa fa-rss"></i></a>
        <?php } ?>
        <?php if(!empty($github)){?>
        <a href="<?php echo $github ?>" target="_blank" title="github" data-tip="top" data-original-title="github" class="github"> <i class="fa fa-github"></i></a>
        <?php } ?>
        <?php if(!empty($twitter)){?>
        <a href="http://www.twitter.com/<?php echo $twitter; ?>" target="_blank" title="twitter" data-tip="top" data-original-title="twitter" class="twittered"> <i class="fa fa-twitter"></i></a>
        <?php } ?>
        <?php if(!empty($facebook)){?>
        <a href="http://www.facebook.com/<?php echo $facebook; ?>" target="_blank" title="facebook" data-tip="top" data-original-title="facebook" class="facebook"> <i class="fa fa-facebook"></i></a>
        <?php } ?>
        <?php if(!empty($googleplus)){?>
        <a href="<?php echo $googleplus ?>" target="_blank" title="googleplus" data-tip="top" data-original-title="google +1" class="googleplus"> <i class="fa fa-google-plus"></i></a>
        <?php } ?>
        <?php if(!empty($instagram)){?>
        <a href="<?php echo $instagram ?>" target="_blank" title="instagram" data-tip="top" data-original-title="instagram" class="instagram"> <i class="fa fa-instagram"></i></a>
        <?php } ?>
        <?php if(!empty($youtube)){?>
        <a href="<?php echo $youtube ?>" target="_blank" title="youtube" data-tip="top" data-original-title="youtube" class="youtube"> <i class="fa fa-youtube"></i></a>
        <?php } ?>
      </div>
    </ul>
    <h5><span class="scroll-wrapper"><a id="back-to-top" href="#"> <i class="icon-arrow-up"></i>
      <?php $copyright  = get_theme_mod('copyright_text'); ?>
      </a><small><?php echo $copyright; ?></small></span></h5>
  </div>
</div>
</div>
<?php wp_footer(); ?>

</body></html>