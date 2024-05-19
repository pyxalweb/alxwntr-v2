// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter on 2023-05-26
// Last Modified: 2024-05-01

(function () {




// ***********************************
//  Prevent CSS transitions from firing on page load
// ***********************************
// requirement: the 'body' element on each page must have a class of 'preload'
// requirement: the necessary CSS for the 'preload' class must exist
window.onload = (event) => {
	document.querySelector('body').classList.remove('preload')
}




// ***********************************
//  Theme Toggle
//  by Alex Winter - 2024-05-03 - v1.0
// ***********************************

const themeToggle = () => {
	// **************************
	//  Set and Get Cookie
	// **************************
	function setCookie(name, value, days) {
		let expires = "";
		if (days) {
			let date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "") + expires + "; path=/";
	}
	function getCookie(name) {
		let nameEQ = name + "=";
		let ca = document.cookie.split(';');
		for (let i = 0; i < ca.length; i++) {
			let c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	const root = document.documentElement;
	const themeTransition = document.querySelector('.theme-transition'); 

	// **************************
	//  Transition
	// **************************
	function transitionToMode(transitionClass, modeFunction) {
		themeTransition.classList.add('isActive');
		setTimeout(() => {
			themeTransition.classList.add(transitionClass);
			setTimeout(() => {
				themeTransition.classList.remove(transitionClass);
				modeFunction();
				setTimeout(() => {
					themeTransition.classList.remove('isActive');
				}, 1000);
			}, 1000);
		}, 1);
	}
	function transitionToLightMode() {
		transitionToMode('isTransitioningToLight', enableLightMode);
	}
	function transitionToDarkMode() {
		transitionToMode('isTransitioningToDark', enableDarkMode);
	}

	// **************************
	//  Enable Modes
	// **************************
	function enableLightMode() {
		document.documentElement.className = 'light-mode';
		setCookie('theme', 'light', 7);
	}
	function enableDarkMode() {
		document.documentElement.className = 'dark-mode';
		setCookie('theme', 'dark', 7);
	}

	// **************************
	//  Listen for button clicks
	// **************************
	const themeToggleMode = document.querySelector('.theme-toggle');
	if (!themeToggleMode) return;
	themeToggleMode.addEventListener('click', () => {
		if (document.documentElement.classList.contains('light-mode')) {
			transitionToDarkMode();
		} else {
			transitionToLightMode();
		}
	})

	// **************************
	//  Set the initial theme based on the cookie
	// **************************
	const savedTheme = getCookie('theme');
	if (savedTheme === 'light') {
		enableLightMode();
	} else {
		enableDarkMode();
	}
}
themeToggle();




})() // end IIFE
