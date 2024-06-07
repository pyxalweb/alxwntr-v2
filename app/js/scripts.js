// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter on 2023-05-26
// Last Modified: 2024-05-18

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
// ***********************************
document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = () => {
        const root = document.documentElement;
        const themeToggleButton = document.querySelector('.theme-toggle');
		const themeTransition = document.querySelector('.theme-transition'); 

        const applyTheme = (theme) => {
            root.className = theme;
            localStorage.setItem('theme', theme);
        };

        const switchTheme = () => {
			function transitionToMode(transitionClass) {
				themeTransition.classList.add('isActive');
				setTimeout(() => {
					themeTransition.classList.add(transitionClass);
					setTimeout(() => {
						themeTransition.classList.remove(transitionClass);
						applyTheme(newTheme);
						setTimeout(() => {
							themeTransition.classList.remove('isActive');
						}, 1000);
					}, 1000);
				}, 1);
			}

            const currentTheme = localStorage.getItem('theme');
            const newTheme = currentTheme === 'light-mode' ? 'dark-mode' : 'light-mode';

			if (newTheme === 'light-mode') {
				transitionToMode('isTransitioningToLight');
			} else {
				transitionToMode('isTransitioningToDark');
			}
        };

        const savedTheme = localStorage.getItem('theme') || 'dark-mode';
        applyTheme(savedTheme);

        if (themeToggleButton) {
            themeToggleButton.addEventListener('click', switchTheme);
        }

		document.documentElement.classList.remove('loading');
    };

    themeToggle();
});




})() // end IIFE
