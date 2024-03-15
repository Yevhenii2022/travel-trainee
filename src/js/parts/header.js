document.addEventListener(
	'click',
	function (event) {
		const headerSearch =
			document.querySelector(
				'.header__search',
			);
		const isClickInside =
			headerSearch.contains(
				event.target,
			);

		if (
			!isClickInside
		) {
			headerSearch.classList.remove(
				'active',
			);
		}
	},
);

document.addEventListener(
	'DOMContentLoaded',
	function () {
		let header =
			document.querySelector(
				'.header',
			);
		let scrollPrev = 0;

		window.addEventListener(
			'scroll',
			function () {
				var scrolled =
					window.pageYOffset ||
					document
						.documentElement
						.scrollTop;

				if (
					scrolled >
						100 &&
					scrolled >
						scrollPrev
				) {
					header.classList.add(
						'header--hidden',
					);
				} else {
					if (
						header.classList.contains(
							'header--hidden',
						)
					) {
						header.classList.remove(
							'header--hidden',
						);
					}
				}
				scrollPrev =
					scrolled;

				const body =
					document.querySelector(
						'body',
					);
				if (
					body.classList.contains(
						'home',
					)
				) {
					if (
						scrolled >
						80
					) {
						header.style.backgroundColor =
							'#547fb8';
					} else {
						header.style.backgroundColor =
							'';
					}
				} else {
					if (
						scrolled >
						80
					) {
						header.style.backgroundColor =
							'#FFFFFF';
					} else {
						header.style.backgroundColor =
							'';
					}
				}
			},
		);

		//input
		const headerSearch =
			document.querySelector(
				'.header__search',
			);
		const searchInput =
			headerSearch.querySelector(
				'.header__input',
			);

		headerSearch.addEventListener(
			'click',
			function (
				event,
			) {
				event.stopPropagation();

				headerSearch.classList.toggle(
					'active',
				);

				if (
					headerSearch.classList.contains(
						'active',
					)
				) {
					searchInput.focus();
				}
			},
		);

		searchInput.addEventListener(
			'click',
			function (
				event,
			) {
				event.stopPropagation();
			},
		);

		document.addEventListener(
			'click',
			function (
				event,
			) {
				if (
					!searchInput.contains(
						event.target,
					)
				) {
					headerSearch.classList.remove(
						'active',
					);
				}
			},
		);
	},
);
