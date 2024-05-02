// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter on 2023-05-26
// Last Modified: 2024-03-31

(function () {

// ***********************************
//  Global Elements
// ***********************************
const root = document.documentElement;
const body = document.querySelector('body')
const header = document.querySelector('.site-header')
const footer = document.querySelector('.site-footer')
const mainHomepage = document.querySelector('.site-main.homepage')
const blog = document.querySelector('.page-blog')
const categoryBtn = document.querySelectorAll('.category__btn')
const categoriesSelect = document.querySelector('.categories__select')
const blogPosts = document.querySelectorAll('.blog__posts')
const postItem = document.querySelectorAll('.post__item')




// ***********************************
//  Prevent CSS transitions from firing on page load
// ***********************************
// requirement: the 'body' element on each page must have a class of 'preload'
// requirement: the necessary CSS for the 'preload' class must exist
window.onload = (event) => {
	document.querySelector('body').classList.remove('preload')
}




// ***********************************
//  Error Messages
// ***********************************
const errorMessages = (message) => {
	let errorMessageVisible = false;

	document.querySelector('body').insertAdjacentHTML('beforeend', '<div class="error" role="alert" aria-label="Error message"><p></p></div>');
	const error = document.querySelector('.error');
	const errorText = document.querySelector('.error p');

	if (!errorMessageVisible) {
		errorMessageVisible = true;

		errorText.textContent = message;
		error.classList.add('active');

		setTimeout(function() {
			errorMessageVisible = false;
			error.classList.remove('active');
			
			setTimeout(function() {
				error.remove();
			}, 1000)
		}, 4000)
	}
}




})() // end IIFE
