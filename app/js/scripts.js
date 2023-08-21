// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter on 2023-05-26
// Last Modified: 2023-08-20




(function () {

// ***********************************
//  Global Elements
// ***********************************
const header = document.querySelector('.site-header')
const footer = document.querySelector('.site-footer')
const mainHomepage = document.querySelector('.site-main.homepage')
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

	if (!mainHomepage) {
		return
	}

	mainHomepage.style.minHeight = `calc(100vh - ${headerHeight}px - ${footerHeight}px + 1px)`
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




// ***********************************
//  Slideshow - Fade In / Out
// ***********************************
const slideshow = () => {
    const slideshows = document.querySelectorAll('.slideshow')

    slideshows.forEach((slideshow) => {
		// get all slide elements
        const slides = slideshow.querySelectorAll('.slideshow__slide')
		const slideshowControls = slideshow.querySelector('.slideshow__controls')
		const slideshowDots = slideshow.querySelector('.slideshow__dots')

		// set the interval between slides
		const interval = slideshow.getAttribute('data-interval')

		// total amount of slides
        const slideCount = slides.length

		// initial index
        let currentSlideIndex = 0

		// To store the timeout ID and clear it when needed
		let slideTimeout

		// recursive function that allows us to loop through the slides
		// initially we set the slideIndex to 0 to display the first slide
		// then we add 1 to the current slideIndex and use the modulo operator to get the remainder
		// this determines the next slide to display and loops back to the first slide when the last slide is reached
        const showSlide = (slideIndex) => {
			// remove status from all slides
            slides.forEach((slide) => {
				slide.removeAttribute('data-status')
            })

			// set status to active on the current slide
			slides[slideIndex].setAttribute('data-status', 'active')

			clearTimeout(slideTimeout)
            slideTimeout = setTimeout(() => {
				// go to the next slide and loop back to the first slide when the last slide is reached
                let newSlideIndex = (slideIndex + 1) % slideCount
                showSlide(newSlideIndex)

				// set dot status
				setDotStatus()
            }, interval)

			// used by the prev/next buttons
			currentSlideIndex = slideIndex

			// console.log(slideIndex)
		}




		// ***********************************
		//  Controls - Prev / Next
		// ***********************************
		const showControls = () => {
			if (!slideshowControls) return

			const controlsPrev = slideshowControls.querySelector('.slideshow__prev')
			const controlsNext = slideshowControls.querySelector('.slideshow__next')

			// Prev button click event
			controlsPrev.addEventListener('click', () => {
				// if the current slide is the first slide, then we want to go to the very last slide
				if (currentSlideIndex === 0) {
					currentSlideIndex = slideCount
				}
				// otherwise we want to go to the previous slide
				let newSlideIndex = (currentSlideIndex - 1) % slideCount
				showSlide(newSlideIndex)

				// set dot status
				setDotStatus()
			})

			// Next button click event
			controlsNext.addEventListener('click', () => {
				// go to the next slide
				// but if the current slide is the last slide, then we want to go to the very first slide
				let newSlideIndex = (currentSlideIndex + 1) % slideCount
				showSlide(newSlideIndex)

				// set dot status
				setDotStatus()
			})
		}
		showControls()




		// ***********************************
		//  Dots - Jump to Slide Buttons
		// ***********************************
		showDots = () => {
			if (!slideshowDots) return

			// create dots for each slide
			slides.forEach((slide, index) => {
				const dot = document.createElement('button')
				dot.classList.add('slideshow__dot')
				dot.setAttribute('data-slide', index)
				slideshowDots.appendChild(dot)

				// initially set the first dot to active
				if (index === 0) {
					dot.setAttribute('data-status', 'active')
				}
			})

			// get all dot buttons after they have been created dynamically
			const slideshowDotButtons = slideshowDots.querySelectorAll('.slideshow__dot')

			// dot click event
			slideshowDotButtons.forEach((dot) => {
				dot.addEventListener('click', () => {
					showSlide(dot.getAttribute('data-slide'))

					// clear status from all dots
					slideshowDotButtons.forEach((allDots) => {
						allDots.removeAttribute('data-status')
					})

					dot.setAttribute('data-status', 'active')
				})
			})
		}
		showDots()

		// for setting dot status when prev/next buttons are clicked and during the setInterval
		const setDotStatus = () => {
			if (!slideshowDots) return

			const slideshowDotButtons = slideshowDots.querySelectorAll('.slideshow__dot')
			
			slideshowDotButtons.forEach((dot) => {
				dot.removeAttribute('data-status')

				if (currentSlideIndex === parseInt(dot.getAttribute('data-slide'))) {
					dot.setAttribute('data-status', 'active')
				}
			})
		}




        // ***********************************
		//  Start the Slideshow
		// ***********************************
        showSlide(currentSlideIndex)
    })
}
slideshow()




})() // end IIFE