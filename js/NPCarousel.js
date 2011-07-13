/*global document, window, $*/
/*jslint white: true, onevar: true, undef: true, nomen: true, regexp: true, plusplus: true, bitwise: true, newcap: true, maxerr: 50, indent: 4 */

/**
 * Carousel adapted to Nicea Parafia page
 * @author Rafal Zelazko <rzelazko(at)gmail(dot)com>
 */
function NPCarousel() {
	var imgList = [],
        imageCache = [],
        currentIdx = 0,
        carouselInterval,
        preloadImg;
		
	preloadImg = function () {
		var i, img;
		
		for (i = 0; i < imgList.length; i += 1) {			
			img = document.createElement('img'); 
			img.src = imgList[i].src; 
			
			imageCache.push(img);			
			imgList[i].ready = true;
		}
	};
		
	return {
		init: function (data) {
			var npCarousel = this,
				scroller = $('#headImage').find('.scroller'),
				carouselElemImgs = scroller.find('li.carouselElem'),
				firstElem = scroller.find('li:first'),
				lastElem = scroller.find('li:last');
				
			imgList = data;
							
			if (imgList.length !== carouselElemImgs.length) {
				throw 'NPCarousel: Arrays imgList and li.carouselElem need to have same size';
			}
				
			carouselElemImgs.each(function () {			
				$(this).click(function () {
					var jqThis = $(this);
					
					currentIdx = jqThis.prevAll('li.carouselElem').length;						
					npCarousel.showImg(currentIdx);
					window.clearInterval(carouselInterval);
				});
			});
			
			firstElem.click(function () {
                currentIdx -= 1;
				if (currentIdx < 0) {
					currentIdx = imgList.length - 1;
				}
                npCarousel.showImg(currentIdx);
                window.clearInterval(carouselInterval);
			});			
			
			lastElem.click(function () {
                currentIdx += 1;
                currentIdx %= imgList.length;
                npCarousel.showImg(currentIdx);
                window.clearInterval(carouselInterval);
			});
			
			window.setTimeout(preloadImg, 1000);
			carouselInterval = window.setInterval(function () {
				currentIdx += 1;
				currentIdx %= imgList.length;
				npCarousel.showImg(currentIdx);
			}, 15000);
		},
		
		showImg: function (imgIdx) {
			var imgElem = imgList[imgIdx], imgCopy, headCarousel = $('#headImage'), headSlogan = $('#headSlogan');
			
			if (!imgElem.ready) {
				return;
			}
			
			// create element #copy inside #headImage with background from #headImage
			// change background of #headImage
			// fade out slogan texts
			// fade out #copy
			// remove #copy
			// change slogan tests
			// fade in slogan texts
			// select correct dot in ul.scroller
			
			imgCopy = $('<div/>').css('width', '100%').css('height', '100%').css('background-image', headCarousel.css('background-image')).css('position', 'absolute').css('top', 0).css('left', 0);
			headCarousel.prepend(imgCopy);
			
			headCarousel.css('background-image', 'url(' + imgElem.src + ')');
				
			headSlogan.find('.placeName').fadeTo('slow', 0.5, function () {
				$(this).html(imgElem.place);
			});
			headSlogan.find('.msg').find('div').fadeTo('slow', 0.5, function () {
				var elem = $(this);
				if (elem.hasClass('msgSource')) {
					elem.html(imgElem.msgSource);
				} else {
					elem.html(imgElem.msg);
				}
			});
					
			imgCopy.fadeOut('slow', function () {
				imgCopy.remove();
			});
			
			headSlogan.find('.placeName').fadeTo('slow', 1);
			headSlogan.find('.msg').find('div').fadeTo('slow', 1);
						
			headCarousel.find('.scroller').find('li.selected').removeClass('selected');
			$(headCarousel.find('.scroller').find('li.carouselElem')[imgIdx]).addClass('selected');
		}
	};
}
