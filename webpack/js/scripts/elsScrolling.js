'use strict';

import * as dom from './lib/dom.js';
console.log('lalateste');
let lastScrollPosition = 0;
let lastScrollTop = 0;

function getScrollPosition(){
    const headerEl = document.querySelector('.o-header');
    const goToTop = document.querySelector('.js-back-to-top');

    const windowWidth = window.innerWidth;
    let scrollObject;
    scrollObject = window.pageYOffset;
    const deleayHideAds = 250;


    if(scrollObject > lastScrollTop){
        dom.addClass(headerEl, 'is-scrolling');
    }
    else{
        dom.removeClass(headerEl, 'is-scrolling');
    }

    if(scrollObject < lastScrollPosition && scrollObject > lastScrollTop){
        dom.addClass(headerEl, 'is-scrolling-up');
        dom.addClass(goToTop, 'is-scrolling-up');
    }
    else{
        dom.removeClass(headerEl, 'is-scrolling-up');
        dom.removeClass(goToTop, 'is-scrolling-up');
    }

    lastScrollPosition = scrollObject;

}

export default function(){
    window.addEventListener('load', function() {
        getScrollPosition();
        const goToTop = document.querySelector('.js-back-to-top');
        // console.log(goToTop);
        goToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                'behavior': 'smooth',
                'left': 0,
                'top': 0
            });
        });
    });

    window.addEventListener('resize', function() {
        getScrollPosition();
    });

    window.addEventListener('scroll', function() {
        getScrollPosition();
    });
}


