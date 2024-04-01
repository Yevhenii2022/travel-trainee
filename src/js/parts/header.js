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
		const body =
			document.body;

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
			document.querySelector(
				'.header__input',
			);

		if (
			headerSearch
		) {
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
		}

		if (
			searchInput
		) {
			searchInput.addEventListener(
				'click',
				function (
					event,
				) {
					event.stopPropagation();
				},
			);
		}

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

		//burger menu
		const menu =
			document.querySelector(
				'.header__overlay',
			);
		const menuButton =
			document.querySelector(
				'.burger',
			);

		menuButton.addEventListener(
			'click',
			function () {
				this.classList.toggle(
					'active',
				);
				menu.classList.toggle(
					'open',
				);
				document.body.classList.toggle(
					'burger-open',
				);
			},
		);
		//burger menu
	},
);
