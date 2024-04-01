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
		const header =
			document.querySelector(
				'.header',
			);
		const body =
			document.body;

		const headerLogo =
			document.querySelector(
				'.header__logo',
			);
		const headerNav =
			document.querySelector(
				'.header__nav',
			);
		const customSelect =
			document.querySelector(
				'.custom-select',
			);
		const headerBtn =
			document.querySelector(
				'.header--js',
			);
		const headerBurger =
			document.querySelector(
				'.header__burger',
			);
		const headerSearch =
			document.querySelector(
				'.header__search',
			);
		const headerBasket =
			document.querySelector(
				'.header__basket',
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
						80 &&
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
						headerLogo.classList.remove(
							'header__logo--filter',
						);
						headerNav.classList.remove(
							'header--white',
						);
						customSelect.classList.remove(
							'header--white',
						);
						headerBtn.classList.remove(
							'btn--white',
						);
						headerBurger.classList.remove(
							'burger--white',
						);
						headerBasket.classList.remove(
							'header--stroke',
						);
						headerSearch.classList.remove(
							'header--white',
							'header--fill',
						);
					} else {
						headerLogo.classList.add(
							'header__logo--filter',
						);
						headerNav.classList.add(
							'header--white',
						);
						customSelect.classList.add(
							'header--white',
						);
						headerBtn.classList.add(
							'btn--white',
						);
						headerBurger.classList.add(
							'burger--white',
						);
						headerBasket.classList.add(
							'header--stroke',
						);
						headerSearch.classList.add(
							'header--white',
							'header--fill',
						);
					}
				}

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
			},
		);

		//зміна кольору хедера по кліку на кнопку бургер
		headerBurger.addEventListener(
			'click',
			function () {
				setTimeout(
					function () {
						if (
							headerBurger.classList.contains(
								'active',
							)
						) {
							header.style.backgroundColor =
								'#eaf2f5';
						} else {
							if (
								window.pageYOffset >
								100
							) {
								header.style.backgroundColor =
									'#FFFFFF';
							} else {
								header.style.backgroundColor =
									'';
							}
						}
					},
					50,
				);
			},
		);
		//зміна кольору хедера по кліку на кнопку бургер

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
