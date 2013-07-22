	function webpCookieInfoInit() {
		var cookieName = 'webpCookieInfoShown',
			infoBar = document.getElementById('webpCookieInfo'),
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
				var cookieStr = escape(name) + '=',
					expires = new Date();
					
				if (typeof value != 'undefined') {
					cookieStr += escape(value);
				}

				expires.setTime(expires.getTime()+.5*24*60*60*1000);
				cookieStr += '; expires='+ expires.toGMTString() + '; path=/';
				document.cookie = cookieStr;
			},
			showInfo = true;
			
		if (getCookie(cookieName) === '') {
			infoBar.style.display = 'block';
			
			document.getElementById('webpCookieInfoBtn').onclick = function() {
				infoBar.style.display = 'none';
				setCookie(cookieName, 'true');
			}
		}
		
		
	}
	window[addEventListener ? 'addEventListener' : 'attachEvent'](addEventListener ? 'load' : 'onload', webpCookieInfoInit);
