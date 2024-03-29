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
					// pagination:
					// 	{
					// 		el: '.swiper__pagination',
					// 		clickable: true,
					// 	},

					// Navigation arrows
					// navigation:
					// 	{
					// 		nextEl:
					// 			'.swiper__nav--next',
					// 		prevEl:
					// 			'.swiper__nav--prev',
					// 	},
				},
			);

		const excursions =
			new Swiper(
				'.excursions__slider',
				{
					slidesPerView: 1,
					spaceBetween: 16,
					loop: true,
					speed: 800,
					centeredSlides: true,
					keyboard:
						{
							enabled: true,
						},
					pagination:
						{
							el: '.swiper__pagination',
							type: 'fraction',
						},
					navigation:
						{
							nextEl:
								'.swiper__nav--next',
							prevEl:
								'.swiper__nav--prev',
						},
					breakpoints:
						{
							542: {
								slidesPerView: 2.3,
								pagination: false,
							},
							1026: {
								slidesPerView: 3.3,
								pagination: false,
							},
						},
				},
			);

		const homeGallery =
			new Swiper(
				'.gallery__slider',
				{
					slidesPerView: 1.425,
					spaceBetween: 8,
					loop: true,
					speed: 800,
					keyboard:
						{
							enabled: true,
						},
					breakpoints:
						{
							542: {
								spaceBetween: 16,
								slidesPerView: 2.8,
								centeredSlides: true,
							},
							1026: {
								spaceBetween: 16,
								slidesPerView: 3.7,
								centeredSlides: true,
							},
						},
				},
			);

		const galleryPage =
			new Swiper(
				'.gallery-page__slider',
				{
					loop: true,
					spaceBetween: 8,
					slidesPerView: 2.8,
					centeredSlides: true,
					watchSlidesProgress: true,

					breakpoints:
						{
							542: {
								spaceBetween: 12,
								slidesPerView: 4.8,
							},
							1026: {
								spaceBetween: 16,
								slidesPerView: 6.29,
							},
						},
				},
			);

		const galleryPage2 =
			new Swiper(
				'.gallery-page__slider2',
				{
					loop: true,
					centeredSlides: true,
					lazy: true,
					pagination:
						{
							el: '.swiper-pagination',
							type: 'fraction',
						},
					navigation:
						{
							nextEl:
								'.gallery__nav--next',
							prevEl:
								'.gallery__nav--prev',
						},
					thumbs: {
						swiper:
							galleryPage,
					},
				},
			);

		//fancybox
		Fancybox.bind(
			'[data-fancybox="gallery"]',
			{
				// compact: false,
				idle: false,
				// animated: false,
				showClass: false,
				hideClass: false,
				dragToClose: false,
				contentClick: false,

				Images: {
					// zoom: false,
				},

				Toolbar: {
					display: {
						left: [],
						middle:
							[
								'infobar',
							],
						right: [
							'close',
						],
					},
				},

				Thumbs: {
					type: 'classic',
				},
			},
		);
	},
);
