document.addEventListener("DOMContentLoaded", function () {
	const swiper = new Swiper(".swiper__swiper", {
		loop: true,
		effect: "fade",

		// If we need pagination
		pagination: {
			el: ".swiper__pagination",
			clickable: true,
		},

		// Navigation arrows
		navigation: {
			nextEl: ".swiper__nav--next",
			prevEl: ".swiper__nav--prev",
		},
	});

	
});
