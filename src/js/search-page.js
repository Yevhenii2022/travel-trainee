jQuery(document).ready(function ($) {
    var preloader = $("#search-preloader");
    function getQueryParam(param) {
        var params = new URLSearchParams(window.location.search);
        return params.get(param);
    }


    var searchQuery = getQueryParam('s');


    if (searchQuery) {
        $('#search-bar__input').val(searchQuery);

        setTimeout(() => { $('#search-bar__button').click(); }, 0)

    }


    // Обработчик клика на кнопку поиска
    $('#search-bar__button').on('click', function () {
        var query = $('#search-bar__input').val();
        fetchData(query, 'all', 'all'); // 
    });

    
    $(document).on('click', '.search-result__tab', function () {
        preloader.show();
        var category = $(this).data('category');
        var postType = $(this).data('post');
        var query = $('#search-bar__input').val();
        fetchData(query, category, postType);
        $('.search-result__tab').each(function (index, element) {
            var $item = $(element);
            if ($item.hasClass('search-result__tab--selected')) {
                $item.removeClass('search-result__tab--selected');
            }
        });
        if (!$(this).hasClass('search-result__tab--selected')) {
            $(this).addClass('search-result__tab--selected');
        }
    });

    $(document).on('change', '#search-result__select', function () {
        var query = $('#search-bar__input').val();
        var selectedOption = $(this).find('option:selected');
        var category = selectedOption.data('category') ? selectedOption.data('category') : 'all';
        var postType = selectedOption.data('post') ? selectedOption.data('post') : 'all';
    
        fetchData(query, category, postType);
    });


    // Функция для выполнения AJAX запроса
    function fetchData(query, category, postType) {
        $('.search-result__result').html('')
        preloader.show();
        $.ajax({
            url: myAjaxPage.ajaxurl,
            type: 'POST',
            data: {
                action: 'my_ajax_search_page',
                query: query,
                category: category,
                postType: postType,
                security: myAjaxPage.nonce
            },
            success: function (response) {
                preloader.hide();
                $('.search-result__result').html(response);


            }
        });
    }

});

document.addEventListener('DOMContentLoaded', function() {
    let clear = document.getElementById('search-bar__clear');
    if(clear){
        clear.addEventListener('click', function() {
            document.getElementById('search-bar__input').value = '';
        });
    }
    
});
