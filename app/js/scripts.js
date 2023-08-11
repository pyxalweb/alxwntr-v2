// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter on 2023-05-26
// Last Modified: 2023-08-10




(function () {

// ***********************************
//  Global Elements
// ***********************************
const categoryItem = document.querySelectorAll('.category__item')
const postItem = document.querySelectorAll('.post__item')
const postContainer = document.querySelectorAll('.post__container')




// ***********************************
//  Prevent CSS transitions from firing on page load
// ***********************************
// requirement: the 'body' element on each page must have a class of 'preload'
// requirement: the necessary CSS for the 'preload' class must exist
window.onload = (event) => {
	document.querySelector('body').classList.remove('preload')
}




// ***********************************
//  Show / Hide Post Items by Category ID
// ***********************************
const showHidePostItems = () => {
	categoryItem.forEach((category) => {
		category.addEventListener('click', () => {
			// get the category ID
			const categoryID = category.getAttribute('data-category')

			postItem.forEach((post) => {
				// get the post ID
				const postID = post.getAttribute('data-category')

				// remove fade class from ALL posts
				post.classList.remove('fade')

				// remove active class from posts that do not match
				// add active class to posts that do match
				// add fade class to posts that do match
				setTimeout(() => {
					if (postID !== categoryID) {
						post.classList.remove('active')
					} else {
						post.classList.add('active')
						setTimeout(() => {
							post.classList.add('fade')
						}, 100)
					}
				}, 500)
			})
		})
	})
}
showHidePostItems()




})() // end IIFE