(function($) {
  var fixed = $(".title-container"),
    hero = $("#hero"),
    heroImg = $("#hero img");
  /* control babe title, position and opacity */
  function setHeightHero() {
    fixed.css('top', (heroImg.offset().top + heroImg.height() / 1.8));
  }
  /* control babe title, position and opacity */
  function setHeight() {
    fixed.css('top', ($(window).height() / 2));
  }

  function setOpacity() {
    fixed = $(".title-container");
    if ($(window).scrollTop() > hero.offset().top * 1.5) {
      fixed.css("opacity", "0.25");
    } else {
      fixed.css("opacity", "0.5");
    }
  }

  window.onload = function() {
    document.body.className += " loaded";
    var body = $("body");
    if (body.hasClass("home") || body.hasClass("category") || body.hasClass("search-results")) {
      // console.log("case1: all masonary")
      /* establish masonary grid */
      $grid = $('#grid').masonry({
        initLayout: false,
        itemSelector: '.item',
        columnWidth: '.item',
        percentPosition: true,
        horizontalOrder: true,
        stagger: 100
      });
      // bind event
      $grid.masonry('on', 'layoutComplete', function() {
        // console.log('layout is complete');
        document.body.className += " loaded";
      });
      // trigger initial layout
      $grid.masonry();


      // Infinite Scroll
      $grid.infinitescroll({
          // selector for the paged navigation (it will be hidden)
          navSelector: "#nav-below",
          // selector for the NEXT link (to page 2)
          nextSelector: ".nav-previous a",
          // selector for all items you'll retrieve
          itemSelector: ".item",
          // finished message
          // loading: {
          // finishedMsg: 'No more pages to load.'
          // }
        },

        // Trigger Masonry as a callback
        function(newElements) {
          // hide new items while they are loading
          var $newElems = $(newElements).css({
            opacity: 0
          });
          // ensure that images load before adding to masonry layout
          $newElems.imagesLoaded(function() {
            // show elems now they're ready
            $newElems.animate({
              opacity: 1
            });
            $grid.masonry('appended', $newElems, true);
          });

        });



    }
    if (body.hasClass("search") || body.hasClass("category")) {
      //  console.log("case2: set height only")
      setHeight();

      $(window).on('resize orientationchange', setHeight);

      if (body.hasClass("category")) {
        //  console.log("case2.1: hide grad")
        var menu = $("#menu-main-menu"),
          current = $("#menu-main-menu li").last();

        if (current.hasClass("current-menu-item")) {
          $(".grad").animate({
            opacity: "0"
          }, 300);
        }

        menu.animate({
          scrollLeft: current.offset().left
        }, 800, function() {
          //  console.log('menu item visible');
        });
      }


    } else if (body.hasClass("home")) {
      setHeightHero();
      $(window).on('resize orientationchange', setHeight);
      $(window).on('scroll', setOpacity);

    } else if (body.hasClass("single")) {
      $('body.single #content .entry-content p:has(iframe)').css('width', '100%');
    }
  };

  function toTop(e) {
    $("html, body").animate({
      scrollTop: 0
    }, "slow");
    return false;
  }
  $("a[href='#top']").click(toTop);

  $(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
      $('.totop a').fadeIn();
    } else {
      $('.totop a').fadeOut();
    }
  });

})(jQuery);
