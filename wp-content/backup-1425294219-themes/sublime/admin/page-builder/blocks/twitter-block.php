<?php

if(!class_exists('PG_Twitter_Block')) {
	class PG_Twitter_Block extends AQ_Block {
		
		
		function __construct() {
			$block_options = array(
				'name' => 'Twitter Banner',
				
				'resizable' => 0,
			);
			
			//create the block
			parent::__construct('pg_twitter_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				
				  'twitname' =>'',
					'key' => '',
					'secret' =>'',
					'token' => '',
					'secret_token' => '',
					'pin_footer' => ''
					
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
	
			?>

<p>Note: You should only use this block on a full-width template</p>
<p class="description half">
  <label for="<?php echo $this->get_field_id('twitname') ?>"> Twitter Name<br/>
    <input id="<?php echo $this->get_field_id('twitname') ?>" class="input-full" type="text" value="<?php echo $twitname ?>" name="<?php echo $this->get_field_name('twitname') ?>">
  </label>
</p>
<p>
				<input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id( 'pin_footer' ); ?>" name="<?php echo $this->get_field_name( 'pin_footer' ); ?>"<?php checked( $instance['pin_footer'], 'true' ); ?> />
				<label for="<?php echo $this->get_field_id( 'pin_footer' ); ?>"><?php _e( 'Pin to Footer? (must be last item on page)', 'sublime' ); ?></label>
			</p>
<p class="description half">
  <label for="<?php echo $this->get_field_id('key') ?>"> Consumer Key<br/>
    <input id="<?php echo $this->get_field_id('key') ?>" class="input-full" type="text" value="<?php echo $key ?>" name="<?php echo $this->get_field_name('key') ?>">
  </label>
</p>
<p class="description half last">
  <label for="<?php echo $this->get_field_id('secret') ?>"> Consumer Secret<br/>
    <input id="<?php echo $this->get_field_id('secret') ?>" class="input-full" type="text" value="<?php echo $secret ?>" name="<?php echo $this->get_field_name('secret') ?>">
  </label>
</p>
<p class="description half">
  <label for="<?php echo $this->get_field_id('token') ?>"> Access Token<br/>
    <input id="<?php echo $this->get_field_id('token') ?>" class="input-full" type="text" value="<?php echo $token ?>" name="<?php echo $this->get_field_name('token') ?>">
  </label>
</p>
<p class="description half last">
  <label for="<?php echo $this->get_field_id('secret_token') ?>"> Access Token Secret<br/>
    <input id="<?php echo $this->get_field_id('secret_token') ?>" class="input-full" type="text" value="<?php echo $secret_token ?>" name="<?php echo $this->get_field_name('secret_token') ?>">
  </label>
</p>
<?php
		}
		
		function block($instance) {
			extract($instance);
			
		
$numTweets      = 1;                // Number of tweets to display.
$name           = $twitname;  // Username to display tweets from.
$excludeReplies = true;             // Leave out @replies
$transName      = 'list-tweets';    // Name of value in database.
$cacheTime      = 5;                // Time in minutes between updates.
 
$backupName = $transName . '-backup';
 
// Do we already have saved tweet data? If not, lets get it.
if(false === ($tweets = get_transient($transName) ) ) :	
 
  // Get the tweets from Twitter.
  include sublime_ADMIN . '/twitteroauth/twitteroauth.php';
  
  $connection = new TwitterOAuth(
    $key,   // Consumer key
    $secret,   // Consumer secret
    $token,   // Access token
    $secret_token    // Access token secret
  );
  
  // If excluding replies, we need to fetch more than requested as the
  // total is fetched first, and then replies removed.
  $totalToFetch = ($excludeReplies) ? max(50, $numTweets * 3) : $numTweets;
  
  $fetchedTweets = $connection->get(
    'statuses/user_timeline',
    array(
      'screen_name'     => $name,
      'count'           => $totalToFetch,
      'exclude_replies' => $excludeReplies
    )
  );
  
  // Did the fetch fail?
  if($connection->http_code != 200) :
    $tweets = get_option($backupName); // False if there has never been data saved.
    
  else :
    // Fetch succeeded.
    // Now update the array to store just what we need.
    // (Done here instead of PHP doing this for every page load)
    $limitToDisplay = min($numTweets, count($fetchedTweets));
    
    for($i = 0; $i < $limitToDisplay; $i++) :
      $tweet = $fetchedTweets[$i];
    
      // Core info.
      $name = $tweet->user->name;
      $permalink = 'http://twitter.com/'. $name .'/status/'. $tweet->id_str;
 
      /* Alternative image sizes method: http://dev.twitter.com/doc/get/users/profile_image/:screen_name */
      $image = $tweet->user->profile_image_url;
 
      // Message. Convert links to real links.
      $pattern = '/http:(\S)+/';
      $replace = '<a href="${0}" target="_blank" rel="nofollow">${0}</a>';
      $text = preg_replace($pattern, $replace, $tweet->text);
 
      // Need to get time in Unix format.
      $time = $tweet->created_at;
      $time = date_parse($time);
      $uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);
 
      // Now make the new array.
      $tweets[] = array(
              'text' => $text,
              'name' => $name,
              'permalink' => $permalink,
              'image' => $image,
              'time' => $uTime
              );
    endfor;
 
    // Save our new transient, and update the backup.
    set_transient($transName, $tweets, 60 * $cacheTime);
    update_option($backupName, $tweets);
  endif;
endif; 
 
// Now display the tweets.
?>
</div></div></div></div></div>

<div class="twit-banner">
  <div class="container">
    <div id="tweets" class="twitter">
      <?php
if (is_array($tweets))
{

   foreach($tweets as $t) : ?>
      <p> <?php echo $t['text']; ?> <span class="tweet-time"><?php echo human_time_diff($t['time'], current_time('timestamp')); ?> ago</span> </p>
      <?php endforeach; }?>
    </div>
  </div>
  
</div>
<?php if( isset( $pin_footer ) && $pin_footer == true) echo '<div class="twitter-pin"></div>';
?>
<div class="container box">
<div class="row"><div class="row">
<?php
			
$content = ob_get_contents();

	return $content;

?>

<?php
			
			
		}
		
	}
}
?>
