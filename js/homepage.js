/*global NPCarousel, carouselSettings, document, $*/
/*jslint white: true, onevar: true, undef: true, nomen: true, regexp: true, plusplus: true, bitwise: true, newcap: true, maxerr: 50, indent: 4 */

$(document).ready(function () {
	var npCarousel = new NPCarousel();
	npCarousel.init(carouselSettings);

    $('#searchIco').click(function () {
		$('#headSearch').css('right', 'auto');
		$('#headSearch').css('left',
			$('#searchIco').position().left
			- $('#headImage').position().left
			- parseInt($('#searchIco').parents('li:first').css('padding-left'), 10));

        $('#headSearch').animate({opacity: 'toggle'});
    });
});