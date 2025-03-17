'use strict';

let activeOnLoad = false;
let activeOnEvent = false;
let lazyImagesOnEvent;

const lazyLoadOnEvent = function() {
    if (activeOnEvent === false) {
        activeOnEvent = true;
        const windowWidth = window.innerWidth;
        let offset = 440;

        if (windowWidth <= 1024) {
            offset = 240;
        }

        setTimeout(function() {
            lazyImagesOnEvent.forEach(function(lazyImage) {
                if ((lazyImage.getBoundingClientRect().top - offset <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
                    lazyImage.src = lazyImage.dataset.src;
                    lazyImage.classList.remove("js-lazy-on-event");

                    lazyImagesOnEvent = lazyImagesOnEvent.filter(function(image) {
                        return image !== lazyImage;
                    });

                    if (lazyImagesOnEvent.length === 0) {
                        document.removeEventListener("scroll", lazyLoadOnEvent);
                        window.removeEventListener("resize", lazyLoadOnEvent);
                        window.removeEventListener("orientationchange", lazyLoadOnEvent);
                    }
                }
            });

            activeOnEvent = false;
        }, 200);
    }
};

export default function(){
    document.addEventListener("DOMContentLoaded", function() {
        lazyImagesOnEvent = [].slice.call(document.querySelectorAll("img.js-lazy-on-event"));

        document.addEventListener("scroll", lazyLoadOnEvent);
        window.addEventListener("resize", lazyLoadOnEvent);
        window.addEventListener("orientationchange", lazyLoadOnEvent);
    });
}
