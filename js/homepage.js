/*global NPCarousel, carouselSettings, document, jQuery*/
/*jslint white: true, onevar: true, undef: true, nomen: true, regexp: true, plusplus: true, bitwise: true, newcap: true, maxerr: 50, indent: 4 */

jQuery(document).ready(function () {
	var isMobile = jQuery(document).width() < 650,
		headSearchForm = jQuery('#headSearch');
		npCarousel = null;
		
	if (!isMobile) {
		npCarousel = new NPCarousel(jQuery);
		npCarousel.init(carouselSettings);
	}

	jQuery('#searchIco').click(function () {
		if (!isMobile) {
			headSearchForm.css('left',
				jQuery('#searchIco').position().left
				- jQuery('#headImage').position().left
				- parseInt(jQuery('#searchIco').parents('li:first').css('padding-left'), 10));
			
			headSearchForm.animate({opacity: 'toggle'});
		} else {
			headSearchForm = headSearchForm.detach();
			headSearchForm.appendTo('body');
			
			headSearchForm.css('top', 
				jQuery('#searchIco').position().top + jQuery('#searchIco').height());
				
			headSearchForm.toggle();
		}
	});
});
