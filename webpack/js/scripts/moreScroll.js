'use strict';

import * as dom from './lib/dom.js';
function moreScroll() {
    const targetID = document.querySelector('.c-highlight__anchor').getAttribute('data-anchor');
    // console.log(targetID);
    const targetContent = document.querySelector(targetID);
    const Position = dom.getPosition(targetContent);
    const width = document.documentElement.clientWidth;
    // console.log(Position.y); 
    if(width <= 768) {
        dom.scrollToDirection('window', Position.y - 30, 500, 'vertical'); 
    } else {
        dom.scrollToDirection('window', Position.y - 30, 500, 'vertical');
    }
}

export default function(){
    const buttonMore = document.querySelector('.js-anchor-scroll');
    // console.log(buttonMore);
    if(buttonMore) {
        buttonMore.addEventListener('click', function(e) {
            e.preventDefault();
            moreScroll();
        });
    }	
}