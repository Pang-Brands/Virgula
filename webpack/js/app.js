'use strict';
import AOS from "aos";
import Rellax from 'rellax';
import main from '../css/sass/main.scss';
import inline from '../css/sass/inline.scss';

AOS.init({
    once: true,
    delay: 50
});

const windowWidth = window.innerWidth;
if (windowWidth >= 1024) {
    const rellax = new Rellax('.js-rellax');
}



// import segmentCookieControl from './scripts/segmentCookieControl';
// import toggleSubMenu from './scripts/toggleSubMenu';
import mobileMenu from "./scripts/menu/mobileMenu";
import subMenu from "./scripts/menu/subMenu";
import footerSubMenu from "./scripts/menu/footerSubMenu";
// import toogleModal from './scripts/toogleModal';
// import utils from './scripts/lib/utils';
// import elsScrolling from './scripts/elsScrolling';
// import saveUserLastPage from './scripts/saveUserLastPage';
// import shareSocialMidia from './scripts/shareSocialMidia';
// import simpleLazyImgs from './scripts/simpleLazyImgs';
// import resizeVideoEmbeds from './scripts/resizeVideoEmbeds';
// import headerScrolling from './scripts/headerScrolling';
// import editFormContacts from './scripts/editFormContacts';

// import editModalContacts from './scripts/editModalContacts';
// import redirect404 from './scripts/redirect404';
// import moreScroll from './scripts/moreScroll';

// segmentCookieControl();

// toogleModal();
// utils();
// elsScrolling();
// saveUserLastPage();
// shareSocialMidia();
// simpleLazyImgs();
// resizeVideoEmbeds();

// redirect404();
// moreScroll();



mobileMenu();
subMenu();
footerSubMenu();