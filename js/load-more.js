jQuery(function($){

	$('#grid').after( '<span class="load-more"></span>' );
	var button = $('.load-more');
	var page = 2;
	var loading = false;
	var scrollHandling = {
	    allow: true,
	    reallow: function() {
	        scrollHandling.allow = true;
	    },
	    delay: 400 //(milliseconds) adjust to the highest acceptable value
	};

	$(window).scroll(function(){
		if( ! loading && scrollHandling.allow ) {
			scrollHandling.allow = false;
			setTimeout(scrollHandling.reallow, scrollHandling.delay);
			var offset = $(button).offset().top - $(window).scrollTop();
			if( 2000 > offset ) {
				loading = true;
				var data = {
					action: 'be_ajax_load_more',
					nonce: beloadmore.nonce,
					page: page,
					query: beloadmore.query,
				};
				$.post(beloadmore.url, data, function(res) {
					if( res.success) {
						// $('#grid').append( res.data );

						// create new item elements
					   var $items = res.data;
					   // append items to grid, then add and lay out newly appended items
						 console.log($grid)
					   $grid.append( $items ).masonry( 'appended', $items );

						// $grid.append( res.data )
							// add and lay out newly appended items
							// .masonry( 'appended', res.data );
							// console.log( res.data );
						$('#grid').after( button );
						page = page + 1;
						loading = false;
						// $('#grid').masonry();
					} else {
						console.log(res);
					}
				}).fail(function(xhr, textStatus, e) {
					console.log(xhr.responseText);
				});

			}
		}
	});
});
