// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter on 2023-05-26
// Last Modified: 2023-09-04

(function () {

// ***********************************
//  Global Elements
// ***********************************
const root = document.documentElement;
const body = document.querySelector('body')
const header = document.querySelector('.site-header')
const footer = document.querySelector('.site-footer')
const mainHomepage = document.querySelector('.site-main.homepage')
const blog = document.querySelector('.blog')
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
//  Main Element Min Height
// ***********************************
// When the page loads, set the min-height of the main element to the height of the viewport minus the height of the header and footer
// But also add 1px so that the main element is always at least 1px taller than the viewport which ensures a vertical scrollbar is always present. This is important because changing blog post categories (on the homepage) will cause the main element to change height and without this +1px then if the main element is shorter than the viewport, the vertical scrollbar will disappear and the page will shift.
mainElementMinHeight = () => {
	const headerHeight = header.offsetHeight
	const footerHeight = footer.offsetHeight

	if (!mainHomepage) {
		return
	}

	mainHomepage.style.minHeight = `calc(100vh - ${headerHeight}px - ${footerHeight}px + 1px)`
}
mainElementMinHeight()




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




// ***********************************
//  Show / Hide Post Items by Category ID
// ***********************************
const showHidePostItems = () => {
	if (!blog) return

	let selectedCategoryID = 'all' // default category ID
	let categoryID = null // category ID that is clicked or selected

	// function that shows the post items when the user clicks a category button or selects a category from the dropdown
	const showEachPost = () => {
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
	}

	// check for empty blog post containers
	const emptyBlogPosts = () => {
		// must wait for classes to be added/removed from '.post__item' elements before running
		slideTimeout = setTimeout(() => {
			blogPosts.forEach((blog) => {
				if (blog.querySelectorAll('.post__item.active').length === 0) {
					blog.classList.add('empty')
					console.log('no posts')
				} else {
					blog.classList.remove('empty')
				}
			})
		}, 1000)
	}

	// user clicks a category button
	categoryBtn.forEach((category) => {
		category.addEventListener('click', () => {
			// get the category ID
			categoryID = category.getAttribute('data-category')

			// error message if user clicks the category button that is already selected
			if (categoryID === selectedCategoryID) {
				errorMessages('You\'re already viewing this category.')
				return
			}

			// remove active class from ALL category buttons
			categoryBtn.forEach((category) => {
				category.classList.remove('active')
			})

			// add active class to the category button that was clicked
			selectedCategoryID = categoryID
			if (category.dataset.category === selectedCategoryID) {
				category.classList.add('active')
			}

			// show the post items
			showEachPost()

			// check for empty blog post containers
			emptyBlogPosts()
		})
	})

	// user selects a category from the dropdown
	if (!categoriesSelect) return
	categoriesSelect.addEventListener('change', () => {
		// get the category ID
		categoryID = categoriesSelect.value

		// show the post items
		showEachPost()

		// check for empty blog post containers
		emptyBlogPosts()
	})
}
showHidePostItems()




})() // end IIFE
