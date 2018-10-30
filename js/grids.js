(function($) {
  $(function() {
    console.log("start making grids!");

    // requires itemSelector to be set on Masonry instance
    $.fn.masonryImagesReveal = function($items) {
      var msnry = this.data("masonry");
      var itemSelector = msnry.options.itemSelector;
      // hide by default
      $items.hide();
      // append to container
      this.append($items);
      $items.imagesLoaded().progress(function(imgLoad, image) {
        // get item
        // image is imagesLoaded class, not <img>, <img> is image.img
        var $item = $(image.img).parents(itemSelector);
        // un-hide item
        $item.show();
        console.log("show grid imgs!");

        // masonry does its thing
        msnry.appended($item);
      });
      return this;
    };

    /* establish masonary grid */
    var $grid = $(".grid").masonry({
      itemSelector: ".item",
      columnWidth: ".item:not(.item-2)",
      gutter: ".gutter-sizer",
      percentPosition: true,
      isAnimated: true,
      animationOptions: {
        duration: 100,
        easing: "linear",
        queue: true
      }
    });

    // layout Masonry after each image loads
    $grid.imagesLoaded().progress(function() {
      $grid.removeClass("are-images-unloaded");
      $grid.masonry("layout");
    });

    $grid.infinitescroll(
      {
        navSelector: "#nav-below", // selector for the paged navigation
        nextSelector: ".nav-previous a", // selector for the NEXT link (to page 2)
        itemSelector: ".item", // selector for all items you'll retrieve
        loading: {
          msgText: "",
          finishedMsg: "🏁 congrats, you completed the internet 🏁",
          img: "https://i.giphy.com/media/5xtDarniHFmiZuCoW40/200w_d.gif"
        }
      },
      // trigger Masonry as a callback
      function(newElements) {
        // hide new items while they are loading
        var $newElems = $(newElements).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function() {
          // show elems now they're ready
          $newElems.animate({ opacity: 1 });
          // $grid.masonry("appended", $newElems, true);
          $grid.masonryImagesReveal($newElems);
          console.log("reveal new items");
        });
      }
    );
  });
})(jQuery);
