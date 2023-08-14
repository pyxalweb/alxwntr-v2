// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter on 2023-05-26
// Last Modified: 2023-08-13




(function () {

// ***********************************
//  Global Elements
// ***********************************
const header = document.querySelector('.site-header')
const main = document.querySelector('.site-main')
const footer = document.querySelector('.site-footer')
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
//  Main Element Min Height
// ***********************************
// When the page loads, set the min-height of the main element to the height of the viewport minus the height of the header and footer
// But also add 1px so that the main element is always at least 1px taller than the viewport which ensures a vertical scrollbar is always present. This is important because changing blog post categories (on the homepage) will cause the main element to change height and without this +1px then if the main element is shorter than the viewport, the vertical scrollbar will disappear and the page will shift.
mainElementMinHeight = () => {
	const headerHeight = header.offsetHeight
	const footerHeight = footer.offsetHeight

	main.style.minHeight = `calc(100vh - ${headerHeight}px - ${footerHeight}px + 1px)`
}
mainElementMinHeight()




// ***********************************
//  Show / Hide Post Items by Category ID
// ***********************************
const showHidePostItems = () => {
	let selectedCategoryID = 'all'

	categoryItem.forEach((category) => {
		category.addEventListener('click', () => {
			// get the category ID
			const categoryID = category.getAttribute('data-category')

			// remove active class from ALL category buttons
			categoryItem.forEach((category) => {
				category.classList.remove('active')
			})

			// add active class to the category button that was clicked
			selectedCategoryID = categoryID
			if (category.dataset.category === selectedCategoryID) {
				category.classList.add('active')
			}

			postItem.forEach((post) => {
				// function that shows the post items
				const showPosts = () => {
					post.classList.add('active')
					setTimeout(() => {
						post.classList.add('fade')
					}, 100)
				}

				// get the post ID
				const postID = post.getAttribute('data-category')

				// remove fade class from ALL posts
				post.classList.remove('fade')

				setTimeout(() => {
					// add active class to all posts if user clicks 'all' category
					if (categoryID === 'all') {
						showPosts()
					}
					// remove active class from posts that do not match the category ID
					else if (categoryID !== postID) {
						post.classList.remove('active')
					}
					// add 'active' and 'fade' class to posts that do match
					else {
						showPosts()
					}
				}, 500)
			})
		})
	})
}
showHidePostItems()




})() // end IIFE