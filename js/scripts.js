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
    } else if (body.hasClass("error404")) {
      $(document).ready(function() {
        var myArray = [
            "https://media1.tenor.com/images/77d9fa44142cbc49a84b90c33b155420/tenor.gif?itemid=7568782",
            "https://media1.tenor.com/images/92c10b7c4905d7d475ccf8e5816aff07/tenor.gif?itemid=5265736",
            "https://media1.tenor.com/images/b4c354ac422c1927c5002f8052c22d56/tenor.gif?itemid=4668781",
            "https://media1.tenor.com/images/9c32613d6077aeec2c565a2fc09b4c0b/tenor.gif?itemid=3563184",
            "https://media1.tenor.com/images/7832870957572e804416a14238e88688/tenor.gif?itemid=5239610",
            "https://media1.tenor.com/images/0427fdc19cbe9ddfde4b2dcdf4d0fe43/tenor.gif?itemid=5036504",
            "https://media1.tenor.com/images/a253c853cb6936eeebede1a47ea92be9/tenor.gif?itemid=5248816"
          ],
          rand = myArray[Math.floor(Math.random() * myArray.length)],
          shrug = document.getElementById("shrug");

        shrug.src = rand;
      });
    }
    //end window.onload
  };

  // Set button to click.
  var button = $("#mobile-btn"),
    category = $(".categories"),
    menu = $(".menu-home"),
    push = $("body");

  button.click(function() {
    $(this).toggleClass("active");
    category.toggleClass("open");
    menu.toggleClass("open");
    push.toggleClass("push");
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
})(jQuery);
