(function() {
	function webpHolidayNoteInit() {
		var cookieName = 'webpHolidayNoteShown',
			infoBar = document.getElementById('webpHolidayNote'),
			getCookie = function(name) {
				var str = '; '+ document.cookie +';',
					index = str.indexOf('; '+ escape(name) +'='),
					value = '';
					
				if (index != -1) {
					index += name.length+3;
					value = str.slice(index, str.indexOf(';', index));
					return unescape(value);
				}
				
				return value;
			},
			setCookie = function(name, value) {
				var cookieStr = escape(name) + '=';
					
				if (typeof value != 'undefined') {
					cookieStr += escape(value);
				}

				cookieStr += '; path=/';
				document.cookie = cookieStr;
			},
			showInfo = true;
			
		if (getCookie(cookieName) === '') {
			infoBar.style.display = 'block';
			
			document.getElementById('webpHolidayNoteBtn').onclick = function() {
				infoBar.style.display = 'none';
				setCookie(cookieName, 'true');
			}
		}
		
		
	}
	// window[addEventListener ? 'addEventListener' : 'attachEvent'](addEventListener ? 'load' : 'onload', webpHolidayNoteInit);

	if (window.addEventListener) {
		window.addEventListener('load', webpHolidayNoteInit);
	}
	else if (window.attachEvent) {
		window.attachEvent('onload', webpHolidayNoteInit);
	}
}());
