(function($) {
  var clocktowerPlayer = {};
  Drupal.behaviors.clocktowerplayer = {};
  	Drupal.behaviors.clocktowerplayer.attach = function() {
    if (Drupal.settings && Drupal.settings.clocktowerplayer ) {
      var options = Drupal.settings.clocktowerplayer;
      clocktowerPlayer.file_path = options.file_path;
      clocktowerPlayer.title = options.title;
      clocktowerPlayer.autoplay = options.autoplay;
  	}
  }
  $( document ).ready(function() {
  	$("#jquery_jplayer_1").jPlayer({
  		ready: function (event) {
  			$(this).jPlayer("setMedia", {
  				title: clocktowerPlayer.title,
  				mp3: clocktowerPlayer.file_path,
  			});
        if(!!parseInt(clocktowerPlayer.autoplay)) {
          $('.jp-play').click();
        }
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
    $('.channels').click(function(event) {
      event.preventDefault();
      $('.channel-list').show();
    });
    $('.share').click(function(event) {
      event.preventDefault();
      $('.embed').show();
      var embedCode = $('#embed-code');
      embedCode.select();
    });
    $('.close-button').click(function(event) {
      event.preventDefault();
      $('.modal').hide();
    });
  });
})(jQuery);