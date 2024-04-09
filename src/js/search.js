jQuery(document).ready(function ($) {
	$('#search__input').on('input', function () {
		var query = $('#search__input').val();

		$.ajax({
			url: myAjax.ajaxurl,
			type: 'POST',
			data: {
				action: 'my_ajax_search',
				query: query,
				security: myAjax.nonce,
			},
			success: function (response) {
				$('.search--open').addClass('search--result');
				$('#search__results').addClass('search__results--open');
				$('#search__results').html(response);

				$('#search__btn').click(function () {
					$('#search__results').removeClass('search__results--open');
					var query = $('#search__input').val();
					var currentUrl = window.location.href;
					var urlParts = currentUrl.split('/');
					console.log();
					var protocol = urlParts[0];
					var domain = urlParts[2];
					var langPath = urlParts[3] ? '/' + urlParts[3] : '';
					if (langPath.length !== 3) {
						langPath = '';
					}

					var searchUrl =
						protocol + '//' + domain + langPath + '/search&?s=' + encodeURIComponent(query);
					window.location.href = searchUrl;
				});

				$('.search__link').click(function () {
					$('#search__results').removeClass('search__results--open');
				});
			},
		});
	});
	$('#search-bar__button').on('click', function () {
		var query = $('#search-bar__input').val();

		$.ajax({
			url: myAjax.ajaxurl,
			type: 'POST',
			data: {
				action: 'my_ajax_search_page',
				query: query,
				security: myAjax.nonce,
			},
			success: function (response) {
				$('#search-result__list').html(response);
			},
		});
	});
});

//ggggggggg
// jQuery(document).ready(function ($) {
// 	$('#search__input').on('input', function () {
// 		var query = $('#search__input').val().trim();

// 		// Перевіряємо, чи поле пошуку порожнє
// 		if (query === '') {
// 			// Якщо поле порожнє, приховуємо результати пошуку і виходимо з функції
// 			$('#search__results').removeClass('search__results--open');
// 			return;
// 		}

// 		$.ajax({
// 			url: myAjax.ajaxurl,
// 			type: 'POST',
// 			data: {
// 				action: 'my_ajax_search',
// 				query: query,
// 				security: myAjax.nonce,
// 			},
// 			success: function (response) {
// 				$('.search--open').addClass('search--result');
// 				$('#search__results').addClass('search__results--open');
// 				$('#search__results').html(response);

// 				$('#search__btn').click(function () {
// 					$('#search__results').removeClass('search__results--open');
// 					var query = $('#search__input').val().trim();
// 					var currentUrl = window.location.href;
// 					var urlParts = currentUrl.split('/');
// 					console.log();
// 					var protocol = urlParts[0];
// 					var domain = urlParts[2];
// 					var langPath = urlParts[3] ? '/' + urlParts[3] : '';
// 					if (langPath.length !== 3) {
// 						langPath = '';
// 					}

// 					var searchUrl =
// 						protocol + '//' + domain + langPath + '/search&?s=' + encodeURIComponent(query);
// 					window.location.href = searchUrl;
// 				});

// 				$('.search__link').click(function () {
// 					$('#search__results').removeClass('search__results--open');
// 				});
// 			},
// 		});
// 	});

// 	$('#search-bar__button').on('click', function () {
// 		var query = $('#search-bar__input').val().trim();

// 		$.ajax({
// 			url: myAjax.ajaxurl,
// 			type: 'POST',
// 			data: {
// 				action: 'my_ajax_search_page',
// 				query: query,
// 				security: myAjax.nonce,
// 			},
// 			success: function (response) {
// 				$('#search-result__list').html(response);
// 			},
// 		});
// 	});
// });
