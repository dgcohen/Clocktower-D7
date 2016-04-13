<div class="player-container" style="background: url('<?php print($background_image_src); ?>') no-repeat;">
  <span class="overlay"></span>
  <span class="text-overlay"></span>
  <div class="player-header">
    <h1 class="logo">Clocktower</h1>
    <div class="show-details">
      <h2><span>Show:</span><?php print($title); ?></h2>
      <h2><span>Series:</span><?php print($series); ?></h2>
      <?php if($channel): ?>
        <h2><span>Channel:</span><?php print($channel); ?></h2> 
      <?php endif; ?>
    </div>
  </div>
  <div class="options-container">
    <a href="#" class="more-info">More Info</a>
    <a href="#" class="channels">Channels</a>
    <a href="#" class="subscribe">Subscribe</a>
    <a href="#" class="share">Share</a>
  </div>
  <div class="channel-list modal">
    <div class="close-button"></div>
    <?php foreach($channel_list as $channel) { ?>
    <a href="/player/<?php print $channel->nid ?>/0"><p><?php print $channel->title ?></p></a>
    <?php }; ?>
  </div>
  <div class="info modal">
    <div class="body"><div class="close-button"></div><?php print($body); ?></div>
  </div>
  <div class="embed modal">
    <div class="close-button"></div>
    <h3>Embed this show</h3>
    <textarea id="embed-code"><iframe width="400" height="512" src="http://<?php print $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>/?autoplay=0" frameborder="0"></iframe></textarea>
    <p>Copy and paste the code above to embed this show on your website.</p>
  </div>
  <div class="controls-container">
    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
    <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
      <div class="jp-type-single">
        <div class="jp-gui jp-interface">
          <div class="jp-controls">
            <button class="jp-play" role="button" tabindex="0">play</button>
            <button class="jp-stop" role="button" tabindex="0">stop</button>
          </div>
          <div class="jp-volume-controls">
            <button class="jp-mute" role="button" tabindex="0">mute</button>
            <div class="jp-volume-bar">
              <div class="jp-volume-bar-value"></div>
            </div>
            <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
          </div>
          <div class="jp-time-holder">
            <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
            <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
            <div class="jp-toggles">
              <button class="jp-repeat" role="button" tabindex="0">repeat</button>
            </div>
          </div>
          <div class="jp-progress">
            <div class="jp-seek-bar">
              <div class="jp-play-bar"></div>
            </div>
          </div>
        </div>

        <div class="player-controls">
          <div class="player-buttons">
            <?php if ($previous_show_id) { ?>
              <a class="previous-node" href="/player/<?php print($station_id . '/' . $previous_show_id) ?>">previous node</a>
            <?php } else { ?>
              <p class="previous-node">previous node</p>
            <?php } ?>

            <a class="previous-track" href="#">previous track</a>
            <a class="play-button" href="#">play</a>
            <a class="next-track" href="#">next track</a>
            <?php if ($next_show_id) { ?>
              <a class="next-node" href="/player/<?php print($station_id . '/' . $next_show_id) ?>">next node</a>
            <?php } else { ?>
              <p class="next-node">next node</p>
            <?php } ?>
          </div>
        </div>

        <div class="jp-no-solution">
          <span>Update Required</span>
          To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
        </div>
      </div>
    </div>
  </div>
</div>