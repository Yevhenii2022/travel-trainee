document.addEventListener(
	'DOMContentLoaded',
	function () {
		const video =
			document.getElementById(
				'custom-video',
			);
		const playPauseButton =
			document.querySelector(
				'.video__play',
			);
		const playPauseIcon =
			document.querySelector(
				'.video__icon',
			);

		playPauseButton.addEventListener(
			'click',
			() => {
				if (
					video.paused
				) {
					video.play();
					playPauseIcon.innerHTML =
						'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none"><path fill="#fff" d="M0 0h6v19H0zM9 0h6v19H9z"/></svg>';
				} else {
					video.pause();
					playPauseIcon.innerHTML =
						'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none"><path fill="#fff" d="M0 0v19l15-9.5L0 0Z" /></svg>';
				}
			},
		);
	},
);
