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
        $('.responsive-menu').toggle();
      });
    }
  };

  Drupal.behaviors.imageGalleries = {
    attach: function (context, settings) {
      $('.node-image .field-name-field-image').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery:{enabled:true}
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
    }
  };


})(jQuery);
