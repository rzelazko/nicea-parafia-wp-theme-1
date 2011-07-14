/*global NPCarousel, carouselSettings, document, jQuery*/
/*jslint white: true, onevar: true, undef: true, nomen: true, regexp: true, plusplus: true, bitwise: true, newcap: true, maxerr: 50, indent: 4 */

jQuery(document).ready(function () {
	var npCarousel = new NPCarousel(jQuery);
	npCarousel.init(carouselSettings);

    jQuery('#searchIco').click(function () {
		jQuery('#headSearch').css('right', 'auto');
		jQuery('#headSearch').css('left',
			jQuery('#searchIco').position().left
			- jQuery('#headImage').position().left
			- parseInt(jQuery('#searchIco').parents('li:first').css('padding-left'), 10));

        jQuery('#headSearch').animate({opacity: 'toggle'});
    });
});
