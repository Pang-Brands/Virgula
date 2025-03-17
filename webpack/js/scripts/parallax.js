"use strict";

import Rellax from "rellax";

export default function () {
    const rellax = new Rellax(".js-rellax", {
        wrapper: ".js-rellax-section",
    });

    const rellaxHorizontal = new Rellax(".js-rellax-horizontal", {
        horizontal: true,

        //Disable vertical Parallax Scrolling     vertical:false
        vertical: false,
    });
}
