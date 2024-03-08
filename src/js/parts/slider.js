document.addEventListener(
	'DOMContentLoaded',
	function () {
		const swiper =
			new Swiper(
				'.swiper__swiper',
				{
					loop: true,
					effect:
						'fade',

					// If we need pagination
					pagination:
						{
							el: '.swiper__pagination',
							clickable: true,
						},

					// Navigation arrows
					navigation:
						{
							nextEl:
								'.swiper__nav--next',
							prevEl:
								'.swiper__nav--prev',
						},
				},
			);

		const homeGallery =
			new Swiper(
				'.gallery__slider',
				{
					slidesPerView: 2.7,
					spaceBetween: 10,
					loop: true,
					speed: 1000,
					centeredSlides: true,
					keyboard:
						{
							enabled: true,
						},
					breakpoints:
						{
							541: {
								// slidesPerView: 2,
							},
							1024: {
								spaceBetween: 16,
								slidesPerView: 3.7,
							},
						},
				},
			);
	},
);
