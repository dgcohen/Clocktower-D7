(function ($) {

  Drupal.behaviors.addIE10 = {
    attach: function (context, settings) {

      var $ua = window.navigator.userAgent;
      var $msie = $ua.indexOf("MSIE 10");

      if ($msie > 0) {
        $("html").addClass("ie10");
      }
    }
  };

  Drupal.behaviors.mobileMenu = {
    attach: function (context, settings) {
      $('.menu-btn').click(function() {
        $('.responsive-menu').slideToggle();
      });
    }
  };

  Drupal.behaviors.imageGalleries = {
    attach: function (context, settings) {
      $('.node-image .field-name-field-image').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery:{enabled:true},
        image: {
           titleSrc: function(item) {
           return item.el.parents('.field-item').find('.image-title').html();
          }
        },
      });
    }
  };

  Drupal.behaviors.radioIndexLists = {
    attach: function (context, settings) {

      if($('.block-bean-radio-index')) {
        var $seriesList = $('.view-series-list .view-content');
        var $hostsList = $('.view-hosts-list .view-content');

        splitIntoColumns($seriesList);
        splitIntoColumns($hostsList);
      }

      function splitIntoColumns(container) {
        var $items = container.find('.views-row');
        container.prepend('<div class="col-left"></div><div class="col-right"></div>');
        var $colLeft = container.find('.col-left');
        var $colRight = container.find('.col-right');
        var half = $items.length / 2;
        $items.each(function(index) {
          if (index < half) {
            $(this).appendTo($colLeft);
          } else {
            $(this).appendTo($colRight);
          }
        });

      }
    }
  };

  Drupal.behaviors.artistsIndexLists = {
    attach: function (context, settings) {

      if($('.view-artists')) {
        var $artistsList = $('.view-artists .view-content');
        artistColumns($artistsList);
      }

      function artistColumns(container) {
        var $items = container.find('.views-row');
        container.prepend('<div class="col-1"></div><div class="col-2"></div><div class="col-3"></div><div class="col-4"></div>');

        var quarter = $items.length / 4;
        var divider = quarter;
        var indexCounter = 1;
        $items.each(function(index) {
          if (index < divider) {
            $(this).appendTo($('.col-' + indexCounter.toString()));
          } else {
            indexCounter += 1;
            divider += quarter;
            $(this).appendTo($('.col-' + indexCounter.toString()));
          }
        });

      }
    }
  };

  Drupal.behaviors.clocktowerPopup = {
    attach: function (context, settings) {

      $(window).load(function() {

        $('.open-popup-link').magnificPopup({
          type:'inline',
          midClick: true,
          removalDelay: 500,
          mainClass: 'mfp-zoom-in'
        });

        if(Drupal.settings.popupEnabled && !$.cookie('clocktower_stream')) {
          $('.open-popup-link').click();
          $.cookie("clocktower_stream", 1, { expires : 1, path: '/' });
        }
      });
    }
  };

  Drupal.behaviors.moveFirstImage = {
    attach: function (context, settings) {
      $nodeImage = $('.node-image');
      $firstImage = $('.node-image .field-name-field-image .field-item:first-child');
      $firstImage.clone().addClass('mobile-image').insertBefore('.node-body .content');
      $( window ).resize(function() {
        if ($(this).width() < 960) {
          $nodeImage.insertAfter('.node-body .field-name-body');
        } else {
          $nodeImage.insertBefore('.social-links');
        }
      });
    }
  };


})(jQuery);
