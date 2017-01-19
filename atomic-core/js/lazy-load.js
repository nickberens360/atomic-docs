/**
 * Author: michael
 * Date: 1/19/17
 * Time: 3:46 PM
 * File: laz-load
 */
//these handlers will be removed once the images have loaded
window.addEventListener("DOMContentLoaded", lazyLoadImages);
window.addEventListener("load", lazyLoadImages);
window.addEventListener("resize", lazyLoadImages);
window.addEventListener("scroll", lazyLoadImages);

function lazyLoadImages() {
	console.log('hi');
	var images = document.querySelectorAll("iframe[data-src]"),
		item;
	// load images that have entered the viewport
	[].forEach.call(images, function (item) {
		if (isElementInViewport(item)) {
			item.setAttribute("src",item.getAttribute("data-src"));
			item.removeAttribute("data-src")
		}
	});
	// if all the images are loaded, stop calling the handler
	if (images.length == 0) {
		window.removeEventListener("DOMContentLoaded", lazyLoadImages);
		window.removeEventListener("load", lazyLoadImages);
		window.removeEventListener("resize", lazyLoadImages);
		window.removeEventListener("scroll", lazyLoadImages);
	}
}
​
function isElementInViewport (el) {
	
	var rect = el.getBoundingClientRect();
	
	return (
		rect.top >= 0 &&
		rect.left >= 0 &&
		rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
		rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
	);
}