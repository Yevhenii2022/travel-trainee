document.addEventListener('DOMContentLoaded', function () {
	const wpcf7Elm = document.querySelector('.wpcf7');
	const submitButtons = document.querySelectorAll('.form__button');
	const formInput = document.querySelector('.wpcf7-form-control');
	const deleteIcon = document.querySelector('.form__icon');
	const popover = document.querySelector('.popup');
	const inputFile = document.querySelector("input[type='file']");
	const fileNameDisplay = document.querySelector('.reviews-form__file-text');
	const inputClear = document.querySelector('.button__delete');
	const currentLanguage = document.documentElement.lang;
	let inputFileText = '';
	let thxmsg = document.querySelector('#popup-ty');
	let thxMsgClose = thxmsg.querySelector('.popup__close ');

	if (currentLanguage === 'ru') {
		inputFileText = 'Добавить фото';
	} else if (currentLanguage === 'uk') {
		inputFileText = 'Додати фото';
	}

	if (wpcf7Elm) {
		if (submitButtons) {
			submitButtons.forEach(submitButton => {
				document.addEventListener('wpcf7beforesubmit', () => {
					if (submitButton) {
						submitButton.setAttribute('disabled', 'disabled');
					}
				}, false);
			});
		}

		document.addEventListener('wpcf7mailsent', event => {
			const form = event.target;
			form.reset();
			popover.hidePopover();
			if (fileNameDisplay) {
				fileNameDisplay.innerText = inputFileText;
			}
			if (inputClear) {
				inputClear.style.display = 'none';
			}
			if (thxmsg) {
				thxmsg.classList.add('active');
			}

			document.body.classList.add('overflow-hidden');
		}, false);

		document.addEventListener('wpcf7mailsent', function (event) {
			var inputs = event.detail.inputs;
			var ratingInput = null;

			for (var i = 0; i < inputs.length; i++) {
				if ('rating' === inputs[i].name) {
					ratingInput = inputs[i];
					break;
				}
			}

			if (ratingInput && ratingInput.value % 0.5 !== 0) {
				ratingInput.value = Math.round(ratingInput.value * 2) / 2;
			}
		}, false);

		document.addEventListener('wpcf7submit', () => {
			if (submitButtons) {
				submitButtons.forEach(button => {
					button.removeAttribute('disabled');
				});
			}
		}, false);

		if (deleteIcon && formInput) {
			deleteIcon.addEventListener('click', () => {
				Wpcf7cf.clearFormFields(formInput);
			});
		}
	}

	if (inputFile) {
		inputFile.setAttribute('multiple', 'multiple');

		inputFile.addEventListener('change', function () {
			let files = this.files;
			let fileNames = [];

			for (let i = 0; i < files.length; i++) {
				fileNames.push(files[i].name);
			}

			fileNameDisplay.innerHTML = fileNames.length > 0 ? fileNames.join(', ') : inputFileText;
			inputClear.style.display = 'block';
		});
	}

	if (inputClear) {
		inputClear.addEventListener('click', function () {
			if (inputFile.files.length > 0) {
				inputFile.value = '';
				fileNameDisplay.innerText = inputFileText;
				inputClear.style.display = 'none';
			}
		});
	}

	if (thxMsgClose) {
		thxMsgClose.addEventListener('click', function () {
			thxmsg.classList.remove('active');
			document.body.classList.remove('overflow-hidden');
		});
	}
});

document.addEventListener('DOMContentLoaded', function () {
	const icons = document.querySelectorAll('.form__icon');

	icons.forEach(icon => {
		icon.addEventListener('click', function () {
			const input = this.parentElement.querySelector('input');
			if (input) {
				input.value = '';
			}
		});
	});


});
