'use strict';

import * as dom from './lib/dom.js';
function editModalContacts(event, el) {
  if(event == 'focus') {
    el.parentElement.classList.add('is-active');
  } else {
    el.parentElement.classList.remove('is-active');
  }
}

export default function () {
  const modalTrigger = document.querySelector('.js-open-modal');
  const triggerMenu = document.querySelector('.o-modal-contact .js-close-modal');

  modalTrigger.addEventListener('click', function () {
    const formInputs = document.querySelectorAll('.o-modal-contact #conversion-site-uoldiveo-27c6679d4579aedc8f9a section div.field input');
    if(formInputs) {
      dom.forEachEl(formInputs, function(formInput) {
        // console.log(formInput);
        formInput.addEventListener('focus', function (e) {
          const el = e.target;
          // console.log(el);
          const event = 'focus';
          editModalContacts(event, el);
        });

        formInput.addEventListener('blur', function(e) {
          const el = e.target;
          const event = 'blur';
          editModalContacts(event, el);
        });
      });
    }

    const formInputsEn = document.querySelectorAll('.o-modal-contact #conversion-site-uoldiveo-ingles-b782250be93b4453c9ec section div.field input');
    if(formInputsEn) {
      dom.forEachEl(formInputs, function(formInput) {
        // console.log(formInput);
        formInput.addEventListener('focus', function (e) {
          const el = e.target;
          // console.log(el);
          const event = 'focus';
          editModalContacts(event, el);
        });

        formInput.addEventListener('blur', function(e) {
          const el = e.target;
          const event = 'blur';
          editModalContacts(event, el);
        });
      });
    }

  });
}
