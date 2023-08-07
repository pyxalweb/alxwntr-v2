// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter on 2023-05-26
// Last Modified: 2023-08-06




(function () {

// ***********************************
//  Global Elements
// ***********************************
const categoryItem = document.querySelectorAll('.category__item')
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
//  Show / Hide Post Items by Category ID
// ***********************************
const showHidePostItems = () => {
	categoryItem.forEach((category) => {
		category.addEventListener('click', () => {
			const categoryID = category.getAttribute('data-category')
			console.log(categoryID)

			postItem.forEach((post) => {
				post.classList.remove('active')

				if (post.getAttribute('data-category') === categoryID) {
					post.classList.add('active')
				}
			})
		})
	})
}
showHidePostItems()




})() // end IIFE