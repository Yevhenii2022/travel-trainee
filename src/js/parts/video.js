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

		const currentLanguage =
			document
				.documentElement
				.lang;

		let videoText =
			'';

		if (
			currentLanguage ===
			'ru'
		) {
			videoText =
				'Смотреть видео';
		} else if (
			currentLanguage ===
			'uk'
		) {
			videoText =
				'Дивитись відео';
		}

		const togglePlayPause =
			() => {
				if (
					video.paused
				) {
					video.play();
					playPauseButton.innerHTML =
						'';
				} else {
					video.pause();
					playPauseButton.innerHTML = `<svg class="video__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 19" fill="none"><path fill="#fff" d="M0 0v19l15-9.5L0 0Z" /></svg> ${videoText}`;
				}
			};

		if (video) {
			video.addEventListener(
				'click',
				togglePlayPause,
			);
		}

		if (
			playPauseButton
		) {
			playPauseButton.addEventListener(
				'click',
				togglePlayPause,
			);
		}
	},
);
