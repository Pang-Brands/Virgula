'use strict';

import * as dom from './lib/dom.js';
function redirect404(url) {
    setTimeout(function () {
        window.location.href = url;
    }, 20000);
}

export default function(){
	window.addEventListener('load', function() {
        const page404 = document.querySelector('.js-redirect-404');
        const url = (page404)? page404.getAttribute('data-url') : '';
        if(page404) {
            redirect404(url);
        }
	});
}