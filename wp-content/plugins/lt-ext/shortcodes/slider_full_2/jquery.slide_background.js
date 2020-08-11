/**	
 *
 * Background slide gallery
 *
 */
"use strict";

var wrapper = jQuery(".ltx-slide-background"),
	key = wrapper.data('key');

function sliderFcChangeBg(el) {

	if ( typeof el !== 'undefined' ) {

		var current = el;
		var bg = jQuery(current).find('a').data('image');
		var count = jQuery(current).find('a').data('count');
	}
		else {

    	var current = jQuery('.ltx-slider-fc .swiper-slide-active');
		var bg = current.find('a').data('image');
		var count = current.find('a').data('count');
	}

	jQuery(".ltx-slide-background .active").removeClass('active');
	jQuery("#ltx-fc-image-" + count ).addClass('active');

	console.log(count);

//	jQuery('.ltx-content-wrapper').css('background-image', 'url('+ bg +')');

/*
	var kid = '#' + key + '-' + count;

	if ( jQuery(kid).length &&! jQuery(kid).hasClass('animated') && !jQuery('.ltx-slide-background').hasClass('animStarted') ) {

		if ( jQuery('.ltx-slide-background .animated').length ) {

			var lastKid = jQuery('.ltx-slide-background .animated').attr('id');
			jQuery('.ltx-slide-background .animated').removeClass('animated');
		}

		jQuery(kid).addClass('animated');

		var delay = 0,
			elements = jQuery(kid).children('.part').length;
		jQuery(kid).children('.part').each(function(i, el) {

			var x = 100;

			delay = delay + 2;
			jQuery('.ltx-slide-background').addClass('animStarted');

		    var interval = setInterval(function() {

		        jQuery(el).attr("x", --x);

		        if ( x == 0 ) {

		            clearInterval(interval);

		            if ( (i + 1) == elements ) {
		            
			            jQuery('#' + lastKid).children('.part').attr("x", 100);

		            	jQuery('#ltx-fc-image-' + count).prependTo(".ltx-slide-background svg");
		            	jQuery('.ltx-slide-background').removeClass('animStarted');

		            	sliderFcChangeBg(jQuery('.ltx-slider-fc-wrapper .hovered'));
		            }
		        }
		    }, delay);

		});
	}
*/	
}

jQuery(window).on("resize", function () {

	//sliderFcResize();
}).resize();

function sliderFcResize() {

	var wrapper = jQuery(".ltx-slide-background"),
		height = wrapper.data('height'),
		width = wrapper.data('width'),
		bodyW = jQuery("body").outerWidth(),
		bodyH = jQuery("body").outerHeight();

	var imgRatio = width / height,
		bodyRatio = bodyW / width;

		console.log(bodyW, width);

	if ( bodyW < 1600 ) {

		wrapper.find('.ltx-svg').css( 'transform', 'scale(1.7)' );
	}

	if ( bodyW < 1200 ) {

		wrapper.find('.ltx-svg').css( 'transform', 'scale(3)' );
	}

	if ( bodyW < 1000 ) {

		wrapper.find('.ltx-svg').css( 'transform', 'scale(4)' );
	}

	if ( bodyW <= 768 ) {

		wrapper.find('.ltx-svg').css( 'transform', 'scale(6)' );
	}	
/*
		if ( bodyRatio < 1 ) {

			var currentHeight = height * bodyRatio;
			var neededRatio = bodyH / currentHeight;
			
			if ( neededRatio > 1 ) {

				wrapper.find('.ltx-svg').css( 'transform', 'scale('+ neededRatio + ')' );
			}
		}

	}
*/
	console.log(bodyH);

}

function createNewRect(lastKid) {

	var mask = jQuery(document.createElementNS("http://www.w3.org/2000/svg", "mask")).attr({

	 	id: lastKid.replace('#', ''),
		x : 0,
		y : 0,
		class : 'animated',
		width : 100,
		height :100,
	});

	var data = [0, 20, 40, 60, 80];
	jQuery.each(data, function(index, value) {
	    var rect = jQuery(document.createElementNS("http://www.w3.org/2000/svg", "rect")).attr({
	    	class : 'part',
	    	x : 0,
	    	y : value,
	    	width : 100,
	    	height :20.2,
	    	fill: '#fff',
	    });
	    mask.append(rect);	
	});

	jQuery(lastKid).remove();

	jQuery(".ltx-slide-background .ltx-defs").prepend(mask);
}