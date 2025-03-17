'use strict';

import * as dom from './lib/dom.js';

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

export default function(){
	window.addEventListener('load', function() {
        const currentCookie = getCookie('segmento-filtro');
        const modalSegmentTrigger = document.querySelector('.js-open-modal');
        const setCookieTrigger = document.querySelectorAll('.js-set-segment-cookie');
        const modalSegment = document.querySelector('.o-modal-segmento');

        if (!currentCookie) {
            dom.removeClass(modalSegment, 'o-modal--hidden');
        }

        dom.forEachEl(setCookieTrigger, function(trigger){

            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                setTimeout(() => {
                    setCookie('segmento-filtro', trigger.getAttribute('data-segment'));
                    document.location.reload(true);
                    dom.addClass(modalSegment, 'o-modal--hidden');
                    modalSegmentTrigger.querySelector('span').innerHTML = trigger.getAttribute('data-text');
                }, 200);
            });
        });
	});
}
