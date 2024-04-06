document.addEventListener(
	'DOMContentLoaded',
	function () {
		const wpcf7Elm =
			document.querySelector(
				'.wpcf7',
			);
		const submitButtons =
			document.querySelectorAll(
				'.form__button',
			);
		const formInput =
			document.querySelector(
				'.wpcf7-form-control',
			);
		const deleteIcon =
			document.querySelector(
				'.form__icon',
			);
		const popover =
			document.querySelector(
				'.popup',
			);
		const inputFile =
			document.querySelector(
				"input[type='file']",
			);
		const fileNameDisplay =
			document.querySelector(
				'.reviews-form__file-text',
			);
		const inputClear =
			document.querySelector(
				'.button__delete',
			);

		const currentLanguage =
			document
				.documentElement
				.lang;

		let inputFileText =
			'';

		if (
			currentLanguage ===
			'ru'
		) {
			inputFileText =
				'Добавить фото';
		} else if (
			currentLanguage ===
			'uk'
		) {
			inputFileText =
				'Додати фото';
		}

		if (wpcf7Elm) {
			if (
				submitButtons
			) {
				submitButtons.forEach(
					submitButton => {
						document.addEventListener(
							'wpcf7beforesubmit',
							() => {
								if (
									submitButton
								) {
									submitButton.setAttribute(
										'disabled',
										'disabled',
									);
								}
							},
							false,
						);
					},
				);
			}

			document.addEventListener(
				'wpcf7mailsent',
				// "wpcf7mailfailed",
				// "wpcf7submit",
				event => {
					const form =
						event.target;
					form.reset();
					popover.hidePopover();
					fileNameDisplay.innerText =
						inputFileText;
					inputClear.style.display =
						'none';
				},
				false,
			);

			document.addEventListener(
				'wpcf7mailsent',
				function (
					event,
				) {
					var inputs =
						event
							.detail
							.inputs;
					var ratingInput =
						null;

					// Знайдіть введення зірок відгуку
					for (
						var i = 0;
						i <
						inputs.length;
						i++
					) {
						if (
							'rating' ===
							inputs[
								i
							].name
						) {
							ratingInput =
								inputs[
									i
								];
							break;
						}
					}

					// Якщо знайдено поле зірок, змініть його значення на найближче значення кроку 0.5
					if (
						ratingInput &&
						ratingInput.value %
							0.5 !==
							0
					) {
						ratingInput.value =
							Math.round(
								ratingInput.value *
									2,
							) / 2;
					}
				},
				false,
			);

			document.addEventListener(
				'wpcf7submit',
				() => {
					if (
						submitButtons
					) {
						submitButtons.forEach(
							button => {
								button.removeAttribute(
									'disabled',
								);
							},
						);
					}
				},
				false,
			);

			if (
				deleteIcon &&
				formInput
			) {
				deleteIcon.addEventListener(
					'click',
					() => {
						Wpcf7cf.clearFormFields(
							formInput,
						);
					},
				);
			}
		}

		// input file
		if (inputFile) {
			inputFile.setAttribute(
				'multiple',
				'multiple',
			);

			inputFile.addEventListener(
				'change',
				function () {
					let files =
						this
							.files;
					let fileNames =
						[];

					for (
						let i = 0;
						i <
						files.length;
						i++
					) {
						fileNames.push(
							files[
								i
							]
								.name,
						);
					}

					fileNameDisplay.innerHTML =
						fileNames.length >
						0
							? fileNames.join(
									', ',
							  )
							: inputFileText;
					inputClear.style.display =
						'block';
				},
			);
		}

		//clear input
		if (
			inputClear
		) {
			inputClear.addEventListener(
				'click',
				function () {
					if (
						inputFile
							.files
							.length >
						0
					) {
						inputFile.value =
							'';
						fileNameDisplay.innerText =
							inputFileText;
						inputClear.style.display =
							'none';
					}
				},
			);
		}
	},
);

document.addEventListener(
	'DOMContentLoaded',
	function () {
		const icons =
			document.querySelectorAll(
				'.form__icon',
			);

		icons.forEach(
			icon => {
				icon.addEventListener(
					'click',
					function () {
						const input =
							this.parentElement.querySelector(
								'input',
							);
						if (
							input
						) {
							input.value =
								'';
						}
					},
				);
			},
		);
	},
);
