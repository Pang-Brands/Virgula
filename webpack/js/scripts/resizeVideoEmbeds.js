'use strict';

import * as dom from './lib/dom.js';
import  reframe from 'reframe.js/dist/reframe.es.js';
function resizeVideoEmbeds(iframes) {
    reframe(iframes);
}

export default function(){
	window.addEventListener('load', function() {
        const iframes = document.querySelectorAll('.c-single-main-content iframe');
        if(iframes) {
            resizeVideoEmbeds(iframes);
        }
	});
}