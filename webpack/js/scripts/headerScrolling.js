'use strict';

import * as dom from './lib/dom.js';

function headerScrolling(){
    const headerEl = document.querySelector('.o-header');
    const headerCategories = document.querySelector('.c-menu__main');
    if(dom.hasClass(headerEl, 'is-scrolling') && !dom.hasClass(headerEl, 'is-scrolling-up')){
        dom.addClass(headerCategories, 'is-hide');
    } else { dom.removeClass(headerCategories, 'is-hide'); }
}

export default function(){
    window.addEventListener('scroll', function() {
        headerScrolling();
    });
}


