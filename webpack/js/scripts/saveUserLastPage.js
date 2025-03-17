'use strict';

const getUserPage = () => {
	localStorage.setItem('_cps_user_last_page', window.location.href );
};

export default function () {
	document.addEventListener('load', getUserPage);
} 
