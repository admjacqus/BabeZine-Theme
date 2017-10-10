(function($) {
  $('img').parent('a').addClass('contains-image');

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
      fixed.css("opacity", "0.2");
    } else {
      fixed.css("opacity", "0.4");
    }
  }

  window.onload = function() {
    var body = $("body");
    if (body.hasClass("home") || body.hasClass("category") || body.hasClass("search-results") || body.hasClass("archive")) {
      // console.log("case1: all masonary")
      /* establish masonary grid */
      $grid = $('#grid').masonry({
        initLayout: false,
        itemSelector: '.item',
        columnWidth: '.item:not(.item-2)',
        percentPosition: true,
        horizontalOrder: true,
        stagger: 100
      });
      // bind event
      $grid.masonry('on', 'layoutComplete', function() {
      });
      $grid.imagesLoaded().done( function() {
          // console.log('all images successfully loaded');
          body.addClass("imgLoaded");
          setTimeout(function(){ $('.navigation').addClass('hide'); }, 2000);
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
          loading: {
          finishedMsg: 'No more pages to load.',
          //spinner
          // img: 'https://media.missguided.co.uk/image/upload/v1476782121/Loading-Small2_tjqqro.gif'
          //yappy doge
          img: 'https://i.giphy.com/media/5xtDarniHFmiZuCoW40/200w_d.gif'
          }
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
        currentItem = $("#menu-main-menu li.current-menu-item"),
          last = $("#menu-main-menu li").last();
          // console.log(last.offset().left);
        if (last.hasClass("current-menu-item")) {
          $(".grad").animate({
            opacity: "0"
          }, 300);
        }

        menu.animate({
          scrollLeft: currentItem.offset().left - 20
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
      $('iframe').wrap('<div class="aspect-ratio" />');
      setTimeout(function(){ $('.navigation').addClass('hide'); }, 2000);
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

   $(window).scroll(function () {
     if ($(this).scrollTop() > ($(document).height() / 2) && $(window).width() > 1180) {
       $('.float--left, .float--right').css('visibility', 'visible');
       $('.float--left, .float--right').css('opacity', '1');
       $('.float--left').css('left', '0');
       $('.float--right').css('right', '0');
     } else {
       $('.float--left, .float--right').css('visibility', 'hidden');
       $('.float--left, .float--right').css('opacity', '0');
     }
   });

   $(window).resize(function () {
     if ($(window).width() < 1180) {
       $('.float--left, .float--right').css('opacity', '0');
       $('.float--left, .float--right').css('visibility', 'hidden');
     } else if ($(this).scrollTop() > ($(document).height() / 2) ) {
       $('.float--left, .float--right').css('visibility', 'visible');
       $('.float--left, .float--right').css('opacity', '1');
     }
   });

   if ($(window).width() < 1180) {
     $('.float--left').css('opacity', '0');
     $('.float--left').css('visibility', 'hidden');
    //  console.log("less that 1280");
   }


$(window).on({ 'touchstart' : function(){ $('.navigation').removeClass('hide'); } });



   })(jQuery);
