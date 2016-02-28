(function($) {
  var clocktowerPlayer = {};
  Drupal.behaviors.clocktowerplayer = {};
  	Drupal.behaviors.clocktowerplayer.attach = function() {
    if (Drupal.settings && Drupal.settings.clocktowerplayer ) {
      var options = Drupal.settings.clocktowerplayer;
      clocktowerPlayer.file_path = options.file_path;
      clocktowerPlayer.title = options.title;
  	}
  }
  $( document ).ready(function() {
  	$("#jquery_jplayer_1").jPlayer({
  		ready: function (event) {
  			$(this).jPlayer("setMedia", {
  				title: clocktowerPlayer.title,
  				mp3: clocktowerPlayer.file_path,
  			});
        $('.play-button').on('click', function() {
          $('.jp-play').click();
        })
  		},
  		swfPath: "../../../libraries/jplayer",
  		wmode: "window",
  		useStateClassSkin: true,
  		autoBlur: false,
  		keyEnabled: true,
  		remainingDuration: true,
  		toggleDuration: true
  	});
  });
})(jQuery);