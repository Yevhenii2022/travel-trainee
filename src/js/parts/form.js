document.addEventListener(
	'DOMContentLoaded',
	function () {
		const wpcf7Elm =
			document.querySelector(
				'.wpcf7',
			);
		const submitButton =
			document.querySelector(
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

		if (wpcf7Elm) {
			wpcf7Elm.addEventListener(
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

			wpcf7Elm.addEventListener(
				'wpcf7mailsent',
				// "wpcf7mailfailed",
				// "wpcf7submit",
				event => {
					const form =
						event.target;
					form.reset();
					popover.hidePopover();
				},
				false,
			);

			wpcf7Elm.addEventListener(
				'wpcf7submit',
				() => {
					if (
						submitButton
					) {
						submitButton.removeAttribute(
							'disabled',
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
	},
);
