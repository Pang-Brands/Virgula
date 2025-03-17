'use strict';
import * as dom from './lib/dom.js';


export default function(){
    const modalSegmentTrigger = document.querySelector('.js-open-modal');
    const modalSegmentTriggerActive = document.querySelector('.o-header-segment-trigger--active');
    const modalSetCookieTriggers = document.querySelectorAll('.js-set-segment-cookie');

    modalSegmentTrigger.addEventListener('click', function(e) {
        e.preventDefault();

        if (modalSegmentTriggerActive) {
            const modalSegment = document.querySelector('.o-modal-segmento');
            dom.removeClass(modalSegment, 'o-modal--hidden');
        }
    });
}
