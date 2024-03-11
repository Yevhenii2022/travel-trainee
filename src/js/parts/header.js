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
	},
);
