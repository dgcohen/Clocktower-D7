<div class="radio-index-header">
  <h2 class="label">Radio</h2>
  <p>Music ranging from live recordings of the widely acclaimed summer Warm Up series to 
  experimental music surveys; and partnered with numerous arts organizations to programs, events, and performances.</p>
</div>
<div class="channel-index">
  <?php print views_embed_view('channels', 'default'); ?>
</div>
<div class="series-hosts-container">
  <div class="series-list">
    <h2 class="label">Series</h2>
    <?php print views_embed_view('series_list', 'default'); ?>
  </div>
  <div class="hosts-list">
    <h2 class="label">Hosts</h2>
    <?php print views_embed_view('hosts_list', 'default'); ?>
  </div>
</div>