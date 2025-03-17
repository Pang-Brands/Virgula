'use strict';

import * as dom from './lib/dom.js';

function toogleForm() {
    const openButton = document.querySelector('.js-open-contact-info');
    const form = document.querySelector('.o-contact__container');

    if(dom.hasClass(openButton, 'is-open')) {
        dom.removeClass(openButton, 'is-open');
        dom.removeClass(form, 'is-form-open');
    } else {
        dom.addClass(openButton, 'is-open');
        dom.addClass(form, 'is-form-open');
    }
}

export default function(){
    const openButton = document.querySelector('.js-open-contact-info');

    if (openButton) {
        openButton.addEventListener('click', function(e) {
            e.preventDefault();
            toogleForm();
        });
    }
}
