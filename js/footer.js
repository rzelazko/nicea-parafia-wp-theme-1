jQuery(document).ready(function () {
 	var footerLogo = jQuery('#footer').find('.pageLogo').find('a').first();

	footerLogo.click(function () {
		var aElem = jQuery(this),
			href = aElem.attr('href');
		
		if (!aElem.data('timer')) {
			aElem.data('timer', setTimeout(function () {
				window.location = href;
			}, 500));
		} 
		
		return false;
	});  
	
	footerLogo.dblclick(function () {
		var aElem = jQuery(this);
		
		clearTimeout(aElem.data('timer'));     
		aElem.data('timer', null); 
		
		window.location = aElem.attr('href').replace(/\/$/, '') + '/wp-admin';   
		
		return false; 
	});
});
