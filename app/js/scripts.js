// ***********************************
//  alxwntr Layout Scripts
// ***********************************
// Created by Alex Winter
// Last Modified: 2023-05-26




(function () {

// ***********************************
//  Prevent CSS transitions from firing on page load
// ***********************************
// requirement: the 'body' element on each page must have a class of 'preload'
// requirement: the necessary CSS for the 'preload' class must exist
window.onload = (event) => {
    document.querySelector('body').classList.remove('preload')
}

})() // end IIFE