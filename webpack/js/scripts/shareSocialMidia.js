'use strict';

import * as dom from './lib/dom.js';

function shareSocialMidia(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    const dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    const dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    const left = ((width / 2) - (w / 2)) + dualScreenLeft;
    const top = ((height / 2) - (h / 2)) + dualScreenTop;
    // console.log(url);
    // console.log(width);
    // console.log(height);
    // console.log(w);
    // console.log(h);
    const newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus(); 
    };
};

export default function() {
    const shareBtn = document.querySelectorAll('.js-share-button');
    dom.forEachEl(shareBtn, (el) => {
        el.addEventListener('click', function(e){
            e.preventDefault();
            // console.log(el.getAttribute('href'));
            const intWidth = '660';
            const intHeight = '600';
            shareSocialMidia(el.getAttribute('href'), 'Social Share', intWidth, intHeight);
        });
    });
};
