jQuery(function ($) {
    var page = 1;
    var canLoad = true;
    var ajaxUrl = MyAjaxBlogs.ajaxurl;
    var excursionsContainer = $(".excursions-page__inner");
    var preloader = $(".ajax-preloader");
    var cities = [];
    var types = [];
    var minPrice = $("#filter-min-price").val(); // Обновляем значения minPrice и maxPrice при загрузке страницы
    var maxPrice = $("#filter-max-price").val();

    function loadExcursions(cities, types, minPrice, maxPrice,option) {
        if (canLoad) {
            canLoad = false;
            preloader.show();

            var data = {
                action: "load_more_excursions",
                page: page,
                cities: cities,
                types: types,
                min_price: minPrice,
                max_price: maxPrice,
                option: option
            };

            $.post(ajaxUrl, data, function (response) {
                preloader.hide();
                if (response !== "no_posts") {
                    excursionsContainer.append(response);
                    canLoad = true;
                    
                }
            });
        }
    }
    $(window).on("load", function () {
        minPrice = $("#filter-min-price").val();
        maxPrice = $("#filter-max-price").val();
        var option = $("#excursions__select").val();
        page = 1;
        excursionsContainer.empty();
        loadExcursions(cities, types, minPrice, maxPrice, option);
    });
    

    $(document).on("change", "#excursions__select", function () {
        
        var option = $(this).val();
        page = 1;
        excursionsContainer.empty();
        loadExcursions(cities, types, minPrice, maxPrice,option); 
    });

    

    $(document).on("click", ".excursions-page .pagination span", function (e) {
        e.preventDefault();
    page = $(this).data("page"); // Обновляем значение переменной page
    minPrice = $("#filter-min-price").val();
    maxPrice = $("#filter-max-price").val();
    var option = $("#excursions__select").val();
    excursionsContainer.empty();
    loadExcursions(cities, types, minPrice, maxPrice, option); 
    });

    $(document).on("change", ".filter__checkbox input[type='checkbox']", function () {
        cities = [];
        types = [];
        $(".filter__checkbox input[type='checkbox']:checked").each(function () {
            var value = $(this).attr("id");
            if (value.startsWith("city")) {
                cities.push(value.substring(5));
            } else {
                types.push(value);
            }
        });
        var option = $("#excursions__select").val();
        page = 1;
        excursionsContainer.empty();
        loadExcursions(cities, types, minPrice, maxPrice, option); 
    });

    $(document).on("change", "#filter-min-price, #filter-max-price", function () {
        minPrice = $("#filter-min-price").val();
        maxPrice = $("#filter-max-price").val();
        page = 1;
        var option = $("#excursions__select").val();
        excursionsContainer.empty();
        loadExcursions(cities, types, minPrice, maxPrice, option); 
    });

    $(document).on("click", ".filter__box .filter__city .filter__clear", function () {
        $(this).siblings(".filter__list").find("input[type='checkbox']").prop("checked", false);
        cities = [];
        minPrice = $(".filter__scroll-min .filter__scroll-value").text();
        maxPrice = $(".filter__scroll-max .filter__scroll-value").text();
        var option = $("#excursions__select").val();
        excursionsContainer.empty();
        loadExcursions([], types, minPrice, maxPrice, option);
    });

    $(document).on("click", ".filter__box .filter__type .filter__clear", function () {
        $(this).siblings(".filter__list").find("input[type='checkbox']").prop("checked", false);
        var option = $("#excursions__select").val();
        types = []; 
        minPrice = $(".filter__scroll-min .filter__scroll-value").text();
        maxPrice = $(".filter__scroll-max .filter__scroll-value").text();
        excursionsContainer.empty();
        loadExcursions(cities, [], minPrice, maxPrice, option); 
    });
    $(document).on("click", ".filter__clear", function () {
        var $rangeSlider = $(this).siblings(".filter__scroll").find(".range-slider");
        if ($rangeSlider.length > 0) {
            var option = $("#excursions__select").val();
            var minPrice = $rangeSlider.find(".filter__scroll-min .filter__scroll-value").text();
            var maxPrice = $rangeSlider.find(".filter__scroll-max .filter__scroll-value").text();
            excursionsContainer.empty();
            loadExcursions(cities, types, minPrice, maxPrice, option);
        }
    });
});
