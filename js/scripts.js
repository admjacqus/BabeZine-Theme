(function($) {
  $("img")
    .parent("a")
    .addClass("contains-image");

  var fixed = $(".title-container"),
    hero = $("#hero"),
    heroImg = $("#hero img");
  /* control babe title, position and opacity */
  function setHeightHero() {
    fixed.css("top", heroImg.offset().top + heroImg.height() / 1.8);
  }
  /* control babe title, position and opacity */
  function setHeight() {
    fixed.css("top", $(window).height() / 2);
  }

  function setOpacity() {
    if ($(window).width() >= 737) {
      if ($(window).scrollTop() > hero.outerHeight() / 4) {
        fixed.css("opacity", ".25");
      } else {
        fixed.css("opacity", ".5");
      }
    } else {
      if ($(window).scrollTop() > hero.outerHeight() / 4) {
        fixed.css("opacity", ".15");
      } else {
        fixed.css("opacity", ".25");
      }
    }
  }
  //commmented out below
  window.onload = function() {
    var body = $("body");
    if (
      body.hasClass("home") ||
      body.hasClass("category") ||
      body.hasClass("search-results") ||
      body.hasClass("archive")
    ) {
      /* establish masonary grid */
      var $grid = $(".grid").masonry({
        // initLayout: false,
        // select none at first
        itemSelector: "none",
        // itemSelector: ".item",
        columnWidth: ".item:not(.item-2)",
        gutter: ".gutter-sizer",
        percentPosition: true,
        // horizontalOrder: true,
        stagger: 30,
        // nicer reveal transition
        visibleStyle: {
          transform: "translateY(0)",
          opacity: 1
        },
        hiddenStyle: {
          transform: "translateY(100px)",
          opacity: 0
        }
      });

      // initial items reveal
      $grid.imagesLoaded(function() {
        $grid.removeClass("are-images-unloaded");
        $grid.masonry("option", {
          itemSelector: ".item"
        });
        var $items = $grid.find(".item");
        $grid.masonry("appended", $items, true);
      });

      var msnry = $grid.data("masonry");

      // Infinite Scroll
      $grid.infinitescroll(
        {
          // selector for the paged navigation (it will be hidden)
          navSelector: "#nav-below",
          // selector for the NEXT link (to page 2)
          nextSelector: ".nav-previous a",
          // selector for all items you'll retrieve
          itemSelector: ".item",
          // append: ".item",
          outlayer: msnry,
          // finished message
          loading: {
            msgText: "",
            finishedMsg: "🏁 congrats, you completed the internet 🏁",
            img: "https://i.giphy.com/media/5xtDarniHFmiZuCoW40/200w_d.gif"
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
            $grid.masonry("appended", $newElems, true);
          });
        }
      );
    }
    if (body.hasClass("search") || body.hasClass("category")) {
      if (body.hasClass("category")) {
        var menu = $("#menu-main-menu"),
          currentItem = $("#menu-main-menu li.current-menu-item"),
          last = $("#menu-main-menu li").last();
        if (last.hasClass("current-menu-item")) {
          $(".grad").animate(
            {
              opacity: "0"
            },
            300
          );
        }

        menu.animate(
          {
            scrollLeft: currentItem.offset().left - 20
          },
          800
          // function() {console.log("menu-main-menu item visible");}
        );
      }
    } else if (body.hasClass("home")) {
      setHeightHero();
      $(window).on("resize orientationchange", setHeight);
      $(window).on("scroll", setOpacity);
    } else if (body.hasClass("single")) {
      $("body.single #content .entry-content p").css("width", "100%");
      $("iframe:not(iframe.instagram-media)").wrap(
        '<div class="aspect-ratio" />'
      );
      // setTimeout(function(){ $('.navigation').addClass('hide'); }, 2000);
    }
    //end window.onload
  };

  //search toggle

  $("#search-btn").click(function() {
    $(this).toggleClass("active");
    $(".menu-search").toggleClass("open");
    // $(".menu-search").addClass("in-down");
  });

  $("#mobile-btn").click(function() {
    $(this).toggleClass("active");
    $(".categories").toggleClass("open");
  });

  // Close after clicking on a li

  $("#menu-main-menu li").on("click", function() {
    $("#nav-overlay").hide();
    $("#search-btn").removeClass("active");
  });

  function toTop(e) {
    $("html, body").animate(
      {
        scrollTop: 0
      },
      "slow"
    );
    return false;
  }
  $("a[href='#top']").click(toTop);

  $(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
      $(".totop a").fadeIn();
    } else {
      $(".totop a").fadeOut();
    }
  });

  $(window).scroll(function() {
    if (
      $(this).scrollTop() > $(document).height() / 2 &&
      $(window).width() > 1180
    ) {
      $(".float--left, .float--right").css("visibility", "visible");
      $(".float--left, .float--right").css("opacity", "1");
      $(".float--left").css("left", "0");
      $(".float--right").css("right", "0");
    } else {
      $(".float--left, .float--right").css("visibility", "hidden");
      $(".float--left, .float--right").css("opacity", "0");
    }
  });

  $(window).resize(function() {
    if ($(window).width() < 1180) {
      $(".float--left, .float--right").css("opacity", "0");
      $(".float--left, .float--right").css("visibility", "hidden");
    } else if ($(this).scrollTop() > $(document).height() / 2) {
      $(".float--left, .float--right").css("visibility", "visible");
      $(".float--left, .float--right").css("opacity", "1");
    }
  });

  if ($(window).width() < 1180) {
    $(".float--left").css("opacity", "0");
    $(".float--left").css("visibility", "hidden");
  }
})(jQuery);
