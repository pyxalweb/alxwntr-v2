// ***********************************
//  Slideshow - Fade In / Out
// ***********************************
const slideshow = () => {
    const slideshows = document.querySelectorAll('.slideshow')

    slideshows.forEach((slideshow) => {
		// get all slide elements
        const slides = slideshow.querySelectorAll('.slideshow__slide')
		const slideshowControls = slideshow.querySelectorAll('.slideshow__controls')
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

            slideshowControls.forEach((controls) => {
                const controlsPrev = controls.querySelector('.slideshow__prev')
                const controlsNext = controls.querySelector('.slideshow__next')

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
            })
		}
		showControls()




		// ***********************************
		//  Dots - Jump to Slide Buttons
		// ***********************************
		const showDots = () => {
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




// ***********************************
//  Slideshow - Homepage Responsiveness
// ***********************************
const slideshowHomepage = () => {
	const slideshowHome = document.querySelector('.homepage__intro .slideshow')

	if (!slideshowHome) return

	const slideshowHomeSlides = slideshowHome.querySelectorAll('.slideshow__slide')

	if (window.innerWidth > 1120) {
		slideshowHomeSlides.forEach((slide) => {
			slide.classList.remove('slideshow__slide--vw600')
		})
	} else if (window.innerWidth <= 1120 && window.innerWidth > 480) {
		slideshowHomeSlides.forEach((slide) => {
			slide.classList.add('slideshow__slide--vw600')
		})
	} else if (window.innerWidth <= 480) {
		slideshowHomeSlides.forEach((slide) => {
			slide.classList.remove('slideshow__slide--vw600')
		})
	}
}
slideshowHomepage()
window.addEventListener('resize', () => {
	slideshowHomepage()
})




// ***********************************
//  Slideshow - WordPress
// ***********************************
const slideshowWordpress = () => {
	const wpBlockGallery = document.querySelectorAll('.wp-block-gallery')

	if (!wpBlockGallery) return

	wpBlockGallery.forEach((gallery) => {
		gallery.classList.add('slideshow')
		gallery.setAttribute('data-interval', '5000')

		const gallerySlides = gallery.querySelectorAll('.wp-block-image')

		gallerySlides.forEach((slide) => {
			slide.classList.add('slideshow__slide')
		})
	})

	slideshow()
}
slideshowWordpress()