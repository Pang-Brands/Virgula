'use strict';
import * as dom from './lib/dom.js';

// import { locoScroll } from "../index.js";
import{ locoScroll } from "locomotive-scroll";

const init = () => {
  const $body = document.querySelector("body");
  const hamburger = document.querySelector(".hamburger");


  const toggleOffcanvas = () => {
    $body.classList.toggle("has-offcanvas");
    locoScroll.stop();

    if (!$body.classList.contains("has-offcanvas")) {
      locoScroll.start();
    }
  };

  hamburger.addEventListener("click", () => {
    toggleOffcanvas();
  });

  const offcanvasDropdowns = document.querySelectorAll(
    ".offcanvas-nav-item--dropdown"
  );

  const toggleDropdown = (event) => {
    event.currentTarget.classList.toggle("offcanvas-nav-item--opened");
  };

  offcanvasDropdowns.forEach((dropdown) => {
    dropdown.addEventListener("click", (event) => {
      toggleDropdown(event);
    });
  });

  const offcanvas = document.querySelector(".offcanvas");
  const offcanvasContainer = document.querySelector(".offcanvas-container");
  let containerTop = offcanvasContainer.getBoundingClientRect().top;

  offcanvas.addEventListener("scroll", function () {
    containerTop = offcanvasContainer.getBoundingClientRect().top;

    if (containerTop > 100) {
      $body.classList.remove("has-header-sticky");
    }

    if (containerTop < 120) {
      $body.classList.add("has-header-sticky");
    }
  });
};

export default function(){
    document.addEventListener("DOMContentLoaded", function() {
        init();
    });
}

